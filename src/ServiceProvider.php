<?php

namespace Attla\SSO;

use Illuminate\Http\Request;
use Illuminate\Support\{
    ServiceProvider as BaseServiceProvider,
    Str
};

class ServiceProvider extends BaseServiceProvider
{
    protected $router;
    protected $groupAs;

    /**
     * Create a new service provider instance.
     *
     * @param  \Illuminate\Contracts\Foundation\Application  $app
     * @return void
     */
    public function __construct($app)
    {
        $this->app = $app;

        $this->router = app('router');
        $this->groupAs = Resolver::getConfig('sso.route-group.as', 'sso.');
    }

    /**
     * Register the service provider
     *
     * @return void
     */
    public function register()
    {
        $this->mergeConfigFrom($this->configPath(), 'sso');
        $this->loadRoutes();
        $this->loadRoutesAliases();
    }

    /**
     * Bootstrap the application events
     *
     * @return void
     */
    public function boot()
    {
        $this->registerNamespaces();

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

    /**
     * Load SSO routes
     *
     * @return void
     */
    protected function loadRoutes()
    {
        $this->router->group(Resolver::getConfig('sso.route-group', [
            'as'            => 'sso.',
            'prefix'        => '/sso',
            'namespace'     => 'Attla\\SSO\\Controllers',
            'controller'    => 'AuthController',
            'middleware'    => [
                'web',
            ],
        ]), function () {
            $routes = Resolver::getConfig('sso.route') ?: [];
            $middlewares = Resolver::getConfig('sso.middlewares');


            foreach ($routes as $name => $path) {
                $this->registerRoute(
                    $name,
                    $path,
                    $middlewares
                );
            }

            foreach (
                [
                    'login' => 'sign',
                    'register' => 'signup',
                ] as $name => $action
            ) {
                $this->registerRoute(
                    $name,
                    $routes[$name] ?? $name,
                    $middlewares,
                    $action,
                    'post'
                );
            }
        });
    }

    /**
     * Register route
     *
     * @param string $name
     * @param string $path
     * @param array $middlewares
     * @param string $action
     * @param string $method
     *
     * @return void
     */
    protected function registerRoute(
        $name,
        $path,
        array $middlewares = [],
        $action = null,
        string $method = 'get'
    ) {
        $this->router->{$method}('/' . trim(trim($path), '/'), [
            'uses' => Str::camel($action ?: $name),
            'as' => $name,
        ])->middleware($middlewares[$name] ?? []);
    }

    /**
     * Load routes aliases
     *
     * @return void
     */
    protected function loadRoutesAliases()
    {
        collect(Resolver::getConfig('sso.route-alias', []))
            ->filter()
            ->map(function ($aliases, $route) {
                $aliases = is_array($aliases) ? $aliases : [$aliases];
                $routeName = $this->groupAs . $route;

                foreach (
                    collect($aliases)->map(function ($alias) {
                        return is_string($alias)
                            ? trim(trim($alias), '/')
                            : '';
                    })->filter()
                    ->all() as $uri
                ) {
                    if (
                        $this->router->has($routeName)
                        && !$this->router->has($uri = Str::slug($uri))
                    ) {
                        $this->router->name($uri)->get('/' . $uri, fn(Request $request) => redirect(route($routeName, [
                            'r' => Resolver::getRedirectFromRequest($request),
                        ])));
                    }
                }
            });
    }
}
