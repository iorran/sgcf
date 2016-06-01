<?php

/*
|--------------------------------------------------------------------------
| Rotas Iniciais
|--------------------------------------------------------------------------
| 
*/ 

Route::group(['middleware' => 'web'], function () {
	Route::get('/', 'Auth\AutenticarController@getIndex');

	Route::controller('login', 'Auth\AutenticarController', [
			'postAutenticar' => 'login.autenticar',
			'getLogout' => 'login.sair',
	]);
});
 
/*
 |--------------------------------------------------------------------------
 | Rotas de Aluno
 |--------------------------------------------------------------------------
 |
 */

Route::group(['middleware' => ['web','auth'] ], function () { 
	//Home
	Route::controller('home', 'HomeController', [
			'getIndex' => 'home.index',
	]); 
	//Cadastros
	Route::group(['prefix' => 'cadastro'], function () { 
		//Paciente
		Route::resource('paciente', 'PacienteController');
	});
	
});
 
/*
|--------------------------------------------------------------------------
| Rotas de Professor
|--------------------------------------------------------------------------
|  
*/

/*
 * Cadastro
 */
Route::group(['prefix' => 'cadastro', 'middleware' => ['web','auth'] ], function () { 
	//Alunos
	Route::resource('aluno', 'AlunoController');
	//Professor
	Route::resource('professor', 'ProfessorController');  
}); 

/*
 * Consulta
 */ 
Route::group(['middleware' => ['web','auth'] ], function () { 
	//Agenda
	Route::resource('agenda', 'AgendaController');
	Route::post('agenda/create', 'AgendaController@create');	// create aceita apenas get
	Route::post('agenda/detalhes', 'AgendaController@showDetalhes'); // exibe o painel com as ções da consulta
	Route::post('agenda/desmarcarConsulta', 'AgendaController@desmarcarConsulta'); // desmarca a consulta
}); 

/*
 * Relatório
 */
Route::group(['middleware' => ['web','auth'] ], function () { 
	Route::get('relatorio/consultas-do-dia', 'RelatorioController@index'); //relatório de consultas no dia
	Route::get('relatorio/consultas-do-dia/exportar', 'RelatorioController@exportar'); //exportar o relatorio em pdf
}); 

/*
 |--------------------------------------------------------------------------
 | Rotas de Webservice
 |--------------------------------------------------------------------------
 |
 */

Route::group(['prefix' => 'json', 'middleware' => 'web'], function () { 
	//Todos os alunos
	Route::get('alunos', 'AlunoController@getAllAlunosJson'); 
	//Todos as consultas
	Route::get('agendas', 'AgendaController@getAllAgendaJson'); 
});
	

