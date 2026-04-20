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
                'badge_name' => 'Featured Project',
                'image_path' => 'Concrete-Champs-dark.png',
                'title' => 'Build Better Spaces With Conchamps',
                'description' => 'Trusted construction solutions with quality, speed, and modern execution standards.',
                'button1_text' => 'View Projects',
                'button1_link' => '/projects',
                'button2_text' => 'Contact Us',
                'button2_link' => '/contact',
            ],
            [
                'badge_name' => 'New Launch',
                'image_path' => 'Concrete-Champs-white.png',
                'title' => 'Modern Engineering For Every Structure',
                'description' => 'From residential to commercial projects, we deliver reliable and future-ready results.',
                'button1_text' => 'Get Quote',
                'button1_link' => '/contact',
                'button2_text' => 'About Company',
                'button2_link' => '/about',
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
