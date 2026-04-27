<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('projects', function (Blueprint $table) {
            $table->id();

            $table->string('title');
            $table->string('slug')->unique();
            $table->string('short_description', 500);

            $table->longText('full_description');
            $table->longText('problem_statement')->nullable();
            $table->longText('solution')->nullable();
            $table->longText('result')->nullable();

            $table->text('tech_stack')->nullable();

            $table->string('project_url')->nullable();
            $table->string('github_url')->nullable();
            $table->string('featured_image')->nullable();

            $table->enum('status', [
                'draft',
                'published',
                'archived'
            ])->default('draft');

            $table->boolean('is_featured')->default(false);
            $table->unsignedBigInteger('views_count')->default(0);

            $table->timestamp('published_at')->nullable();
            $table->integer('sort_order')->default(0);

            $table->softDeletes();
            $table->timestamps();

            $table->index('status');
            $table->index('is_featured');
            $table->index('published_at');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('projects');
    }
};
