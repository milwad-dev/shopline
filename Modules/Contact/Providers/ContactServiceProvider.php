<?php

namespace Modules\Contact\Providers;

use Illuminate\Support\Facades\{Gate, Route};
use Illuminate\Support\ServiceProvider;
use Modules\Contact\Models\Contact;
use Modules\Contact\Policies\ContactPolicy;
use Modules\Contact\Services\{ContactService, ContactServiceInterface};
use Modules\Contact\Repositories\{ContactRepoEloquent, ContactRepoInterface};

class ContactServiceProvider extends ServiceProvider
{
    /**
     * Get namespace for contacts controllers.
     *
     * @var string
     */
    private string $namespace = 'Modules\Contact\Http\Controllers';

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
    private string $routePath = '/../Routes/contact_routes.php';

    /**
     * Get name.
     *
     * @var string
     */
    private string $name = 'Contact';

    /**
     * Get route middleware.
     *
     * @var array|string[]
     */
    private array $routeMiddleware = ['web', 'verify'];

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

        $this->bindService();
        $this->bindRepository();
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

    private function loadPolicyFiles(): void
    {
        Gate::policy(Contact::class, ContactPolicy::class);
    }

    private function bindService(): void
    {
        $this->app->bind(ContactServiceInterface::class, ContactService::class);
    }

    private function bindRepository(): void
    {
        $this->app->bind(ContactRepoInterface::class, ContactRepoEloquent::class);
    }
}
