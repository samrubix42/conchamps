<?php

namespace Database\Seeders;

use App\Models\Slider;
use Illuminate\Database\Seeder;

class SliderSeeder extends Seeder
{
    /**
     * Seed slider records.
     */
    public function run(): void
    {
        $sliders = [
            [
                'badge_name' => 'Engineered for Strength',
                'image_path' => 'building/construction-site-sunset.webp',
                'title' => 'Build Smart Infrastructure For The Future',
                'description' => 'From concept to completion, we deliver high-performance construction with precision, speed, and reliability.',
            ],
            [
                'badge_name' => 'Precision Construction',
                'image_path' => 'building/beautiful-view-construction-site-city-sunset.webp',
                'title' => 'Modern Projects Delivered On Time',
                'description' => 'We combine structural expertise and field-ready execution to reduce risk and accelerate delivery.',
            ],
            [
                'badge_name' => 'Execution Excellence',
                'image_path' => 'building/illustration-construction-site.webp',
                'title' => 'Reliable Teams. Measurable Project Outcomes.',
                'description' => 'Our construction specialists turn designs into durable, high-quality assets with transparent delivery workflows.',
            ],
        ];

        foreach ($sliders as $slider) {
            Slider::updateOrCreate(
                ['title' => $slider['title']],
                $slider
            );
        }
    }
}
