<?php

use Laravel\Sanctum\Sanctum;

return [

    /*
    |----------------------------------------------------------------------
    | Stateful Domains
    |----------------------------------------------------------------------
    |
    | Requests from these domains will receive stateful API authentication
    | cookies. Ensure your domains here include both local and production
    | URLs that will access your API via the frontend SPA.
    |
    */

    'stateful' => explode(',', env('SANCTUM_STATEFUL_DOMAINS', sprintf(
        '%s%s%s',
        'localhost,localhost:3000,127.0.0.1,127.0.0.1:3000,127.0.0.1:8000,::1',
        Sanctum::currentApplicationUrlWithPort(),
        env('FRONTEND_URL') ? ','.parse_url(env('FRONTEND_URL'), PHP_URL_HOST) : ''
    ))),

    /*
    |----------------------------------------------------------------------
    | Sanctum Guards
    |----------------------------------------------------------------------
    |
    | This array defines the authentication guards that Sanctum uses to
    | authenticate requests. You can also use bearer tokens for authentication.
    |
    */

    'guard' => ['web'],

    /*
    |----------------------------------------------------------------------
    | Expiration Minutes
    |----------------------------------------------------------------------
    |
    | This option controls the number of minutes until an issued token is
    | considered expired. You can adjust this as necessary.
    |
    */

    'expiration' => null,

    /*
    |----------------------------------------------------------------------
    | Token Prefix
    |----------------------------------------------------------------------
    |
    | You can prefix new tokens for better security awareness when scanning
    | for tokens in repositories.
    |
    */

    'token_prefix' => env('SANCTUM_TOKEN_PREFIX', ''),

    /*
    |----------------------------------------------------------------------
    | Sanctum Middleware
    |----------------------------------------------------------------------
    |
    | This option defines the middleware Sanctum uses when processing requests.
    | You can modify it if needed.
    |
    */

    'middleware' => [
        'authenticate_session' => Laravel\Sanctum\Http\Middleware\AuthenticateSession::class,
        'encrypt_cookies' => Illuminate\Cookie\Middleware\EncryptCookies::class,
        'validate_csrf_token' => Illuminate\Foundation\Http\Middleware\ValidateCsrfToken::class,
    ],
];
