<?php

namespace App\Events;

use App\Models\Coupon;
use App\Models\User;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class CouponUsed
{
    use Dispatchable, SerializesModels;

    public function __construct(
        public Coupon $coupon,
        public User $user
    ) {
    }
}
