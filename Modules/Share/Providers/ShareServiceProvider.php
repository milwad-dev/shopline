<?php

namespace Modules\Share\Providers;

use Illuminate\Support\ServiceProvider;
use Modules\Share\Console\Commands\MakeModule;

class ShareServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->loadViewsFrom(__DIR__ . '/../Resources/Views/', 'Share');
        $this->commands([
            MakeModule::class
        ]);
        $this->loadShareComponents();
    }

    private function loadShareComponents()
    {
        $this->loadViewComponentsAs('share', [

        ]);
    }
}
