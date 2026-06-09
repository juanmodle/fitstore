<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class VipSubscriptionController extends Controller
{
    public function show(Request $request)
    {
        return response()->json(['data' => $request->user()->vipSubscription()->with('payments')->first()]);
    }
}
