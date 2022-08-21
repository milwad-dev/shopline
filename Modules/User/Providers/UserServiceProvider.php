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
        $this->loadMigrationsFrom(__DIR__ . '/../Database/Migrations'); // Register Migration
        $this->loadViewsFrom(__DIR__ . '/../Resources/Views/', 'User'); // Register View

        Route::middleware(['web', 'verify'])->namespace($this->namespace)
            ->group(__DIR__ . '/../Routes/user_routes.php'); // Register Route
        Gate::policy(User::class, UserPolicy::class); // Register Policy
    }

    /**
     * Boot user service provider.
     *
     * @return void
     */
    public function boot()
    {
        config()->set('panelConfig.menus.users', [ // Set menu for panel
            'title' => 'Users',
            'icon' => 'user',
            'url' => route('users.index'),
        ]);
    }
}
