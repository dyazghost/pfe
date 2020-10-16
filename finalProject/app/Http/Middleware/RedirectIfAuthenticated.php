<?php

namespace App\Http\Middleware;

use App\Providers\RouteServiceProvider;
use Closure;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $guard
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)
    {
        if ($guard == "student" && Auth::guard($guard)->check()) {
            return redirect()->route('logged-student');
        }
        if ($guard == "teacher" && Auth::guard($guard)->check()) {
            return redirect()->route('logged-instructor');
        }
        if ($guard == "admin" && Auth::guard($guard)->check()) {
            return redirect()->route('logged-admin');
        }
        /*if (Auth::guard($guard)->check()) {
            return redirect(RouteServiceProvider::HOME);
        }*/

        return $next($request);
    }
}
