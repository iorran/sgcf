<?php

namespace App\Http\Controllers;

use App\Models\Agendamento;
use App\Models\Anamnese;
use App\Models\AreaCardio; 
use App\Models\AreaNeuro;
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
		$anamnese = $this->possuiAnamnese ( $agendamento->paciente_id,$id );
		$data ['anamnese'] = $anamnese;
		$data ['areas_funcionais'] = config ( 'enum.area_funcional' );
		$data ['agendamento_id'] = $id;
		$data ['paciente_id'] = $agendamento->paciente_id;
		$data ['iniciada'] = $agendamento->iniciada;
		$data ['page_title'] = 'Anamnese';
		return view ( 'paginas.consulta.anamnese.create-edit' )->with ( $data );
	}
	
	/**
	 * Verificar se o paciente possui Anamnese
	 *
	 * @return int
	 */
	public function possuiAnamnese($paciente_id,$id) {
		try { 
			//Verifica se essa consulta ja foi criada uma anamnese ( caso o aluno tenha salvo a anamnese mas nao salvou a area.)
			$anamnese = Anamnese::where ( 'paciente_id', '=', $paciente_id )->where ( 'agendamento_id', '=', $id )->orderBy ( 'created_at', 'desc' )->first ();
			if($anamnese == null)
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
	 * Update the specified resource in storage.
	 *
	 * @param int $id        	
	 * @return \Illuminate\Http\Response
	 */
	public function updateAnamnese(Request $request, $id) {
		try {
			DB::beginTransaction ();
			
			$anamnese = Anamnese::findOrFail ( $id );
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
		
		$pagina = config ( 'enum.pagina_area_funcional' ); // defino a pagina a carregar
		$area = config ( 'enum.area_funcional' );
		$data ['page_title'] = $area [$request->get ( "area_funcional" )];
		$data ['paciente_id'] = $request->get ( "paciente_id" );
		$data ['agendamento_id'] = $request->get ( "agendamento_id" );
		
		/* 
		 * DB::table NÃO RESGATA AS RELAÇÕES 1 TO 1
		 * pesquisar area da consulta
		$tabela = 'area_' . $pagina [$request->get ( "area_funcional" )] . 's';
		$data ['area'] = DB::table ( $tabela )->where ( 'agendamento_id', '=', $request->get ( "agendamento_id" ) )->first ();
		*/ 
		switch ($request->get ( "area_funcional" )) {
		    case 0: 
		    	$data ['area'] = AreaTraumato::where ( 'agendamento_id', '=', $request->get ( "agendamento_id" ) )->first ();
		        break; 
		    case 1: 
		    	$data ['area'] = AreaRespiratoria::where ( 'agendamento_id', '=', $request->get ( "agendamento_id" ) )->first ();
		        break; 
		    case 2: 
		    	$data ['area'] = AreaNeuro::where ( 'agendamento_id', '=', $request->get ( "agendamento_id" ) )->first ();
		        break; 
		    case 3: 
		    	$data ['area'] = AreaTraumato::where ( 'agendamento_id', '=', $request->get ( "agendamento_id" ) )->first ();
		        break; 
		    case 4: 
		    	$data ['area'] = AreaCardio::where ( 'agendamento_id', '=', $request->get ( "agendamento_id" ) )->first ();
		        break; 
		    default:
		    	$data ['area'] = null;
		}
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
		return redirect ( 'consulta/detalhes/' . $agendamento->id );
	}
}
