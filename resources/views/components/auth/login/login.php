<?php

use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\Attributes\Layout;

new #[Layout('layouts::auth')] class extends Component
{
    public string $title = 'Login';
    public string $meta_title = 'Login';
    public string $meta_description = 'Login to the Concrete Champs administration dashboard to manage projects, sliders, testimonials, contacts, and settings.';
    public string $email = '';

    public string $password = '';

    public bool $remember = false;

    public function layoutData(): array
    {
        return [
            'title' => $this->title,
            'meta_title' => $this->meta_title,
            'meta_description' => $this->meta_description,
        ];
    }

    public function login(): void
    {
        $credentials = $this->validate([
            'email' => ['required', 'email'],
            'password' => ['required', 'string'],
        ]);

        if (! Auth::attempt($credentials, $this->remember)) {
            $this->addError('email', 'These credentials do not match our records.');

            return;
        }

        request()->session()->regenerate();

        $this->redirectIntended(route('admin.dashboard'), navigate: true);
    }
};