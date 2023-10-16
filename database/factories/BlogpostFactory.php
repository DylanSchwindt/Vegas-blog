<?php

namespace Database\Factories;

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
            'content' => $this->faker->text(5000),
            'is_public' => $this->faker->boolean(80),
            'published_at' => $this->faker->dateTimeThisYear(),
            'created_at' => $this->faker->dateTimeThisYear(),
            'updated_at' => $this->faker->dateTimeThisYear()
        ];
    }

    public function unPublished(): BlogPostFactory
    {
        return $this->state( state: fn(array $attributes) => ['published_at' => null]);
    }

    public function published(): BlogPostFactory
    {
        return $this->state( state: fn(array $attributes) => ['published_at' => now()]);
    }

    public function public(): BlogPostFactory
    {
        return $this->state(state: fn(array $attributes) => ['is_public' => true]);
    }

    public function notPublic(): BlogPostFactory
    {
        return $this->state(state: fn(array $attributes) => ['is_public' => false]);
    }

    public function publishedButNotPublic(): BlogpostFactory
    {
        return $this->state(state: fn(array $attributes) => [
            'is_public' => false,
            'published_at' => now()
        ]);
    }
}
