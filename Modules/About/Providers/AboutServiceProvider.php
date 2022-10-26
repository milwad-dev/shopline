<?php

namespace Modules\About\Providers;

use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\ServiceProvider;
use Modules\About\Models\About;
use Modules\About\Policies\Policies\AboutPolicy;

class AboutServiceProvider extends ServiceProvider
{
    public string $namespace = 'Modules\About\Http\Controllers';

    public function register()
    {
        $this->loadMigrationFiles();
        $this->loadViewFiles();
        $this->loadRouteFiles();
        $this->loadPolicyFiles();
    }

    private function loadMigrationFiles(): void
    {
        $this->loadMigrationsFrom(__DIR__ . '/../Database/Migrations');
    }

    private function loadViewFiles(): void
    {
        $this->loadViewsFrom(__DIR__ . '/../Resources/Views/', 'About');
    }

    private function loadRouteFiles(): void
    {
        Route::middleware(['web', 'verify'])
            ->namespace($this->namespace)
            ->group(__DIR__ . '/../Routes/about_routes.php');
    }

    private function loadPolicyFiles(): void
    {
        Gate::policy(About::class, AboutPolicy::class);
    }
}
