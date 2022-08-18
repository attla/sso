<?php

use Illuminate\Validation\Rules\Password;

return [

    // Endpoints URI
    'route' => [
        // identifies if the user is logged in and handles the return
        'identifier'    => 'identifier',
        // login page
        'login'         => 'login',
        // register page
        'register'      => 'register',
        // logout route
        'logout'        => 'logout',
    ],

    // Endpoint URI or route name to be redirected after authentication
    'redirect'          => 'dashboard',

    // Route group configuration
    'route-group' => [
        'as'            => 'sso.',
        'prefix'        => '/sso',
        'namespace'     => 'Attla\\SSO\\Controllers',
        'controller'    => 'AuthController',
        'middleware'    => [
            'web',
        ],
    ],

    // URI aliases for redirect to sso routes
    'route-alias' => [
        'identifier'    => [
            // 'alias-uri',
        ],
        'login'         => [],
        'register'      => [],
        'logout'        => [],
    ],

    // Routes middlewares
    'middlewares' => [
        'identifier' => [
            //
        ],
        'login' => [
            //
        ],
        'register' => [
            //
        ],
        'logout' => [
            //
        ],
    ],

    // Validation rules
    'validation' => [
        'sign' => [
            'email'     => 'required|email',
            'password'  => 'required',
        ],
        'signup' => [
            'name'      => 'required',
            'email'     => 'required|email|unique:users,email',
            'password'  => [
                'required',
                'different:email',
                'confirmed',
                Password::min(5)
                    // ->mixedCase()
                    // ->letters()
                    // ->numbers()
                    // ->symbols()
                    // ->uncompromised(),
            ],
        ],
    ],
];
