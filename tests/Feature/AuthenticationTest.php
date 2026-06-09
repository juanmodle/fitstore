<?php

use App\Models\User;
use Database\Seeders\DatabaseSeeder;

beforeEach(function () {
    $this->seed(DatabaseSeeder::class);
});

test('registers new customer', function () {
    $this->post(route('register.store'), [
        'name' => 'New Customer',
        'email' => 'new@example.com',
        'password' => 'password1',
        'password_confirmation' => 'password1',
    ])->assertRedirect(route('dashboard'));

    expect(User::where('email', 'new@example.com')->first()->hasRole('customer'))->toBeTrue();
});

test('logs in seeded customer', function () {
    $this->post(route('login.store'), [
        'email' => 'cliente@gmail.com',
        'password' => 'prueba123',
    ])->assertRedirect(route('dashboard'));

    $this->assertAuthenticated();
});
