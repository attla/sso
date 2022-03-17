<?php

app('router')->group(app('config')->get('sso.route-group', [
    'as'            => 'sso.',
    'prefix'        => '/sso',
    'namespace'     => 'Attla\\SSO\\Controllers',
    'controller'    => 'AuthController',
    'middleware'    => [
        'web',
    ],
]), function ($router) {
    $routeUri = app('config')->get('sso.route-uri');
    $middlewares = app('config')->get('sso.middlewares');

    foreach ($routeUri ?: [] as $name => $path) {
        if (!\Str::startsWith($path, '/')) {
            $path = '/' . $path;
        }

        $router->get($path, [
            'uses' => \Str::camel($name),
            'as' => trim(\Str::snake($path, '-'), '/'),
        ])->middleware($middlewares[$name] ?? []);
    }

    foreach (
        [
            'login' => 'sign',
            'register' => 'signup',
        ] as $name => $action
    ) {
        $path = $routeUri[$name] ?: $name;
        if (!\Str::startsWith($path, '/')) {
            $path = '/' . $path;
        }

        $router->post($path, [
            'uses' => $action,
            'as' => $action,
        ])->middleware($middlewares[$name] ?? []);
    }
});
