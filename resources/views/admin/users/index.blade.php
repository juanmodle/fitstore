@extends('layouts.admin')

@section('content')
<h1 class="mb-6 text-3xl font-black">Users</h1>
<div class="overflow-hidden rounded-lg bg-white shadow-sm">
    <table class="w-full text-left text-sm">
        <thead class="bg-gray-100 text-xs uppercase text-gray-500"><tr><th class="p-3">Name</th><th>Email</th><th>Roles</th><th>VIP</th><th></th></tr></thead>
        <tbody>@foreach($users as $user)<tr class="border-t"><td class="p-3 font-bold">{{ $user->name }}</td><td>{{ $user->email }}</td><td>{{ $user->roles->pluck('name')->join(', ') }}</td><td>{{ $user->profile?->is_vip ? 'Yes' : 'No' }}</td><td><a class="font-bold text-red-600" href="{{ route('admin.users.show', $user) }}">View</a></td></tr>@endforeach</tbody>
    </table>
</div>
<div class="mt-6">{{ $users->links() }}</div>
@endsection
