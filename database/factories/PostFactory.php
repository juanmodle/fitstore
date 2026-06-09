<?php

namespace Database\Factories;

use App\Models\Post;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Post>
 */
class PostFactory extends Factory
{
    protected $model = Post::class;

    public function definition(): array
    {
        $title = fake()->sentence(4);

        return [
            'user_id' => \App\Models\User::factory(),
            'post_category_id' => \App\Models\PostCategory::factory(),
            'title' => $title,
            'slug' => \Illuminate\Support\Str::slug($title),
            'excerpt' => fake()->sentence(),
            'content' => fake()->paragraphs(4, true),
            'image' => 'https://placehold.co/1200x700?text=' . urlencode($title),
            'status' => 'published',
            'published_at' => now(),
        ];
    }
}
