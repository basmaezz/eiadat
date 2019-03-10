<?php

namespace App\Http\Middleware;

use Closure;
use Session;


class UserWebMiddelware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, $guard="UserWeb")
    {
        if(!auth()->guard($guard)->check()) {
            return redirect('/signIn');
        }
        return $next($request);
    }
}
