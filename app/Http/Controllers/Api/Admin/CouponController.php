<?php

namespace App\Http\Controllers\Api\Admin;

use App\Models\Coupon;

class CouponController extends BaseCrudController
{
    protected string $model = Coupon::class;
}
