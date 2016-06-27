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
			<form class="form-horizontal" action="{{route('relatorio.gerar.somatorio')}}" method="post">  
				<fieldset> 
					<!-- Text input-->
					<div class="form-group @if($errors->has('data1')) {!! 'has-error' !!} @endif">  
						<label class="col-md-4 control-label" for="data1">Data Inicial</label>
						<div class="col-md-4">
							<input required="required" id="data1" name="data1" type="date"
								placeholder="dd/mm/aaaa" class="form-control input-md">
								@if($errors->has('data1')) {!! $errors->first('data1', '<span class="help-block">:message</span>') !!} @endif
						</div>
					</div>
					<!-- Text input-->
					<div class="form-group">  
						<label class="col-md-4 control-label" for="data2">Data Final</label>
						<div class="col-md-4">
							<input required="required" id="data2" name="data2" type="date"
								placeholder="dd/mm/aaaa" class="form-control input-md"
								value="{{ date('Y-m-d') }}"> 
						</div>
					</div>
					<!-- Button -->
					<div class="form-group">
						<label class="col-md-4 control-label"></label>
						<div class="col-md-4">
							<button type="submit" class="btn btn-success">Exportar</button> 
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
