<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Edition;
use Illuminate\Auth\Access\HandlesAuthorization;

class EditionPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can manage an edition.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function manage(User $user)
    {
        return ($user->is_admin == true);
    }
}
