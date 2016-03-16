<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Response;

class HomeController extends Controller { 
	
	/**
	 * Retorna tela de login
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function getIndex() {
		$data['page_title'] = 'Home'; 
		return view ( 'paginas.home' )->with($data);
	} 
	 
	
	/**
	 * Error 404
	 *
	 * @return response
	 */
	public function missingMethod($params = array()) {
		return view ( 'errors.404', $params );
	}
}
