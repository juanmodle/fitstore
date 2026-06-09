<?php

namespace App\Policies;

use App\Models\Order;
use App\Models\User;

class OrderPolicy
{
    public function viewAny(User $user): bool
    {
        return $user->hasPermission('manage_orders');
    }

    public function view(User $user, Order $model): bool
    {
        return $user->hasPermission('manage_orders') || $user->id === $model->user_id;
    }

    public function create(User $user): bool
    {
        return $user->hasPermission('manage_orders');
    }

    public function update(User $user, Order $model): bool
    {
        return $user->hasPermission('manage_orders');
    }

    public function delete(User $user, Order $model): bool
    {
        return $user->hasPermission('manage_orders');
    }
}
