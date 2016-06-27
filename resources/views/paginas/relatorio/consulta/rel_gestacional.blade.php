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
					<td colspan="2" align="center" align="center"><h4>Dados</h4></td> 
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
					<th width="30%">DUM</th>
					<td width="70%">{!! $area->dum !!}</td>
				</tr> 
				<tr>
					<th width="30%">DPP</th>
					<td width="70%">{!! $area->dpp !!}</td>
				</tr>   
				<tr>
					<th width="30%">Objetivos</th>
					<td width="70%">{!! $area->objetivo !!}</td>
				</tr>    
				<tr>  
					<td colspan="2" align="center"><h5> > Histórico de Gestações Anteriores</h5></td> 
				</tr>  
				<tr>
					<th width="30%">Planejamento</th>
					<td width="70%">{!! $simNao[$area->planejamento]  !!}</td>
				</tr>      
				<tr>
					<th width="30%">Realizou TTO</th>
					<td width="70%">{!! $simNao[$area->tto]  !!}</td>
				</tr>       
				<tr>
					<th width="30%">HAS/G</th>
					<td width="70%">{!! $simNao[$area->hasg]  !!}</td>
				</tr>      
				<tr>
					<th width="30%">DM/G</th>
					<td width="70%">{!! $simNao[$area->dmg]  !!}</td>
				</tr>       
				<tr>
					<th width="30%">Eclampsia</th>
					<td width="70%">{!! $simNao[$area->eclampsia]  !!}</td>
				</tr>     
				<tr>
					<th width="30%">Parto Prematuro</th>
					<td width="70%">{!! $simNao[$area->parto]  !!}</td>
				</tr> 
				<tr>
					<th width="30%">Ruptura Prematura da Membrana</th>
					<td width="70%">{!! $simNao[$area->ruptura]  !!}</td>
				</tr>  
				<tr>
					<th width="30%">Placenta Prévia</th>
					<td width="70%">{!! $simNao[$area->placenta]  !!}</td>
				</tr> 
				<tr>
					<th width="30%">Incompetência de Cervix</th>
					<td width="70%">{!! $simNao[$area->incompetencia]  !!}</td>
				</tr>  
				<tr>
					<th width="30%">Recém Nascido</th>
					<td width="70%">{!! $recemNascido[$area->recem]  !!}</td>
				</tr>  
				<tr>  
					<td colspan="2" align="center"><h5> > Sistema Cardiovascular</h5></td> 
				</tr>    
				<tr>
					<th width="30%">HAS</th>
					<td width="70%">{!! $simNao[$area->cardiovascular->has]  !!}</td>
				</tr>    
				<tr>
					<th width="30%">HAIG</th>
					<td width="70%">{!! $simNao[$area->cardiovascular->haig]  !!}</td>
				</tr>    
				<tr>
					<th width="30%">HAIG</th>
					<td width="70%">{!! $simNao[$area->cardiovascular->haig]  !!}</td>
				</tr>     
				<tr>
					<th width="30%">Problemas Cardíacos</th>
					<td width="70%">{!! $simNao[$area->cardiovascular->problemas]  !!}</td>
				</tr>    
				<tr>
					<th width="30%">ICC</th>
					<td width="70%">{!! $simNao[$area->cardiovascular->icc]  !!}</td>
				</tr>    
				<tr>
					<th width="30%">Varizes</th>
					<td width="70%">{!! $simNao[$area->cardiovascular->varizes]  !!}</td>
				</tr>     
				<tr>
					<th width="30%">Hemorróida</th>
					<td width="70%">{!! $simNao[$area->cardiovascular->hemorroida]  !!}</td>
				</tr>      
				<tr>
					<th width="30%">TVP</th>
					<td width="70%">{!! $simNao[$area->cardiovascular->tvp]  !!}</td>
				</tr>       
				<tr>
					<th width="30%">Anemia</th>
					<td width="70%">{!! $simNao[$area->cardiovascular->anemia]  !!}</td>
				</tr>         
				<tr>
					<th width="30%">Mal Estar</th>
					<td width="70%">{!! $simNao[$area->cardiovascular->mal]  !!}</td>
				</tr>           
				<tr>
					<th width="30%">Flebite</th>
					<td width="70%">{!! $simNao[$area->cardiovascular->flebite]  !!}</td>
				</tr>           
				<tr>
					<th width="30%">Taquicardia</th>
					<td width="70%">{!! $simNao[$area->cardiovascular->taquicardia]  !!}</td>
				</tr>          
				<tr>
					<th width="30%">Hipotensão Postural</th>
					<td width="70%">{!! $simNao[$area->cardiovascular->postural]  !!}</td>
				</tr>         
				<tr>
					<th width="30%">Hipotensão Supino</th>
					<td width="70%">{!! $simNao[$area->cardiovascular->supino]  !!}</td>
				</tr>             
				<tr>
					<th width="30%">Observações</th>
					<td width="70%">{!! $area->cardiovascular->cardiovascular_obs !!}</td>
				</tr> 
				<tr>  
					<td colspan="2" align="center"><h5> > Sistema Genitourinario</h5></td> 
				</tr>         
				<tr>
					<th width="30%">Infecção Urinária</th>
					<td width="70%">{!! $simNao[$area->genito->infeccao]  !!}</td>
				</tr>       
				<tr>
					<th width="30%">Perda Urinária</th>
					<td width="70%">{!! $simNao[$area->genito->perda]  !!}</td>
				</tr>  
				<tr>
					<th width="30%">Disuria</th>
					<td width="70%">{!! $simNao[$area->genito->disuria]  !!}</td>
				</tr>  
				<tr>
					<th width="30%">Sensação de Esvaziamento Incompleto</th>
					<td width="70%">{!! $simNao[$area->genito->sensacao]  !!}</td>
				</tr>    
				<tr>
					<th width="30%">Dor Pélvica</th>
					<td width="70%">{!! $simNao[$area->genito->pelvica]  !!}</td>
				</tr>     
				<tr>
					<th width="30%">Dor Abdominal</th>
					<td width="70%">{!! $simNao[$area->genito->abdominal]  !!}</td>
				</tr>     
				<tr>
					<th width="30%">Sangramento Vaginal</th>
					<td width="70%">{!! $simNao[$area->genito->vaginal]  !!}</td>
				</tr>    
				<tr>
					<th width="30%">Dor nas Costas</th>
					<td width="70%">{!! $simNao[$area->genito->costa]  !!}</td>
				</tr>    
				<tr>
					<th width="30%">Observações</th>
					<td width="70%">{!! $area->genito->genito_obs  !!}</td>
				</tr>      
				<tr>  
					<td colspan="2" align="center"><h5> > Sistema Digestivo</h5></td> 
				</tr>    
				<tr>
					<th width="30%">Alteração de Consistência das Fezes</th>
					<td width="70%">{!! $simNao[$area->digestivo->alteracao]  !!}</td>
				</tr>   
				<tr>
					<th width="30%">Esforço Para Evacuar</th>
					<td width="70%">{!! $simNao[$area->digestivo->esforco]  !!}</td>
				</tr>    
				<tr>
					<th width="30%">Manobras Perineais</th>
					<td width="70%">{!! $simNao[$area->digestivo->manobra]  !!}</td>
				</tr>     
				<tr>
					<th width="30%">Sensação de Esvaziamento Incompleto</th>
					<td width="70%">{!! $simNao[$area->digestivo->digestivo_sensacao]  !!}</td>
				</tr>      
				<tr>
					<th width="30%">Perdas Fecais</th>
					<td width="70%">{!! $simNao[$area->digestivo->fecais]  !!}</td>
				</tr>      
				<tr>
					<th width="30%">Perda de Flatos</th>
					<td width="70%">{!! $simNao[$area->digestivo->flatos]  !!}</td>
				</tr>       
				<tr>
					<th width="30%">Observações</th>
					<td width="70%">{!! $area->digestivo->digestivo_obs  !!}</td>
				</tr>         
				<tr>  
					<td colspan="2" align="center"><h5> > Sistema Músculo Esquelético</h5></td> 
				</tr>    
				<tr>
					<th width="30%">Fraturas</th>
					<td width="70%">{!! $simNao[$area->musculo->fratura]  !!}</td>
				</tr>
				<tr>
					<th width="30%">Parestesia de MMSS</th>
					<td width="70%">{!! $simNao[$area->musculo->parestesia]  !!}</td>
				</tr>
				<tr>
					<th width="30%">Outros</th>
					<td width="70%">{!! $area->musculo->musculos_outros  !!}</td>
				</tr>
				<tr>  
					<td colspan="2">
						<ul>
							<li><b>O</b>-Início</li>
							<li><b>L</b>-Localização</li>
							<li><b>D</b>-Duração</li>
							<li><b>C</b>-Carater</li>
							<li><b>A</b>-Fatores Agravantes</li>
							<li><b>R</b>-Fatores Atenuantes</li>
							<li><b>D</b>-Tratamentos Aplicados</li>
						</ul>
					</td> 
				</tr>   
				<tr>
					<th width="30%">Estado Emocional</th>
					<td width="70%">{!! $area->musculo->emocional  !!}</td>
				</tr> 
				<tr>
					<th width="30%">HF</th>
					<td width="70%">{!! $area->musculo->hf  !!}</td>
				</tr>   
				<tr>  
					<td colspan="2" align="center"><h5> > Sistema Nervoso</h5></td> 
				</tr>        
				<tr>
					<th width="30%">Lipotimia</th>
					<td width="70%">{!! $simNao[$area->nervoso->lipotimia]  !!}</td>
				</tr> 
				<tr>
					<th width="30%">Virtigem</th>
					<td width="70%">{!! $simNao[$area->nervoso->virtigem]  !!}</td>
				</tr> 
				<tr>
					<th width="30%">Convulção</th>
					<td width="70%">{!! $simNao[$area->nervoso->convulcao]  !!}</td>
				</tr>   
				<tr>
					<th width="30%">Parentesca</th>
					<td width="70%">{!! $simNao[$area->nervoso->parentesca]  !!}</td>
				</tr>    
				<tr>  
					<td colspan="2" align="center"><h5> > Sistema Tegumentar</h5></td> 
				</tr>   
				<tr>
					<th width="30%">Alergia</th>
					<td width="70%">{!! $simNao[$area->tegumentar->alergia]  !!}</td>
				</tr> 
				<tr>
					<th width="30%">Doença de Pele</th>
					<td width="70%">{!! $simNao[$area->tegumentar->pele]  !!}</td>
				</tr> 
				<tr>
					<th width="30%">Observações</th>
					<td width="70%">{!! $area->tegumentar->tegumentar_obs  !!}</td>
				</tr>  
				<tr>  
					<td colspan="2" align="center"><h5> > Exame Físico</h5></td> 
				</tr>   
				<tr>
					<th width="30%">PA</th>
					<td width="70%">{!! $area->fisico->pa  !!}</td>
				</tr> 
				<tr>
					<th width="30%">FC</th>
					<td width="70%">{!! $area->fisico->fc  !!}</td>
				</tr>  
				<tr>
					<th width="30%">FR</th>
					<td width="70%">{!! $area->fisico->fr  !!}</td>
				</tr> 
				<tr>
					<th width="30%">Peso Antes da Gestação</th>
					<td width="70%">{!! $area->fisico->peso_antes  !!}</td>
				</tr> 
				<tr>
					<th width="30%">Peso Atual</th>
					<td width="70%">{!! $area->fisico->peso_antes  !!}</td>
				</tr> 
				<tr>
					<th width="30%">Ganho Ponteral</th>
					<td width="70%">{!! $area->fisico->ganho  !!}</td>
				</tr> 
				<tr>
					<th width="30%">Estatura</th>
					<td width="70%">{!! $area->fisico->estatura  !!}</td>
				</tr> 
				<tr>
					<th width="30%">Vista Anterior</th>
					<td width="70%">{!! $area->fisico->vista_anterior  !!}</td>
				</tr>   
				<tr>
					<th width="30%">Vista Lateral</th>
					<td width="70%">{!! $area->fisico->vista_lateral  !!}</td>
				</tr>    
				<tr>
					<th width="30%">Vista Posterior</th>
					<td width="70%">{!! $area->fisico->vista_posterior  !!}</td>
				</tr>     
				<tr>
					<th width="30%">Exame Estático Sentada</th>
					<td width="70%">{!! $area->fisico->estatico  !!}</td>
				</tr>      	  
				<tr>  
					<td colspan="2" align="center"><h5> >> Mamas</h5></td> 
				</tr>  
				<tr>
					<th width="30%">Exame Estático Sentada</th>
					<td width="70%">{!! $area->fisico->simetria  !!}</td>
				</tr>   
				<tr>
					<th width="30%">Condição Mamilar</th>
					<td width="70%">{!! $area->fisico->mamilar  !!}</td>
				</tr>    
				<tr>
					<th width="30%">Sensibilidade do Tecido Mamilar</th>
					<td width="70%">{!! $area->fisico->sensibilidade_mamilar  !!}</td>
				</tr>     
				<tr>
					<th width="30%">Tipo de Secreção Mamilar</th>
					<td width="70%">{!! $area->fisico->secrecao  !!}</td>
				</tr>    	  
				<tr>  
					<td colspan="2" align="center"><h5> >> Exame DD</h5></td> 
				</tr>    
				<tr>
					<th width="30%">Distase do Músculo reto Abdominal</th>
					<td width="70%">{!! $area->fisico->diastase  !!}</td>
				</tr>      	  
				<tr>  
					<td colspan="2" align="center"><h5> >> Exame Dinâmico</h5></td> 
				</tr>     
				<tr>
					<th width="30%">Flexão Anterior</th>
					<td width="70%">{!! $area->fisico->flexao_anterior  !!}</td>
				</tr>      	    
				<tr>
					<th width="30%">Flexão Lateral</th>
					<td width="70%">{!! $area->fisico->flexao_lateral  !!}</td>
				</tr>      	     
				<tr>
					<th width="30%">Extensão</th>
					<td width="70%">{!! $area->fisico->extensao  !!}</td>
				</tr>      	     
				<tr>
					<th width="30%">Rotação</th>
					<td width="70%">{!! $area->fisico->rotacao  !!}</td>
				</tr>      	   
				<tr>
					<th width="30%">Avaliação Neurológica</th>
					<td width="70%">{!! $area->fisico->av_neuro  !!}</td>
				</tr>      	   
				<tr>
					<th width="30%">Avaliação Muscular</th>
					<td width="70%">{!! $area->fisico->av_muscular  !!}</td>
				</tr>      	    
				<tr>
					<th width="30%">Palpação</th>
					<td width="70%">{!! $area->fisico->palpacao  !!}</td>
				</tr>      	  	    
				<tr>
					<th width="30%">Avaliação Funcional</th>
					<td width="70%">{!! $area->fisico->av_func  !!}</td>
				</tr>      	  
				<tr>  
					<td colspan="2" align="center"><h5> > Testes Especiais</h5></td> 
				</tr>   
				<tr>
					<th width="30%">Tredelemburg</th>
					<td width="70%">{!! $simNao[$area->especial->tredelemburg]  !!}</td>
				</tr> 
				<tr>
					<th width="30%">Lasegue</th>
					<td width="70%">{!! $simNao[$area->especial->lasegue]  !!}</td>
				</tr> 
				<tr>
					<th width="30%">Phalen</th>
					<td width="70%">{!! $simNao[$area->especial->phalen]  !!}</td>
				</tr> 
				<tr>
					<th width="30%">Teste de Piriforme</th>
					<td width="70%">{!! $simNao[$area->especial->piriforme]  !!}</td>
				</tr>  
				<tr>
					<th width="30%">MMSS</th>
					<td width="70%">{!!  $area->especial->mmss !!}</td>
				</tr>  
				<tr>
					<th width="30%">MMII</th>
					<td width="70%">{!! $simNao[$area->especial->mmii]  !!}</td>
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
