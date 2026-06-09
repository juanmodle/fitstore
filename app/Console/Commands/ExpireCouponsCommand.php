<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class ExpireCouponsCommand extends Command
{
    protected $signature = 'fitstore:expire-coupons';

    protected $description = 'Disables expired coupons.';

    public function handle(): int
    {
        $count = \App\Models\Coupon::where('status', 'active')->whereNotNull('ends_at')->where('ends_at', '<', now())->update(['status' => 'inactive']);
        $this->info($count . ' coupons expired.');
        return self::SUCCESS;
    }
}
