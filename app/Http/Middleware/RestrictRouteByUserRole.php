<?php

namespace App\Http\Middleware;

use Closure;

class RestrictRouteByUserRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string  $routeRole
     * @return mixed
     */
    public function handle($request, Closure $next, $routeRole)
    {
        $userRole = $request->user()->role->slug;
        if ($userRole != $routeRole) {
            return redirect(route('dashboard'));
        }

        return $next($request);
    }
}
