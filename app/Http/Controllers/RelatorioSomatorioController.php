<?php

namespace App\Http\Controllers;

use App\Models\Agendamento;
use App\Models\Anamnese;
use App\Models\AreaCardio;
use App\Models\AreaGestacional;
use App\Models\AreaNeuro;
use App\Models\AreaRespiratoria;
use App\Models\AreaTraumato;
use App\Models\Diagnostico;
use App\Models\Paciente;
use App\Models\Tratamento;
use DB;
use Illuminate\Http\Request;
use Log;
use PDF;

class RelatorioSomatorioController extends Controller {
	/**
	 * Recebe os filtros
	 */
	public function index() {
		$data ['page_title'] = 'Relatório de Somatório de Consultas';
		return view ( 'paginas.relatorio.somatorio.index' )->with ( $data );
	}
	
	/**
	 * gera o relatorio
	 * 
	 * @param Request $request        	
	 */
	public function gerarSomatorio(Request $request) {
		$data1 = $request->get ( 'data1' );
		$data2 = $request->get ( 'data2' );
		if ($data1 > $data2) {
			return redirect ()->back ()->withErrors ( [ 
					'data1' => 'Data inicial não pode ser maior que a final' 
			] );
		}
		
		$data['traumato'] = DB::table ( 'anamneses' )
		->join('agendamentos', 'agendamentos.id', '=', 'anamneses.agendamento_id')
		->where ( 'agendamentos.iniciada', '=', '4' )
		->whereBetween('agendamentos.data_consulta', array($data1, $data2))
		->groupBy ( 'area_funcional' ) 
		->where ( 'area_funcional', '=', '0' )
		->count ();
		
		$data['respiratoria'] = DB::table ( 'anamneses' )
		->join('agendamentos', 'agendamentos.id', '=', 'anamneses.agendamento_id')
		->where ( 'agendamentos.iniciada', '=', '4' )
		->whereBetween('agendamentos.data_consulta', array($data1, $data2))
		->groupBy ( 'area_funcional' )
		->where ( 'area_funcional', '=', '1' )
		->count ();
		
		$data['neuro'] = DB::table ( 'anamneses' )
		->join('agendamentos', 'agendamentos.id', '=', 'anamneses.agendamento_id')
		->where ( 'agendamentos.iniciada', '=', '4' )
		->whereBetween('agendamentos.data_consulta', array($data1, $data2))
		->groupBy ( 'area_funcional' )
		->where ( 'area_funcional', '=', '2' )
		->count ();
		
		$data['gestacional'] = DB::table ( 'anamneses' )
		->join('agendamentos', 'agendamentos.id', '=', 'anamneses.agendamento_id')
		->where ( 'agendamentos.iniciada', '=', '4' )
		->whereBetween('agendamentos.data_consulta', array($data1, $data2))
		->groupBy ( 'area_funcional' )
		->where ( 'area_funcional', '=', '3' )
		->count ();
		
		$data['cardio'] = DB::table ( 'anamneses' )
		->join('agendamentos', 'agendamentos.id', '=', 'anamneses.agendamento_id')
		->where ( 'agendamentos.iniciada', '=', '4' )
		->whereBetween('agendamentos.data_consulta', array($data1, $data2))
		->groupBy ( 'area_funcional' )
		->where ( 'area_funcional', '=', '4' )
		->count ();

		$data['atendimento'] = Agendamento::groupBy ( 'iniciada' )->where ( 'iniciada', '=', '4' )->whereBetween('data_consulta', array($data1, $data2))->count ();
		$data['marcada'] = Agendamento::groupBy ( 'iniciada' )->where ( 'iniciada', '!=', '4' )->where ( 'iniciada', '!=', '5' )->whereBetween('data_consulta', array($data1, $data2))->count ();
		$data['ausencia'] = Agendamento::groupBy ( 'iniciada' )->where ( 'iniciada', '=', '5' )->whereBetween('data_consulta', array($data1, $data2))->count ();
		
		$data['inicio'] = $data1;
		$data['fim'] = $data2;
		
		$pdf = PDF::loadView ( 'paginas.relatorio.templates.tpl_somatorio', $data );
		return $pdf->download ( 'relatorio-somatorio-' . date ( 'Y-m-d' ) . '.pdf' ); // this code is used for the name pdf
	}
}
