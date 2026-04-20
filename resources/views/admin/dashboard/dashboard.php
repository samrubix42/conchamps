<?php

use App\Models\Category;
use App\Models\Contact;
use App\Models\Project;
use App\Models\Slider;
use App\Models\Testimonial;
use Livewire\Attributes\Layout;
use Livewire\Component;

new #[Layout('layouts::admin')] class extends Component
{
    public function getMetricsProperty()
    {
        return [
            [
                'label' => 'Projects',
                'value' => Project::count(),
                'description' => 'Total projects available in the portfolio.',
                'icon' => '<i class="ri-archive-line text-xl"></i>',
            ],
            [
                'label' => 'Categories',
                'value' => Category::count(),
                'description' => 'Project categories available for assignment.',
                'icon' => '<i class="ri-stack-line text-xl"></i>',
            ],
            [
                'label' => 'Sliders',
                'value' => Slider::count(),
                'description' => 'Hero slides shown on the homepage.',
                'icon' => '<i class="ri-slideshow-line text-xl"></i>',
            ],
            [
                'label' => 'Testimonials',
                'value' => Testimonial::count(),
                'description' => 'Client testimonials published on the site.',
                'icon' => '<i class="ri-chat-quote-line text-xl"></i>',
            ],
            [
                'label' => 'Contacts',
                'value' => Contact::count(),
                'description' => 'Messages received from website visitors.',
                'icon' => '<i class="ri-mail-line text-xl"></i>',
            ],
            [
                'label' => 'New leads',
                'value' => Contact::where('status', false)->count(),
                'description' => 'Unread contact requests needing review.',
                'icon' => '<i class="ri-notification-line text-xl"></i>',
            ],
        ];
    }

    public function getRecentContactsProperty()
    {
        return Contact::orderBy('created_at', 'desc')->limit(5)->get();
    }

    public function getRecentProjectsProperty()
    {
        return Project::with('category')->orderBy('created_at', 'desc')->limit(5)->get();
    }
};