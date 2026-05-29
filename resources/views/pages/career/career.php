<?php

use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\Career;
use App\Models\AppliedJobs;

new class extends Component
{
    use WithFileUploads;

    public string $title = 'Careers';
    public string $meta_title = 'Careers | Concrete Champs';
    public string $meta_description = 'Explore career opportunities at Concrete Champs. Join our team of masonry experts, concrete finishers, structural estimators, and project coordinators.';

    public $selectedCareerId = null;
    
    // Application Form Fields
    public $full_name = '';
    public $phone = '';
    public $email = '';
    public $address = '';
    public $resume = null;

    public function mount(): void
    {
        // Select first active career by default
        $first = Career::where('status', 1)->first();
        if ($first) {
            $this->selectedCareerId = $first->id;
        }
    }

    public function selectCareer($id): void
    {
        $this->selectedCareerId = $id;
        $this->resetValidation();
        $this->reset(['full_name', 'phone', 'email', 'address', 'resume']);
    }

    public function getCareersProperty()
    {
        return Career::where('status', 1)->orderBy('id', 'desc')->get();
    }

    public function getSelectedCareerProperty()
    {
        if ($this->selectedCareerId) {
            return Career::find($this->selectedCareerId);
        }
        return null;
    }

    public function layoutData(): array
    {
        return [
            'title' => $this->title,
            'meta_title' => $this->meta_title,
            'meta_description' => $this->meta_description,
        ];
    }

    public function apply(): void
    {
        $this->validate([
            'selectedCareerId' => 'required|exists:careers,id',
            'full_name' => 'required|string|max:255',
            'phone' => 'required|string|max:30',
            'email' => 'required|email|max:255',
            'address' => 'nullable|string|max:255',
            'resume' => 'required|file|mimes:pdf,doc,docx|max:10240', // 10MB limit
        ]);

        // Upload resume file
        $resumePath = $this->resume->store('resumes', 'public');

        AppliedJobs::create([
            'career_id' => $this->selectedCareerId,
            'full_name' => $this->full_name,
            'phone' => $this->phone,
            'email' => $this->email,
            'address' => $this->address,
            'resume_doc' => $resumePath,
            'status' => 'pending',
        ]);

        $this->reset(['full_name', 'phone', 'email', 'address', 'resume']);

        session()->flash('message', 'Thank you! Your application has been submitted successfully. Our team will review it and get back to you.');

        $this->dispatch('toast-show', [
            'message' => 'Application submitted successfully!',
            'type' => 'success',
            'position' => 'top-right',
        ]);
    }
};