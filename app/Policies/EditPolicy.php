<?php

namespace App\Policies;

use App\User;
use App\Edition;
use Illuminate\Auth\Access\HandlesAuthorization;

class EditPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view the edition.
     *
     * @param  \App\User  $user
     * @param  \App\Edition  $edition
     * @return mixed
     */
    public function view(User $user, Edition $edition)
    {
        //
    }

    /**
     * Determine whether the user can create editions.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        //
    }

    /**
     * Determine whether the user can update the edition.
     *
     * @param  \App\User  $user
     * @param  \App\Edition  $edition
     * @return mixed
     */
    public function update(User $user, Edition $edition)
    {
        //
    }

    /**
     * Determine whether the user can delete the edition.
     *
     * @param  \App\User  $user
     * @param  \App\Edition  $edition
     * @return mixed
     */
    public function delete(User $user, Edition $edition)
    {
        //
    }

    /**
     * Determine whether the user can restore the edition.
     *
     * @param  \App\User  $user
     * @param  \App\Edition  $edition
     * @return mixed
     */
    public function restore(User $user, Edition $edition)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the edition.
     *
     * @param  \App\User  $user
     * @param  \App\Edition  $edition
     * @return mixed
     */
    public function forceDelete(User $user, Edition $edition)
    {
        //
    }
}
