protected $routeMiddleware = [
    // Other middleware...
    'auth' => \App\Http\Middleware\Authenticate::class,
    'guest' => \App\Http\Middleware\RedirectIfAuthenticated::class,
    'admin' => \App\Http\Middleware\AdminMiddleware::class,
    'ensureFrontendRequestsAreStateful' => \Laravel\Sanctum\Http\Middleware\EnsureFrontendRequestsAreStateful::class,

];
