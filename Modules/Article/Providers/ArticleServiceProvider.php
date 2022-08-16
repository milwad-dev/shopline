<?php

namespace Modules\Article\Providers;

use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\ServiceProvider;
use Modules\Article\Models\Article;
use Modules\Article\Policies\ArticlePolicy;

class ArticleServiceProvider extends ServiceProvider
{
    public string $namespace = 'Modules\Article\Http\Controllers';

    public function register()
    {
        $this->loadMigrationsFrom(__DIR__ . '/../Database/Migrations');
        $this->loadViewsFrom(__DIR__ . '/../Resources/Views/', 'Article');

        Route::middleware(['web', 'verify'])->namespace($this->namespace)
        ->group(__DIR__ . '/../Routes/article_routes.php');
        Gate::policy(Article::class, ArticlePolicy::class);
    }

    public function boot()
    {
        config()->set('panelConfig.menus.articles', [ // Set menu for panel
            'title' => 'Article',
            'icon' => 'book',
            'url' => route('articles.index'),
        ]);
    }
}
