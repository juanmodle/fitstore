<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Payment;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class PaymentController extends Controller
{
    public function index(Request $request)
    {
        return response()->json(['data' => $request->user()->payments()->with('paymentMethod')->latest()->paginate(12)]);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'payment_method_id' => ['required', 'exists:payment_methods,id'],
            'order_id' => ['nullable', 'exists:orders,id'],
            'amount' => ['required', 'numeric', 'min:0.01'],
        ]);

        $payment = Payment::create([
            'user_id' => $request->user()->id,
            'payment_method_id' => $data['payment_method_id'],
            'order_id' => $data['order_id'] ?? null,
            'amount' => $data['amount'],
            'status' => 'paid',
            'transaction_id' => 'API-PAY-' . Str::upper(Str::random(8)),
            'payment_date' => now(),
        ]);

        return response()->json($payment, 201);
    }
}
