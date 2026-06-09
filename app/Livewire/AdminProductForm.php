<?php

namespace App\Livewire;

use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Support\Str;
use Livewire\Component;

class AdminProductForm extends Component
{
    public ?Product $product = null;
    public string $name = '';
    public string $slug = '';
    public string $description = '';
    public float $price = 0;
    public ?float $salePrice = null;
    public int $stock = 0;
    public string $status = 'active';
    public bool $isFeatured = false;
    public ?int $categoryId = null;
    public ?int $brandId = null;
    public string $imagePath = '';

    public function mount(?Product $product = null): void
    {
        if ($product && $product->exists) {
            $this->product = $product;
            $this->name = $product->name;
            $this->slug = $product->slug;
            $this->description = $product->description;
            $this->price = (float) $product->price;
            $this->salePrice = $product->sale_price ? (float) $product->sale_price : null;
            $this->stock = $product->stock;
            $this->status = $product->status;
            $this->isFeatured = (bool) $product->is_featured;
            $this->categoryId = $product->category_id;
            $this->brandId = $product->brand_id;
            $this->imagePath = optional($product->mainImage)->image_path ?: '';
        }
    }

    public function updatedName(): void
    {
        if (! $this->product) {
            $this->slug = Str::slug($this->name);
        }
    }

    public function save()
    {
        $data = $this->validate([
            'name' => ['required', 'string', 'max:255'],
            'slug' => ['required', 'string', 'max:255'],
            'description' => ['required', 'string'],
            'price' => ['required', 'numeric', 'min:0'],
            'salePrice' => ['nullable', 'numeric', 'min:0'],
            'stock' => ['required', 'integer', 'min:0'],
            'status' => ['required', 'in:active,inactive,draft'],
            'categoryId' => ['nullable', 'exists:categories,id'],
            'brandId' => ['nullable', 'exists:brands,id'],
        ]);

        $product = Product::updateOrCreate(
            ['id' => $this->product?->id],
            [
                'name' => $data['name'],
                'slug' => $data['slug'],
                'description' => $data['description'],
                'price' => $data['price'],
                'sale_price' => $data['salePrice'],
                'stock' => $data['stock'],
                'status' => $data['status'],
                'is_featured' => $this->isFeatured,
                'category_id' => $data['categoryId'],
                'brand_id' => $data['brandId'],
            ]
        );

        if ($this->imagePath) {
            $product->images()->updateOrCreate(
                ['is_main' => true],
                ['image_path' => $this->imagePath, 'alt_text' => $product->name, 'sort_order' => 0]
            );
        }

        return redirect()->route('admin.products.index')->with('success', 'Product saved.');
    }

    public function render()
    {
        return view('livewire.admin-product-form', [
            'categories' => Category::orderBy('name')->get(),
            'brands' => Brand::orderBy('name')->get(),
        ]);
    }
}
