<?php

namespace App\Http\Controllers;

use DB;
use Illuminate\Http\Request;
use Log;

class GestacionalController extends Controller {
	/**
	 * Salva Informações das consultas com area Gestacional 
	 *
	 * @param
	 *        	\App\Http\Requests\Request
	 *        	
	 */
	public function storeGestacional(Request $request) { 
		dd($request);
		try {
			DB::beginTransaction ();
			
			$area = new AreaCardio ();
			$area->paciente_id = $request->get ( 'paciente_id' );
			$area->agendamento_id = $request->get ( 'agendamento_id' );
			$area->pa = $request->get ( 'pa' );
			$area->pa2 = $request->get ( 'pa2' );
			$area->fcr = $request->get ( 'fcr' );
			$area->fcr2 = $request->get ( 'fcr2' );
			$area->medicamentos = $request->get ( 'medicamentos' );
			$area->save (); 
			
			$exame = new CardioExame ();
			$exame->colesterol_total = $request->get ( 'hdl' ) + $request->get('ldl');
			$exame->hdl = $request->get ( 'hdl' );
			$exame->ldl = $request->get('ldl');
			$exame->triglicerideos = $request->get('triglicerideos');
			$exame->glicose = $request->get('glicose');
			$exame->imc  = $request->get('imc');
			$area->Exame ()->save ( $exame ); 
			
			$fator = new CardioFator ();
			$fator->historia = $request->get('historia');
			$fator->fumo = $request->get('fumo');
			$fator->hipertensao = $request->get('hipertensao');
			$fator->hipercolesterolemia = $request->get('hipercolesterolemia');
			$fator->glicose_jejum = $request->get('glicose_jejum');
			$fator->obesidade = $request->get('obesidade');
			$fator->estilo = $request->get('estilo');
			$fator->colesterol = $request->get('colesterol');
			$area->Fator ()->save ( $fator ); 
			
			$sitoma = new CardioSintoma ();
			$sitoma->p1 = $request->get('p1');
			$sitoma->p2 = $request->get('p2');
			$sitoma->p3 = $request->get('p3');
			$sitoma->p4 = $request->get('p4');
			$sitoma->p5 = $request->get('p5');
			$sitoma->p6 = $request->get('p6');
			$sitoma->p7 = $request->get('p7');
			$sitoma->p8 = $request->get('p8');
			$sitoma->p9 = $request->get('p9');
			$sitoma->tipo_risco = $request->get('tipo_risco');
			$area->Sintoma ()->save ( $sitoma ); 
			
			$aptidao = new CardioAptidao ();
			$aptidao->teste_articular = $request->get('teste_articular');
			$aptidao->teste_muscular = $request->get('teste_muscular');
			$aptidao->analise_da_marcha = $request->get('analise_da_marcha');
			$aptidao->analise_ventilatoria = $request->get('analise_ventilatoria');
			$aptidao->fr = $request->get('fr');
			$aptidao->temp_auxiliar = $request->get('temp_auxiliar');
			$aptidao->sao2 = $request->get('sao2');
			$aptidao->ausculta_pulmonar = $request->get('ausculta_pulmonar');
			$aptidao->dor_toracica = $request->get('dor_toracica');
			$area->Aptidao ()->save ( $aptidao ); 
			
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
	public function updateGestacional(Request $request, $id) {
		dd($request);
		try {
			DB::beginTransaction ();
			
			$area = AreaCardio::findOrFail ( $id );   
			
			$area->paciente_id = $request->get ( 'paciente_id' );
			$area->agendamento_id = $request->get ( 'agendamento_id' );
			$area->pa = $request->get ( 'pa' );
			$area->pa2 = $request->get ( 'pa2' );
			$area->fcr = $request->get ( 'fcr' );
			$area->fcr2 = $request->get ( 'fcr2' );
			$area->medicamentos = $request->get ( 'medicamentos' ); 
			 
			$exame = $area->exame;
			$exame->colesterol_total = $request->get ( 'hdl' ) + $request->get('ldl');
			$exame->hdl = $request->get ( 'hdl' );
			$exame->ldl = $request->get('ldl');
			$exame->triglicerideos = $request->get('triglicerideos');
			$exame->glicose = $request->get('glicose');
			$exame->imc  = $request->get('imc');
			
			$fator = $area->fator;
			$fator->historia = $request->get('historia');
			$fator->fumo = $request->get('fumo');
			$fator->hipertensao = $request->get('hipertensao');
			$fator->hipercolesterolemia = $request->get('hipercolesterolemia');
			$fator->glicose_jejum = $request->get('glicose_jejum');
			$fator->obesidade = $request->get('obesidade');
			$fator->estilo = $request->get('estilo');
			$fator->colesterol = $request->get('colesterol'); 
			
			$sitoma = $area->sintoma;
			$sitoma->p1 = $request->get('p1');
			$sitoma->p2 = $request->get('p2');
			$sitoma->p3 = $request->get('p3');
			$sitoma->p4 = $request->get('p4');
			$sitoma->p5 = $request->get('p5');
			$sitoma->p6 = $request->get('p6');
			$sitoma->p7 = $request->get('p7');
			$sitoma->p8 = $request->get('p8');
			$sitoma->p9 = $request->get('p9');
			$sitoma->tipo_risco = $request->get('tipo_risco');
			
			$aptidao = $area->aptidao;
			$aptidao->teste_articular = $request->get('teste_articular');
			$aptidao->teste_muscular = $request->get('teste_muscular');
			$aptidao->analise_da_marcha = $request->get('analise_da_marcha');
			$aptidao->analise_ventilatoria = $request->get('analise_ventilatoria');
			$aptidao->fr = $request->get('fr');
			$aptidao->temp_auxiliar = $request->get('temp_auxiliar');
			$aptidao->sao2 = $request->get('sao2');
			$aptidao->ausculta_pulmonar = $request->get('ausculta_pulmonar');
			$aptidao->dor_toracica = $request->get('dor_toracica'); 
			
			$area->push ();
			
			DB::commit (); 
			alert ()->success ( '', config ( 'constants.UPDATED' ) )->autoclose ( 2000 );
		} catch ( \Exception $e ) {
			Log::error ( $e );
			DB::rollback ();
			alert ()->error ( $e->getMessage (), 'Atenção' )->persistent ( 'Fechar' );
		}
		return redirect ( 'consulta/detalhes/' . $area->agendamento_id );
	}
}
