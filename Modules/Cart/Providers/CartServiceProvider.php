<?php

namespace Modules\Cart\Providers;

use Illuminate\Support\Facades\Route;
use Illuminate\Support\ServiceProvider;

class CartServiceProvider extends ServiceProvider
{
    /**
     * Register files.
     *
     * @return void
     */
    public function register()
    {
        Route::middleware(['web', 'verify'])
            ->namespace('Modules\Cart\Http\Controllers')
            ->group(__DIR__ . '/../Routes/cart_routes.php');
    }
}
