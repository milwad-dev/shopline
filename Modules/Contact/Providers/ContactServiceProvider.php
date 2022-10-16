<?php

namespace Modules\Contact\Providers;

use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\ServiceProvider;
use Modules\Contact\Models\Contact;
use Modules\Contact\Policies\ContactPolicy;
use Modules\Contact\Services\ContactService;
use Modules\Contact\Services\ContactServiceInterface;

class ContactServiceProvider extends ServiceProvider
{
    public string $namespace = 'Modules\Contact\Http\Controllers';

    public function register()
    {
        $this->loadMigrationsFrom(__DIR__ . '/../Database/Migrations');
        $this->loadViewsFrom(__DIR__ . '/../Resources/Views/', 'Contact');

        Route::middleware(['web', 'verify'])
            ->namespace($this->namespace)
            ->group(__DIR__ . '/../Routes/contact_routes.php');
        Gate::policy(Contact::class, ContactPolicy::class);
        $this->app->bind(ContactServiceInterface::class, ContactService::class);
    }
}
