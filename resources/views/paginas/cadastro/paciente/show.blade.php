@extends('layouts.master') @section('content')

<!-- Main content -->
<section class="content"> 
	<div class="box box-primary">
		<div class="box-header">
			<legend>Paciente #{{$paciente->id}}</legend> 
		</div>
		<!-- form start -->
		<form class="form-horizontal" action="{{url('cadastro/paciente')}}"
			method="post">
			<fieldset> 

				<!-- Text input-->
				<div class="form-group">
					<label class="col-md-4 control-label" for="login">Login</label>
					<div class="col-md-4">
						<input type="text" class="form-control input-md"
							placeholder="{{ $paciente->login }}" disabled="disabled">

					</div>
				</div>

				<!-- Text input-->
				<div class="form-group">
					<label class="col-md-4 control-label" for="nome">Nome</label>
					<div class="col-md-4">
						<input type="text" class="form-control input-md"
							placeholder="{{ $paciente->usuario->nome }}" disabled="disabled">

					</div>
				</div>

				<!-- Text input-->
				<div class="form-group">
					<label class="col-md-4 control-label" for="email">Email</label>
					<div class="col-md-4">
						<input type="text" class="form-control input-md"
							placeholder="{{ $paciente->usuario->email }}" disabled="disabled">

					</div>
				</div> 

				<!-- Button -->
				<div class="form-group">
					<label class="col-md-4 control-label" for="cadastrarPaciente"></label>
					<div class="col-md-4"> 
						<a href="{{ URL::previous() }}" class="btn btn-default">Voltar</a>
					</div>
				</div>

				{!! csrf_field() !!}

			</fieldset>
		</form>


	</div>
	<!-- /.box -->
</section>
<!-- /.content -->


@endsection @section('additionalsJavascript') @endsection
