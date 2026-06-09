<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = ['name', 'slug', 'description', 'price', 'sale_price', 'stock', 'status', 'is_featured', 'is_vip_exclusive', 'category_id', 'brand_id'];


    protected function casts(): array
    {
        return [
        'price' => 'decimal:2',
        'sale_price' => 'decimal:2',
        'is_featured' => 'boolean',
        'is_vip_exclusive' => 'boolean',
        ];
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function brand()
    {
        return $this->belongsTo(Brand::class);
    }

    public function images()
    {
        return $this->hasMany(ProductImage::class)->orderBy('sort_order');
    }

    public function mainImage()
    {
        return $this->hasOne(ProductImage::class)->where('is_main', true);
    }

    public function variants()
    {
        return $this->hasMany(ProductVariant::class);
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class)
            ->withPivot(['priority', 'is_visible'])
            ->withTimestamps();
    }

    public function translations()
    {
        return $this->hasMany(ProductTranslation::class);
    }

    public function translatedName(?string $locale = null): string
    {
        $locale ??= app()->getLocale();

        if ($locale === 'en') {
            return $this->name;
        }

        $translation = $this->relationLoaded('translations')
            ? $this->translations->firstWhere('locale', $locale)
            : $this->translations()->where('locale', $locale)->first();

        return $translation?->name ?? $this->name;
    }

    public function translatedDescription(?string $locale = null): string
    {
        $locale ??= app()->getLocale();

        if ($locale === 'en') {
            return $this->description;
        }

        $translation = $this->relationLoaded('translations')
            ? $this->translations->firstWhere('locale', $locale)
            : $this->translations()->where('locale', $locale)->first();

        return $translation?->description ?? $this->description;
    }

    public function currentPrice(): float
    {
        return (float) ($this->sale_price ?: $this->price);
    }

    public function finalPrice(): float
    {
        return $this->currentPrice();
    }

    public function scopeActive($query)
    {
        return $query->where('status', 'active');
    }

    public function scopeWithCatalogFilters($query, array $filters)
    {
        return $query
            ->with('category', 'brand')
            ->when($filters['search'] ?? null, fn ($q, $search) => $q->where('name', 'like', '%' . $search . '%'))
            ->when($filters['category'] ?? null, fn ($q, $slug) => $q->whereHas('category', fn ($category) => $category->where('slug', $slug)))
            ->when($filters['brand'] ?? null, fn ($q, $slug) => $q->whereHas('brand', fn ($brand) => $brand->where('slug', $slug)))
            ->when($filters['min_price'] ?? null, fn ($q, $price) => $q->where('price', '>=', $price))
            ->when($filters['max_price'] ?? null, fn ($q, $price) => $q->where('price', '<=', $price));
    }

    public function scopeSortedForCatalog($query, string $sort)
    {
        return match ($sort) {
            'price_low' => $query->orderBy('price'),
            'price_high' => $query->orderByDesc('price'),
            'featured' => $query->orderByDesc('is_featured')->latest(),
            default => $query->latest(),
        };
    }

    public function scopePopularForHome($query)
    {
        return $query->active()
            ->with('category', 'brand')
            ->withCount('images')
            ->where('stock', '>', 0)
            ->orderByDesc('is_featured')
            ->orderByDesc('images_count')
            ->orderByDesc('stock');
    }
}
