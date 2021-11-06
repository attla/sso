<?php

$ssoConfig = [
    // accepted modes are 'client' or 'server'
    'mode'              => 'client',
    'server'            => 'http://localhost/',
    'route-uri' => [
        'identifier'    => 'identifier',// identifies if the user is logged in and handles the return
        'login'         => 'login',     // login page
        'register'      => 'register',  // register page
        'logout'        => 'logout',    // logout route
    ],
    // for server mode only
    'redirect'          => 'hub.dashboard',
    'route-group' => [
        'as'            => 'sso.',
        'prefix'        => '/sso',
        'namespace'     => 'Attla\\SSO\\Controllers',
        'middleware'    => [
            'web',
        ],
    ],
    'validation' => [
        'sign' => [
            'email'     => 'required|email',
            'password'  => 'required',
        ],
        'signup' => [
            'name'      => 'required',
            'email'     => 'required|email|unique:users,email',
            'password'  => 'required|min:5',
            'password_confirmation' => 'required|min:5|same:password',
        ],
    ],
    'seo' => [
        'keywords'      => '',
        ''              => '',
        ''              => '',
        ''              => '',
        ''              => '',
        ''              => '',
        ''              => '',
        ''              => '',
        ''              => '',
    ],
];

$routes = [];
foreach ($ssoConfig['route-uri'] as $name => $uri) {
    $routes[$name] = $ssoConfig['server'] . $uri;
}

$ssoConfig['route'] = $routes;

return $ssoConfig;
