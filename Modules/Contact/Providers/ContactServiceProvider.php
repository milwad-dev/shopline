<?php

namespace Modules\Contact\Providers;

use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\ServiceProvider;
use Modules\Contact\Models\Contact;
use Modules\Contact\Policies\ContactPolicy;
use Modules\Contact\Repositories\ContactRepoEloquent;
use Modules\Contact\Repositories\ContactRepoInterface;
use Modules\Contact\Services\ContactService;
use Modules\Contact\Services\ContactServiceInterface;

class ContactServiceProvider extends ServiceProvider
{
    /**
     * Get namespace for contacts controllers.
     */
    private string $namespace = 'Modules\Contact\Http\Controllers';

    /**
     * Get migration path.
     */
    private string $migrationPath = '/../Database/Migrations';

    /**
     * Get view path.
     */
    private string $viewPath = '/../Resources/Views/';

    /**
     * Get route path.
     */
    private string $routePath = '/../Routes/contact_routes.php';

    /**
     * Get name.
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
     */
    private function loadMigrationFiles(): void
    {
        $this->loadMigrationsFrom(__DIR__.$this->migrationPath);
    }

    /**
     * Load view files.
     */
    private function loadViewFiles(): void
    {
        $this->loadViewsFrom(__DIR__.$this->viewPath, $this->name);
    }

    /**
     * Load route files.
     */
    private function loadRouteFiles(): void
    {
        Route::middleware($this->routeMiddleware)
            ->namespace($this->namespace)
            ->group(__DIR__.$this->routePath);
    }

    /**
     * Load policy files.
     */
    private function loadPolicyFiles(): void
    {
        Gate::policy(Contact::class, ContactPolicy::class);
    }

    /**
     * Bind service into interface.
     */
    private function bindService(): void
    {
        $this->app->bind(ContactServiceInterface::class, ContactService::class);
    }

    /**
     * Bind repository into interface.
     */
    private function bindRepository(): void
    {
        $this->app->bind(ContactRepoInterface::class, ContactRepoEloquent::class);
    }

    /**
     * Set menu for panel.
     */
    private function setMenuForPanel(): void
    {
        config()->set('panelConfig.menus.contacts', [
            'title' => 'Contact',
            'icon' => 'phone',
            'url' => route('contacts.index'),
        ]);
    }

    /**
     * Set factory.
     *
     * @return void
     */
    private function setFactory()
    {
        config()->set('shareConfig.factories.contact', [
            'model' => Contact::class,
            'count' => 1,
        ]);
    }
}
