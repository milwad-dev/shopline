<?php

namespace Modules\Category\Providers;

use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\ServiceProvider;
use Modules\Category\Models\Category;
use Modules\Category\Policies\CategoryPolicy;
use Modules\Category\Repositories\CategoryRepoEloquent;
use Modules\Category\Repositories\CategoryRepoEloquentInterface;
use Modules\Category\Services\CategoryService;
use Modules\Category\Services\CategoryServiceInterface;

class CategoryServiceProvider extends ServiceProvider
{
    /**
     * Get namespace for category controllers.
     *
     * @var string
     */
    private string $namespace = 'Modules\Category\Http\Controllers';

    /**
     * Get migration path.
     *
     * @var string
     */
    private string $migrationPath = '/../Database/Migrations';

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
    private string $name = 'Category';

    /**
     * Get route path.
     *
     * @var string
     */
    private string $routePath = '/../Routes/category_routes.php';

    /**
     * Get midddleware route.
     *
     * @var array|string[]
     */
    private array $middlewareRoute = ['web', 'verify'];

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
     * Load migration files.
     *
     * @return void
     */
    private function loadMigrationFiles(): void
    {
        $this->loadMigrationsFrom(__DIR__.$this->migrationPath);
    }

    /**
     * Load view files.
     *
     * @return void
     */
    private function loadViewFiles(): void
    {
        $this->loadViewsFrom(__DIR__.$this->viewPath, $this->name);
    }

    /**
     * Load route files.
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
     * Load policy files.
     *
     * @return void
     */
    private function loadPolicyFiles(): void
    {
        Gate::policy(Category::class, CategoryPolicy::class);
    }

    /**
     * Set menu for panel.
     *
     * @return void
     */
    private function setMenuForPanel(): void
    {
        config()->set('panelConfig.menus.categories', [
            'title' => 'Category',
            'icon'  => 'git-commit',
            'url'   => route('categories.index'),
        ]);
    }

    /**
     * Set factory.
     *
     * @return void
     */
    private function setFactory()
    {
        config()->set('shareConfig.factories.category', [
            'model'  => Category::class,
            'count'  => 1,
        ]);
    }

    /**
     * Bind repository files into interface.
     *
     * @return void
     */
    private function bindRepository()
    {
        $this->app->bind(CategoryRepoEloquentInterface::class, CategoryRepoEloquent::class);
    }

    /**
     * Bind service files into interface.
     *
     * @return void
     */
    private function bindService()
    {
        $this->app->bind(CategoryServiceInterface::class, CategoryService::class);
    }
}
