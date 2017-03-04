<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Session;

class BasicAuthenticate
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
    	
        if (!Session::has ( 'usuario' )) {
        	return redirect('login');
        }else{ 
        	return $next($request);
        }

    }
}
