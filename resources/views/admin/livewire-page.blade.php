@extends('layouts.app')

@section('content')
    <div class="page-header">
        <div>
            <p class="eyebrow">Admin</p>
            <h1 class="page-title">{{ $title }}</h1>
        </div>
    </div>
    <div class="panel panel-pad">
        @livewire($component)
    </div>
@endsection
