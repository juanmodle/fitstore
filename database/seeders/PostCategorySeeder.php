<?php

namespace Database\Seeders;

use App\Models\PostCategory;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class PostCategorySeeder extends Seeder
{
    public function run(): void
    {
        foreach (['Nutrition', 'Training', 'Supplements', 'VIP News', 'Offers'] as $name) {
            PostCategory::updateOrCreate(
                ['slug' => Str::slug($name)],
                ['name' => $name, 'description' => 'Posts about ' . strtolower($name)]
            );
        }
    }
}
