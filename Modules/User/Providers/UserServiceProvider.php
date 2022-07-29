<?php

namespace Modules\User\Providers;

use Illuminate\Support\Facades\Route;
use Illuminate\Support\ServiceProvider;

class UserServiceProvider extends ServiceProvider
{
    public string $namespace = 'Modules\User\Http\Controllers';

    public function register()
    {
        $this->loadMigrationsFrom(__DIR__ . '/../Database/Migrations');
        $this->loadViewsFrom(__DIR__ . '/../Resources/Views/', 'User');

        Route::middleware(['web', 'verify'])->namespace($this->namespace)
            ->group(__DIR__ . '/../Routes/user_routes.php');
    }

    public function boot()
    {
        config()->set('panelConfig.menus.users', [
            'title' => 'Users',
            'icon' => 'user',
            'url' => route('users.index'),
        ]);
    }
}
