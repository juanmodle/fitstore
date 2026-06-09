@extends('layouts.app')

@section('content')
    <div class="page-header">
        <div>
            <p class="eyebrow">Account</p>
            <h1 class="page-title">Addresses</h1>
        </div>
        <a href="{{ route('addresses.create') }}" class="btn btn-primary">New address</a>
    </div>
    <div class="grid gap-4 md:grid-cols-2">
        @foreach ($addresses as $address)
            <article class="address-card">
                <h2 class="font-bold">{{ $address->name }}</h2>
                <p class="muted mt-1">{{ $address->street }}, {{ $address->city }}</p>
                <div class="row-actions mt-4 justify-start">
                    <a href="{{ route('addresses.edit', $address) }}" class="btn btn-secondary btn-small">Edit</a>
                    <form method="POST" action="{{ route('addresses.destroy', $address) }}">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger btn-small" type="submit">Delete</button>
                    </form>
                </div>
            </article>
        @endforeach
    </div>
@endsection
