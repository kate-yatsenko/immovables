<?php

namespace App\Http\Middleware;

use Closure;
use Auth;
use App\User;

class ContentManagerMiddleware
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
        if(Auth::check() && Auth::user()->role_id==User::CONTENT_MANAGER) {
            return $next($request);
        }
        abort(404);
    }
}
