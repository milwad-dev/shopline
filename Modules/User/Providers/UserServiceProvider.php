<?php

namespace Modules\User\Providers;

use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\ServiceProvider;
use Modules\User\Models\User;
use Modules\User\Policies\UserPolicy;
use Modules\User\Repositories\UserRepoEloquent;
use Modules\User\Repositories\UserRepoEloquentInterface;

class UserServiceProvider extends ServiceProvider
{
    /**
     * Namespace of user controllers.
     */
    private string $namespace = 'Modules\User\Http\Controllers';

    /**
     * Namespace of user view files.
     */
    private string $namespaceUserView = 'User';

    /**
     * Path of user migration files.
     */
    private string $migrationPath = '/../Database/Migrations';

    /**
     * Path of user view files.
     */
    private string $viewPath = '/../Resources/Views/';

    /**
     * Array of middleware routes.
     *
     * @var array|string[]
     */
    private array $middlewareRoute = ['web', 'verify'];

    /**
     * Get user model.
     */
    private string $model = User::class;

    /**
     * Get user policy.
     */
    private string $policy = UserPolicy::class;

    /**
     * Register user files.
     *
     * @return void
     */
    public function register()
    {
        $this->loadMigrationFiles();
        $this->loadViewFiles();
        $this->loadRouteFiles();
        $this->loadPolicyFiles();

        $this->bindRepositories();
    }

    /**
     * Boot user service provider.
     *
     * @return void
     */
    public function boot()
    {
        $this->setMenuForPanel();
        $this->setFactory();
    }

    /**
     * Load user migration files.
     */
    private function loadMigrationFiles(): void
    {
        $this->loadMigrationsFrom(__DIR__.$this->migrationPath);
    }

    /**
     * Load user view files.
     */
    private function loadViewFiles(): void
    {
        $this->loadViewsFrom(__DIR__.$this->viewPath, $this->namespaceUserView);
    }

    /**
     * Load user route files.
     */
    private function loadRouteFiles(): void
    {
        Route::middleware($this->middlewareRoute)->namespace($this->namespace)
            ->group(__DIR__.'/../Routes/user_routes.php');
    }

    /**
     * Load user policy files.
     */
    private function loadPolicyFiles(): void
    {
        Gate::policy($this->model, $this->policy);
    }

    /**
     * Set user menu in panel from config file.
     */
    private function setMenuForPanel(): void
    {
        config()->set('panelConfig.menus.users', [
            'title' => 'Users',
            'icon' => 'user',
            'url' => route('users.index'),
        ]);
    }

    /**
     * Set factory.
     *
     * @return void
     */
    private function setFactory()
    {
        config()->set('shareConfig.factories.user', [
            'model' => User::class,
            'count' => 1,
        ]);
    }

    /**
     * Bind repository.
     *
     * @return void
     */
    private function bindRepositories()
    {
        $this->app->bind(UserRepoEloquentInterface::class, UserRepoEloquent::class);
    }
}
