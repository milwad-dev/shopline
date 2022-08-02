<?php

namespace Modules\RolePermission\Models;

class Permission extends \Spatie\Permission\Models\Permission
{
    /**
     * Add Permissions
     */
    public const PERMISSION_SUPER_ADMIN = 'permission super admin';
    public const PERMISSION_PANEL = 'permission panel';
    public const PERMISSION_USERS = 'permission users';
    public const PERMISSION_CATEGORIES = 'permission categories';

    /**
     * Get permissions in array with static.
     *
     * @var array|string[]
     */
    public static array $permissions = [
        self::PERMISSION_SUPER_ADMIN,
        self::PERMISSION_PANEL,
        self::PERMISSION_USERS,
        self::PERMISSION_CATEGORIES,
    ];
}
