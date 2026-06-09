<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'order_id', 'vip_subscription_id', 'payment_method_id', 'amount', 'status', 'transaction_id', 'payment_date', 'notes'];


    protected function casts(): array
    {
        return [
        'amount' => 'decimal:2',
        'payment_date' => 'datetime',
        ];
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function order()
    {
        return $this->belongsTo(Order::class);
    }

    public function vipSubscription()
    {
        return $this->belongsTo(VipSubscription::class);
    }

    public function paymentMethod()
    {
        return $this->belongsTo(PaymentMethod::class);
    }
}
