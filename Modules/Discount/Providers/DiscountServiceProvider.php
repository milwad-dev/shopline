<?php

namespace Modules\Discount\Providers;

use Illuminate\Support\Facades\Route;
use Illuminate\Support\ServiceProvider;
use Modules\Discount\Repositories\DiscountRepoEloquent;
use Modules\Discount\Repositories\DiscountRepoEloquentInterface;

class DiscountServiceProvider extends ServiceProvider
{
    /**
     * Namespace of discount controllers.
     */
    private string $namespace = 'Modules\Discount\Http\Controllers';

    /**
     * Namespace of user view files.
     */
    private string $namespaceDiscountView = 'Discount';

    /**
     * Path of user migration files.
     */
    private string $migrationPath = '/../Database/Migrations';

    /**
     * Path of user view files.
     */
    private string $viewPath = '/../Resources/Views/';

    /**
     * Array of middleware routes.
     *
     * @var array|string[]
     */
    private array $middlewareRoute = ['web', 'verify'];

    /**
     * Get route path.
     */
    private string $routePath = '/../Routes/discount_routes.php';

    /**
     * Register files.
     *
     * @return void
     */
    public function register()
    {
        $this->loadMigrationFiles();
        $this->loadViewFiles();
        $this->loadRouteFiles();

        $this->bindRepository();
    }

    /**
     * Load route files.
     */
    private function loadRouteFiles(): void
    {
        Route::middleware($this->middlewareRoute)
            ->namespace($this->namespace)
            ->group(__DIR__.$this->routePath);
    }

    /**
     * Load view files.
     */
    private function loadViewFiles(): void
    {
        $this->loadViewsFrom(__DIR__.$this->viewPath, $this->namespaceDiscountView);
    }

    /**
     * Load migration files.
     */
    private function loadMigrationFiles(): void
    {
        $this->loadMigrationsFrom(__DIR__.$this->migrationPath);
    }

    /**
     * Bind repository.
     *
     * @return void
     */
    private function bindRepository()
    {
        app()->bind(DiscountRepoEloquentInterface::class, DiscountRepoEloquent::class);
    }
}
