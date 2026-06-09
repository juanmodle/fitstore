@extends('layouts.app')

@section('content')
    <div class="page-header">
        <div>
            <p class="eyebrow">Members</p>
            <h1 class="page-title">VIP subscription</h1>
        </div>
    </div>
    <div class="panel panel-pad">
        @livewire('vip-subscription-component')
    </div>
@endsection
