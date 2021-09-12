<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class AdminAuth
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
        if (Auth::guard('admin')->check()) {
            view()->share('admin_login', Auth::guard('admin')->user());
            return $next($request)->header('Cache-Control','nocache, no-store, max-age=0, must-revalidate')
                                  ->header('Pragma','no-cache')
                                  ->header('Expires','Fri, 01 Jan 1990 00:00:00 GMT');
        } else {
            return redirect()->route('login');   
        }
    }
}
