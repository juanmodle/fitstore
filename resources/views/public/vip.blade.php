@extends('layouts.app')

@section('content')
    <div class="page-header">
        <div>
            <p class="eyebrow">Members</p>
            <h1 class="page-title">VIP subscription</h1>
            <p class="lead">VIP customers pay 15.00 EUR per month and can access exclusive discounts and monthly giveaways.</p>
        </div>
    </div>
    @auth
        <div class="panel panel-pad">
            @livewire('vip-subscription-component')
        </div>
    @else
        <a href="{{ route('login') }}" class="btn btn-primary">Login to subscribe</a>
    @endauth
    <h2 class="section-title mt-8">VIP discounts</h2>
    <div class="grid-cards mt-3">
        @foreach ($discounts as $discount)
            <div class="action-card">
                <span class="badge">VIP</span>
                <p class="mt-3 font-bold">{{ $discount->name }}</p>
                <p class="price mt-2">{{ $discount->percentage }}%</p>
            </div>
        @endforeach
    </div>
@endsection
