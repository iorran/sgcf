@extends('layouts.master') @section('content') 
<!-- Main content -->
<section class="content">

	<!-- Default box -->
	<div class="box box-default">
		@include('sweet::alert')
		<div class="box-header"> 
		</div>
		<!-- /.box-header -->
		<div class="box-body">  
			<form class="form-horizontal" action="{{route('gerar.relatorio.historico')}}" method="post">  
				<fieldset> 
					<!-- Select Basic -->
					<div class="form-group">
						<label class="col-md-4 control-label" for="paciente_id">Paciente</label>
						<div class="col-md-4">
							<select required="required" id="paciente_id" name="paciente_id" class="form-control select2">
								<option selected value="">Selecione o paciente</option>
								@forelse($pacientes as $paciente)
								<option value="{!!  $paciente->id !!}">{!!  $paciente->nome . " - " .$paciente->cpf !!}</option>
								@empty 
								<option value="">Nenhum paciente cadastrado.</option>
								@endforelse
							</select>
						</div>
					</div>
					<!-- Text input-->
					<div class="form-group">  
						<label class="col-md-4 control-label" for="data">Data</label>
						<div class="col-md-4">
							<input id="data" name="data" type="date"
								placeholder="dd/mm/aaaa" class="form-control input-md"
								value="{{ date('Y-m-d') }}">
								@if($errors->has('data')) {!! $errors->first('data', '<span class="help-block">:message</span>') !!} @endif
						</div>
					</div>
					<!-- Text input-->
					<div class="form-group">  
						<label class="col-md-4 control-label" for="data">Horário de início</label>
						<div class="col-md-4">
							<input id="hora" name="hora" type="time"
								placeholder="Ex : 12:00" class="form-control input-md"
								value="{{ date('H:'.'00') }}">
								@if($errors->has('hora')) {!! $errors->first('hora', '<span class="help-block">:message</span>') !!} @endif
						</div>
					</div>
					<!-- Button -->
					<div class="form-group">
						<label class="col-md-4 control-label"></label>
						<div class="col-md-4">
							<button type="submit" class="btn btn-success">Gerar</button> 
						</div>
					</div>
					
					{!! csrf_field() !!}
				</fieldset>
			</form>
		</div>
		<!-- /.box-body -->
	</div>
	<!-- /.box -->

</section>
<!-- /.content -->

@endsection 

@section('additionalsJavascript') 
@endsection
