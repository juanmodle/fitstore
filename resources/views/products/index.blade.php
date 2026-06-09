@extends('layouts.app')

@section('content')
<section class="mx-auto max-w-7xl px-4 py-10">
    <div class="mb-8">
        <p class="text-sm font-bold text-red-600">{{ __('messages.shop') }}</p>
        <h1 class="text-3xl font-black">{{ __('messages.product_catalog') }}</h1>
    </div>
    @livewire('product-catalog')
</section>
@endsection
