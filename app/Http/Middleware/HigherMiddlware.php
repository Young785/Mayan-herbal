<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class HigherMiddlware
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
        if (Auth::user()->user_type != "admin" && Auth::user()->user_type != "vendor") {
            return redirect("/pages/login")->with("notAllowed", "No Access is allowed!");
        }
        return $next($request);
    }
}
