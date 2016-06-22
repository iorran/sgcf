@extends('layouts.master') @section('content') 
<!-- Main content -->
<section class="content">

	<!-- Default box -->
	<div class="box box-default">
		@include('sweet::alert')
		<div class="box-header">
			<form  action="{{ route('gerar.relatorio.consultas_do_dia.exportar') }}" method="post">  
				<fieldset>
					<input type="hidden" id="data" name="data" value="{{ $data }}">
					<button type="submit" class="btn btn-success"><i class="fa fa-fw fa-plus"></i> Exportar</button> 
					{!! csrf_field() !!}
				</fieldset>
			</form> 
		</div>
		<!-- /.box-header -->
		<div class="box-body"> 
			<table class="table table-bordered table-striped">
				<thead>
					<tr>
						<th>Paciente</th>
						<th>Telefone</th>
						<th>Aluno</th>
						<th>Inicio</th>
						<th>Término</th>
					</tr>
				</thead>
				<tbody>
					@forelse($consultas as $consulta)
					<tr> 
						<td>{!! $consulta->paciente->nome !!}</td> 
						<td>{!! $consulta->paciente->telefone !!}</td> 
						<td>{!! $consulta->aluno->usuario->nome !!}</td> 
						<td>{!! $consulta->hora_start !!}</td> 
						<td>{!! $consulta->hora_end !!}</td> 
					</tr>
					@empty
					<tr>
						<td colspan="4">Nenhum registro encontrado.</td> 
					</tr>
					@endforelse

				</tbody>
			</table>

		</div>
		<!-- /.box-body -->
	</div>
	<!-- /.box -->

</section>
<!-- /.content -->

@endsection 

@section('additionalsJavascript') 
@endsection
