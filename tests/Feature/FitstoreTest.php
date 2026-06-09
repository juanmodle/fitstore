<?php

use App\Models\Product;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Laravel\Sanctum\Sanctum;

uses(RefreshDatabase::class);

beforeEach(function () {
    $this->withoutVite();
    $this->seed();
});

test('FitstoreTest.php 01', function () {
    $this->get('/')->assertOk()->assertSee('FITSTORE');
});

test('FitstoreTest.php 02', function () {
    $this->get('/products')->assertOk()->assertSee('Catalogo de productos');
    expect(Product::count())->toBe(42);
});

test('FitstoreTest.php 03', function () {
    $user = User::where('email', 'cliente@gmail.com')->first();
    $product = Product::first();
    Sanctum::actingAs($user);

    $this->postJson('/api/cart/items', [
        'product_id' => $product->id,
        'quantity' => 1,
    ])->assertCreated()->assertJsonPath('message', 'Item added to cart.');
});

test('FitstoreTest.php 04', function () {
    $user = User::where('email', 'cliente@gmail.com')->first();
    $giveaway = \App\Models\Giveaway::first();

    $this->actingAs($user)
        ->post(route('customer.giveaways.join', $giveaway))
        ->assertSessionHasErrors('giveaway');
});
