@extends('layouts.app')

@section('content')
<section class="mx-auto max-w-5xl px-4 py-10">
    <h1 class="mb-6 text-3xl font-black">Shopping cart</h1>
    @livewire('cart')
</section>
@endsection
