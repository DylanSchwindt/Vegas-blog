<?php

namespace Database\Factories;

use App\Enums\BlogPostStatus;
use App\Enums\BlogPostType;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory
 * @method static \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Blogpost> unPublished()
 * @method static \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Blogpost> published()
 * @method static \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Blogpost> public()
 * @method static \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Blogpost> notPublic()
 * @method static \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Blogpost> publishedButNotPublic()
 */
class BlogpostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => $this->faker->unique()->words(10, true),
            'slug' => $this->faker->unique()->slug(),
            'description' => $this->faker->text(200),
            'seo_title' => $this->faker->words(10, true),
            'seo_description' => $this->faker->text(200),
            'content' => $this->faker->paragraphs(3, true),
            'content_short' => $this->faker->text(250),
            'status' => $this->faker->randomElement(BlogPostStatus::all()),
            'type' => $this->faker->randomElement(BlogPostType::all()),
            'is_public' => $this->faker->boolean(80),
            'published_at' => $this->faker->dateTimeThisYear(),
            'scheduled_to_publish_at' => $this->faker->dateTimeThisMonth,
            'view_count' => $this->faker->numberBetween(0, 1000),
            'created_at' => $this->faker->dateTimeThisYear(),
            'updated_at' => $this->faker->dateTimeThisYear()
        ];
    }

    // Blog Post Status States
    public function draft(): BlogpostFactory
    {
        return $this->state(fn(array $attributes) => [
            'status' => BlogPostStatus::DRAFT,
            'is_public' => false,
        ]);
    }

    public function scheduledForFuture(): BlogpostFactory
    {
        return $this->state(fn(array $attributes) => [
            'status' => BlogPostStatus::SCHEDULED,
            'scheduled_to_publish_at' => now()->addWeek(),
        ]);
    }

    // Publication States
    public function unPublished(): BlogPostFactory
    {
        return $this->state(fn(array $attributes) => ['published_at' => null]);
    }

    public function published(): BlogPostFactory
    {
        return $this->state(fn(array $attributes) => ['published_at' => now()]);
    }

    // Visibility States
    public function public(): BlogPostFactory
    {
        return $this->state(fn(array $attributes) => ['is_public' => true]);
    }

    public function notPublic(): BlogPostFactory
    {
        return $this->state(fn(array $attributes) => ['is_public' => false]);
    }

    public function publishedButNotPublic(): BlogpostFactory
    {
        return $this->state(fn(array $attributes) => [
            'is_public' => false,
            'published_at' => now(),
        ]);
    }

    public function publishedAndPublic(): BlogpostFactory
    {
        return $this->state(fn(array $attributes) => [
            'is_public' => true,
            'published_at' => now(),
        ]);
    }

    // Other States
    public function invalidPublishedDate(): BlogpostFactory
    {
        return $this->state(fn(array $attributes) => [
            'created_at' => now(),
            'published_at' => now()->subWeek(),
        ]);
    }
}
