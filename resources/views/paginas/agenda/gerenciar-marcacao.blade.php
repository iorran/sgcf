@extends('layouts.master') @section('content')

<!-- Main content -->
<section class="content"> 
		@include('sweet::alert')
	<!-- form start -->  
	<form class="form-horizontal">
		<fieldset>  
			<div class="nav-tabs-custom">
            	<ul class="nav nav-tabs">
            		<li class="active"><a href="#tab_1" data-toggle="tab">Consulta</a></li>
                	<li><a href="#tab_2" data-toggle="tab">Aluno</a></li> 
                	<li><a href="#tab_3" data-toggle="tab">Paciente</a></li> 
              	</ul>
                <div class="tab-content">
	            	<div class="tab-pane active" id="tab_1"> 
						<!-- Text input-->
						<div class="form-group">
							<label class="col-md-4 control-label">Data</label>
							<div class="col-md-4">
								<input readonly type="date"
									class="form-control input-md" value="{{ $agendamento->data_consulta }}"> 
							</div>
						</div>  
						<!-- Text input-->
						<div class="form-group">
							<label class="col-md-4 control-label">Início</label>
							<div class="col-md-4">
								<input readonly type="time"
									class="form-control input-md" value="{{ $agendamento->hora_start }}"> 
							</div>
						</div>  
						<!-- Text input-->
						<div class="form-group">
							<label class="col-md-4 control-label">Término</label>
							<div class="col-md-4">
								<input readonly type="time"
									class="form-control input-md" value="{{ $agendamento->hora_end }}"> 
							</div>
						</div>  
					</div><!-- /.tab-pane -->
	            	<div class="tab-pane" id="tab_2">  
						<!-- Text input-->
						<div class="form-group">
							<label class="col-md-4 control-label">Nome</label>
							<div class="col-md-4">
								<input readonly type="text"
									class="form-control input-md" value="{{ $agendamento->aluno->usuario->nome }}"> 
							</div>
						</div> 
						<!-- Text input-->
						<div class="form-group">
							<label class="col-md-4 control-label">Matricula</label>
							<div class="col-md-4">
								<input readonly type="text"
									class="form-control input-md" value="{{ $agendamento->aluno->matricula }}"> 
							</div>
						</div>   
					</div><!-- /.tab-pane -->
	            	<div class="tab-pane" id="tab_3"> 
						<!-- Text input-->
						<div class="form-group">
							<label class="col-md-4 control-label">Nome</label>
							<div class="col-md-4">
								<input readonly type="text"
									class="form-control input-md" value="{{ $agendamento->paciente->nome }}"> 
							</div>
						</div> 
						<!-- Text input-->
						<div class="form-group">
							<label class="col-md-4 control-label">CPF</label>
							<div class="col-md-4">
								<input readonly type="text"
									class="form-control input-md" value="{{ $agendamento->paciente->cpf }}"> 
							</div>
						</div> 
						<!-- Text input-->
						<div class="form-group">
							<label class="col-md-4 control-label">Tel</label>
							<div class="col-md-4">
								<input readonly type="text"
									class="form-control input-md" value="{{ $agendamento->paciente->telefone }}"> 
							</div>
						</div> 
						@if(  $agendamento->iniciada < 4 )
							<!-- Anexos --> 
							<input type="hidden" name="paciente_id" id="paciente_id" value="{{ $agendamento->paciente->id }}">
							<input type="hidden" name="agendamento_id" id="agendamento_id" value="{{ $agendamento->id }}">
							<input type="hidden" name="arquivo" id="arquivo">
							<input type="hidden" name="arquivo_old" id="arquivo_old">
							<div class="form-group">
								<label class="col-md-4 control-label">Incluir Anexos</label>
								<div class="col-md-4">
									<a id="pickfiles" class="btn btn-block btn-success">Adicionar Anexo</a>   
								</div>  
							</div>  
							<div class="form-group" id="enviarAnexo">
								<label class="col-md-4 control-label"></label> 
								<div class="col-md-4">
									<a id="uploadfiles" class="btn btn-default">Enviar Arquivos</a>   
								</div>
							</div>  
							<div class="form-group">
								<label class="col-md-4 control-label"></label> 
								<label class="col-md-4">
									<div id="filelist">Your browser doesn't have Flash, Silverlight or HTML5 support.</div>
									<div id="file" class="text-info">Nenhum arquivo adicionado.</div>
								</label>
							</div>   
						@endif
						<!-- Text input-->
						<div class="form-group">
							<label class="col-md-4 control-label">Listagem de Anexos</label>
							<div class="col-md-4">   
								@forelse($anexos as $anexo) 
								<div class="row">
									<a class="btn btn-default" href="{!! route('download.anexo', $anexo->caminho) !!}"  title="Baixar anexo"><i class="fa fa-file" aria-hidden="true"></i>{!! $anexo->arquivo_old !!}</a>
									
									<a class="btn btn-danger" href="{!! route('delete.anexo', [$anexo->caminho, $anexo->agendamento_id]) !!}" title="Remover anexo"><i class="fa fa-trash-o" aria-hidden="true"></i></a>
								</div> 
								<br>
								@empty 
									Nenhum item anexado para este paciente. 
								@endforelse
								</ul>
							</div>
						</div> 
					</div><!-- /.tab-pane -->
					
					<!-- Button --> 
					<div class="form-group"> 
						<label class="col-md-0 control-label"></label>
						<div class="col-md-12" 
								@if(  $agendamento->iniciada == 0 ) <!-- Só inicia a consulta que estiver no status inicial -->
									<a class="btn btn-app" href="{!! url('consulta/iniciar/'.$agendamento->id) !!}">
			                    		<i class="fa fa-check"></i> Iniciar consulta
			                  		</a>  
			                  		@if(  Session('usuario.0.perfil') == 1 )
										<a class="btn btn-app" desmarcar-consulta="true" data-id="{!! $agendamento->id !!}">
				                    		<i class="fa fa-close"></i> Desmarcar consulta
										</a>  
			                  		@endif
		                  		@endif 
								<a class="btn btn-app" cancelar-consulta="true" data-id="{!! $agendamento->id !!}">
		                    		<i class="fa fa-exclamation-triangle" aria-hidden="true"></i> Ausência do Paciente
								</a>  
	                  		@if(  $agendamento->iniciada != 4 )
		                  		@if(  $agendamento->iniciada >= 1 )
		                  			<!-- Editar Consulta -->
		                  			<a class="btn btn-app" href="{!! url('consulta/iniciar/'.$agendamento->id) !!}">
			                    		<i class="fa fa-check"></i> Consulta
			                  		</a>  
			                  		<!-- Diagnostico -->
			                  		<a class="btn btn-app" iniciar_diagnostico="true" data-id="{!! $agendamento->id !!}">
			                    		<i class="fa fa-stethoscope" aria-hidden="true"></i> Diagnóstico
									</a>  
		                  		@endif
		                  		@if(  $agendamento->iniciada >= 2 )
			                  		<!-- Tratamento -->
			                  		<a class="btn btn-app" iniciar_tratamento="true" data-id="{!! $agendamento->id !!}">
			                    		<i class="fa fa-heartbeat" aria-hidden="true"></i> Tratamento
									</a>  
		                  		@endif
		                  		@if(  $agendamento->iniciada >= 3 )
			                  		<!-- Finalizar -->
			                  		<a class="btn btn-app" finalizar_consulta="true" data-id="{!! $agendamento->id !!}">
			                    		<i class="fa fa-times" aria-hidden="true"></i> Finalizar
									</a>  
		                  		@endif
		                  	@else
		                  		<!-- Relatorio -->
		                  		<a class="btn btn-app" visualizar_consulta="true" data-id="{!! $agendamento->id !!}">
		                    		<i class="fa fa-external-link" aria-hidden="true"></i> Visualizar Consulta
								</a>  
	                  		@endif
		                  	
	                  		<!-- Voltar -->
							<a class="btn btn-app" href="{!! url('agenda') !!}" >
	                    		<i class="fa fa-undo"></i> Voltar
	                  		</a> 
	                  		<!-- forms --> 
							<form id="formDesmarcarConsulta{!! $agendamento->id !!}" action="{!! route('agenda.destroy', $agendamento->id ) !!}" method="post">
								<input type="hidden" name="_method" value="DELETE">
								{!! csrf_field() !!}
							</form>  
						</div>
					</div>  
				</div>   
			</div>
		</fieldset>   
	</form>  
</section>
<!-- /.content -->


@endsection 
@section('additionalsJavascript')
	@include('javascript.agenda.jquery')  
@endsection
