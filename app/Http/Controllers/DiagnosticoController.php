<?php

namespace App\Http\Controllers;

use App\Models\Agendamento;
use App\Models\Diagnostico;
use Exception;
use Illuminate\Http\Request;
use Log;
use Response;
use DB;

class DiagnosticoController extends Controller {
	
	/**
	 * Tela inicial do diagnostico
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function iniciar(Request $request) {
		try {
			$agendamento = Agendamento::findOrFail ( $request->get ( 'id' ) );
			$diagnostico = Diagnostico::where ( 'agendamento_id', '=', $agendamento->id )->orderBy ( 'created_at', 'desc' )->first ();
			$data ['page_title'] = 'Diagnostico';
			$data ['agendamento'] = $agendamento;
			$data ['diagnostico'] = $diagnostico;
		} catch ( \Exception $e ) {
			Log::error ( $e );
			alert ()->error ( $e->getMessage (), 'Atenção' )->persistent ( 'Fechar' );
		}
		return view ( 'paginas.consulta.diagnostico.create-edit' )->with ( $data );
	}
	
	/**
	 * Salvar diagnostico
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function store(Request $request) {
		try {
			DB::beginTransaction ();
			
			$diagnostico = new Diagnostico ();
			$diagnostico->agendamento_id = $request->get ( 'agendamento_id' );
			$diagnostico->diagnostico = $request->get ( 'diagnostico' ); 
			
			$diagnostico->save ();
			DB::commit ();
		} catch ( \Exception $e ) {
			Log::error ( $e );
			DB::rollback ();
			alert ()->error ( $e->getMessage (), 'Atenção' )->persistent ( 'Fechar' );
		}
		return $this->finalizarDiagnostico($diagnostico->agendamento_id );
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
			
			$diagnostico = Diagnostico::findOrFail ( $id );
			$diagnostico->diagnostico = $request->get ( 'diagnostico' ); 
			
			$diagnostico->save ();
			
			DB::commit ();
			alert ()->success ( '', config ( 'constants.SAVED' ) )->autoclose ( 2000 );
		} catch ( \Exception $e ) {
			Log::error ( $e );
			DB::rollback ();
			alert ()->error ( $e->getMessage (), 'Atenção' )->persistent ( 'Fechar' );
		}
		return $this->finalizarDiagnostico($diagnostico->agendamento_id );
	}
	
	/**
	 * Finalizar Diagnostico
	 *
	 * @return int
	 */
	public function finalizarDiagnostico($id) {
		try {
			$agendamento = Agendamento::findOrFail ( $id );
			DB::beginTransaction ();
			$agendamento->iniciada = "2";
			$agendamento->save ();
			DB::commit ();
		} catch ( \Exception $e ) {
			Log::error ( $e );
			DB::rollback ();
			alert ()->error ( $e->getMessage (), 'Atenção' )->persistent ( 'Fechar' );
		} 
		return redirect ( 'consulta/detalhes/'.$agendamento->id );
	} 
}
