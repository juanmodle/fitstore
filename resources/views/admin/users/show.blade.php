@extends('layouts.admin')

@section('content')
<h1 class="mb-6 text-3xl font-black">{{ $user->name }}</h1>
<div class="grid gap-6 lg:grid-cols-2">
    <div class="rounded-lg bg-white p-5 shadow-sm">
        <p class="font-bold">{{ $user->email }}</p>
        <p class="mt-2 text-sm text-gray-500">Points: {{ $user->profile?->points }} · VIP: {{ $user->profile?->is_vip ? 'Yes' : 'No' }}</p>
    </div>
    <form class="rounded-lg bg-white p-5 shadow-sm" method="post" action="{{ route('admin.users.update', $user) }}">
        @csrf @method('patch')
        <p class="font-black">Roles</p>
        <div class="mt-3 grid gap-2">
            @foreach($roles as $role)
                <label class="flex items-center gap-2"><input type="checkbox" name="roles[]" value="{{ $role->id }}" @checked($user->roles->contains($role))> {{ \Illuminate\Support\Str::headline($role->name) }}</label>
            @endforeach
        </div>
        <button class="btn-primary mt-5">Save roles</button>
    </form>
</div>
@endsection
