<?php

namespace App\Http\Controllers;

use App\Http\Requests\AlunoRequest;
use App\Models\Aluno;
use App\Models\Usuario;
use DB;
use Exception;
use Illuminate\Support\Facades\Crypt;
use Log;
use Response;

class AlunoController extends Controller {
	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index() {
		$data['alunos'] = Aluno::get ();
		$data['page_title'] = 'Alunos'; 
		return view ( 'paginas.cadastro.aluno.index')->with($data);
	}
	
	/**
	 * Show the form for creating a new resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function create() {
		$data['page_title'] = 'Novo aluno'; 
		return view ( 'paginas.cadastro.aluno.create-edit' )->with($data);
	}
	
	/**
	 * Store a newly created resource in storage.
	 *
	 * @param \Illuminate\Http\AlunoRequest $request        	
	 * @return \Illuminate\Http\Response
	 */
	public function store(AlunoRequest $request) {
		try {
			DB::beginTransaction ();
			
			$usuario = new Usuario ();
			$usuario->nome = $request->get ( "nome" );
			$usuario->email = $request->get ( "email" );
			$usuario->senha = Crypt::encrypt ( $request->get ( "senha" ) );
			$usuario->save ();
			
			$aluno = new Aluno ();
			$aluno->matricula = $request->get ( 'matricula' );
			$usuario->Aluno ()->save ( $aluno );
			
			DB::commit ();
			
			alert ()->success ( '', config ( 'constants.SAVED' ) )->autoclose ( 2000 );
		} catch ( \Exception $e ) {
			Log::error ( $e );
			DB::rollback ();
			alert ()->error ( $e->getMessage (), 'Atenção' )->persistent ( 'Fechar' );
		}
		return redirect ( 'cadastro/aluno' );
	}
	
	/**
	 * Display the specified resource.
	 *
	 * @param int $id        	
	 * @return \Illuminate\Http\Response
	 */
	public function show($id) {
		$data['aluno'] = Aluno::findOrFail ( $id ); 
		$data['page_title'] = 'Visualizar aluno';
		return view ( 'paginas.cadastro.aluno.show' )->with($data);
	}
	
	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param int $id        	
	 * @return \Illuminate\Http\Response
	 */
	public function edit($id) {
		$data['aluno'] = Aluno::findOrFail ( $id );
		$data['page_title'] = 'Editar aluno';
		return view ( 'paginas.cadastro.aluno.create-edit' )->with($data);
	}
	
	/**
	 * Update the specified resource in storage.
	 *
	 * @param \Illuminate\Http\AlunoRequest $request        	
	 * @param int $id        	
	 * @return \Illuminate\Http\Response
	 */
	public function update(AlunoRequest $request, $id) {
		try {
			DB::beginTransaction ();
			
			$aluno = Aluno::findOrFail ( $id );
			$aluno->matricula = $request->get ( 'matricula' );
			
			$usuario = $aluno->usuario;
			$usuario->nome = $request->get ( "nome" );
			$usuario->email = $request->get ( "email" );
			
			// $aluno->save();
			// $aluno->usuario->save();
			$aluno->push ();
			
			DB::commit ();
			
			alert ()->success ( '', config ( 'constants.UPDATED' ) )->autoclose ( 2000 );
		} catch ( \Exception $e ) {
			Log::error ( $e );
			DB::rollback ();
			alert ()->error ( $e->getMessage (), 'Atenção' )->persistent ( 'Fechar' );
		}
		return redirect ( 'cadastro/aluno' );
	}
	
	/**
	 * Remove the specified resource from storage.
	 *
	 * @param int $id        	
	 * @return \Illuminate\Http\Response
	 */
	public function destroy($id) {
		try {
			DB::beginTransaction ();
			
			$aluno = Aluno::find ( $id );
			$aluno->delete ();
			$aluno->usuario->delete ();
			
			DB::commit ();
			
			alert ()->success ( '', config ( 'constants.REMOVED' ) )->autoclose ( 2000 );
		} catch ( \Exception $e ) {
			Log::error ( $e );
			DB::rollback ();
			alert ()->error ( $e->getMessage (), 'Atenção' )->persistent ( 'Fechar' );
		}
		return redirect ( 'cadastro/aluno' );
	}
	
	/**
	 * Error 404
	 *
	 * @return response
	 */
	public function missingMethod($params = array()) {
		return view ( 'errors.404', $params );
	}
	
	/**
	 * Return JSON Cliente list
	 *
	 * @return json
	 */
	public function getAllAlunosJson() {
		try { 
			$alunos = Aluno::get (); 
			$response = null;
			foreach ( $alunos as $aluno ) { 
				$response  [] = [ 
						'id' => $aluno->id,
						'title' => $aluno->usuario->nome,
						'eventColor' => 'green' 
				];
			}
		} catch ( Exception $e ) {
			Log::error ( $e );
			alert ()->error ( $e->getMessage (), 'Atenção' )->persistent ( 'Fechar' );
		} finally{
			return Response::json ( $response );
		}
	}
}
