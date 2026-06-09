<?php

use App\Models\Category;
use App\Models\Product;
use Database\Seeders\DatabaseSeeder;

beforeEach(function () {
    $this->seed(DatabaseSeeder::class);
});

test('CatalogSeedTest.php 01', function () {
    $expectedCategories = [
        'Accessories',
        'Creatine',
        'Fit Food',
        'Men Clothing',
        'Protein Bars',
        'Supplements',
        'Women Clothing',
    ];

    expect(Product::count())->toBe(42);

    foreach ($expectedCategories as $categoryName) {
        $category = Category::where('name', $categoryName)->withCount('products')->first();

        expect($category)->not->toBeNull();
        expect($category->products_count)->toBe(6);
    }
});
