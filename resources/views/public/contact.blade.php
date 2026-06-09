@extends('layouts.app')

@section('content')
    <div class="page-header">
        <div>
            <p class="eyebrow">Support</p>
            <h1 class="page-title">Contact</h1>
            <p class="lead">Send a message to the store team.</p>
        </div>
    </div>
    <form method="POST" action="{{ route('contact.store') }}" class="form-panel">
        @csrf
        <x-label>Name</x-label>
        <x-input name="name" value="{{ old('name') }}" />
        <x-label class="mt-3">Email</x-label>
        <x-input name="email" type="email" value="{{ old('email') }}" />
        <x-label class="mt-3">Message</x-label>
        <textarea name="message" class="textarea-control">{{ old('message') }}</textarea>
        <button class="btn btn-primary mt-4" type="submit">Send</button>
    </form>
@endsection
