<?php

namespace Chatty\Http\Middleware;

use Closure;
use Illuminate\Contracts\Auth\Guard;

class Authenticate{
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
    *Handle and incoming request.
    *@param \Illumiante\Http\Request $reguest
    *@param \Closure $next
    *@return mixed
    */

    public function handle($request, Closure $next){
        if($this->auth->guest()){
            if($request->ajax()){
                return response('Unaauthorized.', 401);
            }else{
                return redirect()->guest('auth.signin');
            }
        }
        return $next($request);
    }
}