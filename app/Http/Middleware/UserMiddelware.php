<?php

namespace App\Http\Middleware;

use Closure;
use Session;


class UserMiddelware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (Session::has('userId'))
        {

        }
        else{
            return redirect('/signIn');
        }
        return $next($request);
    }
}
