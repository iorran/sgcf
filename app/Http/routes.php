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
 | Rotas Geral
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

Route::group(['prefix' => 'cadastro', 'middleware' => ['web','auth'] ], function () {
	//Route::auth();
	/*
	 * Cadastro de aluno
	 */
	
	/*
	 * Forma explicita
	 */
// 	Route::get('aluno', 'AlunoController@index');
// 	Route::get('aluno/create', 'AlunoController@create');
// 	Route::get('aluno/create', 'AlunoController@store');
// 	Route::get('aluno/edit/{id}', 'AlunoController@edit');

	/*
	 * Forma implicita
	 */
// 	Route::controller('aluno', 'AlunoController');

	//Alunos
	Route::resource('aluno', 'AlunoController');
	//Professor
	Route::resource('professor', 'ProfessorController'); 
	
}); 
