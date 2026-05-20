<?php

use Livewire\Component;
use App\Models\Project;
use App\Models\Category;

new class extends Component
{
    public string $title = 'Projects';
    public string $meta_title = 'Projects';
    public string $meta_description = 'Explore our projects portfolio featuring commercial, industrial, and institutional construction work completed with technical precision.';
    public array $projects = [];

    public function mount(): void
    {
        $activeCategoryIds = Category::query()
            ->where('status', 1)
            ->pluck('id')
            ->all();

        $rows = Project::query()
            ->with(['category', 'images'])
            ->where('status', 1)
            ->whereIn('category_id', $activeCategoryIds)
            ->orderByDesc('id')
            ->get();

        $this->projects = $rows->map(function (Project $project) {
            $imagePath = $project->displayImagePath();
            $images = $project->images
                ->pluck('image_path')
                ->filter()
                ->map(fn (string $path) => asset($path))
                ->values()
                ->toArray();

            if (! $images && $imagePath) {
                $images[] = asset($imagePath);
            }

            return [
                'title' => $project->title,
                'category' => $project->category?->title ?? 'General',
                'location' => $project->address ?: 'Location not specified',
                'filter' => $project->category?->slug ?? 'general',
                'image' => $imagePath ? asset($imagePath) : asset('images/project1.png'),
                'images' => $images ?: [asset('images/project1.png')],
                'description' => $project->description ?: 'Detailed project information is available on request.',
            ];
        })->toArray();

    }

    public function layoutData(): array
    {
        return [
            'title' => $this->title,
            'meta_title' => $this->meta_title,
            'meta_description' => $this->meta_description,
        ];
    }
};
