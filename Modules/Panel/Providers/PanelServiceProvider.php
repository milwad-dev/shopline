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
     *
     * @var string
     */
    public string $namespace = 'Modules\Panel\Http\Controllers';

    /**
     * Get view path.
     *
     * @var string
     */
    public string $viewPath = '/../Resources/Views/';

    /**
     * Get name.
     *
     * @var string
     */
    public string $name = 'Panel';

    /**
     * Get config path.
     *
     * @var string
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
     *
     * @var string
     */
    public string $routePath = '/../Routes/panel_routes.php';

    public function register()
    {
        $this->loadViewFiles();
        $this->loadConfigFiles();
        $this->loadRouteFiles();
        $this->loadPolicyFiles();
    }

    public function boot()
    {
        $this->app->booted(function () {
            $this->setMenuForPanel();
        });
    }

    private function loadViewFiles(): void
    {
        $this->loadViewsFrom(__DIR__ . $this->viewPath, $this->name);
    }

    private function loadConfigFiles(): void
    {
        $this->mergeConfigFrom(__DIR__ . $this->configPath, 'panelConfig');
    }

    private function loadRouteFiles(): void
    {
        Route::middleware($this->middlewareRoute)
            ->namespace($this->namespace)
            ->group(__DIR__ . $this->routePath);
    }

    private function loadPolicyFiles(): void
    {
        Gate::policy(Panel::class, PanelPolicy::class);
    }

    function setMenuForPanel(): void
    {
        config()->set('panelConfig.menus.panel', [ // Set menu for panel
            'title' => 'Panel',
            'icon' => 'home',
            'url' => route('panel.index'),
        ]);
    }
}
