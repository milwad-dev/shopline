<?php

namespace Modules\User\Policies;

use Illuminate\Auth\Access\HandlesAuthorization;
use Modules\RolePermission\Models\Permission;
use Modules\User\Models\User;

class UserPolicy
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

    /**
     * Check user have permission.
     *
     *
     * @return bool
     */
    public function manage(User $user)
    {
        if ($user->hasPermissionTo(Permission::PERMISSION_USERS)) {
            return true;
        }

        return false;
    }
}
