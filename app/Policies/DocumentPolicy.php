<?php

namespace App\Policies;

use App\Models\Document;
use App\Models\User;

class DocumentPolicy
{
    public function viewAny(User $user): bool
    {
        return $user->hasPermission('manage_documents');
    }

    public function view(User $user, Document $model): bool
    {
        return $user->hasPermission('manage_documents') || $user->id === $model->user_id;
    }

    public function create(User $user): bool
    {
        return $user->hasPermission('manage_documents');
    }

    public function update(User $user, Document $model): bool
    {
        return $user->hasPermission('manage_documents');
    }

    public function delete(User $user, Document $model): bool
    {
        return $user->hasPermission('manage_documents');
    }
}
