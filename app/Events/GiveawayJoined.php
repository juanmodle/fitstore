<?php

namespace App\Events;

use App\Models\Giveaway;
use App\Models\User;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class GiveawayJoined
{
    use Dispatchable, SerializesModels;

    public function __construct(
        public Giveaway $giveaway,
        public User $user
    ) {
    }
}
