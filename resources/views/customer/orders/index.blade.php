@extends('layouts.app')

@section('content')
<section class="mx-auto max-w-5xl px-4 py-10">
    <h1 class="mb-6 text-3xl font-black">Orders</h1>
    <div class="rounded-lg bg-white shadow-sm">
        @foreach($orders as $order)
            <a class="grid gap-2 border-b p-4 md:grid-cols-4" href="{{ route('customer.orders.show', $order) }}">
                <strong>{{ $order->order_number }}</strong><span>{{ $order->status }}</span><span>{{ $order->payment_status }}</span><span>{{ number_format($order->total_price, 2) }} €</span>
            </a>
        @endforeach
    </div>
    <div class="mt-6">{{ $orders->links() }}</div>
</section>
@endsection
