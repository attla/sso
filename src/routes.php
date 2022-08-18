<?php

use Illuminate\Http\Request;
use Illuminate\Support\Str;

$config = config();
$router = app('router');
$groupAs = $config->get('sso.route-group.as', 'sso.');

app('router')->group($config->get('sso.route-group', [
    'as'            => 'sso.',
    'prefix'        => '/sso',
    'namespace'     => 'Attla\\SSO\\Controllers',
    'controller'    => 'AuthController',
    'middleware'    => [
        'web',
    ],
]), function () use ($router, $config) {
    $routeUri = $config->get('sso.route');
    $middlewares = $config->get('sso.middlewares');

    foreach ($routeUri ?: [] as $name => $path) {
        if (!Str::startsWith($path, '/')) {
            $path = '/' . $path;
        }

        $router->get($path, [
            'uses' => Str::camel($name),
            'as' => $name,
        ])->middleware($middlewares[$name] ?? []);
    }

    foreach (
        [
            'login' => 'sign',
            'register' => 'signup',
        ] as $name => $action
    ) {
        $path = $routeUri[$name] ?: $name;
        if (!Str::startsWith($path, '/')) {
            $path = '/' . $path;
        }

        $router->post($path, [
            'uses' => $action,
            'as' => $action,
        ])->middleware($middlewares[$name] ?? []);
    }
});

collect($config->get('sso.route-alias', []))
    ->filter()
    ->map(function ($aliases, $route) use ($router, $groupAs) {
        $aliases = is_array($aliases) ? $aliases : [$aliases];
        $routeName = $groupAs . $route;

        foreach (
            collect($aliases)->map(function ($alias) {
                return is_string($alias)
                    ? trim(trim($alias), '/')
                    : '';
            })->filter()
            ->all() as $uri
        ) {
            if (
                $router->has($routeName)
                && !$router->has($uri = Str::slug($uri))
            ) {
                $router->name($uri)->get('/' . $uri, fn(Request $request) => redirect(route($routeName, [
                    'redirect' => $request->redirect ?: $request->r ?: '',
                ])));
            }
        }
    });
