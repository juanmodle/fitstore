<?php

namespace Database\Seeders;

use App\Models\Notification;
use App\Models\User;
use Illuminate\Database\Seeder;

class NotificationSeeder extends Seeder
{
    public function run(): void
    {
        foreach (User::whereIn('email', ['vip@gmail.com', 'cliente@gmail.com'])->get() as $user) {
            Notification::updateOrCreate(
                ['user_id' => $user->id, 'title' => 'Welcome to FITSTORE'],
                ['message' => 'Your account is ready.', 'type' => 'welcome', 'is_read' => false]
            );
        }
    }
}
