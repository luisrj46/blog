<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use Spatie\Permission\Models\Permission;

class PermissionPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any models.
     *
     * @param  \App\Models\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        //
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\User  $user
     * @param  \Spatie\Permission\Models\Permission  $permission
     * @return mixed
     */
    public function view(User $user, Permission $permission)
    {
        return $user->hasRole('Admin') || $user->hasPermissionTo('View Permissions');

    }


    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $user
     * @param  \Spatie\Permission\Models\Permission  $permission
     * @return mixed
     */
    public function update(User $user, Permission $permission)
    {
        return $user->hasRole('Admin')|| $user->hasPermissionTo('Update Permissions');
    }


    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\User  $user
     * @param  \Spatie\Permission\Models\Permission  $permission
     * @return mixed
     */
    public function restore(User $user, Permission $permission)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \Spatie\Permission\Models\Permission  $permission
     * @return mixed
     */
    public function forceDelete(User $user, Permission $permission)
    {
        //
    }
}
