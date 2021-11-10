<?php

return [
    'route-uri' => [
        'identifier'    => 'identifier',// identifies if the user is logged in and handles the return
        'login'         => 'login',     // login page
        'register'      => 'register',  // register page
        'logout'        => 'logout',    // logout route
    ],
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
];
