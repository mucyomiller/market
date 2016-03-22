<?php

namespace App\Http\Middleware;
use Auth;
use Closure;

class UserMiddleware
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
        if (!Auth::user()->check()) {
            return redirect()->route('index')->with('info','You Must login first');
        }
        return $next($request);
    }
}
