<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Seeder;

class ProductImageSeeder extends Seeder
{
    public function run(): void
    {
        foreach (Product::with('category')->get() as $product) {
            $photos = $this->photosForCategory($product->category?->name);

            $product->images()->updateOrCreate(
                ['sort_order' => 0],
                ['image_path' => $photos[0], 'alt_text' => $product->name, 'is_main' => true]
            );

            $product->images()->updateOrCreate(
                ['sort_order' => 1],
                ['image_path' => $photos[1], 'alt_text' => $product->name . ' detail', 'is_main' => false]
            );
        }
    }

    private function photosForCategory(?string $category): array
    {
        return match ($category) {
            'Fit Food' => [
                'https://unsplash.com/photos/J64Ajy9U9ck/download?force=true&w=900',
                'https://unsplash.com/photos/J64Ajy9U9ck/download?force=true&w=1200',
            ],
            'Protein Bars' => [
                'https://unsplash.com/photos/TAj583bZBX0/download?force=true&w=900',
                'https://unsplash.com/photos/TAj583bZBX0/download?force=true&w=1200',
            ],
            'Men Clothing' => [
                'https://unsplash.com/photos/xXofYCc3hqc/download?force=true&w=900',
                'https://unsplash.com/photos/xXofYCc3hqc/download?force=true&w=1200',
            ],
            'Women Clothing' => [
                'https://unsplash.com/photos/p_Fjw6Yq4VA/download?force=true&w=900',
                'https://unsplash.com/photos/p_Fjw6Yq4VA/download?force=true&w=1200',
            ],
            'Accessories' => [
                'https://unsplash.com/photos/5qxsSIqLH60/download?force=true&w=900',
                'https://unsplash.com/photos/5qxsSIqLH60/download?force=true&w=1200',
            ],
            default => [
                'https://unsplash.com/photos/_a6dW14spss/download?force=true&w=900',
                'https://unsplash.com/photos/_a6dW14spss/download?force=true&w=1200',
            ],
        };
    }
}
