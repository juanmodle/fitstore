@extends('layouts.app')

@section('content')
<section class="mx-auto max-w-5xl px-4 py-10">
    <h1 class="mb-6 text-3xl font-black">Payments</h1>
    <div class="rounded-lg bg-white shadow-sm">
        @foreach($payments as $payment)
            <div class="grid gap-2 border-b p-4 md:grid-cols-5">
                <strong>{{ $payment->transaction_id }}</strong><span>{{ $payment->paymentMethod?->name }}</span><span>{{ $payment->status }}</span><span>{{ number_format($payment->amount, 2) }} €</span><span>{{ optional($payment->payment_date)->format('d/m/Y') }}</span>
            </div>
        @endforeach
    </div>
    <div class="mt-6">{{ $payments->links() }}</div>
</section>
@endsection
