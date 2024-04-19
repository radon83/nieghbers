<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

class EstablishPoliciesMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        $routes_and_permissions = config('routes-and-permissions');
        $current_route = getRouteName();

        // If the route exists in the route-and-permissions config file
        if (in_array($current_route, array_keys($routes_and_permissions))) {

            // Get the route permission
            $permission = $routes_and_permissions[$current_route];

            // Check authorization status
            if (!authorized($permission))
                abort(403);
            else
                return $next($request);
        }

        return $next($request);
    }
}
