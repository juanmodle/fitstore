<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $this->call([
            PermissionSeeder::class,
            RoleSeeder::class,
            RolePermissionSeeder::class,
            UserSeeder::class,
            CustomerProfileSeeder::class,
            AddressSeeder::class,
            CategorySeeder::class,
            BrandSeeder::class,
            TagSeeder::class,
            ProductSeeder::class,
            ProductImageSeeder::class,
            ProductVariantSeeder::class,
            ProductTagSeeder::class,
            PaymentMethodSeeder::class,
            DiscountSeeder::class,
            CouponSeeder::class,
            GiveawaySeeder::class,
            GiveawayEntrySeeder::class,
            PostCategorySeeder::class,
            PostSeeder::class,
            PostTagSeeder::class,
            CommentSeeder::class,
            CartSeeder::class,
            OrderSeeder::class,
            OrderItemSeeder::class,
            PaymentSeeder::class,
            VipSubscriptionSeeder::class,
            VipPaymentSeeder::class,
            DocumentSeeder::class,
            MediaAssetSeeder::class,
            NotificationSeeder::class,
            EmailLogSeeder::class,
            TranslationSeeder::class,
            AuditLogSeeder::class,
        ]);
    }
}
