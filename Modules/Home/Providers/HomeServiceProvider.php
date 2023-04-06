<?php

namespace Modules\Home\Providers;

use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\ServiceProvider;
use Modules\Home\Repositories\Advertising\{AdvertisingRepoEloquent, AdvertisingRepoEloquentInterface};
use Modules\Home\Repositories\Blog\{BlogRepoEloquent, BlogRepoEloquentInterface};
use Modules\Home\Repositories\Home\{HomeRepoEloquent, HomeRepoEloquentInterface};
use Modules\Home\Repositories\Product\{ProductRepoEloquent, ProductRepoEloquentInterface};

class HomeServiceProvider extends ServiceProvider
{
    /**
     * Get namespace for home controllers.
     *
     * @var string
     */
    private string $namespace = 'Modules\Home\Http\Controllers';

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
    private string $name = 'Home';

    /**
     * Get route path.
     *
     * @var string
     */
    private string $routePath = '/../Routes/home_routes.php';

    /**
     * Get middleware route.
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
        $this->loadViewFiles();
        $this->loadRouteFiles();

        $this->bindRepositories();
    }

    /**
     * Boot service provider.
     *
     * @return void
     */
    public function boot()
    {
        $this->setMenuForPanel();
        $this->loadViewComposerForHome();
    }

    /**
     * Load panel view files.
     *
     * @return void
     */
    private function loadViewFiles(): void
    {
        $this->loadViewsFrom(__DIR__.$this->viewPath, $this->name);
    }

    /**
     * Set menu for panel.
     *
     * @return void
     */
    private function setMenuForPanel(): void
    {
        config()->set('panelConfig.menus.home', [
            'title' => 'Home',
            'icon'  => 'home',
            'url'   => route('home.index'),
        ]);
    }

    /**
     * Load panel route files.
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
     * Bind repositories.
     *
     * @return void
     */
    private function bindRepositories()
    {
        $this->app->bind(HomeRepoEloquentInterface::class, HomeRepoEloquent::class);
        $this->app->bind(ProductRepoEloquentInterface::class, ProductRepoEloquent::class);
        $this->app->bind(AdvertisingRepoEloquentInterface::class, AdvertisingRepoEloquent::class);
        $this->app->bind(BlogRepoEloquentInterface::class, BlogRepoEloquent::class);
    }

    /**
     * Load query for view composer for home.
     *
     * @return void
     */
    private function loadViewComposerForHome()
    {
        $homeRepoEloquent = App::make(HomeRepoEloquentInterface::class);

        view()->composer(['Home::Home.section.header', 'Home::Home.section.footer'], static function ($view) use ($homeRepoEloquent) {
            $categories = $homeRepoEloquent->getLatestCategories();
            $view->with(['categories' => $categories]);
        });
    }
}
