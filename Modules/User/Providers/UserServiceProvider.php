<?php

namespace Modules\User\Providers;

use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\ServiceProvider;
use Modules\User\Models\User;
use Modules\User\Policies\UserPolicy;

class UserServiceProvider extends ServiceProvider
{
    public string $namespace = 'Modules\User\Http\Controllers';

    /**
     * Register user files.
     *
     * @return void
     */
    public function register()
    {
        $this->loadMigrationFiles();
        $this->loadViewFiles();
        $this->loadRouteFiles();
        $this->loadPolicyFiles();
    }

    /**
     * Boot user service provider.
     *
     * @return void
     */
    public function boot()
    {
        $this->setMenuPnael();
    }

    /**
     * Load user migration files.
     *
     * @return void
     */
    private function loadMigrationFiles(): void
    {
        $this->loadMigrationsFrom(__DIR__ . '/../Database/Migrations');
    }

    /**
     * Load user view files.
     *
     * @return void
     */
    private function loadViewFiles(): void
    {
        $this->loadViewsFrom(__DIR__ . '/../Resources/Views/', 'User');
    }

    /**
     * Load user route files.
     *
     * @return void
     */
    private function loadRouteFiles(): void
    {
        Route::middleware(['web', 'verify'])->namespace($this->namespace)
            ->group(__DIR__ . '/../Routes/user_routes.php');
    }

    /**
     * Load user policy files.
     *
     * @return void
     */
    private function loadPolicyFiles(): void
    {
        Gate::policy(User::class, UserPolicy::class);
    }

    /**
     * Set user menu in panel from config file.
     *
     * @return void
     */
    private function setMenuPnael(): void
    {
        config()->set('panelConfig.menus.users', [ 
            'title' => 'Users',
            'icon' => 'user',
            'url' => route('users.index'),
        ]);
    }
}
