<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\GiveawayRequest;
use App\Models\Giveaway;
use Illuminate\Http\JsonResponse;

class GiveawayController extends Controller
{
    public function index(): JsonResponse
    {
        return response()->json(Giveaway::open()->withCount('entries')->get());
    }

    public function store(GiveawayRequest $request): JsonResponse
    {
        return response()->json(Giveaway::create($request->validated()), 201);
    }

    public function show(Giveaway $giveaway): JsonResponse
    {
        return response()->json($giveaway->load(['entries.user', 'winner']));
    }

    public function update(GiveawayRequest $request, Giveaway $giveaway): JsonResponse
    {
        $giveaway->update($request->validated());

        return response()->json($giveaway);
    }

    public function destroy(Giveaway $giveaway): JsonResponse
    {
        $this->authorize('delete', $giveaway);
        $giveaway->delete();

        return response()->json(['message' => 'Giveaway deleted.']);
    }
}
