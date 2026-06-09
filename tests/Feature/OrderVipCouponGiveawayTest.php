<?php

use App\Models\Cart;
use App\Models\Coupon;
use App\Models\Giveaway;
use App\Models\Order;
use App\Models\PaymentMethod;
use App\Models\Product;
use Database\Seeders\DatabaseSeeder;

beforeEach(function () {
    $this->seed(DatabaseSeeder::class);
});

test('OrderVipCouponGiveawayTest.php 01', function () {
    $customer = userWithRole('customer');
    $product = Product::first();
    $cart = Cart::create(['user_id' => $customer->id, 'status' => 'open']);
    $cart->items()->create(['product_id' => $product->id, 'quantity' => 2, 'unit_price' => $product->finalPrice()]);

    $this->actingAs($customer)->post(route('checkout.store'), [
        'shipping_address' => 'Street 1 Madrid',
        'billing_address' => 'Street 1 Madrid',
        'coupon_code' => 'WELCOME10',
    ])->assertRedirect();

    expect(Order::where('user_id', $customer->id)->count())->toBe(1);
    expect(Coupon::where('code', 'WELCOME10')->first()->used_count)->toBe(1);
});

test('OrderVipCouponGiveawayTest.php 02', function () {
    $customer = userWithRole('customer');
    $method = PaymentMethod::where('code', 'credit_card')->first();

    $this->actingAs($customer)->post(route('vip-subscription.store'), [
        'payment_method_id' => $method->id,
    ])->assertRedirect();

    expect($customer->vipSubscriptions()->active()->exists())->toBeTrue();
});

test('OrderVipCouponGiveawayTest.php 03', function () {
    $customer = userWithRole('customer');
    $vip = userWithRole('vip_customer');
    $giveaway = Giveaway::first();

    $this->actingAs($customer)->post(route('giveaway-entries.store', $giveaway))->assertForbidden();
    $this->actingAs($vip)->post(route('giveaway-entries.store', $giveaway))->assertRedirect();

    expect($giveaway->entries()->where('user_id', $vip->id)->exists())->toBeTrue();
});

test('OrderVipCouponGiveawayTest.php 04', function () {
    $customer = userWithRole('customer');
    $coupon = Coupon::where('code', 'VIP15')->first();

    expect($coupon->canBeUsedBy($customer))->toBeFalse();
});
