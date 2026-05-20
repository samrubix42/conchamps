<?php

use App\Models\Project;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('project_images', function (Blueprint $table) {
            $table->foreignId('project_id')->after('id')->constrained()->cascadeOnDelete();
            $table->string('image_path')->after('project_id');
            $table->unsignedInteger('sort_order')->default(0)->after('image_path');
        });

        Project::query()
            ->whereNotNull('image_path')
            ->orderBy('id')
            ->each(function (Project $project): void {
                $project->images()->firstOrCreate(
                    ['image_path' => $project->image_path],
                    ['sort_order' => 0]
                );
            });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('project_images', function (Blueprint $table) {
            $table->dropForeign(['project_id']);
            $table->dropColumn(['project_id', 'image_path', 'sort_order']);
        });
    }
};
