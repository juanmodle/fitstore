<?php

namespace App\Http\Requests;

use App\Rules\EnoughProductStock;
use Illuminate\Foundation\Http\FormRequest;

class CartItemRequest extends FormRequest
{
    public function authorize(): bool
    {
        return $this->user()?->hasPermission('buy_products') ?? false;
    }

    public function rules(): array
    {
        return [
            'product_id' => ['required', 'exists:products,id'],
            'product_variant_id' => ['nullable', 'exists:product_variants,id'],
            'quantity' => [
                'required',
                'integer',
                'min:1',
                new EnoughProductStock((int) $this->input('product_id'), $this->input('product_variant_id') ? (int) $this->input('product_variant_id') : null),
            ],
        ];
    }
}
