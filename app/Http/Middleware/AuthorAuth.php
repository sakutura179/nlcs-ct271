<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class AuthorAuth
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
        if (Auth::guard('author')->check()) {
            view()->share('author_login', Auth::guard('author')->user());
            return $next($request);
        } else {
            return redirect()->route('login');   
        }
    }
}
