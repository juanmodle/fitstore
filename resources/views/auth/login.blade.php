@extends('layouts.app')

@section('content')
<section class="mx-auto max-w-md px-4 py-12">
    <form class="rounded-lg bg-white p-6 shadow-sm" method="post" action="{{ route('login.store') }}">
        @csrf
        <h1 class="text-3xl font-black">{{ __('messages.login') }}</h1>
        <div class="mt-6 grid gap-4">
            <input class="field" type="email" name="email" placeholder="{{ __('messages.email') }}" value="{{ old('email') }}">
            <input class="field" type="password" name="password" placeholder="{{ __('messages.password') }}">
            <x-form.checkbox name="remember" :label="__('messages.remember_me')" />
            <button class="btn-primary w-full">{{ __('messages.login') }}</button>
            <a class="text-center text-sm font-bold text-red-600" href="{{ route('register') }}">{{ __('messages.create_account') }}</a>
        </div>
    </form>
</section>
@endsection
