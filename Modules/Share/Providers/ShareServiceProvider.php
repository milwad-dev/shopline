<?php

namespace Modules\Share\Providers;

use Illuminate\Support\ServiceProvider;
use Modules\Share\Console\Commands\MakeModule;

class ShareServiceProvider extends ServiceProvider
{
    /**
     * Get migration path.
     *
     * @var string
     */
    private string $migrationPath = '/../Database/Migrations/';

    /**
     * Get view path.
     *
     * @var string
     */
    private string $viewPath = '/../Resources/Views/';

    /**
     * Get name.
     *
     * @var string
     */
    private string $name = 'Share';

    /**
     * @return void
     */
    public function register()
    {
        $this->loadViewFiles();
        $this->loadMigrationFiles();
        $this->loadCommandFiles();
        $this->loadConfigFiles();

        $this->loadShareComponents();
        $this->loadAuthComponents();
        $this->loadPanelComponents();
        $this->loadHomeComponents();
    }

    /**
     * Load commands.
     *
     * @return void
     */
    private function loadCommandFiles()
    {
        $this->commands([
            MakeModule::class,
        ]);
    }

    /**
     * Load migrations.
     *
     * @return void
     */
    private function loadMigrationFiles()
    {
        $this->loadMigrationsFrom(__DIR__.$this->migrationPath);
    }

    /**
     * Load share view files.
     *
     * @return void
     */
    private function loadViewFiles(): void
    {
        $this->loadViewsFrom(__DIR__.$this->viewPath, $this->name);
    }

    /**
     * Load share config files.
     *
     * @return void
     */
    private function loadConfigFiles()
    {
        $this->mergeConfigFrom(__DIR__.'/../Config/config.php', 'shareConfig');
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
            \Modules\Share\Components\Panel\Input::class,
            \Modules\Share\Components\Panel\Button::class,
            \Modules\Share\Components\Panel\Select::class,
            \Modules\Share\Components\Panel\Textarea::class,
            \Modules\Share\Components\Panel\File::class,
            \Modules\Share\Components\Panel\AllError::class,
        ]);
    }

    /**
     * Load components about home.
     *
     * @return void
     */
    private function loadHomeComponents()
    {
        $this->loadViewComponentsAs('home', [
            \Modules\Share\Components\Home\TopSellProduct::class,
        ]);
    }
}
