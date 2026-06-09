<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use App\Http\Requests\AddressRequest;
use App\Models\Address;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class AddressController extends Controller
{
    public function index(Request $request): View
    {
        return view('customer.addresses.index', [
            'addresses' => $request->user()->addresses()->latest()->get(),
        ]);
    }

    public function create(): View
    {
        return view('customer.addresses.create');
    }

    public function store(AddressRequest $request): RedirectResponse
    {
        $request->user()->addresses()->create($request->validated());

        return redirect()->route('addresses.index')->with('success', 'Address created.');
    }

    public function edit(Address $address): View
    {
        abort_unless($address->user_id === auth()->id(), 403);

        return view('customer.addresses.edit', ['address' => $address]);
    }

    public function update(AddressRequest $request, Address $address): RedirectResponse
    {
        abort_unless($address->user_id === auth()->id(), 403);
        $address->update($request->validated());

        return redirect()->route('addresses.index')->with('success', 'Address updated.');
    }

    public function destroy(Address $address): RedirectResponse
    {
        abort_unless($address->user_id === auth()->id(), 403);
        $address->delete();

        return back()->with('success', 'Address deleted.');
    }
}
