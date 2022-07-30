<?php

namespace Modules\Share\Providers;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\ServiceProvider;
use Modules\Share\Console\Commands\MakeModule;

class ShareServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->loadViewsFrom(__DIR__ . '/../Resources/Views/', 'Share');
        $this->loadCommands();
        $this->loadShareComponents();
        $this->loadAuthComponents();
        $this->loadPanelComponents();
        $this->loadFactories();
    }

    /**
     * Load components about share.
     *
     * @return void
     */
    private function loadShareComponents()
    {
        $this->loadViewComponentsAs('share', [
            \Modules\Share\Components\Share\Error::class,
        ]);
    }

    /**
     * Load components about auth.
     *
     * @return void
     */
    private function loadAuthComponents()
    {
        $this->loadViewComponentsAs('auth', [
            \Modules\Share\Components\Auth\Input::class,
            \Modules\Share\Components\Auth\Button::class,
        ]);
    }

    /**
     * Load components about panel.
     *
     * @return void
     */
    private function loadPanelComponents()
    {
        $this->loadViewComponentsAs('panel', [
            \Modules\Share\Components\Panel\ContentHeader::class,
            \Modules\Share\Components\Panel\Label::class,
        ]);
    }

    /**
     * Load commands.
     *
     * @return void
     */
    private function loadCommands()
    {
        $this->commands([
            MakeModule::class
        ]);
    }

    /**
     * Load factories.
     *
     * @return void
     */
    private function loadFactories()
    {
        Factory::guessFactoryNamesUsing(static function (string $modelName) {
            return 'Modules\Share\Database\\Factories\\' . class_basename($modelName) . 'Factory';
        });
    }
}
