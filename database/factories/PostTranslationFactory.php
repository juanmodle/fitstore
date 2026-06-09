<?php

namespace Database\Factories;

use App\Models\PostTranslation;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<PostTranslation>
 */
class PostTranslationFactory extends Factory
{
    protected $model = PostTranslation::class;

    public function definition(): array
    {
        return [
            'post_id' => \App\Models\Post::factory(),
            'locale' => fake()->randomElement(['en', 'es']),
            'title' => fake()->sentence(4),
            'excerpt' => fake()->sentence(),
            'content' => fake()->paragraphs(3, true),
        ];
    }
}
