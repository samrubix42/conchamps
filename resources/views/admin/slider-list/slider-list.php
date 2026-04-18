<?php

use Livewire\Component;
use App\Models\Slider;

new class extends Component
{
    public $badge_name = '';
    public $image_path = '';
    public $title = '';
    public $description = '';
    public $button1_text = '';
    public $button1_link = '';
    public $button2_text = '';
    public $button2_link = '';

    public ?int $editingId = null;

    protected $rules = [
        'badge_name' => 'nullable|string|max:255',
        'image_path' => 'nullable|string|max:1024',
        'title' => 'required|string|max:255',
        'description' => 'nullable|string|max:1000',
        'button1_text' => 'nullable|string|max:255',
        'button1_link' => 'nullable|string|max:1024',
        'button2_text' => 'nullable|string|max:255',
        'button2_link' => 'nullable|string|max:1024',
    ];

    public function mount(): void
    {
        // nothing needed here; blade will query Slider::all()
    }

    public function resetForm(): void
    {
        $this->editingId = null;
        $this->badge_name = '';
        $this->image_path = '';
        $this->title = '';
        $this->description = '';
        $this->button1_text = '';
        $this->button1_link = '';
        $this->button2_text = '';
        $this->button2_link = '';
        $this->resetErrorBag();
        $this->resetValidation();
    }

    public function edit(int $id): void
    {
        $slider = Slider::findOrFail($id);
        $this->editingId = $slider->id;
        $this->badge_name = $slider->badge_name;
        $this->image_path = $slider->image_path;
        $this->title = $slider->title;
        $this->description = $slider->description;
        $this->button1_text = $slider->button1_text;
        $this->button1_link = $slider->button1_link;
        $this->button2_text = $slider->button2_text;
        $this->button2_link = $slider->button2_link;

        $this->dispatchBrowserEvent('open-slider-modal');
    }

    public function create(): void
    {
        $this->resetForm();
        $this->dispatchBrowserEvent('open-slider-modal');
    }

    public function save(): void
    {
        $data = $this->validate();

        if ($this->editingId) {
            $slider = Slider::findOrFail($this->editingId);
            $slider->update($data);
            $this->dispatchBrowserEvent('notify', ['type' => 'success', 'message' => 'Slider updated']);
        } else {
            Slider::create($data);
            $this->dispatchBrowserEvent('notify', ['type' => 'success', 'message' => 'Slider created']);
        }

        $this->resetForm();
        $this->dispatchBrowserEvent('close-slider-modal');
        $this->emitSelf('refresh');
    }

    public function delete(int $id): void
    {
        $s = Slider::find($id);
        if ($s) {
            $s->delete();
            $this->dispatchBrowserEvent('notify', ['type' => 'success', 'message' => 'Slider deleted']);
        }

        $this->emitSelf('refresh');
    }
};