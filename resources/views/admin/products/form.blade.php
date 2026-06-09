@extends('layouts.admin')

@section('content')
<h1 class="mb-6 text-3xl font-black">{{ $product ? 'Edit product' : 'Create product' }}</h1>
@livewire('admin-product-form', ['product' => $product])
@endsection
