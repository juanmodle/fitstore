<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VipPayment extends Model
{
    use HasFactory;

    protected $fillable = ['vip_subscription_id', 'payment_id', 'amount', 'paid_at', 'status'];


    protected function casts(): array
    {
        return [
        'amount' => 'decimal:2',
        'paid_at' => 'datetime',
        ];
    }

    public function vipSubscription()
    {
        return $this->belongsTo(VipSubscription::class);
    }

    public function payment()
    {
        return $this->belongsTo(Payment::class);
    }
}
