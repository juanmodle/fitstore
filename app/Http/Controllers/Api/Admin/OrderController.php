<?php

namespace App\Http\Controllers\Api\Admin;

use App\Models\Order;

class OrderController extends BaseCrudController
{
    protected string $model = Order::class;
}
