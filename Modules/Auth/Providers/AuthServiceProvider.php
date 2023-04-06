<?php

namespace Modules\Auth\Providers;

use Illuminate\Support\Facades\Route;
use Illuminate\Support\ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * Get namespace for auth controllers.
     *
     * @var string
     */
    public string $namespace = 'Modules\Auth\Http\Controllers';

    /**
     * Get view path.
     *
     * @var string
     */
    private string $viewPath = '/../Resources/Views/';

    /**
     * Get name.
     *
     * @var string
     */
    private string $name = 'Auth';

    /**
     * Get middleware route.
     *
     * @var array|string[]
     */
    private array $middlewareRoute = ['web'];

    /**
     * Get route path.
     *
     * @var string
     */
    private string $routePath = '/../Routes/auth_routes.php';

    /**
     * Register files.
     *
     * @return void
     */
    public function register()
    {
        $this->loadViewFiles();
        $this->loadRouteFiles();
    }

    /**
     * Load view files.
     *
     * @return void
     */
    private function loadViewFiles(): void
    {
        $this->loadViewsFrom(__DIR__.$this->viewPath, $this->name);
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
            ->group(__DIR__.$this->routePath);
    }
}
