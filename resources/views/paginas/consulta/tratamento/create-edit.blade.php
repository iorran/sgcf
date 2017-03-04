@extends('layouts.master') @section('content')

<!-- Main content -->
<section class="content"> 
	<div class="box box-default"> 
		<div class="box-header"> 
		</div>
		<!-- form start --> 
		 
		@if(isset($tratamento))
			<form class="form-horizontal" action="{{route('tratamento.update', $tratamento->id)}}" method="post">
				<input type="hidden" name="_method" value="PUT">
		@else
		<form class="form-horizontal" action="{{route('tratamento.store')}}" method="post">
		@endif 
			<fieldset>
				<input type="hidden" name="agendamento_id" id="agendamento_id" value="{!! $agendamento->id !!}">
				<!-- Text input-->
				<div class="form-group @if($errors->has('status')) {!! 'has-error' !!} @endif">
					<label class="col-md-4 control-label" for="status">Status</label>
					<div class="col-md-4">
						<input id="status" name="status" type="text"
							placeholder="Status" class="form-control input-md"
							value="{{ old('status',  isset($tratamento->status) ? $tratamento->status : null) }}">
							@if($errors->has('status')) {!! $errors->first('status', '<span class="help-block">:message</span>') !!} @endif
					</div>
				</div>
				<!-- Text Area-->
				<div class="form-group @if($errors->has('evolucao')) {!! 'has-error' !!} @endif">
					<label class="col-md-4 control-label" for="evolucao">Evolução</label>
					<div class="col-md-6">
						<textarea class="textarea form-control input-md" placeholder="Evolução" id="evolucao" name="evolucao">
							{{ old('evolucao',  isset($tratamento->evolucao) ? $tratamento->evolucao : null) }}
						</textarea>
						@if($errors->has('evolucao')) {!! $errors->first('evolucao', '<span class="help-block">:message</span>') !!} @endif						
							
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
	@include('javascript.consulta.tratamento.jquery')
@endsection
