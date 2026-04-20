<?php

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Category;
use Illuminate\Support\Str;
use Livewire\Attributes\Layout;

new #[Layout('layouts::admin')] class extends Component
{
    use WithPagination;

    public $search = '';
    public $title;
    public $slug;
    public $status = false;
    public $BlogCategoryId = null;
    public $deleteId = null;

    protected $paginationTheme = 'tailwind';

    public function resetForm()
    {
        $this->reset(['title', 'slug', 'status', 'BlogCategoryId']);
        $this->resetValidation();
    }

    public function getCategoriesProperty()
    {
        $query = Category::query();

        if ($this->search) {
            $query->where('title', 'like', "%{$this->search}%")
                  ->orWhere('slug', 'like', "%{$this->search}%");
        }

        return $query->orderBy('id', 'desc')->paginate(10);
    }

    public function openEditModal($id)
    {
        $category = Category::findOrFail($id);
        $this->BlogCategoryId = $category->id;
        $this->title = $category->title;
        $this->slug = $category->slug;
        $this->status = (bool) $category->status;

        $this->dispatch('open-modal');
    }
    public function UpdatedTitle(){
            $this->slug = Str::slug($this->title);
        
    }

    public function save()
    {
        $this->validate([
            'title' => 'required|string|max:255',
            'slug' => 'nullable|string|max:255',
        ]);

        $slug = $this->slug ?: Str::slug($this->title);

        $existing = Category::where('slug', $slug);
        if ($this->BlogCategoryId) {
            $existing->where('id', '!=', $this->BlogCategoryId);
        }
        if ($existing->exists()) {
            $slug = $slug . '-' . time();
        }

        $data = [
            'title' => $this->title,
            'slug' => $slug,
            'status' => $this->status ? 1 : 0,
        ];

        if ($this->BlogCategoryId) {
            $category = Category::find($this->BlogCategoryId);
            if ($category) {
                $category->update($data);
            }
        } else {
            Category::create($data);
        }

        $this->dispatch('close-modal');
        $this->resetForm();
        session()->flash('message', 'Category saved.');
        $this->dispatch('toast-show', [
            'message' => 'Blog Category saved successfully!',
            'type' => 'success',
            'position' => 'top-right',
        ]);
    }

    public function confirmDelete($id)
    {
        $this->deleteId = $id;
    }

    public function deleteConfirmed()
    {
        if ($this->deleteId) {
            $category = Category::find($this->deleteId);
            if ($category) {
                $category->delete();
            }
            $this->dispatch('close-delete-modal');
            $this->deleteId = null;
            session()->flash('message', 'Category deleted.');
            $this->dispatch('toast-show', [
                'message' => 'Blog Category deleted successfully!',
                'type' => 'success',
                'position' => 'top-right',
            ]);
        }
    }
};