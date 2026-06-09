<?php

namespace App\Http\Controllers\Customer;

use App\Events\GiveawayJoined;
use App\Http\Controllers\Controller;
use App\Models\Giveaway;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class GiveawayController extends Controller
{
    public function index(Request $request)
    {
        return view('customer.giveaways.index', [
            'giveaways' => Giveaway::with('winner', 'entries')->latest()->get(),
            'joinedIds' => $request->user()->giveawayEntries()->pluck('giveaway_id')->all(),
        ]);
    }

    public function join(Request $request, Giveaway $giveaway)
    {
        if (! $request->user()->isVipCustomer()) {
            return back()->withErrors(['giveaway' => 'Only VIP customers can enter giveaways.']);
        }

        if (! Giveaway::activeForEntries()->whereKey($giveaway->id)->exists()) {
            return back()->withErrors(['giveaway' => 'This giveaway is not active.']);
        }

        $giveaway->entries()->firstOrCreate(
            ['user_id' => $request->user()->id],
            ['joined_at' => now()]
        );

        event(new GiveawayJoined($giveaway, $request->user()));

        return back()->with('success', 'You joined the giveaway.');
    }

    public function store(Request $request, Giveaway $giveaway): RedirectResponse
    {
        Gate::authorize('enter', $giveaway);

        $giveaway->users()->syncWithoutDetaching([
            $request->user()->id => ['joined_at' => now()],
        ]);

        GiveawayJoined::dispatch($giveaway, $request->user());

        return back()->with('success', 'You joined the giveaway.');
    }
}
