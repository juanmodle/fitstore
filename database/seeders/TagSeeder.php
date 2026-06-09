<?php

namespace Database\Seeders;

use App\Models\Tag;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class TagSeeder extends Seeder
{
    public function run(): void
    {
        $tags = ['Protein', 'Energy', 'Recovery', 'Vegan', 'New', 'Best Seller', 'Clothing', 'VIP', 'Low Sugar', 'Strength'];

        foreach ($tags as $tag) {
            Tag::updateOrCreate(['slug' => Str::slug($tag)], ['name' => $tag]);
        }
    }
}
