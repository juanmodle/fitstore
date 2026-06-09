@extends('layouts.app')

@section('content')
<section class="mx-auto max-w-7xl px-4 py-10">
    <h1 class="text-3xl font-black">My account</h1>
    <div class="mt-6 grid gap-5 md:grid-cols-4">
        <div class="rounded-lg bg-white p-5 shadow-sm"><p class="text-sm text-gray-500">Customer</p><p class="font-black">{{ $user->name }}</p></div>
        <div class="rounded-lg bg-white p-5 shadow-sm"><p class="text-sm text-gray-500">VIP status</p><p class="font-black">{{ $user->isVipCustomer() ? 'VIP' : 'Normal' }}</p></div>
        <div class="rounded-lg bg-white p-5 shadow-sm"><p class="text-sm text-gray-500">Points</p><p class="font-black">{{ $user->profile?->points ?? 0 }}</p></div>
        <div class="rounded-lg bg-white p-5 shadow-sm"><p class="text-sm text-gray-500">Default address</p><p class="font-black">{{ $defaultAddress?->city ?? 'No address' }}</p></div>
    </div>
    <div class="mt-8 grid gap-6 lg:grid-cols-3">
        <div class="rounded-lg bg-white p-5 shadow-sm lg:col-span-2">
            <h2 class="font-black">Latest orders</h2>
            <div class="mt-4 grid gap-3">
                @forelse($latestOrders as $order)
                    <a class="flex justify-between rounded-md border p-3" href="{{ route('customer.orders.show', $order) }}"><span>{{ $order->order_number }}</span><strong>{{ number_format($order->total_price, 2) }} €</strong></a>
                @empty
                    <p class="text-sm text-gray-500">No orders yet.</p>
                @endforelse
            </div>
        </div>
        <div class="rounded-lg bg-white p-5 shadow-sm">
            <h2 class="font-black">Quick links</h2>
            <div class="mt-4 grid gap-2 text-sm font-bold">
                <a href="{{ route('customer.orders.index') }}">Orders</a>
                <a href="{{ route('customer.payments.index') }}">Payments</a>
                <a href="{{ route('customer.vip.show') }}">VIP subscription</a>
                <a href="{{ route('customer.giveaways.index') }}">Giveaways</a>
            </div>
        </div>
    </div>
</section>
@endsection
