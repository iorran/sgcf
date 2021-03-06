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
	Route::post('agenda/cancelarConsulta', ['uses' => 'AgendaController@cancelarConsulta', 'as' => 'consulta.ausencia']); // desmarca a consulta
	//Consulta 
	Route::get('consulta/iniciar/{id}', 'ConsultaController@init');	  	
	Route::post('consulta/anamnese/store', ['uses' => 'ConsultaController@storeAnamnese', 'as' => 'consulta.anamnese.store']); 
	Route::put('consulta/anamnese/update/{id}', ['uses' => 'ConsultaController@updateAnamnese', 'as' => 'consulta.anamnese.update']); 
	Route::get('consulta/iniciada/{id}', ['uses' => 'ConsultaController@iniciarConsulta', 'as' => 'consulta.iniciada']);	  	
	//Areas
		//Respiratoria
		Route::post('consulta/area/respiratoria', ['uses' => 'RespiratoriaController@storeAreaRespiratoria', 'as' => 'consulta.area.respiratoria.store']);
		Route::put('consulta/area/respiratoria/{id}', ['uses' => 'RespiratoriaController@updateAreaRespiratoria', 'as' => 'consulta.area.respiratoria.update']);
		//Traumato
		Route::post('consulta/area/traumato', ['uses' => 'TraumatoController@storeAreaTraumato', 'as' => 'consulta.area.traumato.store']);
		Route::put('consulta/area/traumato/{id}', ['uses' => 'TraumatoController@updateAreaTraumato', 'as' => 'consulta.area.traumato.update']);//Traumato
		//Neuro
		Route::post('consulta/area/neuro', ['uses' => 'NeuroController@storeNeuro', 'as' => 'consulta.area.neuro.store']);
		Route::put('consulta/area/neuro/{id}', ['uses' => 'NeuroController@updateNeuro', 'as' => 'consulta.area.neuro.update']);
		//Cardio
		Route::post('consulta/area/cardio', ['uses' => 'CardioController@storeCardio', 'as' => 'consulta.area.cardio.store']);
		Route::put('consulta/area/cardio/{id}', ['uses' => 'CardioController@updateCardio', 'as' => 'consulta.area.cardio.update']);
		//Gestacional
		Route::post('consulta/area/gestacional', ['uses' => 'GestacionalController@storeGestacional', 'as' => 'consulta.area.gestacional.store']);
		Route::put('consulta/area/gestacional/{id}', ['uses' => 'GestacionalController@updateGestacional', 'as' => 'consulta.area.gestacional.update']);
	//Tratamento
	Route::post('tratamento/iniciar', ['uses' => 'TratamentoController@iniciar', 'as' => 'tratamento.iniciar']);
	Route::post('tratamento/store', ['uses' => 'TratamentoController@store', 'as' => 'tratamento.store']);
	Route::put('tratamento/update/{id}', ['uses' => 'TratamentoController@update', 'as' => 'tratamento.update']);
	Route::get('consulta/detalhes/{id}', 'TratamentoController@showDetalhes'); // exibe o painel com as ações da consulta  
	//Diagnostico
	Route::post('diagnostico/iniciar', ['uses' => 'DiagnosticoController@iniciar', 'as' => 'diagnostico.iniciar']);
	Route::post('diagnostico/store', ['uses' => 'DiagnosticoController@store', 'as' => 'diagnostico.store']);
	Route::put('diagnostico/update/{id}', ['uses' => 'DiagnosticoController@update', 'as' => 'diagnostico.update']);
	//Finalizar
	Route::post('consulta/finalizar', ['uses' => 'ConsultaController@finalizarConsulta', 'as' => 'consulta.finalizar']);	  	
	//Relatório Historico
	Route::post('consulta/visualizar', ['uses' => 'RelatorioConsultaController@index', 'as' => 'visualizar.consulta']);
	Route::post('relatorio/consulta/exportar', ['uses' => 'RelatorioConsultaController@exportar', 'as' => 'exportar.relatorio.consulta']); //exportar o relatorio em pdf
	Route::get('relatorio/historico', ['uses' => 'RelatorioConsultaController@exibirFiltroHistorico', 'as' => 'relatorio.historico']); // exibe a tela com o filtro
	Route::post('relatorio/historico', ['uses' => 'RelatorioConsultaController@gerarHistorico', 'as' => 'gerar.relatorio.historico']); // exibe a tela com o filtro
	//consultas Dia
	Route::get('relatorio/consultas-do-dia', 'RelatorioColsutasDiaController@index'); //relatório de consultas no dia
	Route::post('relatorio/gerar/consultas-do-dia/', ['uses' => 'RelatorioColsutasDiaController@gerarRelatorio', 'as' => 'gerar.relatorio.consultas_do_dia']); //relatório de consultas no dia
	Route::post('relatorio/consultas-do-dia/exportar', ['uses' => 'RelatorioColsutasDiaController@exportar', 'as' => 'gerar.relatorio.consultas_do_dia.exportar']); //exportar o relatorio em pdf
	//Trocar Senha
	Route::get('alterar-senha', ['uses' => 'Auth\AutenticarController@trocarSenha', 'as' => 'trocar.senha']); // Exibir a tela de alteração de senha
	Route::put('senha-alterada/{id}', ['uses' => 'Auth\AutenticarController@updateSenha', 'as' => 'update.senha']); //exportar o relatorio em pdf
	//Anexo
	Route::post('anexo', ['uses' => 'HomeController@do_upload', 'as' => 'upload.anexo']); //upload de anexos
	Route::post('anexado', ['uses' => 'HomeController@save_upload', 'as' => 'salvar.anexo']); //salva no banco o arquivo
	Route::get('download/anexo/{anexo}', ['uses' => 'HomeController@download_anexo', 'as' => 'download.anexo']); //baixa o anexo
	Route::get('remover/anexo/{anexo}/{agendamento_id}', ['uses' => 'HomeController@delete_anexo', 'as' => 'delete.anexo']); //baixa o anexo
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
	//totalizador 
	Route::get('relatorio/somatorio', ['uses' => 'RelatorioSomatorioController@index', 'as' => 'relatorio.somatorio']); // exibe a tela com o filtro
	Route::post('relatorio/somatorio/gerar', ['uses' => 'RelatorioSomatorioController@gerarSomatorio', 'as' => 'relatorio.gerar.somatorio']); // exibe a tela com o filtro
	//Backup
	Route::get('backup/system', ['uses' => 'HomeController@backup', 'as' => 'backup.system']);
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
	

