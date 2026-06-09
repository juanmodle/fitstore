@extends('layouts.admin')

@section('content')
<h1 class="mb-6 text-3xl font-black">{{ $order->order_number }}</h1>
<div class="grid gap-6 lg:grid-cols-3">
    <div class="rounded-lg bg-white p-5 shadow-sm lg:col-span-2">
        @foreach($order->items as $item)
            <div class="flex justify-between border-b py-3"><span>{{ $item->product_name }} x {{ $item->quantity }}</span><strong>{{ number_format($item->total_price, 2) }} €</strong></div>
        @endforeach
    </div>
    <form class="rounded-lg bg-white p-5 shadow-sm" method="post" action="{{ route('admin.orders.update', $order) }}">
        @csrf @method('patch')
        <label class="grid gap-2 text-sm font-bold">Order status<input class="field" name="status" value="{{ $order->status }}"></label>
        <label class="mt-4 grid gap-2 text-sm font-bold">Payment status<input class="field" name="payment_status" value="{{ $order->payment_status }}"></label>
        <button class="btn-primary mt-5">Update</button>
    </form>
</div>
@endsection
