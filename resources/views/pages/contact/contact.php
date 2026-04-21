<?php

use Livewire\Component;
use App\Models\Contact;
use App\Helpers\SettingHelper;

new class extends Component
{
    public string $title = 'Contact';
    public string $meta_title = 'Contact';
    public string $meta_description = 'Contact Concrete Champs for engineering consultations, project inquiries, and construction support across your next building project.';
    public $name = '';
    public $company = '';
    public $email = '';
    public $phone = '';
    public $project_type = '';
    public $message = '';
    public array $site = [];

    public function mount(): void
    {
        $this->site = SettingHelper::websiteDefaults();
    }

    public function layoutData(): array
    {
        return [
            'title' => $this->title,
            'meta_title' => $this->meta_title,
            'meta_description' => $this->meta_description,
        ];
    }

    public function save(): void
    {
        $data = $this->validate([
            'name' => 'required|string|max:255',
            'company' => 'nullable|string|max:255',
            'email' => 'nullable|email|max:255',
            'phone' => 'required|string|max:30',
            'project_type' => 'nullable|string|max:255',
            'message' => 'required|string|max:3000',
        ]);

        $data['status'] = false;
        Contact::create($data);

        $this->reset(['name', 'company', 'email', 'phone', 'project_type', 'message']);

        session()->flash('message', 'Your request has been submitted successfully.');
        $this->dispatch('toast-show', [
            'message' => 'Thank you! We will contact you soon.',
            'type' => 'success',
            'position' => 'top-right',
        ]);
    }
};