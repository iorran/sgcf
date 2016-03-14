<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\AutenticarRequest;
use App\Models\Aluno;
use App\Models\Professor;
use Exception;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Session;
use Log;

class AutenticarController extends Controller {
	/**
	 * Variáveis da sessão
	 * Perfil: 1 - professor | 2 - aluno
	 */
	private $sessao = array (
			'nome' => NULL,
			'email' => NULL,
			'perfil' => NULL 
	);
	
	/**
	 * Retorna tela de login
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function getIndex() {
		return view ( 'login' );
	} 
	
	/**
	 * Autenticar o usuario
	 *
	 * @param \Illuminate\Http\AutenticarRequest $request        	
	 * @return \Illuminate\Http\Response
	 */
	public function postAutenticar(AutenticarRequest $request) {
		try {
			$professor = Professor::where ( 'login', '=', $request->get ( 'identificacao' ) )->first ();
			if ($professor) {
				if (Crypt::decrypt ( $professor->usuario->senha ) == $request->get ( 'senha' )) {
					$sessao ['nome'] = $professor->usuario->nome;
					$sessao ['email'] = $professor->usuario->email;
					$sessao ['perfil'] = 1;
					$this->makeSession ( $sessao );
					return redirect ()->route ( 'home.index' );
				}
			} else {
				$aluno = Aluno::where ( 'matricula', '=', $request->get ( 'identificacao' ) )->first ();
				if ($aluno) {
					if (Crypt::decrypt ( $aluno->usuario->senha ) == $request->get ( 'senha' )) {
						$sessao ['nome'] = $aluno->usuario->nome;
						$sessao ['email'] = $aluno->usuario->email;
						$sessao ['perfil'] = 2;
						$this->makeSession ( $sessao );
						return redirect ()->route ( 'home.index' );
					}
				}
			}
		} catch ( \Exception $e ) {
			Log::error ( $e );
		}
		// retorna para tela de login com erro de autenticação
		return redirect ()->back ()->withErrors ( [ 
				config ( 'constants.AUTH_FAIL' ) 
		] );
	}
	
	/**
	 * Constrói a sessão
	 *
	 * @return Session
	 */
	public function makeSession($sessao = array()) {
		try {
			Session::push ( 'usuario', $sessao );
		} catch ( \Exception $e ) {
			Log::error ( $e );
		}
	}
	
	/**
	 * Destrói a sessão
	 *
	 * @return Response
	 */
	public function getLogout() {
		try {
			Session::flush ();
			return redirect()->to('login');
		} catch ( \Exception $e ) {
			Log::error ( $e );
		}
	}

	/**
	 * Retorna o usuario da sessão
	 *
	 * @return String
	 */
	public function getUserName() {
		try {
			if (Session::has ( 'usuario' )) {
				$user = Session::get ( 'usuario' );
				return $user [0]['nome'];
			}
		} catch ( \Exception $e ) {
			Log::error ( $e );
		}
	}
	
	/**
	 * Retorna o usuario da sessão
	 *
	 * @return String
	 */
	public function getUserEmail() {
		try {
			if (Session::has ( 'usuario' )) {
				$user = Session::get ( 'usuario' );
				return $user [0]['email'];
			}
		} catch ( \Exception $e ) {
			Log::error ( $e );
		}
	} 

	/**
	 * Retorna o usuario da sessão
	 *
	 * @return String
	 */
	public function getUserPerfil() {
		try {
			if (Session::has ( 'usuario' )) {
				$user = Session::get ( 'usuario' );
				return $user [0]['perfil'];
			}
		} catch ( \Exception $e ) {
			Log::error ( $e );
		}
	}
	
	/**
	 * Error 404
	 *
	 * @return response
	 */
	public function missingMethod($params = array()) {
		return view ( 'errors.404', $params );
	}
}
