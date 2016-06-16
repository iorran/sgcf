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
			'postRecuperar' => 'login.recuperar',
	]);
	
	//rota de erro 403  
	Route::get('acesso-negado', 'Auth\AutenticarController@getAcessoNegado');
});
 
/*
 |--------------------------------------------------------------------------
 | Rotas de Aluno
 |--------------------------------------------------------------------------
 |
 */

Route::group(['middleware' => ['web','basic'] ], function () { 
	//Home
	Route::controller('home', 'HomeController', [
			'getIndex' => 'home.index',
	]);  
	//Agenda
	Route::resource('agenda', 'AgendaController');
	Route::post('agenda/create', 'AgendaController@create');	// create aceita apenas get
	Route::post('agenda/detalhes', 'AgendaController@showDetalhes'); // exibe o painel com as ações da consulta 
	Route::get('agenda/detalhes/{id}', 'AgendaController@showDetalhes'); // exibe o painel com as ações da consulta 
	Route::post('agenda/desmarcarConsulta', 'AgendaController@desmarcarConsulta'); // desmarca a consulta
	//Consulta 
	Route::get('consulta/iniciar/{id}', 'ConsultaController@init');	  	
	Route::post('consulta/anamnese/store', ['uses' => 'ConsultaController@storeAnamnese', 'as' => 'consulta.anamnese.store']); 
	//Areas
	Route::post('consulta/area/respiratoria', ['uses' => 'ConsultaController@storeAreaRespiratoria', 'as' => 'consulta.area.respiratoria.store']);
	Route::post('consulta/area/traumato', ['uses' => 'ConsultaController@storeAreaTraumato', 'as' => 'consulta.area.traumato.store']);
	//Tratamento
	Route::post('tratamento/iniciar', ['uses' => 'TratamentoController@iniciar', 'as' => 'tratamento.iniciar']);
	Route::post('tratamento/store', ['uses' => 'TratamentoController@store', 'as' => 'tratamento.store']);
	Route::put('tratamento/update/{id}', ['uses' => 'TratamentoController@update', 'as' => 'tratamento.update']);
	Route::get('consulta/detalhes/{id}', 'TratamentoController@showDetalhes'); // exibe o painel com as ações da consulta 
	
	//Diagnostico
	Route::post('diagnostico/iniciar', ['uses' => 'TratamentoController@iniciar', 'as' => 'diagnostico.iniciar']);
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
	//Paciente
	Route::resource('paciente', 'PacienteController');
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
	

