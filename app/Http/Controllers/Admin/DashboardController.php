<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\CustomerProfile;
use App\Models\Order;
use App\Models\Product;
use App\Models\User;

class DashboardController extends Controller
{
    public function index()
    {
        return view('admin.dashboard', [
            'totalSales' => Order::where('payment_status', 'paid')->sum('total_price'),
            'totalOrders' => Order::count(),
            'totalProducts' => Product::count(),
            'totalCustomers' => User::whereHas('roles', fn ($query) => $query->whereIn('name', ['customer', 'vip_customer']))->count(),
            'totalVipCustomers' => CustomerProfile::where('is_vip', true)->count(),
            'latestOrders' => Order::with('user')->latest()->take(6)->get(),
            'lowStockProducts' => Product::where('stock', '<=', 10)->orderBy('stock')->take(6)->get(),
        ]);
    }
}
