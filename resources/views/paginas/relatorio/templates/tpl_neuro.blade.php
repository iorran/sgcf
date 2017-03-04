<!DOCTYPE html>
 
<html>
<head>
    <meta charset="UTF-8"> 
</head>
<body>
<table  width="100%" border="1"  cellpadding="0" cellspacing="0">
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
					<td colspan="2" align="center"><h5>>Exame Físico</h5></td> 
				</tr>
				<tr>
					<th width="30%">Fc. BPM</th>
					<td width="70%">{!! $area->exame->fc_bpm !!}</td>
				</tr> 
				<tr>
					<th width="30%">Fr. IRPM</th>
					<td width="70%">{!! $area->exame->fr_irpm !!}</td>
				</tr> 
				<tr>
					<th width="30%">PA</th>
					<td width="70%">{!! $area->exame->pa !!}</td>
				</tr> 
				<tr>
					<th width="30%">MMHG</th>
					<td width="70%">{!! $area->exame->mmhg !!}</td>
				</tr>   
				<tr>
					<th width="30%">Temperatura</th>
					<td width="70%">{!! $area->exame->temperatura !!}</td>
				</tr>    
				<tr>
					<th width="30%">Alscuta Pulmonar</th>
					<td width="70%">{!! $area->exame->alscuta_pulmonar !!}</td>
				</tr>     
				<tr>
					<th width="30%">Inspeção</th>
					<td width="70%">{!! $area->exame->inspecao !!}</td>
				</tr>   
				<tr>
					<th width="30%">Geral(Atitude)</th>
					<td width="70%">{!! $area->exame->geral_atitude !!}</td>
				</tr>      
				<tr>
					<th width="30%">Local</th>
					<td width="70%">{!! $area->exame->local !!}</td>
				</tr>     
				<tr>
					<th width="30%">Face</th>
					<td width="70%">{!! $area->exame->face !!}</td>
				</tr>      
				<tr>
					<th width="30%">Palpação</th>
					<td width="70%">{!! $area->exame->palpacao !!}</td>
				</tr>      
				<tr>
					<th width="30%">Movimento Passivo</th>
					<td width="70%">{!! $area->exame->movimento_passivo !!}</td>
				</tr>      
				<tr>
					<th width="30%">Movimento Voluntário</th>
					<td width="70%">{!! $area->exame->movimento_voluntario !!}</td>
				</tr>          
				<tr>  
					<td colspan="2" align="center"><h5>>Reflexos Posturais Mudancas de Decúbito</h5></td> 
				</tr> 
				<tr>
					<th width="30%">DD DLE</th>
					<td width="70%">{!! $area->postural->dd_dle !!}</td>
				</tr>      
				<tr>
					<th width="30%">DLE DV</th>
					<td width="70%">{!! $area->postural->dle_dv !!}</td>
				</tr>     
				<tr>
					<th width="30%">DV Puppy</th>
					<td width="70%">{!! $area->postural->dv_puppy !!}</td>
				</tr>    
				<tr>
					<th width="30%">Puppy Joelho D.</th>
					<td width="70%">{!! $area->postural->puppy_joelhod !!}</td>
				</tr>     
				<tr>
					<th width="30%">Sentado</th>
					<td width="70%">{!! $area->postural->sentado !!}</td>
				</tr>      
				<tr>
					<th width="30%">Rolar</th>
					<td width="70%">{!! $area->postural->rolar !!}</td>
				</tr>          
				<tr>
					<th width="30%">DD DLD</th>
					<td width="70%">{!! $area->postural->dd_dld !!}</td>
				</tr>      
				<tr>
					<th width="30%">DLD DV</th>
					<td width="70%">{!! $area->postural->dld_dv !!}</td>
				</tr>          
				<tr>
					<th width="30%">Puppy Joelho E.</th>
					<td width="70%">{!! $area->postural->puppy_joelhoe !!}</td>
				</tr>                 
				<tr>
					<th width="30%">Quatro Apoio</th>
					<td width="70%">{!! $area->postural->quatro_apoio !!}</td>
				</tr>                 
				<tr>
					<th width="30%">Quatro Apoio Aj.</th>
					<td width="70%">{!! $area->postural->quatro_apoio_ajoelhado !!}</td>
				</tr>                  
				<tr>
					<th width="30%">Semi Aj. Ortoest.</th>
					<td width="70%">{!! $area->postural->semi_aj_ortoest !!}</td>
				</tr>                  
				<tr>
					<th width="30%">Arrastar Cruzado</th>
					<td width="70%">{!! $area->postural->arrastar_cruzado !!}</td>
				</tr>               
				<tr>
					<th width="30%">Tronco</th>
					<td width="70%">{!! $area->postural->tronco !!}</td>
				</tr>                  
				<tr>  
					<td colspan="2" align="center"><h5>>Equilíbrio</h5></td> 
				</tr>          
				<tr>
					<th width="30%">Romberg Simples</th>
					<td width="70%">{!! $area->equilibrio->romberg_simples !!}</td>
				</tr>               
				<tr>
					<th width="30%">Romberg Sensib.</th>
					<td width="70%">{!! $area->equilibrio->romberg_sensib !!}</td>
				</tr>      
				<tr>  
					<td colspan="2" align="center"><h5>>Reflexo Superficiais</h5></td> 
				</tr>            
				<tr>
					<th width="30%">Babinski</th>
					<td width="70%">{!! $area->superficial->babinski !!}</td>
				</tr>       
				<tr>
					<th width="30%">Gordon</th>
					<td width="70%">{!! $area->superficial->gordon !!}</td>
				</tr>     
				<tr>
					<th width="30%">Warterbenrg</th>
					<td width="70%">{!! $area->superficial->warterbenrg !!}</td>
				</tr>       
				<tr>
					<th width="30%">Oppenhein</th>
					<td width="70%">{!! $area->superficial->oppenhein !!}</td>
				</tr>       
				<tr>
					<th width="30%">Rossolino</th>
					<td width="70%">{!! $area->superficial->rossolino !!}</td>
				</tr>     
				<tr>
					<th width="30%">Cutanêo Abdominal</th>
					<td width="70%">{!! $area->superficial->cutaneo_abdominal !!}</td>
				</tr>      
				<tr>
					<th width="30%">Chacddock</th>
					<td width="70%">{!! $area->superficial->chacddock !!}</td>
				</tr>       
				<tr>
					<th width="30%">Hoffman</th>
					<td width="70%">{!! $area->superficial->hoffman !!}</td>
				</tr>          
				<tr>
					<th width="30%">Outros</th>
					<td width="70%">{!! $area->superficial->outro !!}</td>
				</tr>            
				<tr>
					<th width="30%">Mandibular</th>
					<td width="70%">{!! $area->superficial->mandibular !!}</td>
				</tr>         
				<tr>
					<th width="30%">Aquileu</th>
					<td width="70%">{!! $area->superficial->aquileu !!}</td>
				</tr>              
				<tr>
					<th width="30%">Patelar</th>
					<td width="70%">{!! $area->superficial->patelar !!}</td>
				</tr>                 
				<tr>  
					<td colspan="2" align="center"><h5>>Coordenacão</h5></td> 
				</tr>     
				<tr>
					<th width="30%">Índex-Índex</th>
					<td width="70%">{!! $area->coordenacao->index_index !!}</td>
				</tr>      
				<tr>
					<th width="30%">Índex-Nariz-Índex</th>
					<td width="70%">{!! $area->coordenacao->index_nariz_index !!}</td>
				</tr>          
				<tr>
					<th width="30%">Índex-Nariz</th>
					<td width="70%">{!! $area->coordenacao->index_nariz !!}</td>
				</tr>         
				<tr>
					<th width="30%">Índex-Índex(Terapeuta)</th>
					<td width="70%">{!! $area->coordenacao->index_index_terapeuta !!}</td>
				</tr>           
				<tr>
					<th width="30%">Diadococinesia</th>
					<td width="70%">{!! $area->coordenacao->diadococinesia !!}</td>
				</tr>           
				<tr>
					<th width="30%">Grafia</th>
					<td width="70%">{!! $area->coordenacao->grafia !!}</td>
				</tr>           
				<tr>
					<th width="30%">Calcanhar-Joelho</th>
					<td width="70%">{!! $area->coordenacao->calcanhar_joelho !!}</td>
				</tr>               
				<tr>
					<th width="30%">Batida do Pé</th>
					<td width="70%">{!! $area->coordenacao->batida_do_pe !!}</td>
				</tr>                
				<tr>
					<th width="30%">Outros</th>
					<td width="70%">{!! $area->coordenacao->outros !!}</td>
				</tr>          
				<tr>  
					<td colspan="2" align="center"><h5>>Monabras Deficitárias da Motricidade</h5></td> 
				</tr>             
				<tr>
					<th width="30%">Braços Estend.</th>
					<td width="70%">{!! $area->manobras->bracos_estend !!}</td>
				</tr>          
				<tr>
					<th width="30%">Barre</th>
					<td width="70%">{!! $area->manobras->barre !!}</td>
				</tr>    
				<tr>
					<th width="30%">Mingazzini</th>
					<td width="70%">{!! $area->manobras->mingazzini !!}</td>
				</tr>     
				<tr>  
					<td colspan="2" align="center"><h5>>Sensibilidade</h5></td> 
				</tr> 
				<tr>
					<th width="30%">Tátil</th>
					<td width="70%">{!! $area->tatil !!}</td>
				</tr>   
				<tr>
					<th width="30%">Térmica</th>
					<td width="70%">{!! $area->termica !!}</td>
				</tr>     
				<tr>
					<th width="30%">Dolorosa</th>
					<td width="70%">{!! $area->dolorosa !!}</td>
				</tr>   
				<tr>
					<th width="30%">Palestesia</th>
					<td width="70%">{!! $area->palestesia !!}</td>
				</tr>       
				<tr>
					<th width="30%">Barestesia</th>
					<td width="70%">{!! $area->barestesia !!}</td>
				</tr>       
				<tr>
					<th width="30%">Barognesia</th>
					<td width="70%">{!! $area->barognesia !!}</td>
				</tr>        
				<tr>
					<th width="30%">Grafestesia</th>
					<td width="70%">{!! $area->grafestesia !!}</td>
				</tr>         
				<tr>
					<th width="30%">Propriecptiva</th>
					<td width="70%">{!! $area->propriecptiva !!}</td>
				</tr>          
				<tr>
					<th width="30%">Descrição de Marcha</th>
					<td width="70%">{!! $area->descricao_de_marcha !!}</td>
				</tr>            
				<tr>
					<th width="30%">Nervos Cranianos</th>
					<td width="70%">{!! $area->descricao_de_marcha !!}</td>
				</tr>           
				<tr>
					<th width="30%">Linguagem</th>
					<td width="70%">{!! $area->linguagem !!}</td>
				</tr>             
				<tr>
					<th width="30%">Comportamento</th>
					<td width="70%">{!! $area->comportamento !!}</td>
				</tr>               
				<tr>
					<th width="30%">Sincinesias</th>
					<td width="70%">{!! $area->sincinesias !!}</td>
				</tr>               
				<tr>
					<th width="30%">Gnosia</th>
					<td width="70%">{!! $area->gnosia !!}</td>
				</tr>                
				<tr>
					<th width="30%">Praxia</th>
					<td width="70%">{!! $area->praxia !!}</td>
				</tr>                 
				<tr>
					<th width="30%">Memória Recente</th>
					<td width="70%">{!! $area->memoria_recente !!}</td>
				</tr>           
				<tr>
					<th width="30%">Memória Remota</th>
					<td width="70%">{!! $area->memoria_remota !!}</td>
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
			 </body>
			 </html>