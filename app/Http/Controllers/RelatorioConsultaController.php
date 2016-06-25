<?php

namespace App\Http\Controllers;

use App\Models\Agendamento;
use App\Models\Anamnese;
use App\Models\AreaCardio;
use App\Models\AreaGestacional;
use App\Models\AreaNeuro;
use App\Models\AreaRespiratoria;
use App\Models\AreaTraumato;
use Illuminate\Http\Request;
use Log;
use PDF;
use App\Models\Diagnostico;
use App\Models\Tratamento;

class RelatorioConsultaController extends Controller {
	/**
	 * Id do agendamento
	 */
	public function index(Request $request) {
		return $this->gerarRelatorio ( $request->get ( 'id' ) );
	}
	
	/**
	 * Exibe a tela com o relatorio gerado
	 */
	public function gerarRelatorio($id) {
		try {
			$area = config ( 'enum.area_funcional' );
			$pagina = config ( 'enum.pagina_area_funcional' ); // defino a pagina a carregar
			
			$data ['page_title'] = 'Relatório da Consulta';
			
			$data ['agendamento'] = Agendamento::findOrFail ( $id );
			$data ['anamnese'] = $this->getAnamnese ( $id );
			$data ['diagnostico'] = $this->getDiagnostico ( $id );
			$data ['tratamento'] = $this->getTratamento ( $id );
			$data ['nome_area'] = $area [$data ['anamnese']->area_funcional];
			$data ['simNao'] = config ( 'enum.SimNao' );
			$data ['risco'] = config ( 'enum.risco' );
			$data ['area'] = $this->getArea ( $data ['anamnese'] );
		} catch ( \Exception $e ) {
			Log::error ( $e );
			alert ()->error ( $e->getMessage (), 'Atenção' )->persistent ( 'Fechar' );
		}
		return view ( 'paginas.relatorio.consulta.rel_' . $pagina [$data ['anamnese']->area_funcional] )->with ( $data );
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
		} finally {
			return $anamnese;
		}
	}
	
	/**
	 * Retorna a area
	 *
	 * @return Area
	 */
	public function getArea($anamnese) {
		try {
			$area = null;
			switch ($anamnese->area_funcional) {
				case 0 :
					$area = AreaTraumato::where ( 'agendamento_id', '=', $anamnese->agendamento_id )->first ();
					break;
				case 1 :
					$area = AreaRespiratoria::where ( 'agendamento_id', '=', $anamnese->agendamento_id )->first ();
					break;
				case 2 :
					$area = AreaNeuro::where ( 'agendamento_id', '=', $anamnese->agendamento_id )->first ();
					break;
				case 3 :
					$area = AreaGestacional::where ( 'agendamento_id', '=', $anamnese->agendamento_id )->first ();
					break;
				case 4 :
					$area = AreaCardio::where ( 'agendamento_id', '=', $anamnese->agendamento_id )->first ();
					break;
				default :
					$area = null;
			}
		} catch ( \Exception $e ) {
			Log::error ( $e );
			DB::rollback ();
			alert ()->error ( $e->getMessage (), 'Atenção' )->persistent ( 'Fechar' );
		} finally {
			return $area;
		}
	}
	
	/**
	 * Retorna o diagnostico
	 *
	 * @return diagnostico
	 */
	public function getDiagnostico($agendamento_id) {
		try {
			$diagnostico = Diagnostico::where ( 'agendamento_id', '=', $agendamento_id )->first ();
		} catch ( \Exception $e ) {
			Log::error ( $e );
			DB::rollback ();
			alert ()->error ( $e->getMessage (), 'Atenção' )->persistent ( 'Fechar' );
		} finally {
			return $diagnostico;
		}
	}
	
	/**
	 * Retorna o tratamento
	 *
	 * @return tratamento
	 */
	public function getTratamento($agendamento_id) {
		try {
			$tratamento = Tratamento::where ( 'agendamento_id', '=', $agendamento_id )->first ();
		} catch ( \Exception $e ) {
			Log::error ( $e );
			DB::rollback ();
			alert ()->error ( $e->getMessage (), 'Atenção' )->persistent ( 'Fechar' );
		} finally {
			return $tratamento;
		}
	}
	public function exportar(Request $request) {
		$id = $request->get ( 'agendamento_id' );
		$area = config ( 'enum.area_funcional' );
		$pagina = config ( 'enum.pagina_area_funcional' ); // defino a pagina a carregar
		
		$data = array ();
		$data ['page_title'] = 'Relatório da Consulta';
		$data ['agendamento'] = Agendamento::findOrFail ( $id );
		$data ['anamnese'] = $this->getAnamnese ( $id );
		$data ['diagnostico'] = $this->getDiagnostico ( $id );
		$data ['tratamento'] = $this->getTratamento ( $id );
		$data ['nome_area'] = $area [$data ['anamnese']->area_funcional];
		$data ['simNao'] = config ( 'enum.SimNao' );
		$data ['risco'] = config ( 'enum.risco' );
		$data ['area'] = $this->getArea ( $data ['anamnese'] );
		
		$pdf = PDF::loadView ( 'paginas.relatorio.templates.tpl_' . $pagina [$data ['anamnese']->area_funcional], $data );
		return $pdf->download ( 'relatorio-da-consulta-' . date ( 'Y-m-d' ) . '.pdf' ); // this code is used for the name pdf
	}
}
