<?php

namespace Modules\Category\Providers;

use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\ServiceProvider;
use Modules\Category\Models\Category;
use Modules\Category\Policies\CategoryPolicy;

class CategoryServiceProvider extends ServiceProvider
{
    public string $namespace = 'Modules\Category\Http\Controllers';

    public function register()
    {
        $this->loadMigrationsFrom(__DIR__ . '/../Database/Migrations');
        $this->loadViewsFrom(__DIR__ . '/../Resources/Views/', 'Category');

        Route::middleware(['web', 'verify'])->namespace($this->namespace)
        ->group(__DIR__ . '/../Routes/category_routes.php');
        Gate::policy(Category::class, CategoryPolicy::class);
    }

    public function boot()
    {
        config()->set('panelConfig.menus.categories', [ // Set menu for panel
            'title' => 'Category',
            'icon' => 'git-commit',
            'url' => route('categories.index'),
        ]);
    }
}
