<?php

namespace Database\Seeders;

use App\Models\EmailLog;
use App\Models\User;
use Illuminate\Database\Seeder;

class EmailLogSeeder extends Seeder
{
    public function run(): void
    {
        foreach (User::take(3)->get() as $user) {
            EmailLog::updateOrCreate(
                ['email_to' => $user->email, 'subject' => 'FITSTORE example email'],
                ['user_id' => $user->id, 'status' => 'logged', 'sent_at' => now()]
            );
        }
    }
}
