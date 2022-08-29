<?php

namespace Modules\Product\Providers;

use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\ServiceProvider;
use Modules\Product\Models\Product;
use Modules\Product\Policies\ProductPolicy;
use Modules\Product\Repositories\ProductRepoEloquent;
use Modules\Product\Repositories\ProductRepoEloquentInterface;

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
     * Get routes path.
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
        $this->loadMigrationsFrom(__DIR__ . $this->migrationPath);
        $this->loadViewsFrom(__DIR__ . $this->viewPath, $this->name);

        Gate::policy(Product::class, ProductPolicy::class);
        Route::middleware($this->routeMiddleware)
            ->namespace($this->namespace)
            ->group(__DIR__ . $this->routePath);
        $this->bindRepository();
    }

    /**
     * Set menu.
     *
     * @return void
     */
    public function boot()
    {
        config()->set('panelConfig.menus.products', [ // Set menu for panel
            'title' => 'Products',
            'icon'  => 'gift',
            'url'   => route('products.index'),
        ]);
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
}
