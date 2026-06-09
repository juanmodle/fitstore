@extends('layouts.app')

@section('content')
    <div class="page-header">
        <div>
            <p class="eyebrow">Shopping</p>
            <h1 class="page-title">Checkout</h1>
        </div>
    </div>
    <form method="POST" action="{{ route('checkout.store') }}" class="form-panel">
        @csrf
        <x-label>Shipping address</x-label>
        <textarea name="shipping_address" class="textarea-control">{{ old('shipping_address', $addresses->first()?->street.' '.$addresses->first()?->city) }}</textarea>
        <x-label class="mt-3">Billing address</x-label>
        <textarea name="billing_address" class="textarea-control">{{ old('billing_address', $addresses->first()?->street.' '.$addresses->first()?->city) }}</textarea>
        <x-label class="mt-3">Coupon code</x-label>
        <x-input name="coupon_code" value="{{ old('coupon_code') }}" />
        <button class="btn btn-primary mt-4" type="submit">Create order</button>
    </form>
@endsection
