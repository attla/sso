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

        $config = $this->app['config'];
        $mode = $config->get('sso.mode', 'client');

        if ($mode === 'server') {
            $this->loadRoutesFrom(__DIR__ . '/routes.php');
        }
        // if (in_array($mode, ['client', 'server'])) {
        //     $this->loadRoutesFrom(__DIR__ . "/routes/$mode.php");
        // }
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

        $config = $this->app['config'];
        if ($config->get('sso.mode') == 'server') {
            $this->loadMigrationsFrom($migrationsPath);
        }

        // Seeders
        // $this->publishes([
        //     __DIR__ . '/../stubs/seeds' => $this->app->databasePath('seeders'),
        // ], 'attla/sso/seeds');

        //Models
        // $this->publishes([
        //     __DIR__ . '/../stubs/Models' => $this->app->path('Models'),
        // ], 'attla/sso/models');

        //Models
        // $this->publishes([
        //     __DIR__ . '/../stubs/Middlewares' => $this->app->path('Http/Middleware'),
        // ], 'attla/sso/middlewares');
    }

    /**
     * Check if the application is in debug mode
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
