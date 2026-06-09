<?php

namespace App\Events;

use App\Models\VipSubscription;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class VipSubscriptionStarted
{
    use Dispatchable, SerializesModels;

    public function __construct(
        public VipSubscription $subscription
    ) {
    }
}
