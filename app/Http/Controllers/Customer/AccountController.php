<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProfileRequest;
use App\Models\PaymentMethod;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class AccountController extends Controller
{
    public function index(Request $request): View
    {
        $user = $request->user()->load('profile', 'addresses', 'orders.items');

        return view('customer.dashboard', [
            'user' => $user,
            'latestOrders' => $user->orders()->latest()->take(5)->get(),
            'defaultAddress' => $user->addresses()->where('is_default', true)->first(),
        ]);
    }

    public function editProfile(): View
    {
        return view('customer.profile');
    }

    public function updateProfile(ProfileRequest $request): RedirectResponse
    {
        $data = $request->validated();

        $request->user()->update([
            'name' => $data['name'],
            'phone' => $data['phone'] ?? null,
        ]);

        $request->user()->customerProfile()->updateOrCreate(
            ['user_id' => $request->user()->id],
            [
                'fitness_goal' => $data['fitness_goal'] ?? null,
                'accepts_marketing' => $request->boolean('accepts_marketing'),
            ]
        );

        $request->session()->put('locale', $data['locale']);

        return back()
            ->with('success', 'Profile updated.')
            ->withCookie(cookie('fitstore_locale', $data['locale'], 60 * 24 * 365));
    }

    public function payments(Request $request): View
    {
        return view('customer.payments.index', [
            'payments' => $request->user()->payments()->with('paymentMethod', 'order')->latest()->paginate(12),
        ]);
    }

    public function vip(Request $request): View
    {
        return view('customer.vip.show', [
            'subscription' => $request->user()->vipSubscription()->with('payments')->first(),
            'paymentMethods' => PaymentMethod::where('is_active', true)->get(),
        ]);
    }

    public function storeVip(Request $request): RedirectResponse
    {
        $data = $request->validate([
            'payment_method_id' => ['required', 'exists:payment_methods,id'],
        ]);

        $request->user()->subscribeVip((int) $data['payment_method_id']);

        return back()->with('success', 'Your VIP subscription is active.');
    }

    public function cancelVip(Request $request): RedirectResponse
    {
        $subscription = $request->user()->vipSubscription;
        $subscription?->update(['status' => 'cancelled', 'end_date' => now()->toDateString()]);
        $request->user()->profile()?->update(['is_vip' => false]);

        return back()->with('success', 'VIP subscription cancelled.');
    }
}
