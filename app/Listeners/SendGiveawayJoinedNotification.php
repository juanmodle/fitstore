<?php

namespace App\Listeners;

use App\Events\GiveawayJoined;
use App\Models\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;

class SendGiveawayJoinedNotification implements ShouldQueue
{
    public function handle(GiveawayJoined $event): void
    {
        Notification::create([
            'user_id' => $event->user->id,
            'title' => 'Giveaway joined',
            'message' => "You joined {$event->giveaway->title}.",
        ]);
    }
}
