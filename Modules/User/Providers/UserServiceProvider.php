<?php

namespace Modules\User\Providers;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\ServiceProvider;

class UserServiceProvider extends ServiceProvider
{
    public string $namespace = 'Modules\User\Http\Controllers';

    public function register()
    {
        $this->loadMigrationsFrom(__DIR__ . '/../Database/Migrations');

        Factory::guessFactoryNamesUsing(static function (string $modelName) {
            return 'Modules\User\Database\\Factories\\' . class_basename($modelName) . 'Factory';
        });
    }
}
