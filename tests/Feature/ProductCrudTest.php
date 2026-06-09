<?php

use App\Models\Category;
use App\Models\Product;
use Database\Seeders\DatabaseSeeder;

beforeEach(function () {
    $this->seed(DatabaseSeeder::class);
});

test('ProductCrudTest.php 01', function () {
    $admin = userWithRole('admin');
    $category = Category::first();

    $response = $this->actingAs($admin)->postJson('/api/products', [
        'category_id' => $category->id,
        'name' => 'Test Protein',
        'slug' => 'test-protein',
        'description' => 'A product created in a test.',
        'price' => 19.99,
        'sale_price' => 17.99,
        'stock' => 10,
        'status' => 'active',
        'is_featured' => true,
        'is_vip_exclusive' => false,
    ]);

    $response->assertCreated()->assertJsonPath('name', 'Test Protein');
    $product = Product::where('slug', 'test-protein')->first();

    $this->actingAs($admin)->putJson('/api/products/'.$product->id, [
        'category_id' => $category->id,
        'name' => 'Updated Protein',
        'slug' => 'updated-protein',
        'description' => 'Updated.',
        'price' => 21,
        'sale_price' => 19,
        'stock' => 8,
        'status' => 'active',
        'is_featured' => false,
        'is_vip_exclusive' => false,
    ])->assertOk()->assertJsonPath('name', 'Updated Protein');

    $this->actingAs($admin)->deleteJson('/api/products/'.$product->id)->assertOk();
    $this->assertSoftDeleted('products', ['id' => $product->id]);
});
