@extends('layouts.app')

@section('content')
<section class="mx-auto max-w-5xl px-4 py-10">
    <h1 class="text-3xl font-black">FITSTORE API Documentation</h1>
    <p class="mt-3 text-gray-500">Public, protected and admin CRUD endpoints for the academic API.</p>
    <div class="mt-6 rounded-lg bg-white p-6 shadow-sm">
        <h2 class="font-black">Public</h2>
        <p class="mt-2 text-sm">GET /api/products, /api/categories and /api/posts.</p>
        <h2 class="mt-6 font-black">Protected</h2>
        <p class="mt-2 text-sm">GET /api/user, /api/orders, /api/payments, /api/vip-subscription, POST and DELETE /api/cart/items.</p>
        <h2 class="mt-6 font-black">Admin CRUD</h2>
        <p class="mt-2 text-sm">Products, categories, orders, coupons and giveaways.</p>
    </div>
</section>
@endsection
