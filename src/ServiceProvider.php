<?php

namespace Attla\SSO;

use Illuminate\Support\ServiceProvider as BaseServiceProvider;

class ServiceProvider extends BaseServiceProvider
{
    /**
     * Bootstrap the application events
     *
     * @return void
     */
    public function boot()
    {
        $configPath = __DIR__ . '/../config/sso.php';
        $this->publishes([
            $configPath => $this->app->configPath('sso.php'),
        ], 'attla/sso/config');

        $this->mergeConfigFrom(
            $configPath,
            'sso'
        );

        $config = $this->app['config'];

        // Migrations
        $migrationsPath = __DIR__ . '/../database/migrations';
        $this->publishes([
            $migrationsPath => $this->app->databasePath('migrations'),
        ], 'attla/sso/migrations');

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
}
