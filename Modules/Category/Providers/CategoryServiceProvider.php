<?php

namespace Modules\Category\Providers;

use Illuminate\Support\Facades\Route;
use Illuminate\Support\ServiceProvider;

class CategoryServiceProvider extends ServiceProvider
{
    public string $namespace = 'Modules\Category\Http\Controllers';

    public function register()
    {
        $this->loadMigrationsFrom(__DIR__ . '/../Database/Migrations');
        $this->loadViewsFrom(__DIR__ . '/../Resources/Views/', 'Category');

        Route::middleware(['web', 'verify'])->namespace($this->namespace)
        ->group(__DIR__ . '/../Routes/category_routes.php');
    }

    public function boot()
    {
        config()->set('panelConfig.menus.categories', [
            'title' => 'Category',
            'icon' => 'git-commit',
            'url' => route('categories.index'),
        ]);
    }
}
