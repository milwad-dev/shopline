<?php

namespace Modules\RolePermission\Policies;

use Illuminate\Auth\Access\HandlesAuthorization;
use Modules\RolePermission\Models\Permission;
use Modules\User\Models\User;

class RolePermissionPolicy
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
     * Check user have permissions.
     *
     * @param  User $user
     * @return bool
     */
    public function manage(User $user)
    {
        if ($user->hasPermissionTo(Permission::PERMISSION_ROLE_PERMISSIONS)) {
            return true;
        }

        return false;
    }
}
