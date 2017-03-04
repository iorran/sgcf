<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\AutenticarRequest;
use App\Models\Aluno;
use App\Models\Professor;
use App\Models\Usuario;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Session;
use Log;
use Mail;
use DB;

class AutenticarController extends Controller {
	/**
	 * Variáveis da sessão
	 * Perfil: 1 - professor | 2 - aluno
	 */
	private $sessao = array (
			'nome' => NULL,
			'email' => NULL,
			'id' => NULL,
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
			if ($professor != null && isset ( $professor->usuario->senha ) && isset ( $professor )) {  
				if (Crypt::decrypt ( $professor->usuario->senha ) == $request->get ( 'senha' )) {
					$sessao ['nome'] = $professor->usuario->nome;
					$sessao ['email'] = $professor->usuario->email;
					$sessao ['id'] = 1;
					$sessao ['perfil'] = 1;
					$this->makeSession ( $sessao );
					return redirect ()->route ( 'home.index' );
				}
			} else {
				$aluno = Aluno::where ( 'matricula', '=', $request->get ( 'identificacao' ) )->first ();
				if ($aluno != null && isset ( $aluno->usuario->senha ) && isset ( $aluno )) {
					if (Crypt::decrypt ( $aluno->usuario->senha ) == $request->get ( 'senha' )) {
						$sessao ['nome'] = $aluno->usuario->nome;
						$sessao ['email'] = $aluno->usuario->email;
						$sessao ['id'] = 1;
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
		return view ( 'login' )->withErrors ( [ 
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
			return redirect ()->to ( 'login' );
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
				return $user [0] ['nome'];
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
				return $user [0] ['email'];
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
				return $user [0] ['perfil'];
			}
		} catch ( \Exception $e ) {
			Log::error ( $e );
		}
	}

	/**
	 * Recuperar senha
	 *
	 * @param Request $request
	 *
	 * @return Email
	 */
	public function postRecuperar(Request $request) {
		try {
			$user = Usuario::where ( 'email', '=', $request->get ( 'email' ) )->get (); 

			if ($user != null && isset ( $user->id ) && isset ( $user )) {
				$data = array (
						'email' => $user->email,
						'nome' => $user->nome,
						'senha' => Crypt::decrypt ( $user->senha )
				);
				
				Mail::send('mail', $data, function($message) {
					$message->to('iorranpt@gmail.com', 'Jon Doe')->subject('Welcome to the Laravel 4 Auth App!');
				});
			}
			return view ( 'login' );;
		} catch ( \Exception $e ) {
			Log::error ( $e );
		}
	} 

	/**
	 * Trocar senha
	 *
	 * @param Request $request
	 *
	 */
	public function trocarSenha() { 
		try {
			$data ['page_title'] = 'Alterar Senha'; 
			$data['id'] = Session('usuario.0.id');
			return view ( 'paginas.cadastro.senha.index' )->with ( $data );
		} catch ( \Exception $e ) {
			Log::error ( $e );
		}
	}
	
	/**
	 * Salva a nova senha
	 *
	 * @param Request $request
	 * 
	 */
	public function updateSenha(Request $request, $id) {
		try {
			
			if($request->get('senha_confirmation') != $request->get('senha')){
				// retorna para tela de login com erro de autenticação
				return redirect()->back()->withErrors ( [
						'senha' =>'Senha e confirmação de senha não correspondem'
				] );
			}else{ 
				DB::beginTransaction ();
					
				$professor = Professor::where ( 'usuario_id', '=', $id )->first ();  
				if ($professor != null && isset ( $professor->usuario->senha ) && isset ( $professor )) {  
					if (Crypt::decrypt ( $professor->usuario->senha ) == $request->get ( 'senha_atual' )) {
						$usuario = $professor->usuario;
						$usuario->senha = Crypt::encrypt ( $request->get ( "senha" ) );
						$professor->push ();
						DB::commit ();
					}else{ 
						// retorna para tela de login com erro de autenticação
						return redirect()->back()->withErrors ( [
							'senha_atual' =>'Senha atual não confere'
						] ); 
					}
				} else {
					$aluno = Aluno::where ( 'usuario_id', '=', $id )->first ();  
					if ($aluno != null && isset ( $aluno->usuario->senha ) && isset ( $aluno )) {
						if (Crypt::decrypt ( $aluno->usuario->senha ) == $request->get ( 'senha' )) {
							$usuario = $aluno->usuario;
							$usuario->senha = Crypt::encrypt ( $request->get ( "senha" ) );
							$aluno->push ();
							DB::commit ();
						}else{ 
							// retorna para tela de login com erro de autenticação
							return redirect()->back()->withErrors ( [
								'senha' =>'Senha e confirmação de senha não correspondem'
							] ); 
						}
					}
				} 
			}
		} catch ( \Exception $e ) {
			Log::error ( $e );
			DB::rollback ();
			alert ()->error ( $e->getMessage (), 'Atenção' )->persistent ( 'Fechar' );
		}
		return $this->getLogout();
	}
	
	/**
	 * Error 403
	 *
	 * @return response
	 */
	public function getAcessoNegado() {
		$params = array ();
		return view ( 'errors.403', $params );
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
