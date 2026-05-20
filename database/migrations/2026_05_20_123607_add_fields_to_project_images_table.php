<?php

use App\Models\Project;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        if (DB::getDriverName() === 'sqlite') {
            $columns = collect(DB::select("PRAGMA table_info('project_images')"))
                ->pluck('name')
                ->all();

            if (! in_array('project_id', $columns, true)) {
                DB::statement('ALTER TABLE project_images ADD COLUMN project_id INTEGER');
            }

            if (! in_array('image_path', $columns, true)) {
                DB::statement("ALTER TABLE project_images ADD COLUMN image_path VARCHAR(255) DEFAULT ''");
            }

            if (! in_array('sort_order', $columns, true)) {
                DB::statement('ALTER TABLE project_images ADD COLUMN sort_order INTEGER NOT NULL DEFAULT 0');
            }
        } else {
            Schema::table('project_images', function (Blueprint $table) {
                $table->foreignId('project_id')->after('id')->constrained()->cascadeOnDelete();
                $table->string('image_path')->after('project_id');
                $table->unsignedInteger('sort_order')->default(0)->after('image_path');
            });
        }

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
        if (DB::getDriverName() === 'sqlite') {
            return;
        }

        Schema::table('project_images', function (Blueprint $table) {
            $table->dropForeign(['project_id']);
            $table->dropColumn(['project_id', 'image_path', 'sort_order']);
        });
    }
};
