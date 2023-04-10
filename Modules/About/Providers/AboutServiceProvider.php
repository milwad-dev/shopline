<?php

namespace Modules\About\Providers;

use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\ServiceProvider;
use Modules\About\Models\About;
use Modules\About\Policies\AboutPolicy;

class AboutServiceProvider extends ServiceProvider
{
    /**
     * Get namespace for controllers.
     *
     * @var string
     */
    private string $namespace = 'Modules\About\Http\Controllers';

    /**
     * Get migration path.
     *
     * @var string
     */
    private string $migrationPath = '/../Database/Migrations';

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
    private string $name = 'About';

    /**
     * Get route path.
     *
     * @var string
     */
    private string $routePath = '/../Routes/about_routes.php';

    /**
     * Get route middleware.
     *
     * @var array|string[]
     */
    private array  $routeMiddleware = ['web', 'verify'];

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
        $this->loadPolicyFiles();
    }

    /**
     * Boot service provider.
     *
     * @return void
     */
    public function boot()
    {
        $this->setUpMenuForPanel();
        $this->setFactory();
    }

    /**
     * Set menu for panel.
     *
     * @return void
     */
    private function setUpMenuForPanel(): void
    {
        config()->set('panelConfig.menus.abouts', [
            'title' => 'About-us',
            'icon'  => 'menu',
            'url'   => route('abouts.index'),
        ]);
    }

    /**
     * Set factory.
     *
     * @return void
     */
    private function setFactory()
    {
        config()->set('shareConfig.factories.about', [
            'model'  => About::class,
            'count'  => 1,
        ]);
    }

    /**
     * Load migration files.
     *
     * @return void
     */
    private function loadMigrationFiles(): void
    {
        $this->loadMigrationsFrom(__DIR__.$this->migrationPath);
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
        Route::middleware($this->routeMiddleware)
            ->namespace($this->namespace)
            ->group(__DIR__.$this->routePath);
    }

    /**
     * Load policy files.
     *
     * @return void
     */
    private function loadPolicyFiles(): void
    {
        Gate::policy(About::class, AboutPolicy::class);
    }
}
