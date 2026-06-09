<?php

namespace App\Rules;

use App\Models\Product;
use App\Models\ProductVariant;
use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

class EnoughProductStock implements ValidationRule
{
    public function __construct(
        private ?int $productId,
        private ?int $variantId = null,
    ) {
    }

    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        $quantity = (int) $value;
        $product = Product::find($this->productId);

        if (! $product || $product->status !== 'active') {
            $fail('The selected product is not available.');
            return;
        }

        $stock = $product->stock;

        if ($this->variantId) {
            $variant = ProductVariant::where('product_id', $product->id)->find($this->variantId);
            $stock = $variant?->stock ?? 0;
        }

        if ($quantity < 1 || $quantity > $stock) {
            $fail('There is not enough stock for this product.');
        }
    }
}
