<?php

namespace Modules\Product\Providers;

use Illuminate\Support\Facades\Route;
use Illuminate\Support\ServiceProvider;

class ProductServiceProvider extends ServiceProvider
{
    public string $namespace = 'Modules\Product\Http\Controllers';

    public function register()
    {
        $this->loadMigrationsFrom(__DIR__ . '/../Database/Migrations');
        $this->loadViewsFrom(__DIR__ . '/../Resources/Views/', 'Product');

        Route::middleware(['web', 'verify'])->namespace($this->namespace)
        ->group(__DIR__ . '/../Routes/product_routes.php');
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
}
