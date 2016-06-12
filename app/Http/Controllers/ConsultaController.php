<?php

namespace App\Http\Controllers;

use App\Models\Agendamento;
use App\Models\Anamnese;
use App\Models\AreaRespiratoria;
use App\Models\AreaTraumato; 
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
		
		$pagina = config ( 'enum.pagina_area_funcional' );
		$area = config ( 'enum.area_funcional' );
		$data ['page_title'] = $area [$request->get ( "area_funcional" )];
		$data ['paciente_id'] = $request->get ( "paciente_id" );
		$data ['agendamento_id'] = $request->get ( "agendamento_id" );
		return view ( 'paginas.consulta.area.' . $pagina [$request->get ( "area_funcional" )] )->with ( $data );
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
	 * Salva Informações das consultas com area respiratória
	 *
	 * @param
	 *        	\App\Http\Requests\Request
	 *        	
	 */
	public function storeAreaRespiratoria(Request $request) {
		try {
			DB::beginTransaction ();
			
			$area_respiratoria = new AreaRespiratoria ();
			
			$area_respiratoria->paciente_id = $request->get ( 'paciente_id' );
			$area_respiratoria->agendamento_id = $request->get ( 'agendamento_id' );
			
			$area_respiratoria->analise_postural = $request->get ( 'analise_postural' );
			$area_respiratoria->avds = $request->get ( 'avds' );
			$area_respiratoria->linha_axilar = $request->get ( 'linha_axilar' );
			$area_respiratoria->ap_xifoide = $request->get ( 'ap_xifoide' );
			$area_respiratoria->ultimas_costelas = $request->get ( 'ultimas_costelas' );
			$area_respiratoria->cicatriz_umbilical = $request->get ( 'cicatriz_umbilical' );
			$area_respiratoria->ex_complementares = $request->get ( 'ex_complementares' );
			
			$area_respiratoria->manovacuamento = $request->get ( 'manovacuamento' );
			$area_respiratoria->ventilometro = $request->get ( 'ventilometro' );
			$area_respiratoria->peak_flow = $request->get ( 'peak_flow' );
			$area_respiratoria->palpitacao = $request->get ( 'palpitacao' );
			$area_respiratoria->diafragma = $request->get ( 'diafragma' );
			$area_respiratoria->abdominais = $request->get ( 'abdominais' );
			$area_respiratoria->ecom = $request->get ( 'ecom' );
			$area_respiratoria->trapezio = $request->get ( 'trapezio' );
			$area_respiratoria->vertebrais = $request->get ( 'vertebrais' );
			$area_respiratoria->peitoral = $request->get ( 'peitoral' );
			$area_respiratoria->intercostais = $request->get ( 'intercostais' );
			$area_respiratoria->ritmo = $request->get ( 'ritmo' );
			$area_respiratoria->tipo = $request->get ( 'tipo' );
			$area_respiratoria->amplitude = $request->get ( 'amplitude' );
			$area_respiratoria->musculatura = $request->get ( 'musculatura' );
			$area_respiratoria->tosse = $request->get ( 'tosse' );
			$area_respiratoria->percussao = $request->get ( 'percussao' );
			$area_respiratoria->ausculta = $request->get ( 'ausculta' );
			$area_respiratoria->fc = $request->get ( 'fc' );
			$area_respiratoria->fr = $request->get ( 'fr' );
			$area_respiratoria->t = $request->get ( 't' );
			$area_respiratoria->spo2 = $request->get ( 'spo2' );
			$area_respiratoria->imc = $request->get ( 'imc' );
			$area_respiratoria->inspecao = $request->get ( 'inspecao' );
			$area_respiratoria->save ();
			
			DB::commit ();
			alert ()->success ( '', config ( 'constants.SAVED' ) )->autoclose ( 2000 );
		} catch ( \Exception $e ) {
			Log::error ( $e );
			DB::rollback ();
			alert ()->error ( $e->getMessage (), 'Atenção' )->persistent ( 'Fechar' );
		}
		return "Painel da consulta";
	}
	
	/**
	 * Salva Informações das consultas com area Traumato Ortopedica
	 *
	 * @param
	 *        	\App\Http\Requests\Request
	 *        	
	 */
	public function storeAreaTraumato(Request $request) {
		try {
			DB::beginTransaction ();
			
			$area_traumato = new AreaTraumato ();
			
			$area_traumato->paciente_id = $request->get ( 'paciente_id' );
			$area_traumato->agendamento_id = $request->get ( 'agendamento_id' );
			
			$area_traumato->analise_muscular = $request->get ( 'analise_muscular' );
			$area_traumato->analise_articular = $request->get ( 'analise_articular' );
			$area_traumato->perimetria = $request->get ( 'perimetria' );
			$area_traumato->imobilizacao = $request->get ( 'imobilizacao' );
			$area_traumato->analise_de_edema = $request->get ( 'analise_de_edema' );
			$area_traumato->analise_de_dor = $request->get ( 'analise_de_dor' );
			$area_traumato->analise_de_cicatriz = $request->get ( 'analise_de_cicatriz' );
			$area_traumato->analise_de_crepitacao = $request->get ( 'analise_de_crepitacao' );
			$area_traumato->analise_de_marcha = $request->get ( 'analise_de_marcha' );
			$area_traumato->testes_especificos = $request->get ( 'testes_especificos' );
			$area_traumato->ex_complementares = $request->get ( 'ex_complementares' );
			$area_traumato->objetivos_do_tratamento = $request->get ( 'objetivos_do_tratamento' );
			$area_traumato->conduta_fisioterapeutica = $request->get ( 'conduta_fisioterapeutica' );
			$area_traumato->save();
			
			DB::commit ();
			alert ()->success ( '', config ( 'constants.SAVED' ) )->autoclose ( 2000 );
		} catch ( \Exception $e ) {
			Log::error ( $e );
			DB::rollback ();
			alert ()->error ( $e->getMessage (), 'Atenção' )->persistent ( 'Fechar' );
		}
		return "Painel da consulta";
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
