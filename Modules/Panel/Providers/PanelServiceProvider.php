<?php

namespace Modules\Panel\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Route;

class PanelServiceProvider extends ServiceProvider
{
    public string $namespace = 'Modules\Panel\Http\Controllers';

    public function register()
    {
        $this->loadViewsFrom(__DIR__ . '/../Resources/Views/', 'Panel');

        Route::middleware(['web', 'verify'])->namespace($this->namespace)
            ->group(__DIR__ . '/../Routes/panel_routes.php');
    }
}
