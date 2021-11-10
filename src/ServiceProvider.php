<?php

namespace Attla\SSO;

use Illuminate\Support\ServiceProvider as BaseServiceProvider;

class ServiceProvider extends BaseServiceProvider
{
    /**
     * Register the service provider
     *
     * @return void
     */
    public function register()
    {
        $this->mergeConfigFrom($this->configPath(), 'sso');
        $this->registerNamespaces();
        $this->loadRoutesFrom(__DIR__ . '/routes.php');
    }

    /**
     * Bootstrap the application events
     *
     * @return void
     */
    public function boot()
    {
        // Config
        $this->publishes([
            $this->configPath() => $this->app->configPath('sso.php'),
        ], 'attla/sso/config');

        // Views
        $viewsPath = __DIR__ . '/../views';
        $this->publishes([
            $viewsPath => $this->app->resourcePath('views/sso'),
        ], 'attla/sso/views');

        // Migrations
        $migrationsPath = __DIR__ . '/../database/migrations';
        $this->publishes([
            $migrationsPath => $this->app->databasePath('migrations'),
        ], 'attla/sso/migrations');
        $this->loadMigrationsFrom($migrationsPath);
    }

    /**
     * Get config path
     *
     * @param bool
     */
    protected function configPath()
    {
        return __DIR__ . '/../config/sso.php';
    }

    /**
     * Set Attla view namespaces
     *
     * @return void
     */
    private function registerNamespaces()
    {
        $this->app['view']->addNamespace('sso', collect($this->app['config']['view.paths'])->map(function ($path) {
            if (is_dir($flashPath = "$path/sso")) {
                return $flashPath;
            }
        })->filter()
        ->push(__DIR__ . '/../views')
        ->all());
    }
}
