<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class PageAuth
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
        if (Auth::guard('viewer')->check()) {
            view()->share('viewer_login', Auth::guard('viewer')->user());
        }

        if (Auth::guard('author')->check()) {
            view()->share('author_login', Auth::guard('author')->user());
        }

        if (Auth::guard('admin')->check()) {
            view()->share('admin_login', Auth::guard('admin')->user());
        }

        return $next($request);
    }
}
