<?php

namespace App\Console\Commands;

use App\Mail\GiveawayWinnerMail;
use App\Models\Giveaway;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;

class ChooseGiveawayWinnerCommand extends Command
{
    protected $signature = 'fitstore:choose-giveaway-winner {giveawayId?}';

    protected $description = 'Chooses a winner for a giveaway.';

    public function handle(): int
    {
        $giveawayId = $this->argument('giveawayId');

        if ($giveawayId) {
            $giveaway = Giveaway::find($giveawayId);
        } else {
            $giveaway = Giveaway::where('status', 'active')->first();
        }

        if (! $giveaway) {
            $this->error('Giveaway not found.');
            return self::FAILURE;
        }

        $entry = $giveaway->entries()->inRandomOrder()->first();
        if (! $entry) {
            $this->warn('This giveaway has no entries.');
            return self::SUCCESS;
        }

        $giveaway->update(['winner_user_id' => $entry->user_id, 'status' => 'finished']);
        Mail::to($entry->user->email)->send(new GiveawayWinnerMail($giveaway));
        $this->info('Winner selected: ' . $entry->user->email);
        return self::SUCCESS;
    }
}
