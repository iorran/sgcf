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
					<td colspan="2"><h4>Dados</h4></td> 
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
					<td colspan="2"><h4>Anamnese</h4></td> 
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
					<td colspan="2"><h4>{!! $nome_area !!}</h4></td> 
				</tr>
				<tr>  
					<td colspan="2"><h5>> Informações Gerais</h5></td>  
				</tr> 
				<tr>
					<th width="30%">1º Pressão Arterial</th>
					<td width="70%">{!! $area->pa !!}</td>
				</tr> 
				<tr>
					<th width="30%">2º Pressão Arterial</th>
					<td width="70%">{!! $area->pa2 !!}</td>
				</tr> 
				<tr>
					<th width="30%">1º FCR</th>
					<td width="70%">{!! $area->fcr !!}</td>
				</tr>  
				<tr>
					<th width="30%">2º FCR</th>
					<td width="70%">{!! $area->fcr2 !!}</td>
				</tr>    
				<tr>
					<th width="30%">Medicamentos</th>
					<td width="70%">{!! $area->medicamentos !!}</td>
				</tr>      
				<tr>  
					<td colspan="2"><h5>> Exames Laboratoriais</h5></td>  
				</tr> 
				<tr>
					<th width="30%">HDL</th>
					<td width="70%">{!! $area->exame->hdl !!}</td>
				</tr>  
				<tr>
					<th width="30%">LDL</th>
					<td width="70%">{!! $area->exame->ldl !!}</td>
				</tr>  
				<tr>
					<th width="30%">Triglicerídeos</th>
					<td width="70%">{!! $area->exame->triglicerideos !!}</td>
				</tr>  
				<tr>
					<th width="30%">Glicose</th>
					<td width="70%">{!! $area->exame->glicose !!}</td>
				</tr>   
				<tr>
					<th width="30%">IMC</th>
					<td width="70%">{!! $area->exame->imc !!}</td>
				</tr>      
				<tr>  
					<td colspan="2"><h5>> Riscos Positivos</h5></td>  
				</tr> 
				<tr>
					<th width="30%">História Familiar</th>
					<td width="70%">{!! $simNao[$area->fator->historia]  !!}</td>
				</tr>     
				<tr>
					<th width="30%">Fumo de Cigarros</th>
					<td width="70%">{!! $simNao[$area->fator->fumo]  !!}</td>
				</tr>     
				<tr>
					<th width="30%">Hipertensão Arterial</th>
					<td width="70%">{!! $simNao[$area->fator->hipertensao]  !!}</td>
				</tr>      
				<tr>
					<th width="30%">Glicose em Jejum Alterada</th>
					<td width="70%">{!! $simNao[$area->fator->glicose_jejum]  !!}</td>
				</tr>     
				<tr>
					<th width="30%">Obesidade</th>
					<td width="70%">{!! $simNao[$area->fator->obesidade]  !!}</td>
				</tr>       
				<tr>
					<th width="30%">Estilo de Vida Sedentário</th>
					<td width="70%">{!! $simNao[$area->fator->estilo]  !!}</td>
				</tr>       
				<tr>  
					<td colspan="2"><h5>> Riscos Negativos</h5></td>  
				</tr>    
				<tr>
					<th width="30%">Colesterol HDL Sérico alto</th>
					<td width="70%">{!! $simNao[$area->fator->colesterol]  !!}</td>
				</tr>     
				<tr>  
					<td colspan="2"><h5>> Sinais e Sintomas</h5></td>  
				</tr>
				<tr>
					<th width="30%">Sente dor em aperto no peito após esforço ou mesmo ao repouso? Como alivia?</th>
					<td width="70%">{!! $simNao[$area->sintoma->p1]  !!}</td>
				</tr>   
				<tr>
					<th width="30%">Sente falta de ar mesmo parado ou quando realiza pequeno esforço? </th>
					<td width="70%">{!! $simNao[$area->sintoma->p2]  !!}</td>
				</tr>   
				<tr>
					<th width="30%">Sente tonteira ou sensação de desmaio frequentemente?</th>
					<td width="70%">{!! $simNao[$area->sintoma->p4]  !!}</td>
				</tr>    
				<tr>
					<th width="30%">Sente falta de ar ao dormir de barriga para cima com a cabeceira baixa, ou acorda a noite subitamente com falta de ar?</th>
					<td width="70%">{!! $simNao[$area->sintoma->p5]  !!}</td>
				</tr>    
				<tr>
					<th width="30%">Seus pés incham? </th>
					<td width="70%">{!! $simNao[$area->sintoma->p6]  !!}</td>
				</tr>      
				<tr>
					<th width="30%">Sente o coração acelerado?</th>
					<td width="70%">{!! $simNao[$area->sintoma->p7]  !!}</td>
				</tr>      
				<tr>
					<th width="30%">Manca ao caminhar?</th>
					<td width="70%">{!! $simNao[$area->sintoma->p8]  !!}</td>
				</tr>       
				<tr>
					<th width="30%">Sopro cardíaco conhecido?</th>
					<td width="70%">{!! $simNao[$area->sintoma->p9]  !!}</td>
				</tr>     
				<tr>
					<th width="30%">Sente muito cansaço quando faz as suas atividades do dia a dia, como varrer, tomar banho, vestir-se?</th>
					<td width="70%">{!! $simNao[$area->sintoma->p3]  !!}</td>
				</tr>  
				<tr>
					<th width="30%">Extratificação Inicial dos Riscos</th>
					<td width="70%">{!! $risco[$area->sintoma->tipo_risco]  !!}</td>
				</tr>  
				<tr>  
					<td colspan="2"><h5>> Exame de Aptidão</h5></td>  
				</tr>
				<tr>
					<th width="30%">Teste Articular</th>
					<td width="70%">{!! $area->aptidao->teste_articular  !!}</td>
				</tr>  
				<tr>
					<th width="30%">Teste Muscular</th>
					<td width="70%">{!! $area->aptidao->teste_muscular  !!}</td>
				</tr>  
				<tr>
					<th width="30%">Análise da Marcha</th>
					<td width="70%">{!! $area->aptidao->analise_da_marcha  !!}</td>
				</tr>  
				<tr>
					<th width="30%">Análise da Ventilatória</th>
					<td width="70%">{!! $area->aptidao->analise_ventilatoria !!}</td>
				</tr>  
				<tr>
					<th width="30%">FR</th>
					<td width="70%">{!! $area->aptidao->fr !!}</td>
				</tr>  
				<tr>
					<th width="30%">Temp. Auxiliar</th>
					<td width="70%">{!! $area->aptidao->temp_auxiliar !!}</td>
				</tr>  
				<tr>
					<th width="30%">SaO2</th>
					<td width="70%">{!! $area->aptidao->sao2 !!}</td>
				</tr>  
				<tr>
					<th width="30%">Ausculta Pulmonar</th>
					<td width="70%">{!! $area->aptidao->ausculta_pulmonar !!}</td>
				</tr>  
				<tr>
					<th width="30%">Dor Torácica</th>
					<td width="70%">{!! $area->aptidao->dor_toracica !!}</td>
				</tr>  
				<tr>  
					<td colspan="2"><h4>Diagnóstico</h4></td>  
				</tr> 
				<tr>
					<th width="30%">Diagnóstico</th>
					<td width="70%">{!! $diagnostico->diagnostico !!}</td>
				</tr>  
				<tr>  
					<td colspan="2"><h4>Tratamento</h4></td>  
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
