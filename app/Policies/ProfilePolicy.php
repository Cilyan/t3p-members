<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Profile;
use Illuminate\Auth\Access\HandlesAuthorization;

class ProfilePolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can update the profile.
     *
     * @param  \App\User  $user
     * @param  \App\Profile  $profile
     * @return mixed
     */
    public function update(User $user, Profile $profile)
    {
        return $user->id === $profile->user_id;
    }

    /**
     * Allow administrators to update any helper profiles
     *
     * @param \App\User $user
     * @param $ability
     * @return mixed
     */
    public function before(User $user, $ability)
    {
        if ($user->is_admin == true) {
            return true;
        }
    }
}
