<?php

use Livewire\Component;
use Livewire\WithPagination;
use Livewire\WithFileUploads;
use Livewire\Attributes\Layout;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use App\Models\Project;
use App\Models\ProjectImage;
use App\Models\Category;

new #[Layout('layouts::admin')] class extends Component
{
    use WithPagination, WithFileUploads;

    public $search = '';
    public $title = '';
    public $slug = '';
    public $description = '';
    public $address = '';
    public $status = true;
    public $category_id = '';
    public $images = [];
    public $image_path = '';
    public array $existingImages = [];
    public $projectId = null;
    public $deleteId = null;

    protected $paginationTheme = 'tailwind';

    protected function rules(): array
    {
        return [
            'category_id' => 'required|exists:categories,id',
            'title' => 'required|string|max:255',
            'slug' => 'nullable|string|max:255',
            'description' => 'nullable|string|max:10000',
            'address' => 'nullable|string|max:500',
            'status' => 'boolean',
            'images' => $this->projectId ? 'nullable|array' : 'required|array|min:1',
            'images.*' => 'image|max:3072',
        ];
    }

    public function updatedTitle(): void
    {
        if (! $this->projectId || blank($this->slug)) {
            $this->slug = Str::slug($this->title);
        }
    }

    public function getCategoriesProperty()
    {
        return Category::query()
            ->where('status', 1)
            ->orderBy('title')
            ->get();
    }

    public function getProjectsProperty()
    {
        return Project::with(['category', 'images'])
            ->when($this->search, function ($query) {
                $query->where(function ($q) {
                    $q->where('title', 'like', "%{$this->search}%")
                        ->orWhere('slug', 'like', "%{$this->search}%")
                        ->orWhere('address', 'like', "%{$this->search}%")
                        ->orWhereHas('category', function ($cq) {
                            $cq->where('title', 'like', "%{$this->search}%");
                        });
                });
            })
            ->orderByDesc('id')
            ->paginate(10);
    }

    public function resetForm(): void
    {
        $this->reset([
            'title',
            'slug',
            'description',
            'address',
            'status',
            'category_id',
            'images',
            'image_path',
            'existingImages',
            'projectId',
        ]);

        $this->status = true;
        $this->resetValidation();
        $this->dispatch('project-description-editor-content', content: '');
    }

    public function openEditModal(int $id): void
    {
        $project = Project::with('images')->findOrFail($id);

        $this->projectId = $project->id;
        $this->category_id = (string) $project->category_id;
        $this->title = $project->title;
        $this->slug = $project->slug ?? '';
        $this->description = $project->description ?? '';
        $this->address = $project->address ?? '';
        $this->status = (bool) $project->status;
        $this->image_path = $project->image_path ?? '';
        $this->images = [];
        $this->existingImages = $project->images
            ->map(fn (ProjectImage $image) => [
                'id' => $image->id,
                'image_path' => $image->image_path,
            ])
            ->values()
            ->toArray();

        $this->dispatch('open-modal');
        $this->dispatch('project-description-editor-content', content: $this->description);
    }

    public function save(): void
    {
        $data = $this->validate();

        $slug = filled($data['slug']) ? Str::slug($data['slug']) : Str::slug($data['title']);

        $existing = Project::where('slug', $slug);
        if ($this->projectId) {
            $existing->where('id', '!=', $this->projectId);
        }

        if ($existing->exists()) {
            $slug .= '-' . time();
        }

        $data['slug'] = $slug;
        $data['status'] = $this->status ? 1 : 0;
        unset($data['images']);

        if ($this->projectId) {
            $project = Project::with('images')->find($this->projectId);
            if ($project) {
                $project->update($data);
            }
        } else {
            $project = Project::create($data);
        }

        if (isset($project) && $project) {
            $nextSortOrder = (int) $project->images()->max('sort_order') + 1;
            $firstNewPath = null;

            foreach ($this->images as $index => $image) {
                $newPath = 'storage/' . $image->store('projects', 'public');
                $firstNewPath ??= $newPath;

                $project->images()->create([
                    'image_path' => $newPath,
                    'sort_order' => $nextSortOrder + $index,
                ]);
            }

            if ($firstNewPath && blank($project->image_path)) {
                $project->update(['image_path' => $firstNewPath]);
            }
        }

        $this->dispatch('close-modal');
        $this->resetForm();
        session()->flash('message', 'Project saved.');
        $this->dispatch('toast-show', [
            'message' => 'Project saved successfully!',
            'type' => 'success',
            'position' => 'top-right',
        ]);
    }

    public function confirmDelete(int $id): void
    {
        $this->deleteId = $id;
    }

    public function deleteProjectImage(int $imageId): void
    {
        if (! $this->projectId) {
            return;
        }

        $image = ProjectImage::query()
            ->where('project_id', $this->projectId)
            ->find($imageId);

        if (! $image) {
            return;
        }

        $project = Project::with('images')->find($this->projectId);
        $deletedPath = $image->image_path;

        $this->deleteStoredImage($deletedPath);
        $image->delete();

        if ($project && $project->image_path === $deletedPath) {
            $project->update([
                'image_path' => $project->images()->value('image_path'),
            ]);
        }

        $this->existingImages = ProjectImage::query()
            ->where('project_id', $this->projectId)
            ->orderBy('sort_order')
            ->orderBy('id')
            ->get(['id', 'image_path'])
            ->map(fn (ProjectImage $image) => [
                'id' => $image->id,
                'image_path' => $image->image_path,
            ])
            ->toArray();
    }

    public function removePendingImage(int $index): void
    {
        if (! array_key_exists($index, $this->images)) {
            return;
        }

        unset($this->images[$index]);
        $this->images = array_values($this->images);
    }

    public function deleteConfirmed(): void
    {
        if ($this->deleteId) {
            $project = Project::with('images')->find($this->deleteId);
            if ($project) {
                $project->images
                    ->pluck('image_path')
                    ->push($project->image_path)
                    ->filter()
                    ->unique()
                    ->each(fn (string $path) => $this->deleteStoredImage($path));

                $project->delete();
            }

            $this->dispatch('close-delete-modal');
            $this->deleteId = null;
            session()->flash('message', 'Project deleted.');
            $this->dispatch('toast-show', [
                'message' => 'Project deleted successfully!',
                'type' => 'success',
                'position' => 'top-right',
            ]);
        }
    }

    private function deleteStoredImage(?string $path): void
    {
        if ($path && str_starts_with($path, 'storage/')) {
            Storage::disk('public')->delete(substr($path, 8));
        }
    }
};
