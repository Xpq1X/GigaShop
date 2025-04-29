<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class AdminMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        // Check if the user is logged in and is an admin
        if (auth()->check() && auth()->user()->is_admin) {
            return $next($request);  // Allow the request to pass
        }

        // Redirect to home or any other page if the user is not an admin
        return redirect('/home')->with('error', 'You are not authorized to access this page.');
    }
}
