<?php

namespace Modules\Contact\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Route;

class ContactServiceProvider extends ServiceProvider
{
    public string $namespace = 'Modules\Contact\Http\Controllers';

    public function register()
    {
        $this->loadMigrationsFrom(__DIR__ . '/../Database/Migrations');
        $this->loadViewsFrom(__DIR__ . '/../Resources/Views/', 'Contact');

        Route::middleware(['web', 'verify'])
            ->namespace($this->namespace)
            ->group(__DIR__ . '/../Routes/contact_routes.php');
    }
}
