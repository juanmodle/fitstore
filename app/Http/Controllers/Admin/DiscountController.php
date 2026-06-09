<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Discount;
use Illuminate\Http\Request;

class DiscountController extends Controller
{
    public function index()
    {
        return view('admin.simple.index', [
            'title' => 'Discounts',
            'route' => 'discounts',
            'rows' => Discount::latest()->paginate(15),
            'columns' => ['name', 'description', 'percentage', 'fixed_amount'],
        ]);
    }

    public function create()
    {
        return view('admin.simple.form', [
            'title' => 'Create Discounts',
            'route' => 'discounts',
            'model' => new Discount(),
            'fields' => ['name', 'description', 'percentage', 'fixed_amount', 'starts_at', 'ends_at', 'is_vip_only', 'status'],
        ]);
    }

    public function store(Request $request)
    {
        $data = $request->validate($this->rules());
        Discount::create($this->cleanBooleans($data));

        return redirect()->route('admin.discounts.index')->with('success', 'Discounts item created.');
    }

    public function edit(Discount $discount)
    {
        return view('admin.simple.form', [
            'title' => 'Edit Discounts',
            'route' => 'discounts',
            'model' => $discount,
            'fields' => ['name', 'description', 'percentage', 'fixed_amount', 'starts_at', 'ends_at', 'is_vip_only', 'status'],
        ]);
    }

    public function update(Request $request, Discount $discount)
    {
        $data = $request->validate($this->rules());
        $discount->update($this->cleanBooleans($data));

        return redirect()->route('admin.discounts.index')->with('success', 'Discounts item updated.');
    }

    public function destroy(Discount $discount)
    {
        $discount->delete();

        return back()->with('success', 'Discounts item deleted.');
    }

    private function rules(): array
    {
        return [
            'name' => ['sometimes', 'required', 'string', 'max:255'],
            'description' => ['nullable', 'string'],
            'percentage' => ['nullable', 'numeric', 'min:0', 'max:100'],
            'fixed_amount' => ['nullable', 'numeric', 'min:0'],
            'starts_at' => ['nullable', 'date'],
            'ends_at' => ['nullable', 'date'],
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
