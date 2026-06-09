<?php

namespace App\Providers;

use App\Events\CouponUsed;
use App\Events\GiveawayJoined;
use App\Events\OrderPaid;
use App\Events\ProductLowStock;
use App\Events\VipSubscriptionStarted;
use App\Listeners\LogCouponUsedListener;
use App\Listeners\LogGiveawayJoinedListener;
use App\Listeners\NotifyProductLowStockListener;
use App\Listeners\SendOrderConfirmationListener;
use App\Listeners\SendVipWelcomeListener;
use App\Models\Coupon;
use App\Models\Document;
use App\Models\Giveaway;
use App\Models\Order;
use App\Models\Post;
use App\Models\Product;
use App\Models\User;
use App\Policies\CouponPolicy;
use App\Policies\DocumentPolicy;
use App\Policies\GiveawayPolicy;
use App\Policies\OrderPolicy;
use App\Policies\PostPolicy;
use App\Policies\ProductPolicy;
use App\Policies\UserPolicy;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Event;

class AuthServiceProvider extends ServiceProvider
{
    protected $policies = [
        Product::class => ProductPolicy::class,
        Order::class => OrderPolicy::class,
        Coupon::class => CouponPolicy::class,
        Giveaway::class => GiveawayPolicy::class,
        Post::class => PostPolicy::class,
        Document::class => DocumentPolicy::class,
        User::class => UserPolicy::class,
    ];

    public function boot(): void
    {
        $this->registerPolicies();

        Event::listen(OrderPaid::class, SendOrderConfirmationListener::class);
        Event::listen(VipSubscriptionStarted::class, SendVipWelcomeListener::class);
        Event::listen(GiveawayJoined::class, LogGiveawayJoinedListener::class);
        Event::listen(CouponUsed::class, LogCouponUsedListener::class);
        Event::listen(ProductLowStock::class, NotifyProductLowStockListener::class);
    }
}
