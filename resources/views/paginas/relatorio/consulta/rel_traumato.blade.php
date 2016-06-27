@extends('layouts.master') @section('content') 
<!-- Main content -->
<section class="content">

	<!-- Default box -->
	<div class="box box-default">
		@include('sweet::alert')
		<div class="box-header">
			<form  action="{{ route('exportar.relatorio.consulta') }}" method="post">  
				<fieldset> 
				<input type="hidden" name="agendamento_id" id="agendamento_id" value="{!! $anamnese->agendamento_id !!}">
					<button type="submit" class="btn btn-success"><i class="fa fa-fw fa-plus"></i> Exportar</button> 
					{!! csrf_field() !!}
				</fieldset>
			</form> 
		</div>
		<!-- /.box-header -->
		<div class="box-body">  
			<table class="table table-bordered" width="100%" border="1">
				<tr> 
					<td colspan="2" align="center"><h4>Dados</h4></td> 
				</tr>
				<tr>
					<th width="30%">Data da Consulta</th>
					<td width="70%">{!! $agendamento->data_consulta !!}</td>
				</tr>  
				<tr>
					<th width="30%">Exportado</th>
					<td width="70%">{!! date('Y-m-d') !!}</td>
				</tr>  
				<tr>
					<th width="30%">Aluno</th>
					<td width="70%">{!! $agendamento->aluno->usuario->nome !!}</td>
				</tr> 
				<tr>
					<th width="30%">Paciente</th>
					<td width="70%">{!! $agendamento->paciente->nome !!}</td>
				</tr>  
				<tr> 
					<td colspan="2" align="center"><h4>Anamnese</h4></td> 
				</tr>
				<tr>
					<th width="30%">QP</th>
					<td width="70%">{!! $anamnese->QP !!}</td>
				</tr> 
				<tr>
					<th width="30%">HDA</th>
					<td width="70%">{!! $anamnese->HDA !!}</td>
				</tr> 
				<tr>
					<th width="30%">HPP</th>
					<td width="70%">{!! $anamnese->HPP !!}</td>
				</tr> 
				<tr>
					<th width="30%">HS</th>
					<td width="70%">{!! $anamnese->HS !!}</td>
				</tr> 
				<tr>
					<th width="30%">HFAM</th>
					<td width="70%">{!! $anamnese->HFAM !!}</td>
				</tr> 
				<tr>
					<th width="30%">AVDS</th>
					<td width="70%">{!! $anamnese->AVDS !!}</td>
				</tr> 
				<tr>
					<th width="30%">Medicamentos</th>
					<td width="70%">{!! $anamnese->medicamentos !!}</td>
				</tr> 
				<tr>
					<th width="30%">Ex. Complementares</th>
					<td width="70%">{!! $anamnese->ex_complementares !!}</td>
				</tr> 
				<tr>  
					<td colspan="2" align="center"><h4>{!! $nome_area !!}</h4></td> 
				</tr>
				<tr>
					<th width="30%">Análise Muscular</th>
					<td width="70%">{!! $area->analise_muscular !!}</td>
				</tr> 
				<tr>
					<th width="30%">Análise Articular</th>
					<td width="70%">{!! $area->analise_articular !!}</td>
				</tr> 
				<tr>
					<th width="30%">Perimetria</th>
					<td width="70%">{!! $area->perimetria !!}</td>
				</tr> 
				<tr>
					<th width="30%">Imobilização</th>
					<td width="70%">{!! $area->imobilizacao !!}</td>
				</tr> 
				<tr>
					<th width="30%">Análise de Edema</th>
					<td width="70%">{!! $area->analise_de_edema !!}</td>
				</tr> 
				<tr>
					<th width="30%">Análise de Dor</th>
					<td width="70%">{!! $area->analise_de_dor !!}</td>
				</tr> 
				<tr>
					<th width="30%">Análise de Cicatriz</th>
					<td width="70%">{!! $area->analise_de_cicatriz !!}</td>
				</tr> 
				<tr>
					<th width="30%">Análise de Crepitação</th>
					<td width="70%">{!! $area->analise_de_crepitacao !!}</td>
				</tr> 
				<tr>
					<th width="30%">Análise de Marcha</th>
					<td width="70%">{!! $area->analise_de_marcha !!}</td>
				</tr> 
				<tr>
					<th width="30%">Testes Específicos</th>
					<td width="70%">{!! $area->testes_especificos !!}</td>
				</tr>  
				<tr>
					<th width="30%">Ex. Complementares</th>
					<td width="70%">{!! $area->ex_complementares !!}</td>
				</tr>  
				<tr>
					<th width="30%">Objetivos do Tratamento</th>
					<td width="70%">{!! $area->objetivos_do_tratamento !!}</td>
				</tr>  
				<tr>
					<th width="30%">Conduta Fisioterapêutica</th>
					<td width="70%">{!! $area->conduta_fisioterapeutica !!}</td>
				</tr>  
				<tr>  
					<td colspan="2" align="center"><h4>Diagnóstico</h4></td>  
				</tr> 
				<tr>
					<th width="30%">Diagnóstico</th>
					<td width="70%">{!! $diagnostico->diagnostico !!}</td>
				</tr>  
				<tr>  
					<td colspan="2" align="center"><h4>Tratamento</h4></td>  
				</tr> 
				<tr>
					<th width="30%">Status</th>
					<td width="70%">{!! $tratamento->status !!}</td>
				</tr>  
				<tr>
					<th width="30%">Evolução</th>
					<td width="70%">{!! $tratamento->evolucao !!}</td>
				</tr>
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
