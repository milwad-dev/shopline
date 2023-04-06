<?php

namespace Modules\RolePermission\Providers;

use Database\Seeders\DatabaseSeeder;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\ServiceProvider;
use Modules\RolePermission\Database\Seeds\PermissionSeeder;
use Modules\RolePermission\Database\Seeds\PermissionTableSeeder;
use Modules\RolePermission\Models\Permission;
use Modules\RolePermission\Policies\RolePermissionPolicy;
use Modules\RolePermission\Repositories\RolePermissionRepoEloquent;
use Modules\RolePermission\Repositories\RolePermissionRepoEloquentInterface;

class RolePermissionServiceProvider extends ServiceProvider
{
    /**
     * Get namespace for controllers.
     *
     * @var string
     */
    private string $namespace = 'Modules\RolePermission\Http\Controllers';

    /**
     * Get view path.
     *
     * @var string
     */
    private string $viewPath = '/../Resources/Views/';

    /**
     * Get name.
     *
     * @var string
     */
    private string $name = 'RolePermission';

    /**
     * Get route path.
     *
     * @var string
     */
    private string $routePath = '/../Routes/rolepermission_routes.php';

    /**
     * Get middleware route.
     *
     * @var array|string[]
     */
    private array $middlewareRoute = ['web', 'verify'];

    /**
     * Register files.
     *
     * @return void
     */
    public function register()
    {
        $this->loadMigrationFiles();
        $this->loadViewFiles();
        $this->loadRouteFiles();
        $this->loadPolicyFiles();

        $this->bindSeeder();
        $this->bindRepository();

        $this->setDatabaseSeederWithPermissionSeeder();
        $this->setGateBefore();
    }

    /**
     * Set menu for panel.
     *
     * @return void
     */
    public function boot()
    {
        $this->setMenuForPanel();
    }

    /**
     * Set menu for panel.
     *
     * @return void
     */
    private function setMenuForPanel(): void
    {
        config()->set('panelConfig.menus.role-permissions', [
            'title' => 'Role & Permissions',
            'icon'  => 'alert-triangle',
            'url'   => route('role-permissions.index'),
        ]);
    }

    /**
     * Bind permission seeder.
     *
     * @return void
     */
    private function bindSeeder(): void
    {
        $this->app->bind(PermissionSeeder::class, PermissionTableSeeder::class);
    }

    /**
     * Load permission migration files.
     *
     * @return void
     */
    private function loadMigrationFiles(): void
    {
        $this->loadMigrationsFrom(__DIR__.'/../Database/Migrations');
    }

    /**
     * Load permission view files.
     *
     * @return void
     */
    private function loadViewFiles(): void
    {
        $this->loadViewsFrom(__DIR__.$this->viewPath, $this->name);
    }

    /**
     * Set database seeder with permission seeder.
     *
     * @return void
     */
    private function setDatabaseSeederWithPermissionSeeder(): void
    {
        DatabaseSeeder::$seeders[] = PermissionSeeder::class;
    }

    /**
     * Load permission route files.
     *
     * @return void
     */
    private function loadRouteFiles(): void
    {
        Route::middleware($this->middlewareRoute)
            ->namespace($this->namespace)
            ->group(__DIR__.$this->routePath);
    }

    /**
     * Load permission policy files.
     *
     * @return void
     */
    private function loadPolicyFiles(): void
    {
        Gate::policy(Permission::class, RolePermissionPolicy::class);
    }

    /**
     * Set gate before for super admin permission.
     *
     * @return void
     */
    private function setGateBefore(): void
    {
        Gate::before(static function ($user) {
            return $user->hasPermissionTo(Permission::PERMISSION_SUPER_ADMIN) ? true : null;
        });
    }

    /**
     * Bind permission repository.
     *
     * @return void
     */
    private function bindRepository()
    {
        $this->app->bind(RolePermissionRepoEloquentInterface::class, RolePermissionRepoEloquent::class);
    }
}
