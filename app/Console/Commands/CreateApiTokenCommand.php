<?php

namespace App\Console\Commands;

use App\Models\User;
use Illuminate\Console\Command;

class CreateApiTokenCommand extends Command
{
    protected $signature = 'fitstore:create-api-token {email}';

    protected $description = 'Creates a Sanctum token for a user.';

    public function handle(): int
    {
        $email = $this->argument('email');
        $user = User::where('email', $email)->first();

        if (! $user) {
            $this->error('User not found.');
            return self::FAILURE;
        }

        $token = $user->createToken('fitstore-api')->plainTextToken;
        $this->line($token);
        return self::SUCCESS;
    }
}
