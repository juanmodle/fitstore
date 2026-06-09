<?php

namespace App\Models;

use App\Events\CouponUsed;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Validation\ValidationException;

class Coupon extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'code',
        'description',
        'percentage',
        'fixed_amount',
        'percentage_discount',
        'fixed_discount',
        'starts_at',
        'ends_at',
        'start_date',
        'end_date',
        'usage_limit',
        'is_vip_only',
        'status',
        'is_active',
    ];


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

    public function users()
    {
        return $this->belongsToMany(User::class)
            ->withPivot(['used_at', 'times_used'])
            ->withTimestamps();
    }

    public function scopeValidForUser($query, User $user)
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

    public function canBeUsedBy(User $user): bool
    {
        if ($this->status !== 'active') {
            return false;
        }

        if ($this->starts_at && $this->starts_at->isFuture()) {
            return false;
        }

        if ($this->ends_at && $this->ends_at->isPast()) {
            return false;
        }

        if ($this->usage_limit && $this->used_count >= $this->usage_limit) {
            return false;
        }

        return ! $this->is_vip_only || $user->isVipCustomer();
    }

    public function markUsedBy(User $user): void
    {
        $current = (int) ($this->users()->where('user_id', $user->id)->first()?->pivot->times_used ?? 0);

        $this->users()->syncWithoutDetaching([
            $user->id => [
                'used_at' => now(),
                'times_used' => $current + 1,
            ],
        ]);
    }

    public function getUsedCountAttribute(): int
    {
        return (int) $this->users()->sum('coupon_user.times_used');
    }

    public static function findValidForUser(?string $code, User $user): ?self
    {
        if (! $code) {
            return null;
        }

        $coupon = self::where('code', strtoupper(trim($code)))->first();

        if (! $coupon || $coupon->status !== 'active') {
            throw ValidationException::withMessages(['coupon' => 'The coupon is not active.']);
        }

        if ($coupon->starts_at && now()->lt($coupon->starts_at)) {
            throw ValidationException::withMessages(['coupon' => 'The coupon is not available yet.']);
        }

        if ($coupon->ends_at && now()->gt($coupon->ends_at)) {
            throw ValidationException::withMessages(['coupon' => 'The coupon has expired.']);
        }

        if ($coupon->is_vip_only && ! $user->isVipCustomer()) {
            throw ValidationException::withMessages(['coupon' => 'This coupon is only for VIP customers.']);
        }

        if ($coupon->usage_limit) {
            $timesUsed = (int) $coupon->users()->sum('times_used');

            if ($timesUsed >= $coupon->usage_limit) {
                throw ValidationException::withMessages(['coupon' => 'This coupon has reached its usage limit.']);
            }
        }

        return $coupon;
    }

    public function discountForSubtotal(float $subtotal): float
    {
        if ($this->percentage) {
            return round($subtotal * ((float) $this->percentage / 100), 2);
        }

        return min((float) $this->fixed_amount, $subtotal);
    }

    public function markUsedByWithEvent(User $user): void
    {
        $current = $user->coupons()->where('coupon_id', $this->id)->first();

        if ($current) {
            $user->coupons()->updateExistingPivot($this->id, [
                'used_at' => now(),
                'times_used' => ((int) $current->pivot->times_used) + 1,
            ]);

            event(new CouponUsed($this, $user));

            return;
        }

        $user->coupons()->attach($this->id, [
            'used_at' => now(),
            'times_used' => 1,
        ]);

        event(new CouponUsed($this, $user));
    }

    public function getPercentageDiscountAttribute(): ?float
    {
        return $this->percentage !== null ? (float) $this->percentage : null;
    }

    public function setPercentageDiscountAttribute($value): void
    {
        $this->attributes['percentage'] = $value;
    }

    public function getFixedDiscountAttribute(): ?float
    {
        return $this->fixed_amount !== null ? (float) $this->fixed_amount : null;
    }

    public function setFixedDiscountAttribute($value): void
    {
        $this->attributes['fixed_amount'] = $value;
    }

    public function setStartDateAttribute($value): void
    {
        $this->attributes['starts_at'] = $value;
    }

    public function setEndDateAttribute($value): void
    {
        $this->attributes['ends_at'] = $value;
    }

    public function setIsActiveAttribute($value): void
    {
        $this->attributes['status'] = $value ? 'active' : 'inactive';
    }
}
