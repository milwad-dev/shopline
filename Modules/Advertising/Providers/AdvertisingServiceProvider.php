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
    /**
     * Get namespace for advertising controllers.
     *
     * @var string
     */
    private string $namespace = 'Modules\Advertising\Http\Controllers';

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
     * Get route path.
     *
     * @var string
     */
    private string $routePath = '/../Routes/advertising_routes.php';

    /**
     * Get name.
     *
     * @var string
     */
    private string $name = 'Advertising';

    /**
     * Get route middleware.
     *
     * @var array|string[]
     */
    private array $routeMiddleware = ['web', 'verify'];

    /**
     * Register files.
     *
     * @return void
     */
    public function register()
    {
        $this->loadPolicyFiles();
        $this->loadMigrationFiles();
        $this->loadViewFiles();
        $this->loadRouteFiles();

        $this->bindRepository();
        $this->bindService();
    }

    /**
     * Boot service provider.
     *
     * @return void
     */
    public function boot()
    {
        $this->setMenuForPanel();
        $this->setFactory();
    }

    /**
     * Set factory.
     *
     * @return void
     */
    private function setFactory()
    {
        config()->set('shareConfig.factories.advertising', [
            'model'  => Advertising::class,
            'count'  => 1,
        ]);
    }

    /**
     * bind repository into interface.
     *
     * @return void
     */
    private function bindRepository(): void
    {
        $this->app->bind(AdvertisingRepoEloquentInterface::class, AdvertisingRepoEloquent::class);
    }

    /**
     * Bind service into interface.
     *
     * @return void
     */
    private function bindService()
    {
        $this->app->bind(AdvertisingServiceInterface::class, AdvertisingService::class);
    }

    /**
     * Load policy files.
     *
     * @return void
     */
    private function loadPolicyFiles(): void
    {
        Gate::policy(Advertising::class, AdvertisingPolicy::class);
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
     * Set menu for panel.
     *
     * @return void
     */
    private function setMenuForPanel(): void
    {
        config()->set('panelConfig.menus.advertisings', [
            'title' => 'Advertising',
            'icon'  => 'youtube',
            'url'   => route('advertisings.index'),
        ]);
    }
}
