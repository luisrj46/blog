<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class UserPolicy
{
    use HandlesAuthorization;

    public function before($user)
    {
        if($user->hasRole('Admin')){
            return true;
        }
    }
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
     * @param  \App\Models\User  $model
     * @return mixed
     */
    public function view(User $userAuth, User $user)
    {
        return $userAuth->id === $user->id || $user->hasPermissionTo('View users');

    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\Models\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return $user->hasPermissionTo('View users');
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\User  $model
     * @return mixed
     */
    public function update(User $userAuth, User $user)
    {
        return $userAuth->id === $user->id || $user->hasPermissionTo('Update users');

    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\User  $model
     * @return mixed
     */
    public function delete(User $userAuth, User $user)
    {
        return $userAuth->id === $user->id || $user->hasPermissionTo('Delete users');

    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\User  $model
     * @return mixed
     */
    public function restore(User $user, User $model)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\User  $model
     * @return mixed
     */
    public function forceDelete(User $user, User $model)
    {
        //
    }
}
