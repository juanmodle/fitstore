@extends('layouts.app')

@section('content')
<section class="mx-auto max-w-4xl px-4 py-10">
    <h1 class="mb-6 text-3xl font-black">VIP subscription</h1>
    <div class="rounded-lg bg-white p-6 shadow-sm">
        @if($subscription)
            <p class="text-lg font-black">Status: {{ $subscription->status }}</p>
            <p class="mt-2 text-gray-500">Start: {{ $subscription->start_date?->format('d/m/Y') }} · End: {{ $subscription->end_date?->format('d/m/Y') }} · Monthly price: {{ number_format($subscription->monthly_price, 2) }} €</p>
            <form class="mt-5" method="post" action="{{ route('customer.vip.cancel') }}">@csrf<button class="btn-secondary">Cancel subscription</button></form>
        @else
            <form method="post" action="{{ route('customer.vip.store') }}" class="grid gap-4">
                @csrf
                <select class="field" name="payment_method_id">@foreach($paymentMethods as $method)<option value="{{ $method->id }}">{{ $method->name }}</option>@endforeach</select>
                <button class="btn-primary">Subscribe for 15.00 € / month</button>
            </form>
        @endif
    </div>
</section>
@endsection
