<?php

namespace Modules\Discount\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Route;

class DiscountServiceProvider extends ServiceProvider
{
    public string $namespace = 'Modules\Discount\Http\Controllers';

    public function register()
    {
//        $this->loadMigrationsFrom(__DIR__ . '/../Database/Migrations');
        $this->loadViewsFrom(__DIR__ . '/../Resources/Views/', 'Discount');

        Route::middleware(['web', 'verify'])->namespace($this->namespace)
        ->group(__DIR__ . '/../Routes/discount_routes.php');
    }
}
