@extends('layouts.master') 

@section('content')
<!-- Main content -->
<section class="content">

	<!-- Default box -->
	<div class="box box-primary">
		@include('sweet::alert')
		<div class="box-header">
			<legend>Professores</legend>
			<a href="{{ route('cadastro.professor.create') }}"
				class="btn btn-primary"><i class="fa fa-fw fa-plus"></i> Incluir</a>
		</div>
		<!-- /.box-header -->
		<div class="box-body">
			<table id="dataTableProfessor"
				class="table table-bordered table-striped">
				<thead>
					<tr>
						<th>ID</th>
						<th>Login</th>
						<th>Nome</th>
						<th></th>
					</tr>
				</thead>
				<tbody>
					@forelse($professores as $professor)
					<tr>
						<td>{{ $professor->id }}</td>
						<td>{{ $professor->login }}</td>
						<td>{{ $professor->usuario->nome }}</td>
						<td align="center"><a
							href="{{ route('cadastro.professor.edit', $professor->id) }}"
							class="btn btn-success"> <i class="fa fa-fw fa-edit"></i>
						</a> <a
							href="{{ route('cadastro.professor.show', $professor->id) }}"
							class="btn btn-info"> <i class="fa fa-fw fa-eye"></i>
						</a>
							<button type="button" class="btn btn-danger"
								remover-professor="true" data-id="{{ $professor->id }}">
								<i class="fa fa-fw fa-remove"></i>
							</button>
							<form id="formRemoverProfessor{{ $professor->id }}"
								action="{{ route('cadastro.professor.destroy', $professor->id) }}"
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
						<th>Login</th>
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
	@include('javascript.professor.jquery')
	@include('javascript.professor.datatable') 
@endsection
