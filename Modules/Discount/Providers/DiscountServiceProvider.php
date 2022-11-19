<?php

namespace Modules\Discount\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Route;

class DiscountServiceProvider extends ServiceProvider
{
    /**
     * Namespace of discount controllers.
     *
     * @var string
     */
    private string $namespace = 'Modules\Discount\Http\Controllers';

    /**
     * Namespace of user view files.
     *
     * @var string
     */
    private string $namespaceDiscountView = 'Discount';

    /**
     * Path of user migration files.
     *
     * @var string
     */
    private string $migrationPath = '/../Database/Migrations';

    /**
     * Path of user view files.
     *
     * @var string
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
     *
     * @var string
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
    }

    /**
     * Load route files.
     *
     * @return void
     */
    private function loadRouteFiles(): void
    {
        Route::middleware($this->middlewareRoute)
            ->namespace($this->namespace)
            ->group(__DIR__ . $this->routePath);
    }

    /**
     * Load view files.
     *
     * @return void
     */
    private function loadViewFiles(): void
    {
        $this->loadViewsFrom(__DIR__ . $this->viewPath, $this->namespaceDiscountView);
    }

    /**
     * Load migration files.
     *
     * @return void
     */
    private function loadMigrationFiles(): void
    {
        $this->loadMigrationsFrom(__DIR__ . $this->migrationPath);
    }
}
