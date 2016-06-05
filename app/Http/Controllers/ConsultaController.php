<?php

namespace App\Http\Controllers;

use App\Models\Agendamento;
use App\Models\Anamnese;
use DB;
use Illuminate\Http\Request;
use Log;

class ConsultaController extends Controller {
	/**
	 * Inicia as rotinas de verificações da consulta
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function init($id) {
		$agendamento = Agendamento::findOrFail ( $id );
		$anamnese = $this->possuiAnamnese ( $agendamento->paciente_id );
		$data ['anamnese'] = $anamnese;
		$data ['areas_funcionais'] = config ( 'enum.area_funcional' );
		$data ['agendamento_id'] = $id;
		$data ['paciente_id'] = $agendamento->paciente_id;
		$data ['page_title'] = 'Anamnese';
		return view ( 'paginas.consulta.anamnese.create-edit' )->with ( $data );
	}
	
	/**
	 * Verificar se o paciente possui Anamnese
	 *
	 * @return int
	 */
	public function possuiAnamnese($paciente_id) {
		try {
			$anamnese = Anamnese::where ( 'paciente_id', '=', $paciente_id )->orderBy ( 'created_at', 'desc' )->first ();
			return $anamnese;
		} catch ( \Exception $e ) {
			Log::error ( $e );
			DB::rollback ();
			alert ()->error ( $e->getMessage (), 'Atenção' )->persistent ( 'Fechar' );
		}
	}
	
	/**
	 * Store a newly created resource in storage.
	 *
	 * @param \Illuminate\Http\Request $request        	
	 * @return \Illuminate\Http\Response
	 */
	public function storeAnamnese(Request $request) {
		$this->iniciarConsulta ( $request->get ( "agendamento_id" ) );
		try {
			DB::beginTransaction ();
			
			$anamnese = new Anamnese (); 
			$anamnese->area_funcional = $request->get ( "area_funcional" );
			$anamnese->QP = $request->get ( "QP" );
			$anamnese->HDA = $request->get ( "HDA" );
			$anamnese->HPP = $request->get ( "HPP" );
			$anamnese->HS = $request->get ( "HS" );
			$anamnese->HFAM = $request->get ( "HFAM" );
			$anamnese->AVDS = $request->get ( "AVDS" );
			$anamnese->medicamentos = $request->get ( "medicamentos" );
			$anamnese->ex_complementares = $request->get ( "ex_complementares" );
			$anamnese->agendamento_id = $request->get ( "agendamento_id" );
			$anamnese->paciente_id = $request->get ( "paciente_id" );
			$anamnese->save ();
			
			DB::commit ();
			
			alert ()->success ( '', config ( 'constants.SAVED' ) )->autoclose ( 2000 );
		} catch ( \Exception $e ) {
			Log::error ( $e );
			DB::rollback ();
			alert ()->error ( $e->getMessage (), 'Atenção' )->persistent ( 'Fechar' );
		}
		return redirect ( 'home' );
	}
	
	/**
	 * Iniciar a consulta
	 *
	 * @return int
	 */
	public function iniciarConsulta($id) {
		try {
			$agendamento = Agendamento::findOrFail ( $id );
			DB::beginTransaction ();
			$agendamento->iniciada = "1";
			$agendamento->save ();
			DB::commit ();
		} catch ( \Exception $e ) {
			Log::error ( $e );
			DB::rollback ();
			alert ()->error ( $e->getMessage (), 'Atenção' )->persistent ( 'Fechar' );
		}
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
}
