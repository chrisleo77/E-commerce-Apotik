<?php

namespace App\Policies;

use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Auth\Access\Response;

class MemberPolicy
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    public function checkmember(User $user)
    {
        return ($user->role == 'User'
                ? Response::allow()
                : Response::deny('Anda harus daftar sebagai user dulu')
            );
    }
}
