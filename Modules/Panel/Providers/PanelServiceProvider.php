<?php

namespace Modules\Panel\Providers;

use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\ServiceProvider;
use Modules\Panel\Models\Panel;
use Modules\Panel\Policies\PanelPolicy;

class PanelServiceProvider extends ServiceProvider
{
    public string $namespace = 'Modules\Panel\Http\Controllers';

    public function register()
    {
        $this->loadViewsFrom(__DIR__ . '/../Resources/Views/', 'Panel');
        $this->mergeConfigFrom(__DIR__ . '/../Config/config.php', 'panelConfig');

        Route::middleware(['web', 'verify'])->namespace($this->namespace)
            ->group(__DIR__ . '/../Routes/panel_routes.php');
        Gate::policy(Panel::class, PanelPolicy::class);
    }

    public function boot()
    {
        $this->app->booted(static function () {
            config()->set('panelConfig.menus.panel', [ // Set menu for panel
                'title' => 'Panel',
                'icon'  => 'home',
                'url'   => route('panel.index'),
            ]);
        });
    }
}
