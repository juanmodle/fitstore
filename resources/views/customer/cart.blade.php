@extends('layouts.app')

@section('content')
    <div class="page-header">
        <div>
            <p class="eyebrow">Shopping</p>
            <h1 class="page-title">Cart</h1>
        </div>
    </div>
    <div class="panel panel-pad">
        @livewire('cart-component')
    </div>
@endsection
