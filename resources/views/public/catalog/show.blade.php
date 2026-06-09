@extends('layouts.app')

@section('content')
    <div class="grid gap-8 md:grid-cols-2">
        <div class="product-media aspect-square text-4xl">{{ str($product->category->name)->substr(0, 2)->upper() }}</div>
        <section class="panel panel-pad">
            <p class="product-meta">{{ $product->category->name }} @if($product->brand) / {{ $product->brand->name }} @endif</p>
            <h1 class="mt-2 text-3xl font-black">{{ $product->name }}</h1>
            <p class="price mt-4 text-2xl">{{ number_format($product->finalPrice(), 2) }} EUR</p>
            <div class="prose mt-4 max-w-none text-slate-700">{!! $product->description !!}</div>
            <form method="POST" action="{{ route('cart.store', $product) }}" class="mt-6">
                @csrf
                <button class="btn btn-primary" type="submit">Add to cart</button>
            </form>
            <div class="mt-6">
                <h2 class="section-title">Variants</h2>
                <ul class="mt-3 space-y-2 text-sm text-slate-700">
                    @foreach ($product->variants as $variant)
                        <li class="rounded border border-slate-200 px-3 py-2">{{ $variant->size ?: $variant->flavor }} {{ $variant->color ?: $variant->weight }} - stock {{ $variant->stock }}</li>
                    @endforeach
                </ul>
            </div>
        </section>
    </div>
@endsection
