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
        // Migrations
        $migrationsPath = __DIR__ . '/../database/migrations';
        $this->publishes([
            $migrationsPath => $this->app->databasePath('migrations'),
        ], 'attla/sso/migrations');

        $this->loadMigrationsFrom($migrationsPath);

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
