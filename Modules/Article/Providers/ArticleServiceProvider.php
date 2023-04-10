<?php

namespace Modules\Article\Providers;

use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\ServiceProvider;
use Modules\Article\Models\Article;
use Modules\Article\Policies\ArticlePolicy;
use Modules\Article\Repositories\ArticleRepoEloquent;
use Modules\Article\Repositories\ArticleRepoEloquentInterface;
use Modules\Article\Services\ArticleService;
use Modules\Article\Services\ArticleServiceInterface;

class ArticleServiceProvider extends ServiceProvider
{
    /**
     * Get namespace for article controllers.
     *
     * @var string
     */
    private string $namespace = 'Modules\Article\Http\Controllers';

    /**
     * Get migration path.
     *
     * @var string
     */
    private string $migrationPath = '/../Database/Migrations';

    /**
     * Get middleware route.
     *
     * @var array|string[]
     */
    private array $middlewareRoute = ['web', 'verify'];

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
    private string $name = 'Article';

    /**
     * Get route path.
     *
     * @var string
     */
    private string $routePath = '/../Routes/article_routes.php';

    /**
     * Register files.
     *
     * @return void
     */
    public function register()
    {
        $this->loadMigrationFiles();
        $this->loadViewFiles();
        $this->loadRouteFiles();
        $this->loadPolicyFiles();

        $this->bindRepository();
        $this->bindService();
    }

    /**
     * Boot service provider.
     *
     * @return void
     */
    public function boot()
    {
        $this->setMenuForPanel();
        $this->setFactory();
    }

    /**
     * Load article policy files.
     *
     * @return void
     */
    private function loadPolicyFiles(): void
    {
        Gate::policy(Article::class, ArticlePolicy::class);
    }

    /**
     * Load article route files.
     *
     * @return void
     */
    private function loadRouteFiles(): void
    {
        Route::middleware($this->middlewareRoute)
            ->namespace($this->namespace)
            ->group(__DIR__.$this->routePath);
    }

    /**
     * Load article view files.
     *
     * @return void
     */
    private function loadViewFiles(): void
    {
        $this->loadViewsFrom(__DIR__.$this->viewPath, $this->name);
    }

    /**
     * Load article migration files.
     *
     * @return void
     */
    private function loadMigrationFiles(): void
    {
        $this->loadMigrationsFrom(__DIR__.$this->migrationPath);
    }

    /**
     * Set menu for panel.
     *
     * @return void
     */
    private function setMenuForPanel(): void
    {
        config()->set('panelConfig.menus.articles', [
            'title' => 'Article',
            'icon'  => 'book',
            'url'   => route('articles.index'),
        ]);
    }

    /**
     * Set factory.
     *
     * @return void
     */
    private function setFactory()
    {
        config()->set('shareConfig.factories.article', [
            'model'  => Article::class,
            'count'  => 1,
        ]);
    }

    /**
     * Bind article repository.
     *
     * @return void
     */
    private function bindRepository()
    {
        $this->app->bind(ArticleRepoEloquentInterface::class, ArticleRepoEloquent::class);
    }

    /**
     * Bind article service.
     *
     * @return void
     */
    private function bindService()
    {
        $this->app->bind(ArticleServiceInterface::class, ArticleService::class);
    }
}
