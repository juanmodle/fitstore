<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Discount extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = ['name', 'description', 'percentage', 'fixed_amount', 'starts_at', 'ends_at', 'is_vip_only', 'status'];


    protected function casts(): array
    {
        return [
        'percentage' => 'decimal:2',
        'fixed_amount' => 'decimal:2',
        'starts_at' => 'datetime',
        'ends_at' => 'datetime',
        'is_vip_only' => 'boolean',
        ];
    }

    public function scopeAvailableForUser($query, User $user)
    {
        return $query->where('status', 'active')
            ->where(function ($q) {
                $q->whereNull('starts_at')->orWhere('starts_at', '<=', now());
            })
            ->where(function ($q) {
                $q->whereNull('ends_at')->orWhere('ends_at', '>=', now());
            })
            ->where(function ($q) use ($user) {
                $q->where('is_vip_only', false)
                    ->orWhere(fn ($vipQuery) => $vipQuery->where('is_vip_only', true)->whereRaw('? = 1', [$user->isVipCustomer() ? 1 : 0]));
            });
    }

}
