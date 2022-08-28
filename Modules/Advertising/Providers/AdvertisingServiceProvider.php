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
    private string $namespace = 'Modules\Advertising\Http\Controllers';
    private string $migrationPath = '/../Database/Migrations';
    private string $viewPath = '/../Resources/Views/';
    private string $routePath = '/../Routes/advertising_routes.php';
    private string $name = 'Advertising';
    private array $routeMiddleware = ['web', 'verify'];

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
        $this->loadMigrationsFrom(__DIR__ . $this->migrationPath);
    }

    private function loadViewFiles(): void
    {
        $this->loadViewsFrom(__DIR__ . $this->viewPath, $this->name);
    }

    private function loadRouteFiles(): void
    {
        Route::middleware($this->routeMiddleware)
            ->namespace($this->namespace)
            ->group(__DIR__ . $this->routePath);
    }
}
