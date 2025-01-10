<?php
namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class AdminMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        if (!\Illuminate\Support\Facades\Auth::check() || !\Illuminate\Support\Facades\Auth::user()->admin) {
            // If the user is not an admin, deny access
            return response()->view('errors.403', [], 403); // Optionally, use your own view
        }

        return $next($request);  // Allow the request to proceed
    }
}
