<?php

namespace Modules\RolePermission\Models;

class Permission extends \Spatie\Permission\Models\Permission
{
    /**
     * Permissions.
     */
    public const PERMISSION_SUPER_ADMIN = 'permission super admin';
    public const PERMISSION_PANEL = 'permission panel';
    public const PERMISSION_USERS = 'permission users';
    public const PERMISSION_CATEGORIES = 'permission categories';
    public const PERMISSION_ROLE_PERMISSIONS = 'permission role permissions';
    public const PERMISSION_PRODUCTS = 'permission products';
    public const PERMISSION_ARTICLES = 'permission articles';
    public const PERMISSION_SLIDERS = 'permission sliders';
    public const PERMISSION_ADVERTISINGS = 'permission advertisings';
    public const PERMISSION_COMMENTS = 'permission comments';
    public const PERMISSION_CONTACTS = 'permission contacts';
    public const PERMISSION_ABOUTS = 'permission abouts';

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
        self::PERMISSION_ROLE_PERMISSIONS,
        self::PERMISSION_PRODUCTS,
        self::PERMISSION_ARTICLES,
        self::PERMISSION_SLIDERS,
        self::PERMISSION_ADVERTISINGS,
        self::PERMISSION_COMMENTS,
        self::PERMISSION_CONTACTS,
        self::PERMISSION_ABOUTS,
    ];
}
