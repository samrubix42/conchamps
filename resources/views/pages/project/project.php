<?php

use Livewire\Component;
use App\Models\Project;
use App\Models\Category;

new class extends Component
{
    public array $filters = [];
    public array $projects = [];
    public ?array $featuredProject = null;

    public function mount(): void
    {
        $activeCategoryIds = Category::query()
            ->where('status', 1)
            ->pluck('id')
            ->all();

        $rows = Project::query()
            ->with('category')
            ->where('status', 1)
            ->whereIn('category_id', $activeCategoryIds)
            ->orderByDesc('id')
            ->get();

        $this->projects = $rows->map(function (Project $project) {
            return [
                'title' => $project->title,
                'category' => $project->category?->title ?? 'General',
                'location' => $project->address ?: 'Location not specified',
                'filter' => $project->category?->slug ?? 'general',
                'image' => $project->image_path ? asset($project->image_path) : asset('images/project1.png'),
                'description' => $project->description ?: 'Detailed project information is available on request.',
            ];
        })->toArray();

        $categoryFilters = Category::query()
            ->where('status', 1)
            ->whereIn('id', $activeCategoryIds)
            ->orderBy('title')
            ->get()
            ->map(fn (Category $category) => [
                'label' => $category->title,
                'value' => $category->slug,
            ])
            ->values()
            ->toArray();

        array_unshift($categoryFilters, [
            'label' => 'All',
            'value' => 'all',
        ]);

        $this->filters = $categoryFilters;

        $this->featuredProject = $this->projects[0] ?? null;
    }
};