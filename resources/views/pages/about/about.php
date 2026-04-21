<?php

use Livewire\Component;

new class extends Component
{
    public string $title = 'About Us';
    public string $meta_title = 'About Concrete Champs';
    public string $meta_description = 'Learn more about Concrete Champs, our engineering-led approach, and how we deliver reliable construction and structural consulting services.';

    public function layoutData(): array
    {
        return [
            'title' => $this->title,
            'meta_title' => $this->meta_title,
            'meta_description' => $this->meta_description,
        ];
    }
};