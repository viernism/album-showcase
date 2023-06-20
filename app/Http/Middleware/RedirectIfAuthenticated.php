<?php

namespace App\Http\Middleware;

use App\Providers\RouteServiceProvider;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, string ...$guards): Response
    {
        $guards = empty($guards) ? [null] : $guards;

        foreach ($guards as $guard) {
            if (Auth::guard($guard)->check()) {
                // Redirect to the home page
                $response = redirect(RouteServiceProvider::HOME);
                
                // Prevent caching
                $response->header('Cache-Control', 'no-store, no-cache, must-revalidate, max-age=0');
                $response->header('Pragma', 'no-cache');
                $response->header('Expires', 'Sat, 01 Jan 2000 00:00:00 GMT');

                return $response;
            }
        }

        return $next($request);
    }
}
