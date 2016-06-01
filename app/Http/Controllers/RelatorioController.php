<?php

namespace App\Http\Controllers;

use App\Models\Agendamento;
use Log;
use PDF;

class RelatorioController extends Controller {
	/**
	 * Exibe a tela com o relatorio de consultas do dia
	 *  
	 */	
	public function index() {
		try {
			$data ['page_title'] = 'Consultas marcadas no dia';
			// recupera as consultas ordenadas pela hora de incio da consulta
			$data ['consultas'] = $this->consultasDoDia();
		} catch ( \Exception $e ) {
			Log::error ( $e );
			alert ()->error ( $e->getMessage (), 'Atenção' )->persistent ( 'Fechar' );
		}
		return view ( 'paginas.relatorio.index' )->with ( $data );
	}
	
	/**
	 * Retorna as consultas marcadas no dia
	 *
	 * @return List consultas
	 */
	public function consultasDoDia() {
		$consultas = null;
		try { 
			// recupera as consultas ordenadas pela hora de incio da consulta
			$consultas = Agendamento::where ( 'data_consulta', '=', date ( 'Y-m-d' ) )->orderBy ( 'hora_start', 'asc' )->get ();
		} catch ( \Exception $e ) {
			Log::error ( $e );
			alert ()->error ( $e->getMessage (), 'Atenção' )->persistent ( 'Fechar' );
		}finally{
			return $consultas;	
		}
	}
	
	public function exportar() {
		$parameterr = array(); 
		
		$parameter ['page_title'] = 'Consultas marcadas no dia';
		// recupera as consultas ordenadas pela hora de incio da consulta
		$parameter ['consultas'] = $this->consultasDoDia();
		
		$pdf = PDF::loadView( 'paginas.relatorio.templates.relatorio-do-dia', $parameter ); 
        return $pdf->download('relatorio-de-consultas-'.date ( 'Y-m-d' ).'.pdf'); //this code is used for the name pdf
	}
}
