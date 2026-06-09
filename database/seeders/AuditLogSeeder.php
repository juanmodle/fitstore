<?php

namespace Database\Seeders;

use App\Models\AuditLog;
use App\Models\User;
use Illuminate\Database\Seeder;

class AuditLogSeeder extends Seeder
{
    public function run(): void
    {
        $admin = User::where('email', 'administrador@gmail.com')->first();

        AuditLog::create([
            'user_id' => $admin?->id,
            'action' => 'seeded_database',
            'table_name' => 'database',
            'record_id' => null,
            'old_values' => null,
            'new_values' => ['message' => 'Initial FITSTORE example data created'],
            'created_at' => now(),
        ]);
    }
}
