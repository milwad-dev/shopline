<?php

namespace Modules\Contact\Policies;

use Illuminate\Auth\Access\HandlesAuthorization;
use Modules\RolePermission\Models\Permission;
use Modules\User\Models\User;

class ContactPolicy
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
     * Check user has permission.
     *
     * @param User $user
     *
     * @return bool
     */
    public function manage(User $user)
    {
        if ($user->hasPermissionTo(Permission::PERMISSION_CONTACTS)) {
            return true;
        }

        return false;
    }
}
