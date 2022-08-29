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
    public string $namespace = 'Modules\Product\Http\Controllers';

    public function register()
    {
        $this->loadMigrationsFrom(__DIR__ . '/../Database/Migrations');
        $this->loadViewsFrom(__DIR__ . '/../Resources/Views/', 'Product');

        Gate::policy(Product::class, ProductPolicy::class);
        Route::middleware(['web', 'verify'])->namespace($this->namespace)
        ->group(__DIR__ . '/../Routes/product_routes.php');
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
