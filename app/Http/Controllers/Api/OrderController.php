<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class OrderController extends Controller
{
    public function index(Request $request)
    {
        return response()->json(['data' => $request->user()->orders()->with('items')->latest()->paginate(12)]);
    }

    public function show(Request $request, Order $order)
    {
        abort_unless($order->user_id === $request->user()->id, 403);

        return response()->json(['data' => $order->load('items', 'payment')]);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'shipping_address' => ['required', 'string', 'max:1000'],
            'billing_address' => ['required', 'string', 'max:1000'],
            'total_price' => ['required', 'numeric', 'min:0'],
        ]);

        $order = Order::create([
            'user_id' => $request->user()->id,
            'order_number' => 'API-' . now()->format('YmdHis') . '-' . Str::upper(Str::random(4)),
            'status' => 'pending',
            'total_price' => $data['total_price'],
            'shipping_price' => 0,
            'discount_amount' => 0,
            'payment_status' => 'pending',
            'notes' => 'Shipping: ' . $data['shipping_address'] . ' | Billing: ' . $data['billing_address'],
        ]);

        return response()->json($order, 201);
    }
}
