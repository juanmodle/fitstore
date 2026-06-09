<?php

namespace App\Models;

use App\Events\VipSubscriptionStarted;
use Database\Factories\UserFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, HasRoles, Notifiable, SoftDeletes;

    protected $fillable = [
        'name',
        'email',
        'password',
        'google_id',
        'provider_name',
        'provider_token',
        'email_verified_at',
    ];

    protected $hidden = [
        'password',
        'remember_token',
        'provider_token',
    ];

    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    public function profile()
    {
        return $this->hasOne(CustomerProfile::class);
    }

    public function addresses()
    {
        return $this->hasMany(Address::class);
    }

    public function orders()
    {
        return $this->hasMany(Order::class);
    }

    public function payments()
    {
        return $this->hasMany(Payment::class);
    }

    public function documents()
    {
        return $this->hasMany(Document::class);
    }

    public function notifications()
    {
        return $this->hasMany(Notification::class);
    }

    public function posts()
    {
        return $this->hasMany(Post::class);
    }

    public function coupons()
    {
        return $this->belongsToMany(Coupon::class)
            ->withPivot(['used_at', 'times_used'])
            ->withTimestamps();
    }

    public function giveaways()
    {
        return $this->belongsToMany(Giveaway::class, 'giveaway_entries')
            ->withPivot('joined_at')
            ->withTimestamps();
    }

    public function giveawayEntries()
    {
        return $this->hasMany(GiveawayEntry::class);
    }

    public function vipSubscription()
    {
        return $this->hasOne(VipSubscription::class)->latestOfMany();
    }

    public function vipSubscriptions()
    {
        return $this->hasMany(VipSubscription::class);
    }

    public function carts()
    {
        return $this->hasMany(Cart::class);
    }

    public function cart()
    {
        return $this->hasOne(Cart::class)->latestOfMany();
    }

    public function hasPermission(string $permission): bool
    {
        return $this->checkPermissionTo($permission);
    }

    public function isVipCustomer(): bool
    {
        return (bool) optional($this->profile)->is_vip || $this->hasRole('vip_customer');
    }

    public function subscribeVip(int $paymentMethodId): VipSubscription
    {
        $subscription = DB::transaction(function () use ($paymentMethodId) {
            $subscription = VipSubscription::create([
                'user_id' => $this->id,
                'start_date' => now()->toDateString(),
                'end_date' => now()->addMonth()->toDateString(),
                'status' => 'active',
                'monthly_price' => 15.00,
                'payment_method_id' => $paymentMethodId,
            ]);

            $payment = Payment::create([
                'user_id' => $this->id,
                'vip_subscription_id' => $subscription->id,
                'payment_method_id' => $paymentMethodId,
                'amount' => 15.00,
                'status' => 'paid',
                'transaction_id' => 'VIP-' . strtoupper(Str::random(10)),
                'payment_date' => now(),
                'notes' => 'Monthly VIP subscription payment mock.',
            ]);

            VipPayment::create([
                'vip_subscription_id' => $subscription->id,
                'payment_id' => $payment->id,
                'amount' => 15.00,
                'paid_at' => now(),
                'status' => 'paid',
            ]);

            $this->profile()->updateOrCreate(
                ['user_id' => $this->id],
                ['is_vip' => true, 'points' => max(100, (int) optional($this->profile)->points)]
            );

            $vipRole = Role::where('name', 'vip_customer')->first();
            if ($vipRole && ! $this->hasRole('vip_customer')) {
                $this->assignRole('vip_customer');
            }

            return $subscription;
        });

        Artisan::call('fitstore:send-vip-welcome', ['userId' => $this->id]);
        event(new VipSubscriptionStarted($subscription->load('user')));

        return $subscription;
    }
}
