<?php

namespace App\Http\Controllers;

use App\Http\Requests\PacienteRequest;
use App\Models\Endereco;
use App\Models\Paciente;
use DB;
use Exception;
use Log;

class PacienteController extends Controller {
	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index() {
		$data ['pacientes'] = Paciente::get ();
		$data ['page_title'] = 'Pacientes';
		return view ( 'paginas.cadastro.paciente.index' )->with ( $data );
	}
	
	/**
	 * Show the form for creating a new resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function create() {
		$data ['page_title'] = 'Novo paciente';
		return view ( 'paginas.cadastro.paciente.create-edit' )->with ( $data );
	}
	
	/**
	 * Store a newly created resource in storage.
	 *
	 * @param \Illuminate\Http\PacienteRequest $request        	
	 * @return \Illuminate\Http\Response
	 */
	public function store(PacienteRequest $request) {
		try {
			DB::beginTransaction ();
			
			$endereco = new Endereco ();
			$endereco->logradouro = $request->get ( "logradouro" );
			$endereco->numero = $request->get ( "numero" );
			$endereco->bairro = $request->get ( "bairro" );
			$endereco->cep = $request->get ( "cep" );
			$endereco->cidade = $request->get ( "cidade" );
			$endereco->estado = $request->get ( "estado" );
			$endereco->save ();
			
			$paciente = new Paciente ();
			
			$paciente->nome = $request->get ( "nome" );
			$paciente->naturalidade = $request->get ( "naturalidade" );
			$paciente->profissao = $request->get ( "profissao" );
			$paciente->nacionalidade = $request->get ( "nacionalidade" );
			$paciente->nascimento = $request->get ( "nascimento" );
			$paciente->ddd = $request->get ( "ddd" );
			$paciente->telefone = $request->get ( "telefone" );
			$endereco->paciente ()->save ( $paciente );
			
			DB::commit ();
			
			alert ()->success ( '', config ( 'constants.SAVED' ) )->autoclose ( 2000 );
		} catch ( \Exception $e ) {
			Log::error ( $e );
			DB::rollback ();
			alert ()->error ( $e->getMessage (), 'Atenção' )->persistent ( 'Fechar' );
		}
		return redirect ( 'cadastro/paciente' );
	}
	
	/**
	 * Display the specified resource.
	 *
	 * @param int $id        	
	 * @return \Illuminate\Http\Response
	 */
	public function show($id) {
		$data ['paciente'] = Paciente::findOrFail ( $id );
		$data ['page_title'] = 'Visualizar paciente';
		return view ( 'paginas.cadastro.paciente.show' )->with ( $data );
	}
	
	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param int $id        	
	 * @return \Illuminate\Http\Response
	 */
	public function edit($id) {
		$data ['paciente'] = Paciente::findOrFail ( $id );
		$data ['page_title'] = 'Editar paciente';
		return view ( 'paginas.cadastro.paciente.create-edit' )->with ( $data );
	}
	
	/**
	 * Update the specified resource in storage.
	 *
	 * @param \Illuminate\Http\PacienteRequest $request        	
	 * @param int $id        	
	 * @return \Illuminate\Http\Response
	 */
	public function update(PacienteRequest $request, $id) {
		try {
			DB::beginTransaction ();
			
			$endereco = Endereco::findOrFail ( $id );
			$endereco->logradouro = $request->get ( "logradouro" );
			$endereco->numero = $request->get ( "numero" );
			$endereco->bairro = $request->get ( "bairro" );
			$endereco->cep = $request->get ( "cep" );
			$endereco->cidade = $request->get ( "cidade" );
			$endereco->estado = $request->get ( "estado" );
			
			$paciente = $endereco->paciente;
			$paciente->nome = $request->get ( "nome" );
			$paciente->naturalidade = $request->get ( "naturalidade" );
			$paciente->profissao = $request->get ( "profissao" );
			$paciente->nacionalidade = $request->get ( "nacionalidade" );
			$paciente->nascimento = $request->get ( "nascimento" );
			$paciente->ddd = $request->get ( "ddd" );
			$paciente->telefone = $request->get ( "telefone" );
			
			// $aluno->save();
			// $aluno->usuario->save();
			$endereco->push ();
			
			DB::commit ();
			
			alert ()->success ( '', config ( 'constants.UPDATED' ) )->autoclose ( 2000 );
		} catch ( \Exception $e ) {
			Log::error ( $e );
			DB::rollback ();
			alert ()->error ( $e->getMessage (), 'Atenção' )->persistent ( 'Fechar' );
		}
		return redirect ( 'cadastro/paciente' );
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

			$endereco = Endereco::findOrFail ( $id );
			$endereco->paciente->delete ();
			$endereco->delete ();
			
			DB::commit ();
			
			alert ()->success ( '', config ( 'constants.REMOVED' ) )->autoclose ( 2000 );
		} catch ( \Exception $e ) {
			Log::error ( $e );
			DB::rollback ();
			alert ()->error ( $e->getMessage (), 'Atenção' )->persistent ( 'Fechar' );
		}
		return redirect ( 'cadastro/paciente' );
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
