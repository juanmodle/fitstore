@extends('layouts.admin')

@section('content')
<h1 class="mb-6 text-3xl font-black">{{ ucfirst('giveaways') }} Livewire CRUD</h1>
@livewire('admin-giveaway-manager')
@endsection
