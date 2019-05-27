<?php

namespace App\Policies;

use App\User;
use App\Helper;
use Illuminate\Auth\Access\HandlesAuthorization;

class HelperPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can update the helper.
     *
     * @param  \App\User  $user
     * @param  \App\Helper  $helper
     * @return mixed
     */
    public function update(User $user, Helper $helper)
    {
        return $helper->profile->user_id == $user->id;
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
