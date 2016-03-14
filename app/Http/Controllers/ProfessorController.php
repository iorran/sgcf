<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfessorRequest;
use App\Models\Professor;
use App\Models\Usuario;
use DB;
use Exception;
use Illuminate\Support\Facades\Crypt;
use Log;

class ProfessorController extends Controller {
	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index() {
		$professores = Professor::get ();
		return view ( 'paginas.cadastro.professor.index', compact ( 'professores' ) );
	}
	
	/**
	 * Show the form for creating a new resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function create() {
		return view ( 'paginas.cadastro.professor.create-edit' );
	}
	
	/**
	 * Store a newly created resource in storage.
	 *
	 * @param \Illuminate\Http\ProfessorRequest $request        	
	 * @return \Illuminate\Http\Response
	 */
	public function store(ProfessorRequest $request) {
		try {
			DB::beginTransaction ();
			
			$usuario = new Usuario ();
			$usuario->nome = $request->get ( "nome" );
			$usuario->email = $request->get ( "email" );
			$usuario->senha = Crypt::encrypt ( $request->get ( "senha" ) );
			$usuario->save ();
			
			$professor = new Professor ();
			$professor->login = $request->get ( 'login' );
			$usuario->Professor ()->save ( $professor );
			
			DB::commit ();
			
			alert ()->success ( '', config ( 'constants.SAVED' ) )->autoclose ( 2000 );
		} catch ( \Exception $e ) {
			Log::error ( $e );
			DB::rollback ();
			alert ()->error ( $e->getMessage (), 'Atenção' )->persistent ( 'Fechar' );
		}
		return redirect ( 'cadastro/professor' );
	}
	
	/**
	 * Display the specified resource.
	 *
	 * @param int $id        	
	 * @return \Illuminate\Http\Response
	 */
	public function show($id) {
		$professor = Professor::findOrFail ( $id );
		return view ( 'paginas.cadastro.professor.show' )->withProfessor ( $professor );
	}
	
	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param int $id        	
	 * @return \Illuminate\Http\Response
	 */
	public function edit($id) {
		$professor = Professor::findOrFail ( $id );
		return view ( 'paginas.cadastro.professor.create-edit' )->withProfessor ( $professor );
	}
	
	/**
	 * Update the specified resource in storage.
	 *
	 * @param \Illuminate\Http\ProfessorRequest $request        	
	 * @param int $id        	
	 * @return \Illuminate\Http\Response
	 */
	public function update(ProfessorRequest $request, $id) {
		try {
			DB::beginTransaction ();
			
			$professor = Professor::findOrFail ( $id );
			$professor->login = $request->get ( 'login' );
			
			$usuario = $professor->usuario;
			$usuario->nome = $request->get ( "nome" );
			$usuario->email = $request->get ( "email" );
			
			// $professor->save();
			// $professor->usuario->save();
			$professor->push ();
			
			DB::commit ();
			
			alert ()->success ( '', config ( 'constants.UPDATED' ) )->autoclose ( 2000 );
		} catch ( \Exception $e ) {
			Log::error ( $e );
			DB::rollback ();
			alert ()->error ( $e->getMessage (), 'Atenção' )->persistent ( 'Fechar' );
		}
		return redirect ( 'cadastro/professor' );
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
			
			$professor = Professor::find ( $id );
			$professor->delete ();
			$professor->usuario->delete ();
			
			DB::commit ();
			
			alert ()->success ( '', config ( 'constants.REMOVED' ) )->autoclose ( 2000 );
		} catch ( \Exception $e ) {
			Log::error ( $e );
			DB::rollback ();
			alert ()->error ( $e->getMessage (), 'Atenção' )->persistent ( 'Fechar' );
		}
		return redirect ( 'cadastro/professor' );
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
