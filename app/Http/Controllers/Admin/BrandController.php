<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use Illuminate\Http\Request;

class BrandController extends Controller
{
    public function index()
    {
        return view('admin.brands.index');
    }

    public function create()
    {
        return view('admin.simple.form', [
            'title' => 'Create Brands',
            'route' => 'brands',
            'model' => new Brand(),
            'fields' => ['name', 'slug', 'description', 'logo'],
        ]);
    }

    public function store(Request $request)
    {
        $data = $request->validate($this->rules());
        Brand::create($this->cleanBooleans($data));

        return redirect()->route('admin.brands.index')->with('success', 'Brands item created.');
    }

    public function edit(Brand $brand)
    {
        return view('admin.simple.form', [
            'title' => 'Edit Brands',
            'route' => 'brands',
            'model' => $brand,
            'fields' => ['name', 'slug', 'description', 'logo'],
        ]);
    }

    public function update(Request $request, Brand $brand)
    {
        $data = $request->validate($this->rules());
        $brand->update($this->cleanBooleans($data));

        return redirect()->route('admin.brands.index')->with('success', 'Brands item updated.');
    }

    public function destroy(Brand $brand)
    {
        $brand->delete();

        return back()->with('success', 'Brands item deleted.');
    }

    private function rules(): array
    {
        return [
            'name' => ['sometimes', 'required', 'string', 'max:255'],
            'slug' => ['nullable', 'string', 'max:255'],
            'description' => ['nullable', 'string'],
            'logo' => ['nullable', 'string', 'max:255'],
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
