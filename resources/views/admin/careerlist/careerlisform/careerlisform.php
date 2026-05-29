<?php

use Livewire\Component;
use Livewire\Attributes\Layout;
use App\Models\Career;

new #[Layout('layouts::admin')] class extends Component
{
    public $careerId = null;
    public $title = '';
    public $location = '';
    public $experience = '';
    public $type = 'Full-time';
    public $description = '';
    public $status = true;

    public function mount($id = null)
    {
        if ($id) {
            $career = Career::findOrFail($id);
            $this->careerId = $career->id;
            $this->title = $career->title;
            $this->location = $career->location;
            $this->experience = $career->experience;
            $this->type = $career->type;
            $this->description = $career->description;
            $this->status = (bool) $career->status;
        }
    }

    protected function rules(): array
    {
        return [
            'title' => 'required|string|max:255',
            'location' => 'nullable|string|max:255',
            'experience' => 'nullable|string|max:255',
            'type' => 'nullable|string|max:255',
            'description' => 'nullable|string',
            'status' => 'boolean',
        ];
    }

    public function save()
    {
        $data = $this->validate();
        $data['status'] = $this->status ? 1 : 0;

        if ($this->careerId) {
            $career = Career::findOrFail($this->careerId);
            $career->update($data);
            $message = 'Job description updated successfully!';
        } else {
            Career::create($data);
            $message = 'Job description created successfully!';
        }

        session()->flash('message', $message);
        
        return redirect()->route('admin.careers');
    }
};
