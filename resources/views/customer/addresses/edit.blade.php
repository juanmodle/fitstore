@extends('layouts.app')

@section('content')
    <div class="page-header">
        <div>
            <p class="eyebrow">Account</p>
            <h1 class="page-title">Edit address</h1>
        </div>
    </div>
    <form method="POST" action="{{ route('addresses.update', $address) }}" class="form-panel">
        @csrf
        @method('PUT')
        @include('customer.addresses.form')
    </form>
@endsection
