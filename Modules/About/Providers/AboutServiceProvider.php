<?php

namespace Modules\About\Providers;

use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\ServiceProvider;
use Modules\About\Models\About;
use Modules\About\Policies\Policies\AboutPolicy;

class AboutServiceProvider extends ServiceProvider
{
    private string $namespace = 'Modules\About\Http\Controllers';

    private string $migrationPath = '/../Database/Migrations';
    private string $viewPath = '/../Resources/Views/';
    private string $name = 'About';
    private string $routePath = '/../Routes/about_routes.php';
    private array  $routeMiddleware = ['web', 'verify'];

    public function register()
    {
        $this->loadMigrationFiles();
        $this->loadViewFiles();
        $this->loadRouteFiles();
        $this->loadPolicyFiles();
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

    private function loadPolicyFiles(): void
    {
        Gate::policy(About::class, AboutPolicy::class);
    }
}
