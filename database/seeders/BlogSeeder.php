<?php

namespace Database\Seeders;

use App\Models\Post;
use App\Models\PostCategory;
use App\Models\User;
use Illuminate\Database\Seeder;

class BlogSeeder extends Seeder
{
    public function run(): void
    {
        $editor = User::where('email', 'editor@gmail.com')->firstOrFail();

        $postCategory = PostCategory::query()->firstOrCreate(
            ['slug' => 'nutrition-guides'],
            ['name' => 'Nutrition Guides']
        );

        $post = Post::query()->firstOrCreate([
            'slug' => 'how-to-start-with-protein',
        ], [
            'user_id' => $editor->id,
            'post_category_id' => $postCategory->id,
            'title' => 'How to start with protein',
            'content' => '<p>A simple beginner guide for protein supplements.</p>',
            'status' => 'published',
            'published_at' => now(),
        ]);

        foreach (['es'] as $locale) {
            $post->translations()->updateOrCreate(
                ['locale' => $locale],
                ['title' => "Protein guide {$locale}", 'content' => "<p>Translated post in {$locale}.</p>"]
            );
        }
    }
}
