<?php

namespace App\Listeners;

use App\Events\CouponUsed;
use App\Mail\CouponUsedMail;
use App\Models\AuditLog;
use App\Models\User;
use Illuminate\Support\Facades\Mail;

class LogCouponUsedListener
{
    public function handle(CouponUsed $event): void
    {
        AuditLog::create([
            'user_id' => $event->user->id,
            'action' => 'used_coupon',
            'table_name' => 'coupons',
            'record_id' => $event->coupon->id,
            'new_values' => ['code' => $event->coupon->code],
        ]);

        $admin = User::where('email', 'administrador@gmail.com')->first();
        if ($admin) {
            Mail::to($admin->email)->send(new CouponUsedMail($event->coupon));
        }
    }
}
