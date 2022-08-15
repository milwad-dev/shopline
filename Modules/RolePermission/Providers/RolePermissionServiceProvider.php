<?php

namespace Modules\RolePermission\Providers;

use Database\Seeders\DatabaseSeeder;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\ServiceProvider;
use Modules\RolePermission\Database\Seeds\RolePermissionTableSeeder;
use Modules\RolePermission\Models\Permission;
use Modules\RolePermission\Policies\RolePermissionPolicy;

class RolePermissionServiceProvider extends ServiceProvider
{
    /**
     * Set namespace for controllers.
     *
     * @var string
     */
    public string $namespace = 'Modules\RolePermission\Http\Controllers';

    /**
     * Register files.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind();
        $this->loadMigrationsFrom(__DIR__ . '/../Database/Migrations');
        $this->loadViewsFrom(__DIR__ . '/../Resources/Views/', 'RolePermission');

        DatabaseSeeder::$seeders[] = RolePermissionTableSeeder::class;
        Route::middleware(['web', 'verify'])->namespace($this->namespace)
        ->group(__DIR__ . '/../Routes/rolepermission_routes.php');
        Gate::policy(Permission::class, RolePermissionPolicy::class);
        Gate::before(static function ($user) {
            return $user->hasPermissionTo(Permission::PERMISSION_SUPER_ADMIN) ? true : null;
        });
    }

    /**
     * Set menu.
     *
     * @return void
     */
    public function boot()
    {
        config()->set('panelConfig.menus.role-permissions', [ // Set menu for panel
            'title' => 'Role & Permissions',
            'icon'  => 'alert-triangle',
            'url'   => route('role-permissions.index'),
        ]);
    }
}
