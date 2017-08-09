<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class Roller
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
        if(Auth::check() && Auth::user()->role == 1){
            return redirect()->to('/')->with('flash_message','You are not admin');
        }
        return $next($request);
    }
}
