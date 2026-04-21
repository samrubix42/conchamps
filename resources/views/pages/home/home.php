<?php

use Livewire\Component;
use App\Models\Project;
use App\Models\Category;
use App\Models\Slider;
use App\Models\Testimonial;
use App\Helpers\SettingHelper;

new class extends Component
{
    public array $heroSlides = [];
    public array $testimonials = [];
    public array $projectFilters = [];
    public array $projects = [];
    public string $brandLogoUrl = '';

    public function mount(): void
    {
        $this->brandLogoUrl = SettingHelper::asset('logo_path', 'Concrete-Champs-white.png');

        $this->heroSlides = Slider::query()
            ->orderBy('id')
            ->get()
            ->map(function (Slider $slide) {
                return [
                    'image' => asset($slide->image_path),
                    'subtitle' => $slide->badge_name,
                    'title' => $slide->title,
                    'desc' => $slide->description,
                ];
            })
            ->toArray();

        $this->testimonials = Testimonial::query()
            ->where('status', 1)
            ->orderBy('id')
            ->get()
            ->map(function (Testimonial $item) {
                $nameParts = preg_split('/\s+/', trim((string) $item->name));
                $first = $nameParts[0] ?? '';
                $last = $nameParts[count($nameParts) - 1] ?? '';

                return [
                    'quote' => $item->quote,
                    'name' => $item->name,
                    'role' => $item->role,
                    'company' => $item->company,
                    'initials' => strtoupper(substr($first, 0, 1) . substr($last, 0, 1)),
                ];
            })
            ->toArray();

        $activeCategories = Category::query()
            ->where('status', 1)
            ->get(['id', 'title', 'slug']);

        $rows = Project::query()
            ->with('category')
            ->where('status', 1)
            ->whereIn('category_id', $activeCategories->pluck('id'))
            ->latest('id')
            ->limit(6)
            ->get();

        $this->projects = $rows->map(function (Project $project) {
            return [
                'title' => $project->title,
                'category' => $project->category?->title ?? 'General',
                'location' => $project->address ?: 'Location not specified',
                'filter' => $project->category?->slug ?? 'general',
                'image' => $project->image_path ? asset($project->image_path) : asset('images/project1.png'),
            ];
        })->toArray();

        $filters = $activeCategories
            ->filter(fn (Category $category) => $rows->contains('category_id', $category->id))
            ->sortBy('title')
            ->map(fn (Category $category) => [
                'label' => $category->title,
                'value' => $category->slug,
            ])
            ->values()
            ->toArray();

        array_unshift($filters, [
            'label' => 'All',
            'value' => 'all',
        ]);

        $this->projectFilters = $filters;
    }
};
