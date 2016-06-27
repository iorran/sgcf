<?php

namespace App\Http\Controllers;

use App\Models\Agendamento;
use App\Models\Paciente;
use Illuminate\Http\Request;
use Log;
use Response;
use DB;
use Exception;

class AgendaController extends Controller { 
	/**
	 * Tela inicial com o calendario de todas as consultas
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index() {
		try {
			$data ['page_title'] = 'Consultas';
		} catch ( \Exception $e ) {
			Log::error ( $e );
			alert ()->error ( $e->getMessage (), 'Atenção' )->persistent ( 'Fechar' );
		}
		return view ( 'paginas.agenda.index' )->with ( $data );
	} 
	
	/**
	 * Exibe a tela para confirmar a marcação da consulta
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function create(Request $request) {
		$data = null;
		try {
			$data ['page_title'] = 'Nova consulta';
			$data ['events_start'] = $request->get ( 'events_start' );
			$data ['events_end'] = $request->get ( 'events_end' );
			$data ['aluno_id'] = $request->get ( 'aluno_id' );
			$data ['aluno_nome'] = $request->get ( 'aluno_nome' );
			// Pacientes
			$data ['pacientes'] = Paciente::get ();
			
			// formatando a data start
			$result_start = explode ( "T", $data ['events_start'] );
			$data ['data_consulta'] = $result_start [0];
			$data_splitada_start = explode ( "-", $result_start [0] );
			$data ['data_start'] = $data_splitada_start [2] . "/" . $data_splitada_start [1] . "/" . $data_splitada_start [0];
			// formatando a hora start
			$result1_start = explode ( "-", $result_start [1] );
			$data ['hora_start'] = $result1_start [0];
			
			// formatando a data end
			$result_end = explode ( "T", $data ['events_end'] );
			$data_splitada_end = explode ( "-", $result_end [0] );
			$data ['data_end'] = $data_splitada_end [2] . "/" . $data_splitada_end [1] . "/" . $data_splitada_end [0];
			// formatando a hora end
			$result1_end = explode ( "-", $result_end [1] );
			$data ['hora_end'] = $result1_end [0];
		} catch ( \Exception $e ) {
			Log::error ( $e );
			alert ()->error ( $e->getMessage (), 'Atenção' )->persistent ( 'Fechar' );
		}
		return view ( 'paginas.agenda.marcar' )->with ( $data );
	}
	
	/**
	 * Salva as informações da consulta
	 *
	 * @param \Illuminate\Http\Request $request        	
	 * @return \Illuminate\Http\Response
	 */
	public function store(Request $request) {
		try {
			DB::beginTransaction ();
			
			$agendamento = new Agendamento ();
			$agendamento->events_start = $request->get ( 'events_start' );
			$agendamento->events_end = $request->get ( 'events_end' );
			$agendamento->aluno_id = $request->get ( 'aluno_id' );
			$agendamento->paciente_id = $request->get ( 'paciente_id' );
			$agendamento->hora_start = $request->get ( 'hora_start' );
			$agendamento->hora_end = $request->get ( 'hora_end' );
			$agendamento->data_consulta = $request->get ( 'data_consulta' );
			//$agendamento->iniciada = "0";
			$agendamento->save ();
			
			DB::commit ();
			
			alert ()->success ( '', config ( 'constants.SAVED' ) )->autoclose ( 2000 );
		} catch ( \Exception $e ) {
			Log::error ( $e );
			DB::rollback ();
			alert ()->error ( $e->getMessage (), 'Atenção' )->persistent ( 'Fechar' );
		}
		return redirect ( 'agenda' );
	}
	
	/**
	 * Exibe o painel com as opções da consulta marcada
	 *
	 * @param \Illuminate\Http\Request $request        	
	 * @return \Illuminate\Http\Response
	 */
	public function showDetalhes(Request $request) {
		try {
			$data ['agendamento'] = Agendamento::findOrFail ( $request->get ( 'events_id' ) );
			$data ['page_title'] = 'Gerenciar consulta';
			$data ['editavel'] = $request->get ( 'editavel' );
			$data['anexos'] = $data ['agendamento']->paciente->anexos; 
			return view ( 'paginas.agenda.gerenciar-marcacao' )->with ( $data );
		} catch ( \Exception $e ) {
			Log::error ( $e );
			alert ()->error ( $e->getMessage (), 'Atenção' )->persistent ( 'Fechar' );
		}
	}
	
	/**
	 * Remove the specified resource from storage.
	 *
	 * @param \Illuminate\Http\Request $request        	
	 * @return \Illuminate\Http\Response
	 */
	public function desmarcarConsulta(Request $request) {
		try {
			DB::beginTransaction ();
			
			$agendamento = Agendamento::findOrFail ( $request->get ( 'id' ) );
			$agendamento->delete ();
			
			DB::commit ();
			
			alert ()->success ( '', config ( 'constants.DESMARCAR' ) )->autoclose ( 2000 );
		} catch ( \Exception $e ) {
			Log::error ( $e );
			DB::rollback ();
			alert ()->error ( $e->getMessage (), 'Atenção' )->persistent ( 'Fechar' );
		}
		return redirect ( 'agenda' );
	} 

	/**
	 * Finalizar a consulta
	 *
	 * @return int
	 */
	public function cancelarConsulta(Request $request) {
		try {
			$agendamento = Agendamento::findOrFail ( $request->get("id") );
			DB::beginTransaction ();
			$agendamento->iniciada = "5";
			$agendamento->save ();
			DB::commit ();
		} catch ( \Exception $e ) {
			Log::error ( $e );
			DB::rollback ();
			alert ()->error ( $e->getMessage (), 'Atenção' )->persistent ( 'Fechar' );
		}
		return redirect ('agenda');
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
	 * @param \Illuminate\Http\Request $request        	
	 * @param int $id        	
	 * @return \Illuminate\Http\Response
	 */
	public function update(Request $request, $id) {
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
	
	/**
	 * Error 404
	 *
	 * @return response
	 */
	public function missingMethod($params = array()) {
		return view ( 'errors.404', $params );
	} 
	
	/**
	 * Return JSON Consultas list
	 *
	 * @return json
	 */
	public function getAllAgendaJson() {
		try {
			$agendamentos = Agendamento::get ();
			$response = null; 
			foreach ( $agendamentos as $agendamento ) {
				$cor = '#00a65a';
				if ($agendamento->iniciada != 0 && $agendamento->iniciada != 4 && $agendamento->iniciada != 5)
					$cor = '#BFC600';
				if ($agendamento->iniciada == 4)
					$cor = '#018BC6';
				if ($agendamento->iniciada == 5)
					$cor = '#A52A2A';
				$response [] = [ 
						'id' => $agendamento->id,
						'resourceId' => $agendamento->aluno->id,
						'title' => $agendamento->paciente->nome,
						'start' => $agendamento->events_start,
						'end' => $agendamento->events_end, 
						'color' => $cor
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
