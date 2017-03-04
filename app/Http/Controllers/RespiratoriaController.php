<?php

namespace App\Http\Controllers;

use App\Models\AreaRespiratoria;
use DB;
use Illuminate\Http\Request;
use Log;

class RespiratoriaController extends Controller {

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
		return redirect ( 'consulta/iniciada/' . $request->get ( "agendamento_id" ) );
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param int $id
	 * @return \Illuminate\Http\Response
	 */
	public function updateAreaRespiratoria(Request $request, $id) {
		try {
			DB::beginTransaction (); 
			$area_respiratoria = AreaRespiratoria::findOrFail ( $id );
				
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
			alert ()->success ( '', config ( 'constants.UPDATED' ) )->autoclose ( 2000 );
		} catch ( \Exception $e ) {
			Log::error ( $e );
			DB::rollback ();
			alert ()->error ( $e->getMessage (), 'Atenção' )->persistent ( 'Fechar' );
		}
		return redirect ( 'consulta/detalhes/' . $area_respiratoria->agendamento_id );
	}
}
