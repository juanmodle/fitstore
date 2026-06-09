@extends('layouts.app')

@section('content')
<section class="mx-auto max-w-md px-4 py-12">
    <form class="rounded-lg bg-white p-6 shadow-sm" method="post" action="{{ route('register.store') }}">
        @csrf
        <h1 class="text-3xl font-black">{{ __('messages.register') }}</h1>
        <div class="mt-6 grid gap-4">
            <x-form.input name="name" :label="__('messages.name')" />
            <x-form.input name="email" :label="__('messages.email')" type="email" />
            <x-form.input name="password" :label="__('messages.password')" type="password" />
            <x-form.input name="password_confirmation" :label="__('messages.confirm_password')" type="password" />
            <button class="btn-primary w-full">{{ __('messages.create_account') }}</button>
        </div>
    </form>
</section>
@endsection
