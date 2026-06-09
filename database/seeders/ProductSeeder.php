<?php

namespace Database\Seeders;

use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class ProductSeeder extends Seeder
{
    public function run(): void
    {
        $productsByCategory = [
            'Supplements' => ['Whey Protein Chocolate', 'Whey Protein Vanilla', 'Multivitamin Complex', 'Omega 3 Capsules', 'Pre Workout Energy', 'BCAA Recovery Drink'],
            'Fit Food' => ['Peanut Butter Natural', 'Oat Flour Chocolate', 'Protein Pancake Mix', 'Zero Sauce Barbecue', 'Rice Cream Vanilla', 'Almond Cream'],
            'Protein Bars' => ['Chocolate Protein Bar', 'Cookies Protein Bar', 'Coconut Protein Bar', 'Peanut Protein Bar', 'White Chocolate Protein Bar', 'Brownie Protein Bar'],
            'Creatine' => ['Creatine Monohydrate', 'Creatine Creapure', 'Creatine Capsules', 'Creatine Lemon Powder', 'Creatine Gummies', 'Creatine Recovery Mix'],
            'Men Clothing' => ['Men Training T-Shirt', 'Men Oversize Hoodie', 'Men Gym Shorts', 'Men Compression Shirt', 'Men Joggers', 'Men Tank Top'],
            'Women Clothing' => ['Women Sport Leggings', 'Women Crop Top', 'Women Training T-Shirt', 'Women Sports Bra', 'Women Hoodie', 'Women Biker Shorts'],
            'Accessories' => ['Lifting Belt', 'Training Gloves', 'Wrist Straps', 'Shaker Bottle', 'Mobile Phone Holder', 'Gym Backpack'],
        ];

        $brands = Brand::all()->values();
        $number = 0;

        foreach ($productsByCategory as $categoryName => $productNames) {
            $category = Category::where('name', $categoryName)->first();

            foreach ($productNames as $index => $productName) {
                $number++;
                $price = 8 + ($number * 1.85);
                $salePrice = $index % 3 === 0 ? round($price * 0.85, 2) : null;
                $lowStock = [
                    'Whey Protein Chocolate' => 3,
                    'Creatine Monohydrate' => 5,
                    'Shaker Bottle' => 8,
                ];

                Product::updateOrCreate(
                    ['slug' => Str::slug($productName)],
                    [
                        'name' => $productName,
                        'description' => '<p>' . $productName . ' is an example FITSTORE product with a clean description, simple benefits and a student-friendly ecommerce structure.</p><ul><li>Good quality</li><li>Fast shipping</li><li>Prepared for variants and discounts</li></ul>',
                        'price' => round($price, 2),
                        'sale_price' => $salePrice,
                        'stock' => $lowStock[$productName] ?? 35 + ($index * 6),
                        'status' => 'active',
                        'is_featured' => $number % 4 === 0 || $index === 0,
                        'category_id' => $category?->id,
                        'brand_id' => $brands[$number % max(1, $brands->count())]?->id,
                    ]
                );
            }
        }
    }
}
