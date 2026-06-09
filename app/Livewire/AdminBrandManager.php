<?php

namespace App\Livewire;

use App\Models\Brand;
use Illuminate\Support\Str;
use Livewire\Component;

class AdminBrandManager extends Component
{
    public ?int $brandId = null;
    public string $name = '';
    public string $slug = '';
    public string $description = '';
    public string $logo = '';

    public function updatedName(): void
    {
        $this->slug = Str::slug($this->name);
    }

    public function save(): void
    {
        $data = $this->validate([
            'name' => ['required', 'string', 'max:255'],
            'slug' => ['required', 'string', 'max:255'],
            'description' => ['nullable', 'string'],
            'logo' => ['nullable', 'string', 'max:255'],
        ]);

        Brand::updateOrCreate(['id' => $this->brandId], $data);
        $this->reset(['brandId', 'name', 'slug', 'description', 'logo']);
    }

    public function edit(int $id): void
    {
        $brand = Brand::findOrFail($id);
        $this->brandId = $brand->id;
        $this->name = $brand->name;
        $this->slug = $brand->slug;
        $this->description = (string) $brand->description;
        $this->logo = (string) $brand->logo;
    }

    public function delete(int $id): void
    {
        Brand::findOrFail($id)->delete();
    }

    public function render()
    {
        return view('livewire.admin-brand-manager', ['brands' => Brand::latest()->get()]);
    }
}
