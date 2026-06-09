@extends('layouts.app')

@section('content')
<section class="mx-auto grid max-w-5xl gap-8 px-4 py-10 md:grid-cols-2">
    <div>
        <p class="text-sm font-bold text-red-600">{{ __('messages.contact') }}</p>
        <h1 class="text-3xl font-black">{{ __('messages.contact_title') }}</h1>
        <p class="mt-3 text-gray-500">{{ __('messages.contact_text') }}</p>

        <div class="mt-6 rounded-lg bg-white p-5 shadow-sm">
            <p class="font-bold">{{ __('messages.contact_company') }}</p>
            <p class="text-sm text-gray-500">Madrid, Spain / support@fitstore.test</p>
        </div>
    </div>

    <form class="grid gap-4 rounded-lg bg-white p-6 shadow-sm" method="post" action="{{ route('contact.store') }}">
        @csrf
        <x-form.input name="name" :label="__('messages.name')" />
        <x-form.input name="email" :label="__('messages.email')" type="email" />
        <x-form.textarea name="message" :label="__('messages.message')" rows="5" />
        <button class="btn-primary">{{ __('messages.send_message') }}</button>
    </form>
</section>
@endsection
