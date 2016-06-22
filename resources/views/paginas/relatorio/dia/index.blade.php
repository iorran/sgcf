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
			<form class="form-horizontal" action="{{route('gerar.relatorio.consultas_do_dia')}}" method="post">  
				<fieldset> 
					<!-- Text input-->
					<div class="form-group">  
						<label class="col-md-4 control-label" for="data">Data</label>
						<div class="col-md-4">
							<input required="required" id="data" name="data" type="date" max="{{date('Y-m-d')}}"
								placeholder="dd/mm/aaaa" class="form-control input-md"
								value="{{ date('Y-m-d') }}">
								@if($errors->has('data')) {!! $errors->first('data', '<span class="help-block">:message</span>') !!} @endif
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
