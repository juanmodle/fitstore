<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class CleanupOldCartsCommand extends Command
{
    protected $signature = 'fitstore:cleanup-old-carts';

    protected $description = 'Marks old active carts as abandoned.';

    public function handle(): int
    {
        $count = \App\Models\Cart::where('status', 'active')->where('updated_at', '<', now()->subDays(30))->update(['status' => 'abandoned']);
        $this->info($count . ' carts marked as abandoned.');
        return self::SUCCESS;
    }
}
