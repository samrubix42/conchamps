<?php

use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\Attributes\Layout;
use App\Models\Setting;
use Illuminate\Support\Facades\Storage;

new #[Layout('layouts::admin')] class extends Component
{
    use WithFileUploads;

    public $project_name = '';
    public $email = '';
    public $phone_number = '';
    public $whatsapp_number = '';
    public $office_timing = '';
    public $address = '';
    public $logo_path = '';
    public $favicon_path = '';
    public $instagram = '';
    public $x = '';
    public $linkedin = '';
    public $facebook = '';

    public $logo;
    public $favicon;

    public function mount(): void
    {
        $keys = [
            'project_name',
            'email',
            'phone_number',
            'whatsapp_number',
            'office_timing',
            'address',
            'logo_path',
            'favicon_path',
            'instagram',
            'x',
            'linkedin',
            'facebook',
        ];

        $settings = Setting::whereIn('key', $keys)->pluck('value', 'key');

        foreach ($keys as $key) {
            $this->{$key} = $settings[$key] ?? '';
        }
    }

    public function save(): void
    {
        $this->validate([
            'project_name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone_number' => 'nullable|string|max:30',
            'whatsapp_number' => 'nullable|string|max:30',
            'office_timing' => 'nullable|string|max:255',
            'address' => 'nullable|string|max:1000',
            'logo' => 'nullable|image|max:3072',
            'favicon' => 'nullable|image|max:2048',
            'instagram' => 'nullable|url|max:255',
            'x' => 'nullable|url|max:255',
            'linkedin' => 'nullable|url|max:255',
            'facebook' => 'nullable|url|max:255',
        ]);

        if ($this->logo) {
            $newLogo = $this->logo->store('settings', 'public');

            if ($this->logo_path && str_starts_with($this->logo_path, 'storage/')) {
                Storage::disk('public')->delete(substr($this->logo_path, 8));
            }

            $this->logo_path = 'storage/' . $newLogo;
        }

        if ($this->favicon) {
            $newFavicon = $this->favicon->store('settings', 'public');

            if ($this->favicon_path && str_starts_with($this->favicon_path, 'storage/')) {
                Storage::disk('public')->delete(substr($this->favicon_path, 8));
            }

            $this->favicon_path = 'storage/' . $newFavicon;
        }

        $pairs = [
            'project_name' => $this->project_name,
            'email' => $this->email,
            'phone_number' => $this->phone_number,
            'whatsapp_number' => $this->whatsapp_number,
            'office_timing' => $this->office_timing,
            'address' => $this->address,
            'logo_path' => $this->logo_path,
            'favicon_path' => $this->favicon_path,
            'instagram' => $this->instagram,
            'x' => $this->x,
            'linkedin' => $this->linkedin,
            'facebook' => $this->facebook,
        ];

        foreach ($pairs as $key => $value) {
            Setting::setValue($key, $value ?: null);
        }

        $this->logo = null;
        $this->favicon = null;

        session()->flash('message', 'Settings updated successfully.');
        $this->dispatch('toast-show', [
            'message' => 'Settings saved successfully!',
            'type' => 'success',
            'position' => 'top-right',
        ]);
    }
};