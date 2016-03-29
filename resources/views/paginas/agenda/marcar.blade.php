@extends('layouts.master') @section('content')
<!-- Main content -->
<section class="content">

	<!-- Default box -->
	<div class="box box-default">
		@include('sweet::alert')
		<div class="box-header"></div>
		<!-- /.box-header -->
		<div class="box-body">
			<form class="form-horizontal">
				<fieldset> 
					<!-- Select Basic -->
					<div class="form-group">
						<label class="col-md-4 control-label" for="cliente">Cliente</label>
						<div class="col-md-4">
							<select id="cliente" name="cliente" class="form-control">
								<option value="1">Option one</option>
							</select>
						</div>
					</div>

					<!-- Select Basic -->
					<div class="form-group">
						<label class="col-md-4 control-label" for="aluno">Aluno</label>
						<div class="col-md-4">
							<select id="aluno" name="aluno" class="form-control">
								<option value="1">Option one</option>
							</select>
						</div>
					</div>

					<!-- Select Basic -->
					<div class="form-group">
						<label class="col-md-4 control-label" for="horário">Horário</label>
						<div class="col-md-4">
							<select id="horário" name="horário" class="form-control">
								<option value="1">Option one</option>
							</select>
						</div>
					</div>

					<!-- Button (Double) -->
					<div class="form-group">
						<label class="col-md-4 control-label" for="marcar"></label>
						<div class="col-md-8">
							<button id="marcar" name="marcar" class="btn btn-success">Marcar</button>
							<button id="voltar" name="voltar" class="btn btn-default">Voltar</button>
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
