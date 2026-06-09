<?php

namespace App\Policies;

use App\Models\Giveaway;
use App\Models\User;

class GiveawayPolicy
{
    public function viewAny(User $user): bool
    {
        return $user->hasPermission('manage_giveaways');
    }

    public function view(User $user, Giveaway $model): bool
    {
        return $user->hasPermission('manage_giveaways');
    }

    public function create(User $user): bool
    {
        return $user->hasPermission('manage_giveaways');
    }

    public function update(User $user, Giveaway $model): bool
    {
        return $user->hasPermission('manage_giveaways');
    }

    public function delete(User $user, Giveaway $model): bool
    {
        return $user->hasPermission('manage_giveaways');
    }

    public function enter(User $user, Giveaway $model): bool
    {
        return $user->isVipCustomer()
            && $model->status === 'active'
            && $model->start_date <= now()
            && $model->end_date >= now();
    }
}
