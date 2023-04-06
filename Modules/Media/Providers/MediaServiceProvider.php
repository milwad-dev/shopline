<?php

namespace Modules\Media\Providers;

use Illuminate\Support\Facades\Route;
use Illuminate\Support\ServiceProvider;

class MediaServiceProvider extends ServiceProvider
{
    protected string $namespace = 'Modules\Media\Http\Controllers';

    public function register()
    {
        $this->loadMigrationsFrom(__DIR__.'/../Database/Migrations');
        $this->mergeConfigFrom(__DIR__.'/../Config/mediaFile.php', 'mediaFile');

        Route::middleware(['web', 'verify'])->namespace($this->namespace)
            ->group(__DIR__.'/../Routes/media_routes.php');
    }
}
