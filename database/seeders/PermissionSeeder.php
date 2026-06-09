<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\PermissionRegistrar;
use Spatie\Permission\Models\Permission;

class PermissionSeeder extends Seeder
{
    public function run(): void
    {
        app(PermissionRegistrar::class)->forgetCachedPermissions();

        $permissions = [
            'manage_users', 'manage_products', 'manage_categories', 'manage_orders',
            'manage_payments', 'manage_discounts', 'manage_coupons', 'manage_giveaways',
            'manage_posts', 'manage_documents', 'view_reports', 'export_reports',
            'view_audit_logs', 'buy_products', 'manage_own_orders',
            'access_vip_discounts', 'access_giveaways',
        ];

        foreach ($permissions as $permission) {
            Permission::findOrCreate($permission, 'web');
        }
    }
}
