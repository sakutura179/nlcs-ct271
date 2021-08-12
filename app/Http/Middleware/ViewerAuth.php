<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class ViewerAuth
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
            return $next($request);
        } else {
            return redirect()->route('login');   
        }
    }
}
