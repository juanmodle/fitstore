<?php

namespace Database\Seeders;

use App\Models\Post;
use App\Models\PostCategory;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class PostSeeder extends Seeder
{
    public function run(): void
    {
        $editor = User::where('email', 'editor@gmail.com')->first() ?: User::first();
        $posts = [
            ['How to Choose the Right Protein', 'Nutrition'],
            ['Best Supplements for Beginners', 'Supplements'],
            ['Healthy Fitness Breakfast Ideas', 'Nutrition'],
            ['Creatine Guide for Athletes', 'Supplements'],
            ['VIP Monthly Giveaway Announcement', 'VIP News'],
            ['New Summer Gym Clothing Collection', 'Offers'],
        ];

        foreach ($posts as [$title, $categoryName]) {
            $category = PostCategory::where('name', $categoryName)->first();

            Post::updateOrCreate(
                ['slug' => Str::slug($title)],
                [
                    'user_id' => $editor?->id,
                    'post_category_id' => $category?->id,
                    'title' => $title,
                    'excerpt' => 'A simple FITSTORE article about ' . strtolower($title) . '.',
                    'content' => '<p>This post is written for the FITSTORE blog. It includes practical advice, clear sections and a friendly ecommerce tone.</p><p>Students can edit this content from the admin dashboard using the WYSIWYG editor.</p>',
                    'image' => 'https://placehold.co/1200x700/111827/ffffff?text=' . urlencode($title),
                    'status' => 'published',
                    'published_at' => now(),
                ]
            );
        }
    }
}
