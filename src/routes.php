<?php

app('router')->group(app('config')->get('sso.route-group', []), function ($router) {
    $routeUri = app('config')->get('sso.route-uri');

    $router->get('/' . $routeUri['identifier'], [
        'uses' => 'AuthController@identifier',
        'as' => 'identifier',
    ]);

    $router->get('/' . $routeUri['login'] . '/{token?}', [
        'uses' => 'AuthController@login',
        'as' => 'login',
    ]);
    $router->post('/' . $routeUri['login'] . '/{token?}', [
        'uses' => 'AuthController@sign',
        'as' => 'sign',
    ]);

    $router->get('/' . $routeUri['register'], [
        'uses' => 'AuthController@register',
        'as' => 'register',
    ]);
    $router->post('/' . $routeUri['register'] . '/{token?}', [
        'uses' => 'AuthController@signup',
        'as' => 'signup',
    ]);

    $router->get('/' . $routeUri['logout'], [
        'uses' => 'AuthController@logout',
        'as' => 'logout',
    ]);
});
