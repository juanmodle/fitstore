<?php

namespace Database\Seeders;

use App\Models\Post;
use App\Models\Tag;
use Illuminate\Database\Seeder;

class PostTagSeeder extends Seeder
{
    public function run(): void
    {
        $tags = Tag::all();

        foreach (Post::all() as $post) {
            $post->tags()->syncWithoutDetaching($tags->random(min(2, $tags->count()))->pluck('id'));
        }
    }
}
