<?php

namespace App\Http\Controllers;

use App\Models\Aluno;
use App\Models\Paciente;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Log;

class AgendaController extends Controller {
	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index() {
		try {
			$data ['page_title'] = 'Consultas';
			// Data e hora
			$data ['dataAtual'] = date ( 'Y-m-d' );
			$data ['horaAtual'] = date ( 'H:i' );
			// Pacientes
			$data['pacientes'] = Paciente::get ();
			 
		} catch ( \Exception $e ) {
			Log::error ( $e );
			alert ()->error ( $e->getMessage (), 'Atenção' )->persistent ( 'Fechar' );
		}
		return view ( 'paginas.agenda.index' )->with ( $data );
	}
	
	/**
	 * Show the form for creating a new resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function create() {
		//
	}
	
	/**
	 * Store a newly created resource in storage.
	 *
	 * @param \Illuminate\Http\Request $request        	
	 * @return \Illuminate\Http\Response
	 */
	public function store(Request $request) {
		//
	}
	
	/**
	 * Display the specified resource.
	 *
	 * @param int $id        	
	 * @return \Illuminate\Http\Response
	 */
	public function show($id) {
		//
	}
	
	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param int $id        	
	 * @return \Illuminate\Http\Response
	 */
	public function edit($id) {
		//
	}
	
	/**
	 * Update the specified resource in storage.
	 *
	 * @param \Illuminate\Http\Request $request        	
	 * @param int $id        	
	 * @return \Illuminate\Http\Response
	 */
	public function update(Request $request, $id) {
		//
	}
	
	/**
	 * Remove the specified resource from storage.
	 *
	 * @param int $id        	
	 * @return \Illuminate\Http\Response
	 */
	public function destroy($id) {
		//
	}
	
	/**
	 * Error 404
	 *
	 * @return response
	 */
	public function missingMethod($params = array()) {
		return view ( 'errors.404', $params );
	}
	
	/**
	 * Return JSON Cliente list
	 *
	 * @return json
	 */
	public function getAllAgendaJson() {
// 		try { 
// 			$alunos = Aluno::get (); 
// 			$response = null;
// 			foreach ( $alunos as $aluno ) { 
// 				$response  [] = [ 
// 						'id' => $aluno->id,
// 						'title' => $aluno->usuario->nome,
// 						'eventColor' => 'green' 
// 				];
// 			}
// 		} catch ( Exception $e ) {
// 			Log::error ( $e );
// 			alert ()->error ( $e->getMessage (), 'Atenção' )->persistent ( 'Fechar' );
// 		} finally{
// 			return Response::json ( $response );
// 		}
	}
}
