<?php

namespace App\Policies;

use App\Models\Menu;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class MenuPolicy
{
    use HandlesAuthorization;

    public function allowRestify(User $user = null): bool
    {
        return true;
    }

    public function show(User $user = null, Menu $model): bool
    {
        return true;
    }

    public function store(User $user): bool
    {
        return false;
    }

    public function storeBulk(User $user): bool
    {
        return false;
    }

    public function update(User $user, Menu $model): bool
    {
        return false;
    }

    public function updateBulk(User $user, Menu $model): bool
    {
        return false;
    }

    public function deleteBulk(User $user, Menu $model): bool
    {
        return false;
    }

    public function delete(User $user, Menu $model): bool
    {
        return false;
    }
}
