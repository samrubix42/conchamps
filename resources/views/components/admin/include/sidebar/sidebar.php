<?php

use Livewire\Component;
new class extends Component
{
    public array $menu = [];

    public function mount(): void
    {
        $current = '/' . trim(request()->path(), '/');

        $this->menu = [
            [
                'title' => 'Dashboard',
                'icon' => 'ri-dashboard-2-line',
                'uri' => '/admin',
            ],
            [
                'title' => 'Projects',
                'icon' => 'ri-folder-3-line',
                'uri' => '/admin/projects',
                'children' => [
                    ['title' => 'Category', 'uri' => '/admin/categories'],
                    ['title' => 'Project', 'uri' => '/admin/projects'],
                ],
            ],
            
            [
                'title' => 'Users',
                'icon' => 'ri-user-3-line',
                'uri' => '/admin/users',
                'children' => [
                    ['title' => 'All Users', 'uri' => '/admin/users'],
                    ['title' => 'Invite User', 'uri' => '/admin/users/invite'],
                ],
            ],
            [
                'title' => 'Sliders',
                'icon' => 'ri-slideshow-3-line',
                'uri' => '/admin/sliders',
                
            ],
            [
                'title' => 'Testimonials',
                'icon' => 'ri-chat-quote-line',
                'uri' => '/admin/testimonials',
            ],
            [
                'title' => 'Contacts',
                'icon' => 'ri-contacts-book-2-line',
                'uri' => '/admin/contacts',
            ],
                 [
                'title' => 'Settings',
                'icon' => 'ri-settings-4-line',
                'uri' => '/admin/settings',
            ],
        ];

        // mark active states
        foreach ($this->menu as &$item) {
            $item['active'] = isset($item['uri']) && $item['uri'] === $current;

            if (! empty($item['children'])) {
                $item['childActive'] = false;

                foreach ($item['children'] as &$child) {
                    $child['active'] = isset($child['uri']) && $child['uri'] === $current;
                    if ($child['active']) {
                        $item['childActive'] = true;
                    }
                }
                unset($child);
            }
        }
        unset($item);
    }
};