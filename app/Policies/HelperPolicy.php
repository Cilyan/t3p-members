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
}
