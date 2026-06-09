@extends('layouts.app')

@section('content')
<section class="mx-auto max-w-5xl px-4 py-10">
    <div class="mb-6 flex items-center justify-between">
        <h1 class="text-3xl font-black">{{ $order->order_number }}</h1>
        <a class="btn-secondary" href="{{ route('customer.orders.invoice', $order) }}">Invoice PDF</a>
    </div>
    <div class="rounded-lg bg-white shadow-sm">
        @foreach($order->items as $item)
            <div class="grid gap-2 border-b p-4 md:grid-cols-4">
                <strong>{{ $item->product_name }}</strong><span>Qty {{ $item->quantity }}</span><span>{{ number_format($item->unit_price, 2) }} €</span><span>{{ number_format($item->total_price, 2) }} €</span>
            </div>
        @endforeach
        <div class="p-4 text-right text-xl font-black">Total {{ number_format($order->total_price, 2) }} €</div>
    </div>
</section>
@endsection
