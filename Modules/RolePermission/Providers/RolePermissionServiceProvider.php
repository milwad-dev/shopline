<?php

namespace Modules\RolePermission\Providers;

use Database\Seeders\DatabaseSeeder;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Route;
use Modules\RolePermission\Database\Seeds\RolePermissionTableSeeder;

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
        $this->loadMigrationsFrom(__DIR__ . '/../Database/Migrations');
        $this->loadViewsFrom(__DIR__ . '/../Resources/Views/', 'RolePermission');

        DatabaseSeeder::$seeders[] = RolePermissionTableSeeder::class;
        Route::middleware(['web', 'verify'])->namespace($this->namespace)
        ->group(__DIR__ . '/../Routes/rolepermission_routes.php');
    }
}
