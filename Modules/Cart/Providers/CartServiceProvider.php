<?php

namespace Modules\Cart\Providers;

use Illuminate\Support\Facades\Route;
use Illuminate\Support\ServiceProvider;

class CartServiceProvider extends ServiceProvider
{
    /**
     * Get namespace for cart controllers.
     *
     * @var string
     */
    private string $namespace = 'Modules\Cart\Http\Controllers';

    /**
     * Get route middleware.
     *
     * @var array|string[]
     */
    private array $routeMiddleware = ['web', 'verify'];

    /**
     * Get cart path.
     *
     * @var string
     */
    private string $cartPath = '/../Routes/cart_routes.php';

    /**
     * Register files.
     *
     * @return void
     */
    public function register()
    {
        Route::middleware($this->routeMiddleware)
            ->namespace($this->namespace)
            ->group(__DIR__.$this->cartPath);
    }
}
