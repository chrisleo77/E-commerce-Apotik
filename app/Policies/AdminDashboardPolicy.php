<?php

namespace App\Policies;

use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Access\Response;
use Illuminate\Support\Facades\Gate;

class AdminDashboardPolicy
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

    public function accessDashboard(User $user)
    {
        if ($user->role == 'Admin') {
            return Response::allow();
        } else if ($user->role == 'User') {
            return Response::deny('You must be an adminstrator');
        } else {
            return Response::deny('You must be an adminstrator');
        }
    }
}
