@extends('layouts.app')

@section('content')
    <div class="page-header">
        <div>
            <p class="eyebrow">Account</p>
            <h1 class="page-title">New address</h1>
        </div>
    </div>
    <form method="POST" action="{{ route('addresses.store') }}" class="form-panel">
        @csrf
        @include('customer.addresses.form')
    </form>
@endsection
