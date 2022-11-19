<?php

namespace Modules\Discount\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Route;

class DiscountServiceProvider extends ServiceProvider
{
    public string $namespace = 'Modules\Discount\Http\Controllers';

    public function register()
    {
        $this->loadMigrationFiles();
        $this->loadViewFiles();
        $this->loadRouteFiles();
    }

    private function loadRouteFiles(): void
    {
        Route::middleware(['web', 'verify'])
            ->namespace($this->namespace)
            ->group(__DIR__ . '/../Routes/discount_routes.php');
    }

    private function loadViewFiles(): void
    {
        $this->loadViewsFrom(__DIR__ . '/../Resources/Views/', 'Discount');
    }

    private function loadMigrationFiles(): void
    {
        $this->loadMigrationsFrom(__DIR__ . '/../Database/Migrations');
    }
}
