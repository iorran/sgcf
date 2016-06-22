<?php

namespace App\Http\Controllers;

use App\Models\Agendamento;
use Log;
use PDF;
use Illuminate\Http\Request;

class RelatorioColsutasDiaController extends Controller {
	/**
	 * Armazena as consultas feitas
	 */
	private $dataSource;
	
	/**
	 * Exibe a tela para selecionar a data
	 */
	public function index() {
		try {
			$data ['page_title'] = 'Consultas marcadas no dia';
			// recupera as consultas ordenadas pela hora de incio da consulta
		} catch ( \Exception $e ) {
			Log::error ( $e );
			alert ()->error ( $e->getMessage (), 'Atenção' )->persistent ( 'Fechar' );
		}
		return view ( 'paginas.relatorio.dia.index' )->with ( $data );
	}
	
	/**
	 * Exibe a tela com o relatorio gerado
	 */
	public function gerarRelatorio(Request $request) {
		try {
			$data ['page_title'] = 'Consultas marcadas no dia';
			// recupera as consultas ordenadas pela hora de incio da consulta
			$data ['data'] = $request->get('data');
			$data ['consultas'] = $this->consultasDoDia ( $request->get('data') );
		} catch ( \Exception $e ) {
			Log::error ( $e );
			alert ()->error ( $e->getMessage (), 'Atenção' )->persistent ( 'Fechar' );
		}
		return view ( 'paginas.relatorio.dia.relatorio' )->with ( $data );
	}
	
	/**
	 * Retorna as consultas marcadas no dia
	 *
	 * @return List consultas
	 */
	public function consultasDoDia($data) {
		$consultas = null;
		try {
			// recupera as consultas ordenadas pela hora de incio da consulta
			// padrão da date ( 'Y-m-d' )
			$consultas = Agendamento::where ( 'data_consulta', '=', $data )->orderBy ( 'hora_start', 'asc' )->get (); 
		} catch ( \Exception $e ) {
			Log::error ( $e );
			alert ()->error ( $e->getMessage (), 'Atenção' )->persistent ( 'Fechar' );
		} finally{
			return $consultas;
		}
	}
	public function exportar(Request $request) {
		$parameterr = array ();
		
		$parameter ['page_title'] = 'Consultas marcadas no dia';
		// recupera as consultas ordenadas pela hora de incio da consulta
		$parameter ['consultas'] = $this->consultasDoDia ( $request->get('data'));
		
		$pdf = PDF::loadView ( 'paginas.relatorio.templates.relatorio-do-dia', $parameter );
		return $pdf->download ( 'relatorio-de-consultas-' . date ( 'Y-m-d' ) . '.pdf' ); // this code is used for the name pdf
	}
}
