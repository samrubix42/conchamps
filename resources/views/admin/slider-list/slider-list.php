<?php

use Livewire\Component;
use Livewire\WithPagination;
use Livewire\WithFileUploads;
use App\Models\Slider;
use Livewire\Attributes\Layout;
use Illuminate\Support\Facades\Storage;

new #[Layout('layouts::admin')] class extends Component
{
    use WithPagination, WithFileUploads;
    public $search = '';
    public $badge_name = '';
    public $image_path = '';
    public $image;
    public $title = '';
    public $description = '';
    public $button1_text = '';
    public $button1_link = '';
    public $button2_text = '';
    public $button2_link = '';
    public $sliderId = null;
    public $deleteId = null;

    protected $paginationTheme = 'tailwind';

    protected function rules(): array
    {
        return [
            'badge_name' => 'required|string|max:255',
            'image' => $this->sliderId ? 'nullable|image|max:3072' : 'required|image|max:3072',
            'title' => 'required|string|max:255',
            'description' => 'nullable|string|max:1000',
            'button1_text' => 'nullable|string|max:255',
            'button1_link' => 'nullable|string|max:1024',
            'button2_text' => 'nullable|string|max:255',
            'button2_link' => 'nullable|string|max:1024',
        ];
    }

    public function getSlidersProperty()
    {
        $query = Slider::query();

        if ($this->search) {
            $query->where('title', 'like', "%{$this->search}%")
                ->orWhere('badge_name', 'like', "%{$this->search}%");
        }

        return $query->orderBy('id', 'desc')->paginate(10);
    }

    public function resetForm(): void
    {
        $this->reset([
            'badge_name',
            'image_path',
            'image',
            'title',
            'description',
            'button1_text',
            'button1_link',
            'button2_text',
            'button2_link',
            'sliderId',
        ]);
        $this->resetValidation();
    }

    public function openEditModal(int $id): void
    {
        $slider = Slider::findOrFail($id);
        $this->sliderId = $slider->id;
        $this->badge_name = $slider->badge_name;
        $this->image_path = $slider->image_path;
        $this->title = $slider->title;
        $this->description = $slider->description;
        $this->button1_text = $slider->button1_text;
        $this->button1_link = $slider->button1_link;
        $this->button2_text = $slider->button2_text;
        $this->button2_link = $slider->button2_link;

        $this->dispatch('open-modal');
    }

    public function save(): void
    {
        $data = $this->validate();
        unset($data['image']);

        if ($this->image) {
            $newPath = $this->image->store('sliders', 'public');
            $data['image_path'] = 'storage/' . $newPath;
        }

        if ($this->sliderId) {
            $slider = Slider::find($this->sliderId);
            if ($slider) {
                if ($this->image && str_starts_with($slider->image_path ?? '', 'storage/')) {
                    Storage::disk('public')->delete(substr($slider->image_path, 8));
                }
                $slider->update($data);
            }
        } else {
            Slider::create($data);
        }

        $this->dispatch('close-modal');
        $this->resetForm();
        session()->flash('message', 'Slider saved.');
        $this->dispatch('toast-show', [
            'message' => 'Slider saved successfully!',
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
            $slider = Slider::find($this->deleteId);
            if ($slider) {
                if (str_starts_with($slider->image_path ?? '', 'storage/')) {
                    Storage::disk('public')->delete(substr($slider->image_path, 8));
                }
                $slider->delete();
            }

            $this->dispatch('close-delete-modal');
            $this->deleteId = null;
            session()->flash('message', 'Slider deleted.');
            $this->dispatch('toast-show', [
                'message' => 'Slider deleted successfully!',
                'type' => 'success',
                'position' => 'top-right',
            ]);
        }
    }
};