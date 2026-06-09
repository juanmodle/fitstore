<?php

namespace App\Policies;

use App\Models\Product;
use App\Models\User;

class ProductPolicy
{
    public function viewAny(User $user): bool
    {
        return $user->hasPermission('manage_products');
    }

    public function view(User $user, Product $model): bool
    {
        return $user->hasPermission('manage_products');
    }

    public function create(User $user): bool
    {
        return $user->hasPermission('manage_products');
    }

    public function update(User $user, Product $model): bool
    {
        return $user->hasPermission('manage_products');
    }

    public function delete(User $user, Product $model): bool
    {
        return $user->hasPermission('manage_products');
    }
}
