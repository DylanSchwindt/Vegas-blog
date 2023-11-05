<?php

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
        Schema::create('blogposts', function (Blueprint $table) {
            $table->id();
            $table->string('title', 255)->unique();
            $table->string('slug', 255)->unique();
            $table->text('description');
            $table->longText('content');
            $table->tinyText('content_short');
            $table->string('seo_title', 255)->unique()->nullable();
            $table->text('seo_description')->nullable();
            $table->enum('status', ['draft', 'published', 'scheduled'])
                ->default('draft');
            $table->enum('type', ['tutorials', 'news', 'articles', 'cool_tech'])
                ->default('articles');
            $table->boolean('is_public')->default(false);
            $table->timestamp('published_at')->nullable();
            $table->timestamp('scheduled_to_publish_at')->nullable();
            $table->timestamps();
            $table->unsignedMediumInteger('view_count')->default(0);


        // Add 'scheduled_to_publish_at' timestamp column
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('blogposts');
    }
};
