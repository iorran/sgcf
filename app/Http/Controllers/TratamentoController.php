<?php

namespace App\Http\Controllers;

use App\Models\Agendamento;
use App\Models\Tratamento;
use Exception;
use Illuminate\Http\Request;
use Log;
use Response;
use DB;
use File; 

class TratamentoController extends Controller {
	
	/**
	 * Tela inicial do tratamento
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function iniciar(Request $request) {
		try {
			$agendamento = Agendamento::findOrFail ( $request->get ( 'id' ) );
			$tratamento = Tratamento::where ( 'agendamento_id', '=', $agendamento->id )->orderBy ( 'created_at', 'desc' )->first ();
			$data ['page_title'] = 'Tratamento';
			$data ['agendamento'] = $agendamento;
			$data ['tratamento'] = $tratamento;
		} catch ( \Exception $e ) {
			Log::error ( $e );
			alert ()->error ( $e->getMessage (), 'Atenção' )->persistent ( 'Fechar' );
		}
		return view ( 'paginas.consulta.tratamento.create-edit' )->with ( $data );
	}
	
	/**
	 * Salvar tratamento
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function store(Request $request) {
		try {
			DB::beginTransaction ();
			
			$tratamento = new Tratamento ();
			$tratamento->agendamento_id = $request->get ( 'agendamento_id' );
			$tratamento->evolucao = $request->get ( 'evolucao' );
			$tratamento->status = $request->get ( 'status' );
			
			$tratamento->save ();
			DB::commit ();
		} catch ( \Exception $e ) {
			Log::error ( $e );
			DB::rollback ();
			alert ()->error ( $e->getMessage (), 'Atenção' )->persistent ( 'Fechar' );
		}
		return $this->finalizarTratamento($tratamento->agendamento_id );
	}
	
	/**
	 * Update the specified resource in storage.
	 *
	 * @param int $id        	
	 * @return \Illuminate\Http\Response
	 */
	public function update(Request $request, $id) {
		try {
			DB::beginTransaction ();
			
			$tratamento = Tratamento::findOrFail ( $id );
			$tratamento->evolucao = $request->get ( 'evolucao' );
			$tratamento->status = $request->get ( 'status' );
			
			$tratamento->save ();
			
			DB::commit ();
			alert ()->success ( '', config ( 'constants.SAVED' ) )->autoclose ( 2000 );
		} catch ( \Exception $e ) {
			Log::error ( $e );
			DB::rollback ();
			alert ()->error ( $e->getMessage (), 'Atenção' )->persistent ( 'Fechar' );
		}
		return $this->finalizarTratamento($tratamento->agendamento_id );
	}
	
	/**
	 * Finalizar Tratamento
	 *
	 * @return int
	 */
	public function finalizarTratamento($id) {
		try {
			$agendamento = Agendamento::findOrFail ( $id );
			DB::beginTransaction ();
			$agendamento->iniciada = "3";
			$agendamento->save ();
			DB::commit ();
		} catch ( \Exception $e ) {
			Log::error ( $e );
			DB::rollback ();
			alert ()->error ( $e->getMessage (), 'Atenção' )->persistent ( 'Fechar' );
		} 
		return redirect ( 'consulta/detalhes/'.$agendamento->id );
	}
	
	/**
	 * Exibe o painel com as opções da consulta marcada
	 * por default ao ser liberado a opção de cadastrar um tratamento
	 * a opção de marcar e desmarcar deve ficar desativada
	 *
	 * @param
	 *        	id
	 * @return \Illuminate\Http\Response
	 */
	public function showDetalhes($id) {
		try {
			$data ['agendamento'] = Agendamento::findOrFail ( $id );
			$data ['page_title'] = 'Gerenciar consulta';
			$data ['editavel'] = true; 
			$data['anexos'] = $data ['agendamento']->paciente->anexos; 
		} catch ( \Exception $e ) {
			Log::error ( $e );
			alert ()->error ( $e->getMessage (), 'Atenção' )->persistent ( 'Fechar' );
		}
		return view ( 'paginas.agenda.gerenciar-marcacao' )->with ( $data );
	}
}
