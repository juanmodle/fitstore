<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class CategorySeeder extends Seeder
{
    public function run(): void
    {
        $categories = ['Supplements', 'Fit Food', 'Protein Bars', 'Creatine', 'Men Clothing', 'Women Clothing', 'Accessories'];
        $images = [
            'Supplements' => '/images/home/supplements.jpg',
            'Fit Food' => '/images/home/fit-food.jpg',
            'Protein Bars' => '/images/home/protein-bars.jpg',
            'Creatine' => '/images/home/creatine.jpg',
            'Men Clothing' => '/images/home/men-clothing.jpg',
            'Women Clothing' => '/images/home/women-clothing.jpg',
            'Accessories' => '/images/home/accessories.jpg',
        ];

        foreach ($categories as $category) {
            Category::updateOrCreate(
                ['slug' => Str::slug($category)],
                [
                    'name' => $category,
                    'description' => 'Premium ' . strtolower($category) . ' for active people.',
                    'image' => $images[$category] ?? '/images/home/supplements.jpg',
                    'status' => 'active',
                ]
            );
        }
    }
}
