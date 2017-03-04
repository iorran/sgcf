@extends('layouts.master') @section('content')
<!-- Main content -->
<section class="content">

	<!-- Default box -->
	<div class="box box-default">
		@include('sweet::alert')
		<div class="box-header"></div>
		<!-- /.box-header -->
		<div class="box-body">
			<form class="form-horizontal" action="{{route('agenda.store')}}" method="post">
				{!! csrf_field() !!} 
				<input id="events_start" name="events_start" type="hidden" value="{!! $events_start !!}">  
				<input id="events_end" name="events_end" type="hidden" value="{!! $events_end !!}">   
				<input id="hora_start" name="hora_start" type="hidden" value="{!! $hora_start !!}">   
				<input id="hora_end" name="hora_end" type="hidden" value="{!! $hora_end !!}">   
				<input id="data_consulta" name="data_consulta" type="hidden" value="{!! $data_consulta !!}">    
				<fieldset> 
					<!-- Text input-->
					<div class="form-group">
						<label class="col-md-4 control-label" for="nome">Aluno</label>
						<div class="col-md-4">
							<input id="nome" name="nome" type="text" class="form-control input-md"
								value="{!! $aluno_nome !!}" readonly="readonly">
							<input id="aluno_id" name="aluno_id" type="hidden" value="{!! $aluno_id !!}">
						</div>
					</div>

					<!-- Text input-->
					<div class="form-group">
						<label class="col-md-4 control-label" for="inicio">Início</label>
						<div class="col-md-4">
							<input id="inicio" name="inicio" type="text" class="form-control input-md"
								value="{!! $data_start.' às '.$hora_start !!}" readonly="readonly"> 
						</div>
					</div>
					
					<!-- Text input-->
					<div class="form-group">
						<label class="col-md-4 control-label" for="termino">Término</label>
						<div class="col-md-4">
							<input id="termino" name="termino" type="text" class="form-control input-md"
								value="{!!  $data_end.' às '.$hora_end !!}" readonly="readonly"> 
						</div>
					</div>

					<!-- Select Basic -->
					<div class="form-group">
						<label class="col-md-4 control-label" for="paciente_id">Paciente</label>
						<div class="col-md-4">
							<select id="paciente_id" name="paciente_id" class="form-control select2">
								@forelse($pacientes as $paciente)
								<option value="{!!  $paciente->id !!}">{!!  $paciente->nome . " - " .$paciente->cpf !!}</option>
								@empty 
								<option value="">Nenhum paciente cadastrado.</option>
								@endforelse
							</select>
						</div>
					</div>

					<!-- Button (Double) -->
					<div class="form-group">
						<label class="col-md-4 control-label" for="marcar"></label>
						<div class="col-md-8">
							<button type="submit" name="marcar" class="btn btn-success">Marcar</button>
							<a href="{{ url('agenda')}}" name="voltar" class="btn btn-default">Voltar</a>
						</div>
					</div>

				</fieldset>
			</form>

		</div>
		<!-- /.box-body -->
	</div>
	<!-- /.box -->

</section>
<!-- /.content -->

@endsection @section('additionalsJavascript') @endsection
