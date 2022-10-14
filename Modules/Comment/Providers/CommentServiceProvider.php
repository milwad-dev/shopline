<?php

namespace Modules\Comment\Providers;

use Illuminate\Support\Facades\Route;
use Illuminate\Support\ServiceProvider;
use Modules\Comment\Repositories\{CommentRepoEloquent, CommentRepoEloquentInterface};

class CommentServiceProvider extends ServiceProvider
{
    /**
     * Get namespace for comment controllers.
     *
     * @var string
     */
    private string $namespace = 'Modules\Comment\Http\Controllers';

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
     * Get route path.
     *
     * @var string
     */
    private string $routePath = '/../Routes/comment_routes.php';

    /**
     * Get name.
     *
     * @var string
     */
    private string $name = 'Comment';

    private array $routeMiddleware = ['web', 'verify'];

    public function register()
    {
        $this->loadMigrationFiles();
        $this->loadViewFiles();
        $this->loadRouteFiles();

        $this->bindRepository();
    }

    public function boot()
    {
        $this->setMenuForPanel();
    }

    private function setMenuForPanel(): void
    {
        config()->set('panelConfig.menus.comments', [
            'title' => 'Comment',
            'icon'  => 'conversation',
            'url'   => route('comments.index'),
        ]);
    }

    private function loadMigrationFiles(): void
    {
        $this->loadMigrationsFrom(__DIR__ . $this->migrationPath);
    }

    private function loadViewFiles(): void
    {
        $this->loadViewsFrom(__DIR__ . $this->viewPath, $this->name);
    }

    private function loadRouteFiles(): void
    {
        Route::middleware($this->routeMiddleware)
            ->namespace($this->namespace)
            ->group(__DIR__ . $this->routePath);
    }

    private function bindRepository(): void
    {
        $this->app->bind(CommentRepoEloquentInterface::class, CommentRepoEloquent::class);
    }
}
