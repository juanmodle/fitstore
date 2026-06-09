@extends('layouts.app')

@section('content')
    <div class="page-header">
        <div>
            <p class="eyebrow">Account</p>
            <h1 class="page-title">Payments</h1>
        </div>
    </div>
    <div class="panel panel-pad">
        @foreach ($payments as $payment)
            <div class="list-row">
                <span>{{ $payment->method->name }} / {{ $payment->status }}</span>
                <span class="price">{{ number_format($payment->amount, 2) }} EUR</span>
            </div>
        @endforeach
    </div>
@endsection
