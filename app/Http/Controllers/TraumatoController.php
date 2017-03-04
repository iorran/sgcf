<?php

namespace App\Http\Controllers;

use App\Models\AreaTraumato;
use DB;
use Illuminate\Http\Request;
use Log;

class TraumatoController extends Controller {
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
			$area_traumato->save ();
			
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
	public function updateAreaTraumato(Request $request, $id) {
		try {
			DB::beginTransaction ();
			$area_traumato = AreaTraumato::findOrFail ( $id );
			
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
			$area_traumato->save ();
			
			DB::commit ();
			alert ()->success ( '', config ( 'constants.UPDATED' ) )->autoclose ( 2000 );
		} catch ( \Exception $e ) {
			Log::error ( $e );
			DB::rollback ();
			alert ()->error ( $e->getMessage (), 'Atenção' )->persistent ( 'Fechar' );
		}
		return redirect ( 'consulta/detalhes/' . $area_traumato->agendamento_id );
	} 
}
