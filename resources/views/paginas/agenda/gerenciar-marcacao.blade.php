@extends('layouts.master') @section('content')

<!-- Main content -->
<section class="content"> 
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
					</div><!-- /.tab-pane --> 
				</div>  
				
					<!-- Button -->
					<div class="form-group">
						<label class="col-md-0 control-label"></label>
						<div class="col-md-4">  
							@if( $editavel === 'true')
							<a class="btn btn-app">
	                    		<i class="fa fa-check"></i> Iniciar consulta
	                  		</a> 
							<button type="button" class="btn btn-app" desmarcar-consulta="true" data-id="{!! $agendamento->id !!}">
	                    		<i class="fa fa-close"></i> Desmarcar consulta
							</button> 
							<form id="formDesmarcarConsulta{!! $agendamento->id !!}" action="{!! route('agenda.destroy', $agendamento->id ) !!}" method="post">
								<input type="hidden" name="_method" value="DELETE">
								{!! csrf_field() !!}
							</form> 
	                  		@endif
							<a class="btn btn-app" href="{!! URL::previous() !!}" >
	                    		<i class="fa fa-undo"></i> Voltar
	                  		</a> 
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
