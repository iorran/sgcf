@extends('layouts.master') @section('content')
<!-- Main content -->
<section class="content">
	
	<!-- Default box -->
	<div class="box box-default"> 
    	@include('sweet::alert') 
		<div class="box-header">
			<a href="{{ route('cadastro.aluno.create') }}"
				class="btn btn-success"><i class="fa fa-fw fa-plus"></i> Incluir</a>
		</div>
		<!-- /.box-header -->
		<div class="box-body">
			<table id="dataTableAluno" class="table table-bordered table-striped">
				<thead>
					<tr>
						<th>ID</th>
						<th>Matricula</th>
						<th>Nome</th>
						<th></th>
					</tr>
				</thead>
				<tbody>
					@forelse($alunos as $aluno)
					<tr>
					
						<td>{{ $aluno->id }}</td>
						<td>{{ $aluno->matricula }}</td>
						<td>{{ $aluno->usuario->nome }}</td>
						<td align="center"> 
							@if ($aluno->trashed())   
								<form action="{{ route('cadastro.aluno.destroy', $aluno->id) }}" method="post">
									<input type="hidden" name="_method" value="DELETE">
									{!! csrf_field() !!}
									<a href="{{ route('cadastro.aluno.show', $aluno->id) }}" class="btn btn-info" title="{!! config ( 'constants.bt_v' ) !!}">
										<i class="fa fa-fw fa-eye"></i>
									</a>
									<button type="submit" class="btn btn-warning" title="{!! config ( 'constants.bt_a' ) !!}">
										<i class="fa fa-fw fa-undo"></i>
									</button>
								</form>
							@else 
								<a href="{{ route('cadastro.aluno.show', $aluno->id) }}" class="btn btn-info" title="{!! config ( 'constants.bt_v' ) !!}">
									<i class="fa fa-fw fa-eye"></i>
								</a>
								<a href="{{ route('cadastro.aluno.edit', $aluno->id) }}" class="btn btn-primary" title="{!! config ( 'constants.bt_e' ) !!}">
									<i class="fa fa-fw fa-edit"></i>
								</a> 
								<button type="button" class="btn btn-danger" remover-aluno="true" data-id="{{ $aluno->id }}" title="{!! config ( 'constants.bt_d' ) !!}">
									<i class="fa fa-fw fa-remove"></i>
								</button>
								<form id="formRemoverAluno{{ $aluno->id }}" action="{{ route('cadastro.aluno.destroy', $aluno->id) }}" method="post">
									<input type="hidden" name="_method" value="DELETE">
									{!! csrf_field() !!}
								</form>
							@endif
						</td>
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
						<th>Matricula</th>
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
	@include('javascript.aluno.jquery')
	@include('javascript.aluno.datatable') 
@endsection
