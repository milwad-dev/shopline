<?php

namespace Modules\Comment\Policies;

use Illuminate\Auth\Access\HandlesAuthorization;
use Modules\RolePermission\Models\Permission;
use Modules\User\Models\User;

class CommentPolicy
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
     *
     * @return bool
     */
    public function manage(User $user)
    {
        if ($user->hasPermissionTo(Permission::PERMISSION_COMMENTS)) {
            return true;
        }

        return false;
    }
}
