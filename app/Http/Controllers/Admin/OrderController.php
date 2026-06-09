<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index()
    {
        return view('admin.orders.index');
    }

    public function show(Order $order)
    {
        return view('admin.orders.show', ['order' => $order->load('items', 'user', 'payment')]);
    }

    public function update(Request $request, Order $order)
    {
        $data = $request->validate([
            'status' => ['required', 'string'],
            'payment_status' => ['required', 'string'],
        ]);

        $order->update($data);

        return back()->with('success', 'Order updated.');
    }
}
