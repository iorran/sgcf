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
					<th width="30%">Análise Postural</th>
					<td width="70%">{!! $area->analise_postural !!}</td>
				</tr> 
				<tr>
					<th width="30%">AVDs</th>
					<td width="70%">{!! $area->avds !!}</td>
				</tr>
				<tr>
					<th width="30%">Linha Axilar</th>
					<td width="70%">{!! $area->linha_axilar !!}</td>
				</tr>
				<tr>
					<th width="30%">Ap. Xifoide</th>
					<td width="70%">{!! $area->ap_xifoide !!}</td>
				</tr> 
				<tr>
					<th width="30%">Últimas Costelas</th>
					<td width="70%">{!! $area->ultimas_costelas !!}</td>
				</tr>  	 
				<tr>
					<th width="30%">Cicatriz Umbilical</th>
					<td width="70%">{!! $area->cicatriz_umbilical !!}</td>
				</tr>  	 
				<tr>
					<th width="30%">Ex. Complementares</th>
					<td width="70%">{!! $area->ex_complementares !!}</td>
				</tr>  	   
				<tr>  
					<td colspan="2" align="center"><h4>Testes Específicos</h4></td>  
				</tr> 
				<tr>
					<th width="30%">Manovacuamento</th>
					<td width="70%">{!! $area->manovacuamento !!}</td>
				</tr>  	
				<tr>
					<th width="30%">Ventilômetro</th>
					<td width="70%">{!! $area->ventilometro !!}</td>
				</tr>  	
				<tr>
					<th width="30%">Peak Flow</th>
					<td width="70%">{!! $area->peak_flow !!}</td>
				</tr>    	 
				<tr>  
					<td colspan="2" align="center"><h4>Avaliação Motora</h4></td>  
				</tr> 
				<tr>
					<th width="30%">Palpitação Trofismo Tonus</th>
					<td width="70%">{!! $area->palpitacao !!}</td>
				</tr>    	 
				<tr>  
					<td colspan="2" align="center"><h4>Avaliação Muscular</h4></td>  
				</tr> 
				<tr>
					<th width="30%">Diafragma</th>
					<td width="70%">{!! $area->diafragma !!}</td>
				</tr>    
				<tr>
					<th width="30%">Abdominais</th>
					<td width="70%">{!! $area->abdominais !!}</td>
				</tr>     
				<tr>
					<th width="30%">Ecom</th>
					<td width="70%">{!! $area->ecom !!}</td>
				</tr>      
				<tr>
					<th width="30%">Trapézio</th>
					<td width="70%">{!! $area->trapezio !!}</td>
				</tr>       
				<tr>
					<th width="30%">Para vertebrais</th>
					<td width="70%">{!! $area->vertebrais !!}</td>
				</tr>        
				<tr>
					<th width="30%">Peitoral</th>
					<td width="70%">{!! $area->peitoral !!}</td>
				</tr>          
				<tr>
					<th width="30%">Intercostais</th>
					<td width="70%">{!! $area->intercostais !!}</td>
				</tr>           
				<tr>  
					<td colspan="2" align="center"><h4>Avaliação Respiratória</h4></td>  
				</tr>       
				<tr>
					<th width="30%">Ritmo Respiratório</th>
					<td width="70%">{!! $area->ritmo !!}</td>
				</tr>    
				<tr>
					<th width="30%">Tipo Respiratório</th>
					<td width="70%">{!! $area->tipo !!}</td>
				</tr>    
				<tr>
					<th width="30%">Amplitude</th>
					<td width="70%">{!! $area->amplitude !!}</td>
				</tr>      
				<tr>
					<th width="30%">Musculatura Acessória</th>
					<td width="70%">{!! $area->musculatura !!}</td>
				</tr>      
				<tr>
					<th width="30%">Tosse Expectoração</th>
					<td width="70%">{!! $area->tosse !!}</td>
				</tr>       
				<tr>
					<th width="30%">Percussão</th>
					<td width="70%">{!! $area->percussao !!}</td>
				</tr>        
				<tr>
					<th width="30%">Ausculta</th>
					<td width="70%">{!! $area->ausculta !!}</td>
				</tr>             
				<tr>  
					<td colspan="2" align="center"><h4>Sinais Vitais</h4></td>  
				</tr> 
				<tr>
					<th width="30%">PA</th>
					<td width="70%">{!! $area->pa !!}</td>
				</tr>        
				<tr>
					<th width="30%">FC</th>
					<td width="70%">{!! $area->fc !!}</td>
				</tr>         
				<tr>
					<th width="30%">FR</th>
					<td width="70%">{!! $area->fr !!}</td>
				</tr>          
				<tr>
					<th width="30%">T</th>
					<td width="70%">{!! $area->t !!}</td>
				</tr>            
				<tr>
					<th width="30%">spO2</th>
					<td width="70%">{!! $area->spo2 !!}</td>
				</tr>            
				<tr>
					<th width="30%">IMC</th>
					<td width="70%">{!! $area->imc !!}</td>
				</tr>           
				<tr>
					<th width="30%">Inspeção</th>
					<td width="70%">{!! $area->inspecao !!}</td>
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
