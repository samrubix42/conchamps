<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Project;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class ProjectSeeder extends Seeder
{
    public function run(): void
    {
        $categories = [
            ['title' => 'Commercial Build', 'slug' => 'commercial-build'],
            ['title' => 'Industrial Facility', 'slug' => 'industrial-facility'],
            ['title' => 'Infrastructure', 'slug' => 'infrastructure'],
        ];

        foreach ($categories as $cat) {
            Category::updateOrCreate(
                ['slug' => $cat['slug']],
                [
                    'title' => $cat['title'],
                    'status' => 1,
                ]
            );
        }

        $projectRows = [
            [
                'category_slug' => 'commercial-build',
                'title' => 'Northline Business Plaza',
                'description' => 'Full structural and execution package for a 12-floor commercial office block.',
                'address' => 'Downtown West Sector',
                'status' => 1,
                'image_path' => 'building/beautiful-view-construction-site-city-sunset.webp',
            ],
            [
                'category_slug' => 'industrial-facility',
                'title' => 'Apex Manufacturing Plant',
                'description' => 'Heavy-duty concrete and steel integration for process-critical industrial operations.',
                'address' => 'Industrial Belt, Phase 2',
                'status' => 1,
                'image_path' => 'building/beautiful-view-construction-site-city-sunset.webp',
            ],
            [
                'category_slug' => 'infrastructure',
                'title' => 'Metro Link Flyover Section-B',
                'description' => 'Segmental bridge and support infrastructure with high-precision staging workflow.',
                'address' => 'Outer Ring Corridor',
                'status' => 1,
                'image_path' => 'building/beautiful-view-construction-site-city-sunset.webp',
            ],
            [
                'category_slug' => 'commercial-build',
                'title' => 'Harbor View Retail Complex',
                'description' => 'Mixed-use podium structure optimized for phased delivery and tenant fit-outs.',
                'address' => 'Harbor District',
                'status' => 0,
                'image_path' => 'building/beautiful-view-construction-site-city-sunset.webp',
            ],
        ];

        foreach ($projectRows as $row) {
            $category = Category::where('slug', $row['category_slug'])->first();
            if (! $category) {
                continue;
            }

            Project::updateOrCreate(
                ['title' => $row['title']],
                [
                    'category_id' => $category->id,
                    'slug' => Str::slug($row['title']),
                    'description' => $row['description'],
                    'address' => $row['address'],
                    'status' => $row['status'],
                    'image_path' => $row['image_path'],
                ]
            );
        }
    }
}
