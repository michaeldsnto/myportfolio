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
        Schema::create('seo_settings', function (Blueprint $table) {
            $table->id();

            $table->string('meta_title')->nullable();
            $table->text('meta_description')->nullable();

            $table->text('meta_keywords')->nullable();

            $table->string('og_image')->nullable();

            $table->string('twitter_card')->nullable();
            $table->string('canonical_url')->nullable();

            $table->boolean('robots_index')->default(true);
            $table->boolean('robots_follow')->default(true);

            $table->string('google_analytics_id')->nullable();
            $table->text('google_search_console_code')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('seo_settings');
    }
};
