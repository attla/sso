<?php

app('router')->group(app('config')->get('sso.route-group', []), function ($router) {
    $routeUri = app('config')->get('sso.route-uri');
    $middlewares = app('config')->get('sso.middlewares');

    $router->get('/' . $routeUri['identifier'], [
        'uses' => 'AuthController@identifier',
        'as' => 'identifier',
    ])->middleware($middlewares['identifier'] ?? []);

    $router->get('/' . $routeUri['login'] . '/{token?}', [
        'uses' => 'AuthController@login',
        'as' => 'login',
    ])->middleware($middlewares['login'] ?? []);
    $router->post('/' . $routeUri['login'] . '/{token?}', [
        'uses' => 'AuthController@sign',
        'as' => 'sign',
    ])->middleware($middlewares['login'] ?? []);

    $router->get('/' . $routeUri['register'] . '/{token?}', [
        'uses' => 'AuthController@register',
        'as' => 'register',
    ])->middleware($middlewares['register'] ?? []);
    $router->post('/' . $routeUri['register'] . '/{token?}', [
        'uses' => 'AuthController@signup',
        'as' => 'signup',
    ])->middleware($middlewares['register'] ?? []);

    $router->get('/' . $routeUri['logout'], [
        'uses' => 'AuthController@logout',
        'as' => 'logout',
    ])->middleware($middlewares['logout'] ?? []);
});
