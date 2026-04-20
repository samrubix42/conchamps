<?php

use Livewire\Component;
use App\Models\Slider;
use App\Models\Testimonial;
use App\Helpers\SettingHelper;

new class extends Component
{
    public array $heroSlides = [];
    public array $testimonials = [];
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
    }
};