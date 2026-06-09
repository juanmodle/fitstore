<?php

namespace App\Listeners;

use App\Events\VipSubscriptionStarted;
use App\Jobs\SendVipWelcomeEmailJob;

class SendVipWelcomeListener
{
    public function handle(VipSubscriptionStarted $event): void
    {
        SendVipWelcomeEmailJob::dispatch($event->subscription->id);
    }
}
