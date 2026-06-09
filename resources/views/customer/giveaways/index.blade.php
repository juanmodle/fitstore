@extends('layouts.app')

@section('content')
<section class="mx-auto max-w-7xl px-4 py-10">
    <h1 class="mb-6 text-3xl font-black">VIP giveaways</h1>
    <div class="grid gap-5 md:grid-cols-3">
        @foreach($giveaways as $giveaway)
            <div class="rounded-lg bg-white p-5 shadow-sm">
                <p class="badge bg-orange-100 text-orange-700">{{ $giveaway->status }}</p>
                <h2 class="mt-3 font-black">{{ $giveaway->title }}</h2>
                <p class="mt-2 text-sm text-gray-500">{{ $giveaway->prize }}</p>
                <p class="mt-2 text-xs text-gray-400">{{ $giveaway->entries->count() }} entries</p>
                @if($giveaway->winner)
                    <p class="mt-3 text-sm font-bold text-green-700">Winner: {{ $giveaway->winner->name }}</p>
                @elseif(in_array($giveaway->id, $joinedIds))
                    <p class="mt-3 text-sm font-bold text-green-700">Joined</p>
                @else
                    <form class="mt-4" method="post" action="{{ route('customer.giveaways.join', $giveaway) }}">@csrf<button class="btn-primary">Join</button></form>
                @endif
            </div>
        @endforeach
    </div>
</section>
@endsection
