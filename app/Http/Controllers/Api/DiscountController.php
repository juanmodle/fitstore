<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Discount;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class DiscountController extends Controller
{
    public function index(): JsonResponse
    {
        return response()->json(Discount::activeNow()->get());
    }

    public function store(Request $request): JsonResponse
    {
        abort_unless($request->user()->hasAnyRole(['admin', 'manager']), 403);

        $data = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'description' => ['nullable', 'string'],
            'percentage' => ['nullable', 'integer', 'min:1', 'max:100'],
            'fixed_amount' => ['nullable', 'numeric', 'min:0'],
            'start_date' => ['required', 'date'],
            'end_date' => ['required', 'date', 'after_or_equal:start_date'],
            'is_vip_only' => ['nullable', 'boolean'],
            'is_active' => ['nullable', 'boolean'],
        ]);

        return response()->json(Discount::create($data), 201);
    }

    public function show(Discount $discount): JsonResponse
    {
        return response()->json($discount);
    }

    public function update(Request $request, Discount $discount): JsonResponse
    {
        abort_unless($request->user()->hasAnyRole(['admin', 'manager']), 403);
        $discount->update($request->validate([
            'name' => ['required', 'string', 'max:255'],
            'description' => ['nullable', 'string'],
            'percentage' => ['nullable', 'integer', 'min:1', 'max:100'],
            'fixed_amount' => ['nullable', 'numeric', 'min:0'],
            'start_date' => ['required', 'date'],
            'end_date' => ['required', 'date', 'after_or_equal:start_date'],
            'is_vip_only' => ['nullable', 'boolean'],
            'is_active' => ['nullable', 'boolean'],
        ]));

        return response()->json($discount);
    }

    public function destroy(Request $request, Discount $discount): JsonResponse
    {
        abort_unless($request->user()->hasRole('admin'), 403);
        $discount->delete();

        return response()->json(['message' => 'Discount deleted.']);
    }
}
