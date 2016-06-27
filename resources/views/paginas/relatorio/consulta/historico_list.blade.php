@extends('layouts.master') @section('content')
<!-- Main content -->
<section class="content">
	
	<!-- Default box -->
	<div class="box box-default"> 
    	@include('sweet::alert') 
		<div class="box-header">
		</div>
		<!-- /.box-header -->
		<div class="box-body">
			<table id="dataTableRelatorioHistorico" class="table table-bordered table-striped">
				<thead>
					<tr>
						<th>ID</th>
						<th>Data</th>
						<th>Hora</th>
						<th>Paciente</th>
						<th>Aluno</th>
						<th></th>
					</tr>
				</thead>
				<tbody>
					@forelse($agendamentos as $agendamento)
					<tr>
					
						<td>{{ $agendamento->id }}</td>
						<td>{{ $agendamento->data_consulta }}</td>
						<td>{{ $agendamento->hora_start }}</td>
						<td>{{ $agendamento->paciente->nome }}</td>
						<td>{{ $agendamento->aluno->usuario->nome }}</td>
						<td align="center">  
							<!-- Relatorio -->
	                  		<a class="btn btn-info" visualizar_consulta="true" data-id="{!! $agendamento->id !!}" title="{!! config ( 'constants.bt_v' ) !!}">
	                    		<i class="fa fa-fw fa-eye"></i>
							</a>  
						</td>
					</tr>
					@empty
					<tr>
						<td colspan="6">Nenhum registro encontrado.</td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
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
	@include('javascript.relatorio.historico.datatable') 
@endsection
