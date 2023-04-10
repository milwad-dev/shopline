<?php

namespace Modules\Contact\Providers;

use Illuminate\Support\Facades\{Gate, Route};
use Illuminate\Support\ServiceProvider;
use Modules\Contact\Models\Contact;
use Modules\Contact\Policies\ContactPolicy;
use Modules\Contact\Repositories\{ContactRepoEloquent, ContactRepoInterface};
use Modules\Contact\Services\{ContactService, ContactServiceInterface};

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
        Route::middleware($this->routeMiddleware)
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
        Gate::policy(Contact::class, ContactPolicy::class);
    }

    /**
     * Bind service into interface.
     *
     * @return void
     */
    private function bindService(): void
    {
        $this->app->bind(ContactServiceInterface::class, ContactService::class);
    }

    /**
     * Bind repository into interface.
     *
     * @return void
     */
    private function bindRepository(): void
    {
        $this->app->bind(ContactRepoInterface::class, ContactRepoEloquent::class);
    }

    /**
     * Set menu for panel.
     *
     * @return void
     */
    private function setMenuForPanel(): void
    {
        config()->set('panelConfig.menus.contacts', [
            'title' => 'Contact',
            'icon'  => 'phone',
            'url'   => route('contacts.index'),
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
            'model'  => Contact::class,
            'count'  => 1,
        ]);
    }
}
