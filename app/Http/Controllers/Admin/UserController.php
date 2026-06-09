<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{
    public function index()
    {
        return view('admin.users.index', [
            'users' => User::with('roles', 'profile')->latest()->paginate(15),
        ]);
    }

    public function show(User $user)
    {
        return view('admin.users.show', [
            'user' => $user->load('roles', 'profile', 'orders', 'vipSubscription'),
            'roles' => Role::all(),
        ]);
    }

    public function update(Request $request, User $user)
    {
        $data = $request->validate([
            'roles' => ['nullable', 'array'],
            'roles.*' => ['exists:roles,id'],
        ]);

        $user->syncRoles($data['roles'] ?? []);

        return back()->with('success', 'Roles updated.');
    }
}
