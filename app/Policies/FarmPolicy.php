<?php

namespace App\Policies;

use App\Models\User;
use App\Models\farm;
use Illuminate\Auth\Access\HandlesAuthorization;

class FarmPolicy
{
    use HandlesAuthorization;

        /**
     * Perform pre-authorization checks.
     *
     * @param  \App\Models\User  $user
     * @param  string  $ability
     * @return void|bool
     */
    public function before(User $user, $ability)
    {
        return $user->role == 'admin' ? true : false;
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function create(User $user)
    {
        return $user->role == 'admin';
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\farm  $farm
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function modify(User $user, farm $farm)
    {
        return $user->id == $farm->user_id;
    }
}
