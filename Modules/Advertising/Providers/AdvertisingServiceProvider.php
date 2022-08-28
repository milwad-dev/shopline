<?php

namespace Modules\Advertising\Providers;

use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\ServiceProvider;
use Modules\Advertising\Models\Advertising;
use Modules\Advertising\Policies\AdvertisingPolicy;
use Modules\Advertising\Repositories\AdvertisingRepoEloquent;
use Modules\Advertising\Repositories\AdvertisingRepoEloquentInterface;
use Modules\Advertising\Services\AdvertisingService;
use Modules\Advertising\Services\AdvertisingServiceInterface;

class AdvertisingServiceProvider extends ServiceProvider
{
    public string $namespace = 'Modules\Advertising\Http\Controllers';

    public function register()
    {
        $this->loadPolicyFiles();
        $this->loadMigrationFiles();
        $this->loadViewFiles();
        $this->loadRouteFiles();

        $this->bindRepository();
        $this->bindService();
    }

    private function loadPolicyFiles(): void
    {
        Gate::policy(Advertising::class, AdvertisingPolicy::class);
    }

    private function bindRepository(): void
    {
        $this->app->bind(AdvertisingRepoEloquentInterface::class, AdvertisingRepoEloquent::class);
    }

    private function bindService()
    {
        $this->app->bind(AdvertisingServiceInterface::class, AdvertisingService::class);
    }

    private function loadMigrationFiles(): void
    {
        $this->loadMigrationsFrom(__DIR__ . '/../Database/Migrations');
    }

    private function loadViewFiles(): void
    {
        $this->loadViewsFrom(__DIR__ . '/../Resources/Views/', 'Advertising');
    }

    private function loadRouteFiles(): void
    {
        Route::middleware(['web', 'verify'])
            ->namespace($this->namespace)
            ->group(__DIR__ . '/../Routes/advertising_routes.php');
    }
}
