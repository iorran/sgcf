<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Session;

class Authenticate
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
        	$usuario = session('usuario'); 
        	$perfil = $usuario[0]['perfil'];
        	/**
        	 * Variáveis da sessão
        	 * Perfil: 1 - professor | 2 - aluno
        	 */
        	if ($perfil == 2){
        		return redirect('acesso-negado');
        	}
        	return $next($request);
        }

    }
}
