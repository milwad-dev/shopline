<?php

namespace Modules\Auth\Providers;

use Illuminate\Support\Facades\Route;
use Illuminate\Support\ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    public string $namespace = 'Modules\Auth\Http\Controllers';

    public function register()
    {
        $this->loadViewsFrom(__DIR__ . '/../Resources/Views/', 'Auth');
        Route::middleware(['web'])
            ->namespace($this->namespace)
            ->group(__DIR__ . '/../Routes/auth_routes.php');
    }
}
