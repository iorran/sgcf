@extends('layouts.master') 

@section('content')
<!-- Main content -->
<section class="content">

	<!-- Default box -->
	<div class="box box-default">
		@include('sweet::alert')
		<div class="box-header"> 
			<a href="{{ route('cadastro.paciente.create') }}"
				class="btn btn-success"><i class="fa fa-fw fa-plus"></i> Incluir</a>
		</div>
		<!-- /.box-header -->
		<div class="box-body">
			<table id="dataTablePaciente"
				class="table table-bordered table-striped">
				<thead>
					<tr>
						<th>ID</th>
						<th>Telefone</th>
						<th>Nome</th>
						<th></th>
					</tr>
				</thead>
				<tbody>
					@forelse($pacientes as $paciente)
					<tr>
						<td>{{ $paciente->id }}</td>
						<td>{{ $paciente->telefone }}</td>
						<td>{{ $paciente->nome }}</td>
						<td align="center"><a
							href="{{ route('cadastro.paciente.edit', $paciente->id) }}"
							class="btn btn-primary"> <i class="fa fa-fw fa-edit"></i>
						</a> <a
							href="{{ route('cadastro.paciente.show', $paciente->id) }}"
							class="btn btn-info"> <i class="fa fa-fw fa-eye"></i>
						</a>
							<button type="button" class="btn btn-danger"
								remover-paciente="true" data-id="{{ $paciente->id }}">
								<i class="fa fa-fw fa-remove"></i>
							</button>
							<form id="formRemoverPaciente{{ $paciente->id }}"
								action="{{ route('cadastro.paciente.destroy', $paciente->id) }}"
								method="post">
								<input type="hidden" name="_method" value="DELETE"> {!!
								csrf_field() !!}
							</form></td>
					</tr>
					@empty
					<tr>
						<td colspan="4">Nenhum registro encontrado.</td>
						<td></td>
						<td></td>
						<td></td>
					</tr>
					@endforelse

				</tbody>
				<tfoot>
					<tr>
						<th>ID</th>
						<th>Telefone</th>
						<th>Nome</th>
						<th></th>
					</tr>
				</tfoot>
			</table>
		</div>
		<!-- /.box-body -->
	</div>
	<!-- /.box -->

</section>
<!-- /.content -->

@endsection 

@section('additionalsJavascript')
	@include('javascript.paciente.jquery')
	@include('javascript.paciente.datatable') 
@endsection
