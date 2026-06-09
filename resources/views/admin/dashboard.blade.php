@extends('layouts.admin')

@section('content')
<h1 class="text-3xl font-black">Dashboard</h1>
<div class="mt-6 grid gap-5 md:grid-cols-5">
    @foreach([
        'Sales' => number_format($totalSales, 2).' €',
        'Orders' => $totalOrders,
        'Products' => $totalProducts,
        'Customers' => $totalCustomers,
        'VIP' => $totalVipCustomers,
    ] as $label => $value)
        <div class="rounded-lg bg-white p-5 shadow-sm">
            <p class="text-sm text-gray-500">{{ $label }}</p>
            <p class="mt-2 text-2xl font-black">{{ $value }}</p>
        </div>
    @endforeach
</div>
<div class="mt-8 grid gap-6 lg:grid-cols-2">
    <div class="rounded-lg bg-white p-5 shadow-sm">
        <h2 class="font-black">Latest orders</h2>
        <div class="mt-4 grid gap-3">
            @foreach($latestOrders as $order)
                <a class="flex justify-between rounded-md border p-3" href="{{ route('admin.orders.show', $order) }}">
                    <span>{{ $order->order_number }} · {{ $order->user?->name }}</span>
                    <strong>{{ number_format($order->total_price, 2) }} €</strong>
                </a>
            @endforeach
        </div>
    </div>
    <div class="rounded-lg bg-white p-5 shadow-sm">
        <h2 class="font-black">Low stock products</h2>
        <div class="mt-4 grid gap-3">
            @forelse($lowStockProducts as $product)
                <a class="flex justify-between rounded-md border p-3" href="{{ route('admin.products.edit', $product) }}"><span>{{ $product->name }}</span><strong>{{ $product->stock }}</strong></a>
            @empty
                <p class="text-sm text-gray-500">No low stock products.</p>
            @endforelse
        </div>
    </div>
</div>
@endsection
