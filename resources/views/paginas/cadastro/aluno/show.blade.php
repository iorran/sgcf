@extends('layouts.master') @section('content')

<!-- Main content -->
<section class="content"> 
	<div class="box box-default">
		<div class="box-header"> 
		</div>
		<!-- form start -->
		<form class="form-horizontal" action="{{url('cadastro/aluno')}}"
			method="post">
			<fieldset> 

				<!-- Text input-->
				<div class="form-group">
					<label class="col-md-4 control-label" for="matricula">Matrícula</label>
					<div class="col-md-4">
						<input type="text" class="form-control input-md"
							placeholder="{{ $aluno->matricula }}" disabled="disabled">

					</div>
				</div>

				<!-- Text input-->
				<div class="form-group">
					<label class="col-md-4 control-label" for="nome">Nome</label>
					<div class="col-md-4">
						<input type="text" class="form-control input-md"
							placeholder="{{ $aluno->usuario->nome }}" disabled="disabled">

					</div>
				</div>

				<!-- Text input-->
				<div class="form-group">
					<label class="col-md-4 control-label" for="email">Email</label>
					<div class="col-md-4">
						<input type="text" class="form-control input-md"
							placeholder="{{ $aluno->usuario->email }}" disabled="disabled">

					</div>
				</div> 

				<!-- Button -->
				<div class="form-group">
					<label class="col-md-4 control-label" for="cadastrarAluno"></label>
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
