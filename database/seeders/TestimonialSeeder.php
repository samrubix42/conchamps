<?php

namespace Database\Seeders;

use App\Models\Testimonial;
use Illuminate\Database\Seeder;

class TestimonialSeeder extends Seeder
{
    /**
     * Seed the testimonials table.
     */
    public function run(): void
    {
        $rows = [
            [
                'name' => 'Ariana Walsh',
                'role' => 'Project Director',
                'company' => 'Horizon Developments',
                'quote' => 'Concrete Champs brought technical clarity from day one. We cut rework dramatically and still accelerated delivery.',
                'status' => 1,
            ],
            [
                'name' => 'Mark Rios',
                'role' => 'Operations Lead',
                'company' => 'Northline Infrastructure',
                'quote' => 'Their site team communicates fast, documents every change, and executes with almost zero surprises.',
                'status' => 1,
            ],
            [
                'name' => 'Janelle Brooks',
                'role' => 'Senior Architect',
                'company' => 'Axis Studio',
                'quote' => 'The quality benchmark they maintain has become our internal standard across all new projects.',
                'status' => 1,
            ],
        ];

        foreach ($rows as $row) {
            Testimonial::updateOrCreate(
                ['name' => $row['name']],
                $row
            );
        }
    }
}
