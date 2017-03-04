@extends('layouts.master') @section('content')

<!-- Main content -->
<section class="content"> 
	<div class="box box-default"> 
		<div class="box-header"> 
		</div>
		<!-- form start --> 
		 
		@if(isset($diagnostico))
			<form class="form-horizontal" action="{{route('diagnostico.update', $diagnostico->id)}}" method="post">
				<input type="hidden" name="_method" value="PUT">
		@else
		<form class="form-horizontal" action="{{route('diagnostico.store')}}" method="post">
		@endif 
			<fieldset>
				<input type="hidden" name="agendamento_id" id="agendamento_id" value="{!! $agendamento->id !!}"> 
				<!-- Text Area-->
				<div class="form-group @if($errors->has('diagnostico')) {!! 'has-error' !!} @endif">
					<label class="col-md-4 control-label" for="diagnostico">Diagnóstico</label>
					<div class="col-md-6">
						<textarea class="textarea form-control input-md" placeholder="Diagnóstico" id="diagnostico" name="diagnostico">
							{{ old('diagnostico',  isset($diagnostico->diagnostico) ? $diagnostico->diagnostico : null) }}
						</textarea>
						@if($errors->has('diagnostico')) {!! $errors->first('diagnostico', '<span class="help-block">:message</span>') !!} @endif						
							
		        	</div>
				</div>
				<!-- Button -->
				<div class="form-group">
					<label class="col-md-4 control-label" for="cadastrarAnamnese"></label>
					<div class="col-md-4">
						<button type="submit" class="btn btn-success">Salvar</button>
						<a href="{{ url('consulta/detalhes/'.$agendamento->id) }}" class="btn btn-default">Voltar</a>
					</div>
				</div>
				
				{!! csrf_field() !!}

			</fieldset>
		</form>


	</div>
	<!-- /.box -->
</section>
<!-- /.content -->


@endsection 
@section('additionalsJavascript')  
	@include('javascript.consulta.diagnostico.jquery')
@endsection
