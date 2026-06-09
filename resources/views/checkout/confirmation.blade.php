@extends('layouts.app')

@section('content')
<section class="mx-auto max-w-3xl px-4 py-12">
    <div class="rounded-lg bg-white p-8 text-center shadow-sm">
        <p class="mx-auto grid h-14 w-14 place-items-center rounded-full bg-green-100 text-2xl font-black text-green-700">OK</p>
        <h1 class="mt-4 text-3xl font-black">Order confirmed</h1>
        <p class="mt-2 text-gray-500">Order {{ $order->order_number }} has been created and paid with the mock payment system.</p>
        <div class="mt-6 flex justify-center gap-3">
            <a class="btn-primary" href="{{ route('customer.orders.show', $order) }}">View order</a>
            <a class="btn-secondary" href="{{ route('customer.orders.invoice', $order) }}">Invoice PDF</a>
        </div>
    </div>
</section>
@endsection
