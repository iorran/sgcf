<?php

namespace App\Http\Controllers;

use App\Models\Anamnese; 
use App\Models\AreaCardio;
use App\Models\AreaGestacional;
use App\Models\AreaNeuro;
use App\Models\AreaRespiratoria;
use App\Models\AreaTraumato;
use Illuminate\Http\Request;
use Log;
use PDF;

class RelatorioConsultaController extends Controller {
	/**
	 * Id do agendamento
	 */
	public function index(Request $request) { 
		$this->gerarRelatorio($request->get('id'));
	}
	
	/**
	 * Exibe a tela com o relatorio gerado
	 */
	public function gerarRelatorio($id) {
		try {
			$data ['page_title'] = 'Relatório da Consulta';
			$data ['anamnese'] = $this->getAnamnese ( $id );
			$data ['area'] = $this->getArea ( $data ['anamnese'] ); 
		} catch ( \Exception $e ) {
			Log::error ( $e );
			alert ()->error ( $e->getMessage (), 'Atenção' )->persistent ( 'Fechar' );
		}
		return view ( 'paginas.relatorio.dia.relatorio' )->with ( $data );
	}
	
	/**
	 * Retorna a anamnese
	 * 
	 * @return Anamnese
	 */
	public function getAnamnese($agendamento_id) {
		try {
			$anamnese = Anamnese::where ( 'agendamento_id', '=', $agendamento_id )->first ();
		} catch ( \Exception $e ) {
			Log::error ( $e );
			DB::rollback ();
			alert ()->error ( $e->getMessage (), 'Atenção' )->persistent ( 'Fechar' );
		}finally {
			return $anamnese;
		}
	}
	
	/**
	 * Retorna a area
	 * 
	 * @return Area
	 */
	public function getArea($anamnese){
		try { 
			$area = null;    
			switch ($anamnese->area_funcional) {
				case 0: 
					$area = AreaTraumato::where ( 'agendamento_id', '=', $anamnese->agendamento_id )->first ();
					break;
				case 1:
					$area = AreaRespiratoria::where ( 'agendamento_id', '=', $anamnese->agendamento_id )->first ();  
					break;
				case 2: 
					$area = AreaNeuro::where ( 'agendamento_id', '=', $anamnese->agendamento_id )->first ();
					break;
				case 3: 
					$area = AreaGestacional::where ( 'agendamento_id', '=', $anamnese->agendamento_id )->first ();
					break;
				case 4: 
					$area = AreaCardio::where ( 'agendamento_id', '=', $anamnese->agendamento_id )->first ();
					break;
				default:
					$area = null;
			}
		} catch ( \Exception $e ) {
			Log::error ( $e );
			DB::rollback ();
			alert ()->error ( $e->getMessage (), 'Atenção' )->persistent ( 'Fechar' );
		}finally {
			return $area;
		} 
	} 
	
	public function exportar(Request $request) {
		$parameterr = array ();
		
		$parameter ['page_title'] = 'Relatório da Agenda';
		// recupera as consultas ordenadas pela hora de incio da consulta
		$parameter ['consultas'] = $this->consultasDoDia ( $request->get('data'));
		
		$pdf = PDF::loadView ( 'paginas.relatorio.templates.relatorio-do-dia', $parameter );
		return $pdf->download ( 'relatorio-de-consultas-' . date ( 'Y-m-d' ) . '.pdf' ); // this code is used for the name pdf
	}
}
