<?php

namespace App\Policies;

use App\Models\Coupon;
use App\Models\User;

class CouponPolicy
{
    public function viewAny(User $user): bool
    {
        return $user->hasRole('admin') || $user->hasRole('manager');
    }

    public function view(User $user, Coupon $coupon): bool
    {
        return $user->hasRole('admin') || (! $coupon->is_vip_only || $user->isVipCustomer());
    }

    public function create(User $user): bool
    {
        return $user->hasRole('admin');
    }

    public function update(User $user, Coupon $coupon): bool
    {
        return $user->hasRole('admin');
    }

    public function delete(User $user, Coupon $coupon): bool
    {
        return $user->hasRole('admin');
    }
}
