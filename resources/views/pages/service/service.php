<?php

use Livewire\Component;

new class extends Component
{
    public string $title = 'Services';
    public string $meta_title = 'Services';
    public string $meta_description = 'Our services include structural engineering, concrete works, BIM coordination, site planning, renovation, and QA/QC supervision.';
    public array $services = [
        [
            'icon' => 'ri-building-4-line',
            'title' => 'Structural Engineering',
            'description' => 'Code-compliant structural design for residential, commercial, and industrial builds.',
        ],
        [
            'icon' => 'ri-layout-masonry-line',
            'title' => 'Concrete Works',
            'description' => 'Precision formwork, reinforcement, and concrete execution with strict quality control.',
        ],
        [
            'icon' => 'ri-ruler-2-line',
            'title' => 'BIM & Drafting',
            'description' => 'Detailed drawing and BIM coordination to reduce clashes and rework on site.',
        ],
        [
            'icon' => 'ri-compass-3-line',
            'title' => 'Site Planning',
            'description' => 'Construction-first planning that balances budget, safety, and practical delivery speed.',
        ],
        [
            'icon' => 'ri-tools-line',
            'title' => 'Renovation & Retrofit',
            'description' => 'Strengthening and modernization of aging structures with minimal operational disruption.',
        ],
        [
            'icon' => 'ri-shield-check-line',
            'title' => 'QA/QC Supervision',
            'description' => 'On-site inspections, method checks, and documentation to maintain project quality.',
        ],
    ];

    public array $process = [
        [
            'title' => 'Discovery Call',
            'text' => 'We map your scope, timelines, and constraints in a quick technical call.',
        ],
        [
            'title' => 'Technical Review',
            'text' => 'Our team prepares a practical approach and identifies design and execution risks early.',
        ],
        [
            'title' => 'Proposal & Plan',
            'text' => 'You receive a clear plan with milestones, staffing, and quality checkpoints.',
        ],
        [
            'title' => 'Execution Support',
            'text' => 'We coordinate with your team and consultants to deliver safely and on schedule.',
        ],
    ];

    public array $sectors = [
        'Commercial Buildings',
        'Industrial Facilities',
        'Warehouses & Logistics',
        'Institutions & Campuses',
        'Infrastructure & Utility',
        'Residential High-Rise',
    ];

    public function layoutData(): array
    {
        return [
            'title' => $this->title,
            'meta_title' => $this->meta_title,
            'meta_description' => $this->meta_description,
        ];
    }
};