<?php

namespace Modules\Comment\Providers;

use Illuminate\Support\Facades\Route;
use Illuminate\Support\ServiceProvider;
use Modules\Comment\Repositories\{CommentRepoEloquent, CommentRepoEloquentInterface};

class CommentServiceProvider extends ServiceProvider
{
    public string $namespace = 'Modules\Comment\Http\Controllers';

    public function register()
    {
        $this->loadMigrationsFrom(__DIR__ . '/../Database/Migrations');
        $this->loadViewsFrom(__DIR__ . '/../Resources/Views/', 'Comment');

        Route::middleware(['web', 'verify'])
            ->namespace($this->namespace)
            ->group(__DIR__ . '/../Routes/comment_routes.php');

        $this->app->bind(CommentRepoEloquentInterface::class, CommentRepoEloquent::class);
    }
}
