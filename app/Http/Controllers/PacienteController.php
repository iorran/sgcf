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
		$pacientes = Paciente::get ();
		return view ( 'paginas.cadastro.paciente.index', compact ( 'pacientes' ) );
	}
	
	/**
	 * Show the form for creating a new resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function create() {
		return view ( 'paginas.cadastro.paciente.create-edit' );
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
			
			$endereco = new Endereco(); 
			$endereco->logradouro = $request->get ( "logradouro" ); 
			$endereco->numero = $request->get ( "numero" ); 
			$endereco->bairro = $request->get ( "bairro" ); 
			$endereco->cep = $request->get ( "cep" ); 
			$endereco->cidade = $request->get ( "cidade" ); 
			$endereco->estado = $request->get ( "estado" ); 
			$endereco->save ();
			
			$paciente = new Paciente();

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
		//
	}
	
	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param int $id        	
	 * @return \Illuminate\Http\Response
	 */
	public function edit($id) {
		//
	}
	
	/**
	 * Update the specified resource in storage.
	 *
	 * @param \Illuminate\Http\PacienteRequest $request        	
	 * @param int $id        	
	 * @return \Illuminate\Http\Response
	 */
	public function update(PacienteRequest $request, $id) {
		//
	}
	
	/**
	 * Remove the specified resource from storage.
	 *
	 * @param int $id        	
	 * @return \Illuminate\Http\Response
	 */
	public function destroy($id) {
		//
	}
}
