<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\PermissionRegistrar;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RolePermissionSeeder extends Seeder
{
    public function run(): void
    {
        app(PermissionRegistrar::class)->forgetCachedPermissions();

        $maps = [
            'admin' => Permission::pluck('name')->all(),
            'manager' => ['manage_products', 'manage_categories', 'manage_orders', 'manage_payments', 'view_reports', 'export_reports'],
            'editor' => ['manage_posts', 'manage_documents'],
            'vip_customer' => ['buy_products', 'manage_own_orders', 'access_vip_discounts', 'access_giveaways'],
            'customer' => ['buy_products', 'manage_own_orders'],
        ];

        foreach ($maps as $roleName => $permissions) {
            $role = Role::where('name', $roleName)->first();
            $role?->syncPermissions($permissions);
        }

        app(PermissionRegistrar::class)->forgetCachedPermissions();
    }
}
