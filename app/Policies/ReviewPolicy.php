<?php

namespace App\Policies;

use App\Review;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

//use Illuminate\Support\Facades\Auth;

class ReviewPolicy
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
     * @param  \App\Review  $review
     * @return mixed
     */
    /* public function create(User $user)
    {
        if($user==Auth::user()) {
            return true;
        }
    } */

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\User  $user
     * @param  \App\Review  $review
     * @return mixed
     */
    public function update(User $user, Review $review)
    {
        if($review->user->id==$user->id)
        {
            return true;
        }
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\User  $user
     * @param  \App\Review  $review
     * @return mixed
     */
    public function delete(User $user, Review $review)
    {
        if($review->user->id==$user->id)
        {
            return true;
        }
    }
}
