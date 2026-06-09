<?php

namespace Database\Seeders;

use App\Models\Product;
use App\Models\Tag;
use Illuminate\Database\Seeder;

class ProductTagSeeder extends Seeder
{
    public function run(): void
    {
        $tags = Tag::all()->keyBy('name');

        $tagsByCategory = [
            'Supplements' => ['Protein', 'Energy', 'Recovery', 'Strength', 'New', 'Best Seller'],
            'Fit Food' => ['Protein', 'Vegan', 'Low Sugar', 'New', 'Best Seller'],
            'Protein Bars' => ['Protein', 'Low Sugar', 'Vegan', 'New', 'Best Seller'],
            'Creatine' => ['Energy', 'Recovery', 'Strength', 'New', 'Best Seller'],
            'Men Clothing' => ['Clothing', 'New', 'Best Seller', 'VIP'],
            'Women Clothing' => ['Clothing', 'New', 'Best Seller', 'VIP'],
            'Accessories' => ['Strength', 'New', 'Best Seller', 'VIP'],
        ];

        foreach (Product::with('category')->get() as $product) {
            $availableTags = collect($tagsByCategory[$product->category?->name] ?? ['New']);
            $tagData = [];

            // Simple and readable: each product gets the first two category tags plus one rotating tag.
            $selectedNames = $availableTags
                ->take(2)
                ->push($availableTags[$product->id % $availableTags->count()])
                ->unique()
                ->values();

            foreach ($selectedNames as $index => $tagName) {
                $tag = $tags->get($tagName);

                if (! $tag) {
                    continue;
                }

                $tagData[$tag->id] = [
                    'priority' => $index + 1,
                    'is_visible' => true,
                ];
            }

            $product->tags()->sync($tagData);
        }
    }
}
