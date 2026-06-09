<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreGiveawayRequest;
use App\Models\Giveaway;

class GiveawayController extends Controller
{
    public function index()
    {
        return view('admin.giveaways.index');
    }

    public function create()
    {
        return view('admin.simple.form', [
            'title' => 'Create giveaway',
            'route' => 'giveaways',
            'model' => new Giveaway(),
            'fields' => ['title', 'description', 'prize', 'start_date', 'end_date', 'status'],
        ]);
    }

    public function store(StoreGiveawayRequest $request)
    {
        Giveaway::create($request->validated());

        return redirect()->route('admin.giveaways.index')->with('success', 'Giveaway created.');
    }

    public function edit(Giveaway $giveaway)
    {
        return view('admin.simple.form', [
            'title' => 'Edit giveaway',
            'route' => 'giveaways',
            'model' => $giveaway,
            'fields' => ['title', 'description', 'prize', 'start_date', 'end_date', 'status'],
        ]);
    }

    public function update(StoreGiveawayRequest $request, Giveaway $giveaway)
    {
        $giveaway->update($request->validated());

        return redirect()->route('admin.giveaways.index')->with('success', 'Giveaway updated.');
    }

    public function destroy(Giveaway $giveaway)
    {
        $giveaway->delete();

        return back()->with('success', 'Giveaway deleted.');
    }

    public function chooseWinner(Giveaway $giveaway)
    {
        $entry = $giveaway->entries()->inRandomOrder()->first();

        if ($entry) {
            $giveaway->update([
                'winner_user_id' => $entry->user_id,
                'status' => 'finished',
            ]);
        }

        return back()->with('success', 'Winner selected.');
    }
}
