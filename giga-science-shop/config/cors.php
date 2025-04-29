<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Cross-Origin Resource Sharing (CORS) Configuration
    |--------------------------------------------------------------------------
    */

    // Routes CORS applies to
    'paths' => ['api/*', 'sanctum/csrf-cookie'],

    // HTTP methods allowed for CORS
    'allowed_methods' => ['GET', 'POST', 'PUT', 'DELETE', 'OPTIONS'],

    // Frontend URLs allowed to access the API
    'allowed_origins' => [
        'http://localhost:3000',  // React dev server
        'http://127.0.0.1:3000',  // Optional alternative localhost address
        // You can add your production frontend URL here later
    ],

    // Regex patterns to match allowed origins
    'allowed_origins_patterns' => [],

    // Allowed headers in requests
    'allowed_headers' => ['Content-Type', 'X-Requested-With', 'Authorization', 'Accept'],

    // Headers that are exposed to the browser
    'exposed_headers' => [],

    // How long the results of a preflight request can be cached
    'max_age' => 0,

    // Whether to support cookies (needed for Sanctum)
    'credentials' => true,
    'supports_credentials' => true,

];
