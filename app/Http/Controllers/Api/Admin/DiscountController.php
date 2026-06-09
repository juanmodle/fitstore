<?php

namespace App\Http\Controllers\Api\Admin;

use App\Models\Discount;

class DiscountController extends BaseCrudController
{
    protected string $model = Discount::class;
}
