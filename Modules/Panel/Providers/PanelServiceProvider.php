<?php

namespace Modules\Panel\Providers;

use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\ServiceProvider;
use Modules\Panel\Models\Panel;
use Modules\Panel\Policies\PanelPolicy;

class PanelServiceProvider extends ServiceProvider
{
    /**
     * Get namespace for panel controller.
     */
    public string $namespace = 'Modules\Panel\Http\Controllers';

    /**
     * Get view path.
     */
    public string $viewPath = '/../Resources/Views/';

    /**
     * Get name.
     */
    public string $name = 'Panel';

    /**
     * Get config path.
     */
    public string $configPath = '/../Config/config.php';

    /**
     * Get middleware route.
     *
     * @var array|string[]
     */
    public array $middlewareRoute = ['web', 'verify'];

    /**
     * Get route path.
     */
    public string $routePath = '/../Routes/panel_routes.php';

    /**
     * Register panel files.
     *
     * @return void
     */
    public function register()
    {
        $this->loadViewFiles();
        $this->loadConfigFiles();
        $this->loadRouteFiles();
        $this->loadPolicyFiles();
    }

    /**
     * Boot panel service provider.
     *
     * @return void
     */
    public function boot()
    {
        $this->app->booted(function () {
            $this->setMenuForPanel();
        });
    }

    /**
     * Load panel view files.
     */
    private function loadViewFiles(): void
    {
        $this->loadViewsFrom(__DIR__.$this->viewPath, $this->name);
    }

    /**
     * Load panel config files.
     */
    private function loadConfigFiles(): void
    {
        $this->mergeConfigFrom(__DIR__.$this->configPath, 'panelConfig');
    }

    /**
     * Load panel route files.
     */
    private function loadRouteFiles(): void
    {
        Route::middleware($this->middlewareRoute)
            ->namespace($this->namespace)
            ->group(__DIR__.$this->routePath);
    }

    /**
     * Load panel policy files.
     */
    private function loadPolicyFiles(): void
    {
        Gate::policy(Panel::class, PanelPolicy::class);
    }

    /**
     * Set menu for panel.
     */
    private function setMenuForPanel(): void
    {
        config()->set('panelConfig.menus.panel', [
            'title' => 'Panel',
            'icon' => 'home',
            'url' => route('panel.index'),
        ]);
    }
}
