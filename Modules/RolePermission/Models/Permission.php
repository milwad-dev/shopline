<?php

namespace Modules\RolePermission\Models;

class Permission extends \Spatie\Permission\Models\Permission
{
    public const PERMISSION_SUPER_ADMIN = 'permission super admin';
    public const PERMISSION_PANEL = 'permission panel';
    public const PERMISSION_USERS = 'permission users';
    public const PERMISSION_CATEGORIES = 'permission categories';

    public static array $permissions = [
        self::PERMISSION_SUPER_ADMIN,
        self::PERMISSION_PANEL,
        self::PERMISSION_USERS,
        self::PERMISSION_CATEGORIES,
    ];
}
