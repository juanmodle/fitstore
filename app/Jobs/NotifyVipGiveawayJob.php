<?php

namespace App\Jobs;

use App\Models\Giveaway;
use App\Models\Notification;
use App\Models\User;
use Illuminate\Foundation\Queue\Queueable;

class NotifyVipGiveawayJob
{
    use Queueable;

    public function __construct(public Giveaway $giveaway) {}

    public function handle(): void
    {
        User::whereHas('roles', fn ($query) => $query->where('name', 'vip_customer'))
            ->each(fn (User $user) => Notification::create([
                'user_id' => $user->id,
                'title' => 'VIP giveaway',
                'message' => "New giveaway available: {$this->giveaway->title}",
            ]));
    }
}
