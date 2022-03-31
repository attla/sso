<?php

use Illuminate\Validation\Rules\Password;

return [
    'route-uri' => [
        // identifies if the user is logged in and handles the return
        'identifier'    => 'identifier',
        // login page
        'login'         => 'login',
        // register page
        'register'      => 'register',
        // logout route
        'logout'        => 'logout',
    ],
    'redirect'          => 'dashboard',
    'route-group' => [
        'as'            => 'sso.',
        'prefix'        => '/sso',
        'namespace'     => 'Attla\\SSO\\Controllers',
        'controller'    => 'AuthController',
        'middleware'    => [
            'web',
        ],
    ],
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
                    ->uncompromised(),
            ],
        ],
    ],
];
