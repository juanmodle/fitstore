<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class SendVipWelcomeCommand extends Command
{
    protected $signature = 'fitstore:send-vip-welcome {userId}';

    protected $description = 'Creates a VIP welcome notification for a customer.';

    public function handle(): int
    {
        $user = \App\Models\User::find($this->argument('userId'));

        if (! $user) {
            $this->error('User not found.');
            return self::FAILURE;
        }

        $user->notifications()->create([
            'title' => 'Welcome VIP',
            'message' => 'Your FITSTORE VIP subscription is active.',
            'type' => 'vip',
        ]);

        $this->info('VIP welcome notification created.');
        return self::SUCCESS;
    }
}
