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
		<div class="box-body" align="center">
			 
			 <!-- HTML AQUI -->
			 <img alt="Logo" src="{!! asset('images/LOGO_Fisioterapia.jpg') !!}" width="350" height="350"> 
			 
		</div>
		<!-- /.box-body -->
	</div>
	<!-- /.box -->

</section>
<!-- /.content -->

@endsection

@section('additionalsJavascript') 
@endsection
