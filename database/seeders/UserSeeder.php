<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        $users = [
            ['name' => 'Administrador', 'email' => 'administrador@gmail.com', 'role' => 'admin'],
            ['name' => 'Manager', 'email' => 'manager@gmail.com', 'role' => 'manager'],
            ['name' => 'Editor', 'email' => 'editor@gmail.com', 'role' => 'editor'],
            ['name' => 'Cliente VIP', 'email' => 'vip@gmail.com', 'role' => 'vip_customer'],
            ['name' => 'Cliente', 'email' => 'cliente@gmail.com', 'role' => 'customer'],
        ];

        foreach ($users as $data) {
            $user = User::updateOrCreate(
                ['email' => $data['email']],
                [
                    'name' => $data['name'],
                    'password' => Hash::make('prueba123'),
                    'email_verified_at' => now(),
                ]
            );

            if (Role::where('name', $data['role'])->exists()) {
                $user->assignRole($data['role']);
            }
        }
    }
}
