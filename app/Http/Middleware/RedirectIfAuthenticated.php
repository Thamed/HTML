<?php

namespace Gallery\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
{
        /**
    * The Guard implementation.
    *
    * @var Guard
    */

    protected $auth;

    /**
    *Create a new filter instance.
    *
    *@param Guard $auth
    *@return void
    */

    public function _construct(Guard $auth){
        $this->suth =$auth;
    }

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
        if (Auth::guard($guard)->check()) {
            return redirect()->route('home');
        }

        return $next($request);
    }
}
