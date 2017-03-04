<?php

namespace App\Http\Controllers;

use App\Http\Requests\PacienteRequest;
use App\Models\Agendamento;
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
		$data ['pacientes'] = Paciente::withTrashed ()->get ();
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
			$endereco->complemento = $request->get ( "complemento" );
			$endereco->numero = $request->get ( "numero" );
			$endereco->bairro = $request->get ( "bairro" );
			$endereco->cep = $request->get ( "cep" );
			$endereco->cidade = $request->get ( "cidade" );
			$endereco->estado = $request->get ( "estado" );
			$endereco->save ();
			
			$paciente = new Paciente ();
			
			$paciente->nome = $request->get ( "nome" );
			$paciente->cpf = $request->get ( "cpf" );
			$paciente->naturalidade = $request->get ( "naturalidade" );
			$paciente->profissao = $request->get ( "profissao" );
			$paciente->nacionalidade = $request->get ( "nacionalidade" );
			$paciente->nascimento = $request->get ( "nascimento" );
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
		$data ['paciente'] = Paciente::withTrashed ()->findOrFail ( $id );
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
			
			$paciente = Paciente::findOrFail ( $id );
			$paciente->nome = $request->get ( "nome" );
			$paciente->cpf = $request->get ( "cpf" );
			$paciente->naturalidade = $request->get ( "naturalidade" );
			$paciente->profissao = $request->get ( "profissao" );
			$paciente->nacionalidade = $request->get ( "nacionalidade" );
			$paciente->nascimento = $request->get ( "nascimento" );
			$paciente->telefone = $request->get ( "telefone" );
			
			$endereco = $paciente->endereco;
			$endereco->logradouro = $request->get ( "logradouro" );
			$endereco->complemento = $request->get ( "complemento" );
			$endereco->numero = $request->get ( "numero" );
			$endereco->bairro = $request->get ( "bairro" );
			$endereco->cep = $request->get ( "cep" );
			$endereco->cidade = $request->get ( "cidade" );
			$endereco->estado = $request->get ( "estado" );
			
			// $aluno->save();
			// $aluno->usuario->save();
			$paciente->push ();
			
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
			if($this->isConsultaMarcada($id) <= 0){ 
				DB::beginTransaction ();
				$paciente = Paciente::withTrashed ()->find ( $id );
				
				if ($paciente->trashed ()) {
					$paciente->restore ();
					$paciente->endereco->restore ();
					alert ()->success ( '', config ( 'constants.RECOVERED' ) )->autoclose ( 2000 );
				} else {
					$paciente->endereco->delete ();
					$paciente->delete ();
					alert ()->success ( '', config ( 'constants.REMOVED' ) )->autoclose ( 2000 );
				}
				
				DB::commit ();
			}else{
				alert ()->info ( 'Este paciente possui consultas marcadas, não será possível desativar.', 'Atenção' )->persistent ( 'Fechar' );
			}
		} catch ( \Exception $e ) {
			Log::error ( $e );
			DB::rollback ();
			alert ()->error ( $e->getMessage (), 'Atenção' )->persistent ( 'Fechar' );
		}
		return redirect ( 'cadastro/paciente' );
	}
 
	/**
	 * Verificar se o aluno possui alguma consulta marcada
	 *
	 * @return boolean
	 */
	public function isConsultaMarcada($id) {
		//$agendamento = Agendamento::where('paciente_id','=',$id)->where('iniciada','=','0')->where('data_consulta','>=',date('Y-m-d'))->where('hora_start','>=', date('H:i'))->get();
		$agendamento = Agendamento::where('paciente_id','=',$id)->where('iniciada','=','0')->get();
		return count($agendamento);
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
