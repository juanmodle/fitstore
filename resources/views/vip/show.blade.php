@extends('layouts.app')

@section('content')
<section class="fit-gradient text-white">
    <div class="mx-auto max-w-7xl px-4 py-16">
        <p class="text-sm font-black text-orange-400">FITSTORE VIP</p>
        <h1 class="mt-2 text-4xl font-black">{{ __('messages.vip_page_title') }}</h1>
        <p class="mt-4 max-w-2xl text-gray-300">{{ __('messages.vip_page_text') }}</p>
    </div>
</section>

<section class="mx-auto grid max-w-7xl gap-6 px-4 py-10 md:grid-cols-3">
    @foreach([__('messages.vip_only_discounts'), __('messages.monthly_giveaways'), __('messages.priority_offers')] as $benefit)
        <div class="rounded-lg bg-white p-6 shadow-sm">
            <h2 class="font-black">{{ $benefit }}</h2>
            <p class="mt-2 text-sm text-gray-500">{{ __('messages.vip_benefit_text') }}</p>
        </div>
    @endforeach
</section>

@auth
<section class="mx-auto max-w-3xl px-4 pb-12">
    @livewire('vip-subscription-box')
</section>
@else
<section class="mx-auto max-w-3xl px-4 pb-12 text-center">
    <a class="btn-primary" href="{{ route('login') }}">{{ __('messages.login_to_subscribe') }}</a>
</section>
@endauth
@endsection
