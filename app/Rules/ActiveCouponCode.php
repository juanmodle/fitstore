<?php

namespace App\Rules;

use App\Models\Coupon;
use App\Models\User;
use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

class ActiveCouponCode implements ValidationRule
{
    public function __construct(private ?User $user)
    {
    }

    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        if (! $value) {
            return;
        }

        $coupon = Coupon::where('code', strtoupper(trim((string) $value)))->first();

        if (! $coupon || $coupon->status !== 'active') {
            $fail('The coupon is not active.');
            return;
        }

        if (($coupon->starts_at && now()->lt($coupon->starts_at)) || ($coupon->ends_at && now()->gt($coupon->ends_at))) {
            $fail('The coupon is not valid today.');
            return;
        }

        if ($coupon->is_vip_only && ! $this->user?->isVipCustomer()) {
            $fail('This coupon is only for VIP customers.');
        }
    }
}
