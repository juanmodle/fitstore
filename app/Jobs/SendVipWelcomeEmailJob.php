<?php

namespace App\Jobs;

use App\Mail\VipWelcomeMail;
use App\Models\VipSubscription;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Queue\Queueable;
use Illuminate\Support\Facades\Mail;

class SendVipWelcomeEmailJob implements ShouldQueue
{
    use Queueable;

    public function __construct(public int $subscriptionId)
    {
    }

    public function handle(): void
    {
        $subscription = VipSubscription::with('user')->find($this->subscriptionId);

        if ($subscription) {
            Mail::to($subscription->user->email)->send(new VipWelcomeMail($subscription));
        }
    }
}
