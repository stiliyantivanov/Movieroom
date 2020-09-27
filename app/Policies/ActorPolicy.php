<?php

namespace App\Policies;

use App\Actor;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class ActorPolicy
{
    use HandlesAuthorization;

    public function before(User $user)
    {
        if($user->is_admin) {
            return true;
        }
    }
    
    /**
     * Determine whether the user can create models.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        //
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\User  $user
     * @param  \App\Actor  $actor
     * @return mixed
     */
    public function update(User $user, Actor $actor)
    {
        //
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\User  $user
     * @param  \App\Actor  $actor
     * @return mixed
     */
    public function delete(User $user, Actor $actor)
    {
        //
    }
}
