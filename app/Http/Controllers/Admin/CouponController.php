<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Coupon;
use Illuminate\Http\Request;

class CouponController extends Controller
{
    public function index()
    {
        return view('admin.coupons.index');
    }

    public function create()
    {
        return view('admin.simple.form', [
            'title' => 'Create Coupons',
            'route' => 'coupons',
            'model' => new Coupon(),
            'fields' => ['code', 'description', 'percentage', 'fixed_amount', 'starts_at', 'ends_at', 'usage_limit', 'is_vip_only', 'status'],
        ]);
    }

    public function store(Request $request)
    {
        $data = $request->validate($this->rules());
        Coupon::create($this->cleanBooleans($data));

        return redirect()->route('admin.coupons.index')->with('success', 'Coupons item created.');
    }

    public function edit(Coupon $coupon)
    {
        return view('admin.simple.form', [
            'title' => 'Edit Coupons',
            'route' => 'coupons',
            'model' => $coupon,
            'fields' => ['code', 'description', 'percentage', 'fixed_amount', 'starts_at', 'ends_at', 'usage_limit', 'is_vip_only', 'status'],
        ]);
    }

    public function update(Request $request, Coupon $coupon)
    {
        $data = $request->validate($this->rules());
        $coupon->update($this->cleanBooleans($data));

        return redirect()->route('admin.coupons.index')->with('success', 'Coupons item updated.');
    }

    public function destroy(Coupon $coupon)
    {
        $coupon->delete();

        return back()->with('success', 'Coupons item deleted.');
    }

    private function rules(): array
    {
        return [
            'name' => ['sometimes', 'required', 'string', 'max:255'],
            'code' => ['sometimes', 'required', 'string', 'max:80'],
            'description' => ['nullable', 'string'],
            'percentage' => ['nullable', 'numeric', 'min:0', 'max:100'],
            'fixed_amount' => ['nullable', 'numeric', 'min:0'],
            'starts_at' => ['nullable', 'date'],
            'ends_at' => ['nullable', 'date'],
            'usage_limit' => ['nullable', 'integer', 'min:1'],
            'is_vip_only' => ['nullable', 'boolean'],
            'status' => ['nullable', 'string', 'max:50'],
        ];
    }

    private function cleanBooleans(array $data): array
    {
        foreach (['is_vip_only', 'is_active'] as $key) {
            if (array_key_exists($key, $data)) {
                $data[$key] = (bool) $data[$key];
            }
        }

        return $data;
    }
}
