<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class RecalculateVipPointsCommand extends Command
{
    protected $signature = 'fitstore:recalculate-vip-points';

    protected $description = 'Adds monthly points to active VIP customers.';

    public function handle(): int
    {
        $count = 0;
        \App\Models\VipSubscription::where('status', 'active')->with('user.profile')->get()->each(function ($subscription) use (&$count) {
            $subscription->user->profile?->increment('points', 50);
            $count++;
        });
        $this->info($count . ' VIP profiles updated.');
        return self::SUCCESS;
    }
}
