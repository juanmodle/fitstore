<?php

use App\Models\PaymentMethod;
use Database\Seeders\DatabaseSeeder;

beforeEach(function () {
    $this->seed(DatabaseSeeder::class);
});

test('api login returns token', function () {
    $this->postJson('/api/login', [
        'email' => 'cliente@gmail.com',
        'password' => 'prueba123',
    ])->assertOk()->assertJsonStructure(['token', 'user']);
});

test('public api endpoints respond', function () {
    $this->getJson('/api/products')->assertOk();
    $this->getJson('/api/categories')->assertOk();
    $this->getJson('/api/giveaways')->assertOk();
    $this->getJson('/api/posts')->assertOk();
});

test('customer api endpoints require auth', function () {
    $customer = userWithRole('customer');
    $method = PaymentMethod::first();

    $this->postJson('/api/orders', [
        'shipping_address' => 'Street 1',
        'billing_address' => 'Street 1',
        'total_price' => 20,
    ])->assertUnauthorized();

    $this->actingAs($customer)->postJson('/api/orders', [
        'shipping_address' => 'Street 1',
        'billing_address' => 'Street 1',
        'total_price' => 20,
    ])->assertCreated();

    $this->actingAs($customer)->postJson('/api/payments', [
        'payment_method_id' => $method->id,
        'amount' => 20,
    ])->assertCreated();
});
