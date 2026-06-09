<?php

namespace App\Listeners;

use App\Events\GiveawayJoined;
use App\Models\AuditLog;

class LogGiveawayJoinedListener
{
    public function handle(GiveawayJoined $event): void
    {
        AuditLog::create([
            'user_id' => $event->user->id,
            'action' => 'joined_giveaway',
            'table_name' => 'giveaways',
            'record_id' => $event->giveaway->id,
            'new_values' => ['title' => $event->giveaway->title],
        ]);
    }
}
