<?php

use Livewire\Component;
use Livewire\WithPagination;
use Livewire\WithFileUploads;
use Livewire\Attributes\Layout;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use App\Models\Project;
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
    public $image;
    public $image_path = '';
    public $projectId = null;
    public $deleteId = null;

    protected $paginationTheme = 'tailwind';

    protected function rules(): array
    {
        return [
            'category_id' => 'required|exists:categories,id',
            'title' => 'required|string|max:255',
            'slug' => 'nullable|string|max:255',
            'description' => 'nullable|string|max:3000',
            'address' => 'nullable|string|max:500',
            'status' => 'boolean',
            'image' => $this->projectId ? 'nullable|image|max:3072' : 'required|image|max:3072',
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
        return Project::with('category')
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
            'image',
            'image_path',
            'projectId',
        ]);

        $this->status = true;
        $this->resetValidation();
    }

    public function openEditModal(int $id): void
    {
        $project = Project::findOrFail($id);

        $this->projectId = $project->id;
        $this->category_id = (string) $project->category_id;
        $this->title = $project->title;
        $this->slug = $project->slug ?? '';
        $this->description = $project->description ?? '';
        $this->address = $project->address ?? '';
        $this->status = (bool) $project->status;
        $this->image_path = $project->image_path ?? '';
        $this->image = null;

        $this->dispatch('open-modal');
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
        unset($data['image']);

        if ($this->image) {
            $newPath = $this->image->store('projects', 'public');
            $data['image_path'] = 'storage/' . $newPath;
        }

        if ($this->projectId) {
            $project = Project::find($this->projectId);
            if ($project) {
                if ($this->image && str_starts_with($project->image_path ?? '', 'storage/')) {
                    Storage::disk('public')->delete(substr($project->image_path, 8));
                }
                $project->update($data);
            }
        } else {
            Project::create($data);
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

    public function deleteConfirmed(): void
    {
        if ($this->deleteId) {
            $project = Project::find($this->deleteId);
            if ($project) {
                if (str_starts_with($project->image_path ?? '', 'storage/')) {
                    Storage::disk('public')->delete(substr($project->image_path, 8));
                }
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
};