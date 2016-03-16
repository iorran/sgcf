@extends('layouts.master') @section('content')
<!-- Main content -->
<section class="content">
	
	<!-- Default box -->
	<div class="box box-default"> 
    	@include('sweet::alert') 
		<div class="box-header">
			<legend>Bem vindo, {!! Session('usuario.0.nome') !!}</legend> 
		</div>
		<!-- /.box-header -->
		<div class="box-body">
			 
			 <!-- HTML AQUI -->
			 
		</div>
		<!-- /.box-body -->
	</div>
	<!-- /.box -->

</section>
<!-- /.content -->

@endsection

@section('additionalsJavascript') 
@endsection
