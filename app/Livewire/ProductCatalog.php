<?php

namespace App\Livewire;

use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use Livewire\Component;
use Livewire\WithPagination;

class ProductCatalog extends Component
{
    use WithPagination;

    public string $search = '';
    public string $category = '';
    public string $brand = '';
    public string $sort = 'newest';
    public string $minPrice = '';
    public string $maxPrice = '';

    protected array $queryString = [
        'search' => ['except' => ''],
        'category' => ['except' => ''],
        'brand' => ['except' => ''],
        'sort' => ['except' => 'newest'],
        'minPrice' => ['as' => 'min_price', 'except' => ''],
        'maxPrice' => ['as' => 'max_price', 'except' => ''],
    ];

    public function mount(): void
    {
        $this->search = (string) request('search', '');
        $this->category = (string) request('category', '');
        $this->brand = (string) request('brand', '');
        $this->sort = (string) request('sort', 'newest');
        $this->minPrice = (string) request('min_price', '');
        $this->maxPrice = (string) request('max_price', '');
    }

    public function updated($name): void
    {
        if (in_array($name, ['search', 'category', 'brand', 'sort', 'minPrice', 'maxPrice'])) {
            $this->resetPage();
        }
    }

    public function render()
    {
        $products = Product::with('mainImage', 'category.translations', 'brand', 'translations')
            ->active()
            ->withCatalogFilters([
                'search' => $this->search,
                'category' => $this->category,
                'brand' => $this->brand,
                'min_price' => $this->minPrice !== '' ? (float) $this->minPrice : null,
                'max_price' => $this->maxPrice !== '' ? (float) $this->maxPrice : null,
            ])
            ->sortedForCatalog($this->sort);

        $paginatedProducts = $products->paginate(12);

        return view('livewire.product-catalog', [
            'products' => $paginatedProducts,
            'categories' => Category::with('translations')->where('status', 'active')->get(),
            'brands' => Brand::all(),
        ]);
    }
}
