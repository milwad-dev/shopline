<?php

namespace Modules\Product\Providers;

use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\ServiceProvider;
use Modules\Product\Models\Product;
use Modules\Product\Policies\ProductPolicy;
use Modules\Product\Repositories\ProductRepoEloquent;
use Modules\Product\Repositories\ProductRepoEloquentInterface;
use Modules\Product\Services\ProductService;
use Modules\Product\Services\ProductServiceInterface;

class ProductServiceProvider extends ServiceProvider
{
    /**
     * Get namespace for controllers.
     *
     * @var string
     */
    private string $namespace = 'Modules\Product\Http\Controllers';

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
    private string $name = 'Product';

    /**
     * Get route path.
     *
     * @var string
     */
    private string $routePath = '/../Routes/product_routes.php';

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
        $this->loadMigrationFiles();
        $this->loadViewFiles();
        $this->loadPolicyFiles();
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
        $this->setUpMenuForPanel();
        $this->setFactory();
    }

    /**
     * Bind product repository.
     *
     * @return void
     */
    private function bindRepository()
    {
        $this->app->bind(ProductRepoEloquentInterface::class, ProductRepoEloquent::class);
    }

    /**
     * Bind product service.
     *
     * @return void
     */
    private function bindService()
    {
        $this->app->bind(ProductServiceInterface::class, ProductService::class);
    }

    /**
     * Load product migration files.
     *
     * @return void
     */
    private function loadMigrationFiles(): void
    {
        $this->loadMigrationsFrom(__DIR__.$this->migrationPath);
    }

    /**
     * Load product view files.
     *
     * @return void
     */
    private function loadViewFiles(): void
    {
        $this->loadViewsFrom(__DIR__.$this->viewPath, $this->name);
    }

    /**
     * Load product policy files.
     *
     * @return void
     */
    private function loadPolicyFiles(): void
    {
        Gate::policy(Product::class, ProductPolicy::class);
    }

    /**
     * Load product route files.
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
    private function setUpMenuForPanel(): void
    {
        config()->set('panelConfig.menus.products', [
            'title' => 'Products',
            'icon'  => 'gift',
            'url'   => route('products.index'),
        ]);
    }

    /**
     * Set factory.
     *
     * @return void
     */
    private function setFactory()
    {
        config()->set('shareConfig.factories.product', [
            'model'  => Product::class,
            'count'  => 1,
        ]);
    }
}
