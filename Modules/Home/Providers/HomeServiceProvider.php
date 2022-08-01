<?php

namespace Modules\Home\Providers;

use Illuminate\Support\Facades\Route;
use Illuminate\Support\ServiceProvider;

class HomeServiceProvider extends ServiceProvider
{
    public string $namespace = 'Modules\Home\Http\Controllers';

    public function register()
    {
        $this->loadViewsFrom(__DIR__ . '/../Resources/Views/', 'Home');

        Route::middleware(['web', 'verify'])
            ->namespace($this->namespace)
            ->group(__DIR__ . '/../Routes/home_routes.php');
    }

    public function boot()
    {
        config()->set('panelConfig.menus.home', [ // Set menu for panel
            'title' => 'Home',
            'icon'  => 'home',
            'url'   => route('home.index'),
        ]);
    }
}
