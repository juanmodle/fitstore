@extends('layouts.app')

@section('content')
    <div class="page-header">
        <div>
            <p class="eyebrow">Account</p>
            <h1 class="page-title">Profile</h1>
        </div>
    </div>
    <form method="POST" action="{{ route('profile.update') }}" class="form-panel">
        @csrf
        @method('PUT')
        <x-label>Name</x-label>
        <x-input name="name" value="{{ old('name', auth()->user()->name) }}" />
        <x-label class="mt-3">Phone</x-label>
        <x-input name="phone" value="{{ old('phone', auth()->user()->phone) }}" />
        <x-label class="mt-3">Language</x-label>
        <x-select name="locale">
            @foreach (['en' => 'English', 'es' => 'Spanish'] as $code => $label)
                <option value="{{ $code }}" @selected(old('locale', session('locale', app()->getLocale())) === $code)>{{ $label }}</option>
            @endforeach
        </x-select>
        <x-label class="mt-3">Fitness goal</x-label>
        <x-input name="fitness_goal" value="{{ old('fitness_goal', auth()->user()->customerProfile?->fitness_goal) }}" />
        <label class="mt-3 flex items-center gap-2 text-sm">
            <x-checkbox name="accepts_marketing" @checked(auth()->user()->customerProfile?->accepts_marketing) /> Receive marketing emails
        </label>
        <button class="btn btn-primary mt-4" type="submit">Save</button>
    </form>
@endsection
