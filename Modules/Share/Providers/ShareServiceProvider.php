<?php

namespace Modules\Share\Providers;

use Illuminate\Support\ServiceProvider;
use Modules\Share\Console\Commands\MakeModule;

class ShareServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->loadViewsFrom(__DIR__ . '/../Resources/Views/', 'Share');
        $this->loadCommands();
        $this->loadShareComponents();
    }

    private function loadShareComponents()
    {
        $this->loadViewComponentsAs('share', [
            \Modules\Share\Components\Share\Error::class,
        ]);
    }

    private function loadCommands()
    {
        $this->commands([
            MakeModule::class
        ]);
    }
}
