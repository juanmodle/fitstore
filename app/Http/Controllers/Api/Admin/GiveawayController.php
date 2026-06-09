<?php

namespace App\Http\Controllers\Api\Admin;

use App\Models\Giveaway;

class GiveawayController extends BaseCrudController
{
    protected string $model = Giveaway::class;
}
