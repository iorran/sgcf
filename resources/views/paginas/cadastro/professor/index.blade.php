@extends('layouts.master') 

@section('content')
<!-- Main content -->
<section class="content">

	<!-- Default box -->
	<div class="box box-default">
		@include('sweet::alert')
		<div class="box-header"> 
			<a href="{{ route('cadastro.professor.create') }}"
				class="btn btn-success"><i class="fa fa-fw fa-plus"></i> Incluir</a>
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
						<td align="center">
							@if ($professor->trashed())   
								<form action="{{ route('cadastro.professor.destroy', $professor->id ) }}" method="post">
									<input type="hidden" name="_method" value="DELETE">
									{!! csrf_field() !!}
									<a href="{{ route('cadastro.professor.show', $professor->id) }}" class="btn btn-info" title="{!! config ( 'constants.bt_v' ) !!}"> 
										<i class="fa fa-fw fa-eye"></i> 
									</a>
									<button type="submit" class="btn btn-warning" title="{!! config ( 'constants.bt_a' ) !!}">
										<i class="fa fa-fw fa-undo"></i>
									</button>
								</form>
							@else 
								<a href="{{ route('cadastro.professor.show', $professor->id) }}" class="btn btn-info" title="{!! config ( 'constants.bt_v' ) !!}"> 
									<i class="fa fa-fw fa-eye"></i> 
								</a>
								<a href="{{ route('cadastro.professor.edit', $professor->id) }}" class="btn btn-primary" title="{!! config ( 'constants.bt_e' ) !!}">
									<i class="fa fa-fw fa-edit"></i>
								</a> 
								<button type="button" class="btn btn-danger" remover-professor="true" data-id="{{ $professor->id }}" title="{!! config ( 'constants.bt_d' ) !!}">
									<i class="fa fa-fw fa-remove"></i>
								</button>
								<form id="formRemoverProfessor{{ $professor->id }}"
									action="{{ route('cadastro.professor.destroy', $professor->id) }}"
									method="post">
									<input type="hidden" name="_method" value="DELETE"> {!!
									csrf_field() !!}
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
