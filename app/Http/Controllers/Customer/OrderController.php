<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index(Request $request)
    {
        return view('customer.orders.index', [
            'orders' => Order::forCustomer($request->user())->paginate(10),
        ]);
    }

    public function show(Request $request, Order $order)
    {
        abort_unless($order->user_id === $request->user()->id, 403);

        return view('customer.orders.show', ['order' => $order->load('items', 'payment.paymentMethod')]);
    }

    public function confirmation(Request $request, Order $order)
    {
        abort_unless($order->user_id === $request->user()->id, 403);

        return view('checkout.confirmation', ['order' => $order->load('items')]);
    }

    public function invoice(Request $request, Order $order)
    {
        abort_unless($order->user_id === $request->user()->id || $request->user()->hasPermission('manage_orders'), 403);

        return Pdf::loadView('pdf.invoice', ['order' => $order->load('items', 'user')])
            ->download($order->order_number . '.pdf');
    }
}
