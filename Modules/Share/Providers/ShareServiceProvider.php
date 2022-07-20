<?php

namespace Modules\Share\Providers;

use Illuminate\Support\ServiceProvider;
use Modules\Share\Console\Commands\MakeModule;

class ShareServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->commands([
            MakeModule::class
        ]);
    }
}
