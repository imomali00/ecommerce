<?php

namespace App\Policies;


use App\Models\User;
use Spatie\Permission\Models\Role;

class RolePolicy
{
    public function viewAny(User $user): bool
    {
        return $user->can('role:viewAny');
    }

    public function view(User $user, Role $role): bool
    {
        //
    }

    public function create(User $user): bool
    {
        //
    }

    public function update(User $user, Role $role): bool
    {
        //
    }

    public function delete(User $user, Role $role): bool
    {
        //
    }

    public function restore(User $user, Role $role): bool
    {
        //
    }

    public function forceDelete(User $user, Role $role): bool
    {
        //
    }
}
