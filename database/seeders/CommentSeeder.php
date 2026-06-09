<?php

namespace Database\Seeders;

use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Seeder;

class CommentSeeder extends Seeder
{
    public function run(): void
    {
        $customer = User::where('email', 'cliente@gmail.com')->first();

        foreach (Post::take(3)->get() as $post) {
            $post->comments()->updateOrCreate(
                ['user_id' => $customer?->id, 'content' => 'Great advice, I will try it this week.'],
                ['status' => 'approved']
            );
        }
    }
}
