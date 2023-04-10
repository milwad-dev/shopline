<?php

namespace Modules\Slider\Providers;

use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\ServiceProvider;
use Modules\Slider\Models\Slider;
use Modules\Slider\Policies\SliderPolicy;
use Modules\Slider\Repositories\SliderRepoEloquent;
use Modules\Slider\Repositories\SliderRepoEloquentInterface;
use Modules\Slider\Services\SliderService;
use Modules\Slider\Services\SliderServiceInterface;

class SliderServiceProvider extends ServiceProvider
{
    /**
     * Get namespace for slider controllers.
     *
     * @var string
     */
    private string $namespace = 'Modules\Slider\Http\Controllers';

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
    private string $name = 'Slider';

    /**
     * Get middleware route.
     *
     * @var array|string[]
     */
    private array $middlewareRoute = ['web', 'verify'];

    /**
     * Get route path.
     *
     * @var string
     */
    private string $routePath = '/../Routes/slider_routes.php';

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

        $this->bindRepository();
        $this->bindService();
    }

    /**
     * Boot service provider files.
     *
     * @return void
     */
    public function boot()
    {
        $this->setMenuForPanel();
        $this->setFactory();
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
        Route::middleware($this->middlewareRoute)
            ->namespace($this->namespace)
            ->group(__DIR__.$this->routePath);
    }

    /**
     * Set user menu in panel from config file.
     *
     * @return void
     */
    private function setMenuForPanel(): void
    {
        config()->set('panelConfig.menus.sliders', [
            'title' => 'Sliders',
            'icon'  => 'file',
            'url'   => route('sliders.index'),
        ]);
    }

    /**
     * Set factory.
     *
     * @return void
     */
    private function setFactory()
    {
        config()->set('shareConfig.factories.slider', [
            'model'  => Slider::class,
            'count'  => 1,
        ]);
    }

    /**
     * Load slider policy files.
     *
     * @return void
     */
    private function loadPolicyFiles()
    {
        Gate::policy(Slider::class, SliderPolicy::class);
    }

    /**
     * Bind repository.
     *
     * @return void
     */
    private function bindRepository()
    {
        $this->app->bind(SliderRepoEloquentInterface::class, SliderRepoEloquent::class);
    }

    /**
     * Bind repository.
     *
     * @return void
     */
    private function bindService()
    {
        $this->app->bind(SliderServiceInterface::class, SliderService::class);
    }
}
