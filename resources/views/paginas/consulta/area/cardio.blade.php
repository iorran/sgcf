@extends('layouts.master') @section('content')

<!-- Main content -->
<section class="content"> 
	<!-- form start --> 
	@if(isset($area))  
	<form class="form-horizontal" action="{{route('consulta.area.cardio.update', $area->id ) }}" method="post"> 
		<input type="hidden" name="_method" value="PUT">
	@else 
	<form class="form-horizontal" action="{{route('consulta.area.cardio.store')}}" method="post"> 
	@endif 
		<input type="hidden" name="agendamento_id" id="agendamento_id" value="{!! $agendamento_id !!}">
		<input type="hidden" name="paciente_id" id="paciente_id" value="{!! $paciente_id !!}"> 
		<fieldset>  
			<div class="nav-tabs-custom">
		    	<ul class="nav nav-tabs">
		        	<li class="active"><a href="#tab_1" data-toggle="tab">Informações Gerais</a></li> 
		        	<li><a href="#tab_2" data-toggle="tab">Exames Laboratoriais</a></li>  
		        	<li><a href="#tab_3" data-toggle="tab">Fatores de Risco</a></li>  
		        	<li><a href="#tab_4" data-toggle="tab">Sinais e Sintomas</a></li> 
		        	<li><a href="#tab_5" data-toggle="tab">Exame de Aptidão</a></li> 
		   		</ul>
   				<div class="tab-content">
      				<div class="tab-pane active" id="tab_1"> 
      					<!-- Text input-->
						<div class="form-group @if($errors->has('pa')) {!! 'has-error' !!} @endif">
							<label class="col-md-4 control-label" for="pa">1º Pressão Arterial</label>
							<div class="col-md-4">
								<input id="pa" name="pa" type="number"
									placeholder="1º Pressão Arterial" class="form-control input-md"
									value="{{ old('pa', isset($area->pa) ? $area->pa : null) }}">
									@if($errors->has('pa')) {!! $errors->first('pa', '<span class="help-block">:message</span>') !!} @endif
							</div>
						</div>	
      					<!-- Text input-->
						<div class="form-group @if($errors->has('pa')) {!! 'has-error' !!} @endif">
							<label class="col-md-4 control-label" for="pa2">2º Pressão Arterial</label>
							<div class="col-md-4">
								<input id="pa2" name="pa2" type="number"
									placeholder="2º Pressão Arterial" class="form-control input-md"
									value="{{ old('pa2', isset($area->pa2) ? $area->pa2 : null) }}">
									@if($errors->has('pa2')) {!! $errors->first('pa2', '<span class="help-block">:message</span>') !!} @endif
							</div>
						</div>	  
      					<!-- Text input-->
						<div class="form-group @if($errors->has('fcr')) {!! 'has-error' !!} @endif">
							<label class="col-md-4 control-label" for="fcr">1º FCR</label>
							<div class="col-md-4">
								<input id="fcr" name="fcr" type="number"
									placeholder="1º CR" class="form-control input-md"
									value="{{ old('fcr', isset($area->fcr) ? $area->fcr: null) }}">
									@if($errors->has('fcr')) {!! $errors->first('fcr', '<span class="help-block">:message</span>') !!} @endif
							</div>
						</div>	 
      					<!-- Text input-->
						<div class="form-group @if($errors->has('fcr2')) {!! 'has-error' !!} @endif">
							<label class="col-md-4 control-label" for="fcr2">2º FCR</label>
							<div class="col-md-4">
								<input id="fcr2" name="fcr2" type="number"
									placeholder="2º FCR" class="form-control input-md"
									value="{{ old('fcr2', isset($area->fcr2) ? $area->fcr2: null) }}">
									@if($errors->has('fcr2')) {!! $errors->first('fcr2', '<span class="help-block">:message</span>') !!} @endif
							</div>
						</div>	 
						<!-- Text Area-->
						<div class="form-group @if($errors->has('medicamentos')) {!! 'has-error' !!} @endif">
							<label class="col-md-4 control-label" for="medicamentos">Medicamentos</label>
							<div class="col-md-6">
								<textarea class="textarea form-control input-md" placeholder="Medicamentos" id="medicamentos" name="medicamentos">
									{{ old('medicamentos',  isset($area->medicamentos) ? $area->medicamentos : null) }}
								</textarea>
								@if($errors->has('medicamentos')) {!! $errors->first('medicamentos', '<span class="help-block">:message</span>') !!} @endif						
				        	</div>
						</div> 
      				</div> 
	      			<div class="tab-pane" id="tab_2">  
      					<!-- Text input-->
						<div class="form-group @if($errors->has('hdl')) {!! 'has-error' !!} @endif">
							<label class="col-md-4 control-label" for="hdl">HDL</label>
							<div class="col-md-4">
								<input id="hdl" name="hdl" type="number"
									placeholder="HDL" class="form-control input-md"
									value="{{ old('hdl', isset($area->exame->hdl) ? $area->exame->hdl : null) }}">
									@if($errors->has('hdl')) {!! $errors->first('hdl', '<span class="help-block">:message</span>') !!} @endif
							</div>
						</div>	
      					<!-- Text input-->
						<div class="form-group @if($errors->has('ldl')) {!! 'has-error' !!} @endif">
							<label class="col-md-4 control-label" for="ldl">LDL</label>
							<div class="col-md-4">
								<input id="ldl" name="ldl" type="number"
									placeholder="LDL" class="form-control input-md"
									value="{{ old('ldl', isset($area->exame->ldl) ? $area->exame->ldl : null) }}">
									@if($errors->has('ldl')) {!! $errors->first('ldl', '<span class="help-block">:message</span>') !!} @endif
							</div>
						</div>	
      					<!-- Text input-->
						<div class="form-group @if($errors->has('triglicerideos')) {!! 'has-error' !!} @endif">
							<label class="col-md-4 control-label" for="triglicerideos">Triglicerídeos</label>
							<div class="col-md-4">
								<input id="triglicerideos" name="triglicerideos" type="number"
									placeholder="Triglicerídeos" class="form-control input-md"
									value="{{ old('triglicerideos', isset($area->exame->triglicerideos) ? $area->exame->triglicerideos : null) }}">
									@if($errors->has('triglicerideos')) {!! $errors->first('triglicerideos', '<span class="help-block">:message</span>') !!} @endif
							</div>
						</div>
      					<!-- Text input-->
						<div class="form-group @if($errors->has('glicose')) {!! 'has-error' !!} @endif">
							<label class="col-md-4 control-label" for="glicose">Glicose</label>
							<div class="col-md-4">
								<input id="glicose" name="glicose" type="number"
									placeholder="Glicose" class="form-control input-md"
									value="{{ old('glicose', isset($area->exame->glicose) ? $area->exame->glicose : null) }}">
									@if($errors->has('glicose')) {!! $errors->first('glicose', '<span class="help-block">:message</span>') !!} @endif
							</div>
						</div>	
      					<!-- Text input-->
						<div class="form-group @if($errors->has('imc')) {!! 'has-error' !!} @endif">
							<label class="col-md-4 control-label" for="imc">IMC</label>
							<div class="col-md-4">
								<input id="imc" name="imc" type="number"
									placeholder="IMC" class="form-control input-md"
									value="{{ old('imc', isset($area->exame->imc) ? $area->exame->imc : null) }}">
									@if($errors->has('imc')) {!! $errors->first('imc', '<span class="help-block">:message</span>') !!} @endif
							</div>
						</div>	
					</div> 
	      			<div class="tab-pane" id="tab_3">
	      				<!-- Label-->
						<div class="form-group">
							<label class="col-md-4 control-label"><h4>Riscos Positivos</h4></label> <div class="col-md-4"> </div>
						</div>
	      				<!-- Select input-->
						<div class="form-group @if($errors->has('historia')) {!! 'has-error' !!} @endif">
							<label class="col-md-4 control-label" for="historia">História Familiar</label>
							<div class="col-md-4"> 
								<select id="historia" name="historia" class="form-control select2"  style="width: 100%;">
									<option value="">Selecione uma opção</option> 
									<option value="0" @if(isset($area->fator->historia)) @if($area->fator->historia == 0) selected @endif @endif>
										Não
									</option> 
									<option value="1" @if(isset($area->fator->historia)) @if($area->fator->historia == 1) selected @endif @endif>
										Sim
									</option> 
								</select>  
								<p class="help-block">IAM, RVM, Morte Súbita de pai ou parente homem 55a, mãe 65a.</p>
							</div>
						</div>
	      				<!-- Select input-->
						<div class="form-group @if($errors->has('fumo')) {!! 'has-error' !!} @endif">
							<label class="col-md-4 control-label" for="fumo">Fumo de Cigarros</label>
							<div class="col-md-4"> 
								<select id="fumo" name="fumo" class="form-control select2"  style="width: 100%;">
									<option value="">Selecione uma opção</option> 
									<option value="0" @if(isset($area->fator->fumo)) @if($area->fator->fumo == 0) selected @endif @endif>
										Não
									</option> 
									<option value="1" @if(isset($area->fator->fumo)) @if($area->fator->fumo == 1) selected @endif @endif>
										Sim
									</option> 
								</select>  
								<p class="help-block">Fumante ou que tenha deixado há 6 meses precedentes.</p>
							</div>
						</div>
	      				<!-- Select input-->
						<div class="form-group @if($errors->has('hipertensao')) {!! 'has-error' !!} @endif">
							<label class="col-md-4 control-label" for="hipertensao">Hipertensão Arterial</label>
							<div class="col-md-4"> 
								<select id="hipertensao" name="hipertensao" class="form-control select2"  style="width: 100%;">
									<option value="">Selecione uma opção</option> 
									<option value="0" @if(isset($area->fator->hipertensao)) @if($area->fator->hipertensao == 0) selected @endif @endif>
										Não
									</option> 
									<option value="1" @if(isset($area->fator->hipertensao)) @if($area->fator->hipertensao == 1) selected @endif @endif>
										Sim
									</option> 
								</select>  
								<p class="help-block">> ou = 140 mmHg / 90 mmHg, duas mensurações em ocasião diferente ou em uso de medicamento.</p>
							</div>
						</div>
	      				<!-- Select input-->
						<div class="form-group @if($errors->has('hipercolesterolemia')) {!! 'has-error' !!} @endif">
							<label class="col-md-4 control-label" for="hipercolesterolemia">Hipercolesterolemia</label>
							<div class="col-md-4"> 
								<select id="hipercolesterolemia" name="hipercolesterolemia" class="form-control select2"  style="width: 100%;">
									<option value="">Selecione uma opção</option> 
									<option value="0" @if(isset($area->fator->hipercolesterolemia)) @if($area->fator->hipercolesterolemia == 0) selected @endif @endif>
										Não
									</option> 
									<option value="1" @if(isset($area->fator->hipercolesterolemia)) @if($area->fator->hipercolesterolemia == 1) selected @endif @endif>
										Sim
									</option> 
								</select>  
								<p class="help-block">Total > 200 mg/dl ou LDL 35 ou < 35 mg/dl ou sob medicação.</p>
							</div>
						</div>
	      				<!-- Select input-->
						<div class="form-group @if($errors->has('glicose_jejum')) {!! 'has-error' !!} @endif">
							<label class="col-md-4 control-label" for="glicose_jejum">Glicose em Jejum Alterada</label>
							<div class="col-md-4"> 
								<select id="glicose_jejum" name="glicose_jejum" class="form-control select2"  style="width: 100%;">
									<option value="">Selecione uma opção</option> 
									<option value="0" @if(isset($area->fator->glicose_jejum)) @if($area->fator->glicose_jejum == 0) selected @endif @endif>
										Não
									</option> 
									<option value="1" @if(isset($area->fator->glicose_jejum)) @if($area->fator->glicose_jejum == 1) selected @endif @endif>
										Sim
									</option> 
								</select>  
								<p class="help-block">> ou = 11- mg/dl alterada.</p>
							</div>
						</div>
	      				<!-- Select input-->
						<div class="form-group @if($errors->has('obesidade')) {!! 'has-error' !!} @endif">
							<label class="col-md-4 control-label" for="obesidade">Obesidade</label>
							<div class="col-md-4"> 
								<select id="obesidade" name="obesidade" class="form-control select2"  style="width: 100%;">
									<option value="">Selecione uma opção</option> 
									<option value="0" @if(isset($area->fator->obesidade)) @if($area->fator->obesidade == 0) selected @endif @endif>
										Não
									</option> 
									<option value="1" @if(isset($area->fator->obesidade)) @if($area->fator->obesidade == 1) selected @endif @endif>
										Sim
									</option> 
								</select>  
								<p class="help-block">IMC > ou = 30 Kg/m2 ou cintura > 100 cm.</p>
							</div>
						</div>
	      				<!-- Select input-->
						<div class="form-group @if($errors->has('estilo')) {!! 'has-error' !!} @endif">
							<label class="col-md-4 control-label" for="estilo">Estilo de Vida Sedentário</label>
							<div class="col-md-4"> 
								<select id="estilo" name="estilo" class="form-control select2"  style="width: 100%;">
									<option value="">Selecione uma opção</option> 
									<option value="0" @if(isset($area->fator->estilo)) @if($area->fator->estilo == 0) selected @endif @endif>
										Não
									</option> 
									<option value="1" @if(isset($area->fator->estilo)) @if($area->fator->estilo == 1) selected @endif @endif>
										Sim
									</option> 
								</select>  
								<p class="help-block">Não participam de programas de exercício regular ou não realizam 30 min ou mais durante a maioria dos dias da semana.</p>
							</div>
						</div>
	      				<!-- Label-->
						<div class="form-group">
							<label class="col-md-4 control-label"><h4>Riscos Negativos</h4></label> <div class="col-md-4"> </div>
						</div>
	      				<!-- Select input-->
						<div class="form-group @if($errors->has('colesterol')) {!! 'has-error' !!} @endif">
							<label class="col-md-4 control-label" for="colesterol">Colesterol HDL Sérico alto</label>
							<div class="col-md-4"> 
								<select id="colesterol" name="colesterol" class="form-control select2"  style="width: 100%;">
									<option value="">Selecione uma opção</option> 
									<option value="0" @if(isset($area->fator->colesterol)) @if($area->fator->colesterol == 0) selected @endif @endif>
										Não
									</option> 
									<option value="1" @if(isset($area->fator->colesterol)) @if($area->fator->colesterol == 1) selected @endif @endif>
										Sim
									</option> 
								</select>  
								<p class="help-block">> 60 mg/dl.</p>
							</div>
						</div>
					</div> 
	      			<div class="tab-pane" id="tab_4"> 
	      				<!-- Select input-->
						<div class="form-group @if($errors->has('p1')) {!! 'has-error' !!} @endif">
							<label class="col-md-7 control-label" for="p1">
								Sente dor em aperto no peito após esforço ou mesmo ao repouso? Como alivia? 
							</label>
							<div class="col-md-3"> 
								<select id="p1" name="p1" class="form-control select2" style="width: 100%;">
									<option value="">Selecione uma opção</option> 
									<option value="0" @if(isset($area->sintoma->p1)) @if($area->sintoma->p1 == 0) selected @endif @endif>
										Não
									</option> 
									<option value="1" @if(isset($area->sintoma->p1)) @if($area->sintoma->p1 == 1) selected @endif @endif>
										Sim
									</option> 
								</select>   
								<p class="help-block">(Para avaliar a presença de angina).</p>
							</div>
						</div>
	      				<!-- Select input-->
						<div class="form-group @if($errors->has('p2')) {!! 'has-error' !!} @endif">
							<label class="col-md-7 control-label" for="p2">
								Sente falta de ar mesmo parado ou quando realiza pequeno esforço? 
							</label>
							<div class="col-md-3"> 
								<select id="p2" name="p2" class="form-control select2" style="width: 100%;">
									<option value="">Selecione uma opção</option> 
									<option value="0" @if(isset($area->sintoma->p2)) @if($area->sintoma->p2 == 0) selected @endif @endif>
										Não
									</option> 
									<option value="1" @if(isset($area->sintoma->p2)) @if($area->sintoma->p2 == 1) selected @endif @endif>
										Sim
									</option> 
								</select>   
								<p class="help-block"></p>
							</div>
						</div> 
	      				<!-- Select input-->
						<div class="form-group @if($errors->has('p4')) {!! 'has-error' !!} @endif">
							<label class="col-md-7 control-label" for="p4">
								Sente tonteira ou sensação de desmaio frequentemente?
							</label>
							<div class="col-md-3"> 
								<select id="p4" name="p4" class="form-control select2" style="width: 100%;">
									<option value="">Selecione uma opção</option> 
									<option value="0" @if(isset($area->sintoma->p4)) @if($area->sintoma->p4 == 0) selected @endif @endif>
										Não
									</option> 
									<option value="1" @if(isset($area->sintoma->p4)) @if($area->sintoma->p4 == 1) selected @endif @endif>
										Sim
									</option> 
								</select>   
								<p class="help-block">> 60 mg/dl.</p>
							</div>
						</div>
	      				<!-- Select input-->
						<div class="form-group @if($errors->has('p5')) {!! 'has-error' !!} @endif">
							<label class="col-md-7 control-label" for="p5">
								Sente falta de ar ao dormir de barriga para cima com a cabeceira baixa, ou acorda a noite subitamente com falta de ar?
							</label>
							<div class="col-md-3"> 
								<select id="p5" name="p5" class="form-control select2" style="width: 100%;">
									<option value="">Selecione uma opção</option> 
									<option value="0" @if(isset($area->sintoma->p5)) @if($area->sintoma->p5 == 0) selected @endif @endif>
										Não
									</option> 
									<option value="1" @if(isset($area->sintoma->p5)) @if($area->sintoma->p5 == 1) selected @endif @endif>
										Sim
									</option> 
								</select>   
								<p class="help-block">( Para avaliar ortopnéia ou dispnéia paroxística noturna).</p>
							</div>
						</div>
	      				<!-- Select input-->
						<div class="form-group @if($errors->has('p6')) {!! 'has-error' !!} @endif">
							<label class="col-md-7 control-label" for="p6">
								Seus pés incham? 
							</label>
							<div class="col-md-3"> 
								<select id="p6" name="p6" class="form-control select2" style="width: 100%;">
									<option value="">Selecione uma opção</option> 
									<option value="0" @if(isset($area->sintoma->p6)) @if($area->sintoma->p6 == 0) selected @endif @endif>
										Não
									</option> 
									<option value="1" @if(isset($area->sintoma->p6)) @if($area->sintoma->p6 == 1) selected @endif @endif>
										Sim
									</option> 
								</select>   
								<p class="help-block">(Para avaliar edema em tornozelos).</p>
							</div>
						</div>
	      				<!-- Select input-->
						<div class="form-group @if($errors->has('p7')) {!! 'has-error' !!} @endif">
							<label class="col-md-7 control-label" for="p7">
								Sente o coração acelerado? 
							</label>
							<div class="col-md-3"> 
								<select id="p7" name="p7" class="form-control select2" style="width: 100%;">
									<option value="">Selecione uma opção</option> 
									<option value="0" @if(isset($area->sintoma->p7)) @if($area->sintoma->p7 == 0) selected @endif @endif>
										Não
									</option> 
									<option value="1" @if(isset($area->sintoma->p7)) @if($area->sintoma->p7 == 1) selected @endif @endif>
										Sim
									</option> 
								</select>   
								<p class="help-block">(Para avaliar palpitação ou taquicardia).</p>
							</div>
						</div>
	      				<!-- Select input-->
						<div class="form-group @if($errors->has('p8')) {!! 'has-error' !!} @endif">
							<label class="col-md-7 control-label" for="p8">
								Manca ao caminhar?
							</label>
							<div class="col-md-3"> 
								<select id="p8" name="p8" class="form-control select2" style="width: 100%;">
									<option value="">Selecione uma opção</option> 
									<option value="0" @if(isset($area->sintoma->p8)) @if($area->sintoma->p8 == 0) selected @endif @endif>
										Não
									</option> 
									<option value="1" @if(isset($area->sintoma->p8)) @if($area->sintoma->p8 == 1) selected @endif @endif>
										Sim
									</option> 
								</select>   
								<p class="help-block">(Para avaliar claudicação intermitente).</p>
							</div>
						</div>
	      				<!-- Select input-->
						<div class="form-group @if($errors->has('p9')) {!! 'has-error' !!} @endif">
							<label class="col-md-7 control-label" for="p9">
								Sopro cardíaco conhecido?
							</label>
							<div class="col-md-3"> 
								<select id="p9" name="p9" class="form-control select2" style="width: 100%;">
									<option value="">Selecione uma opção</option> 
									<option value="0" @if(isset($area->sintoma->p9)) @if($area->sintoma->p9 == 0) selected @endif @endif>
										Não
									</option> 
									<option value="1" @if(isset($area->sintoma->p9)) @if($area->sintoma->p9 == 1) selected @endif @endif>
										Sim
									</option> 
								</select>   
								<p class="help-block"></p>
							</div>
						</div>
	      				<!-- Select input-->
						<div class="form-group @if($errors->has('p3')) {!! 'has-error' !!} @endif">
							<label class="col-md-7 control-label" for="p3">
								Sente muito cansaço quando faz as suas atividades do dia a dia, como varrer, tomar banho, vestir-se?
							</label>
							<div class="col-md-3"> 
								<select id="p3" name="p3" class="form-control select2" style="width: 100%;">
									<option value="">Selecione uma opção</option> 
									<option value="0" @if(isset($area->sintoma->p3)) @if($area->sintoma->p3 == 0) selected @endif @endif>
										Não
									</option> 
									<option value="1" @if(isset($area->sintoma->p3)) @if($area->sintoma->p3 == 1) selected @endif @endif>
										Sim
									</option> 
								</select>   
								<p class="help-block">(Para avaliar fadiga excessiva às atividades habituais).</p>
							</div>
						</div>
						
	      				<!-- Select input-->
						<div class="form-group @if($errors->has('tipo_risco')) {!! 'has-error' !!} @endif">
							<label class="col-md-7 control-label" for="tipo_risco">
								Extratificação Inicial dos Riscos
							</label>
							<div class="col-md-3"> 
								<select id="tipo_risco" name="tipo_risco" class="form-control select2" style="width: 100%;">
									<option value="">Selecione uma opção</option> 
									<option value="0" @if(isset($area->sintoma->tipo_risco)) @if($area->sintoma->tipo_risco == 0) selected @endif @endif>
										Baixo Risco
									</option> 
									<option value="1" @if(isset($area->sintoma->tipo_risco)) @if($area->sintoma->tipo_risco == 1) selected @endif @endif>
										Risco Moderado
									</option> 
									<option value="2" @if(isset($area->sintoma->tipo_risco)) @if($area->sintoma->tipo_risco == 2) selected @endif @endif>
										Alto Risco
									</option>  
								</select>    
							</div>
						</div> 
					</div> 
	      			<div class="tab-pane" id="tab_5">
						<!-- Text Area-->
						<div class="form-group @if($errors->has('teste_articular')) {!! 'has-error' !!} @endif">
							<label class="col-md-4 control-label" for="teste_articular">Teste Articular</label>
							<div class="col-md-6">
								<textarea class="textarea form-control input-md" placeholder="Teste Articular" id="teste_articular" name="teste_articular">
									{{ old('teste_articular',  isset($area->aptidao->teste_articular) ? $area->aptidao->teste_articular : null) }}
								</textarea>
								@if($errors->has('teste_articular')) {!! $errors->first('teste_articular', '<span class="help-block">:message</span>') !!} @endif						
				        	</div>
						</div> 
						<!-- Text Area-->
						<div class="form-group @if($errors->has('teste_muscular')) {!! 'has-error' !!} @endif">
							<label class="col-md-4 control-label" for="teste_muscular">Teste Muscular</label>
							<div class="col-md-6">
								<textarea class="textarea form-control input-md" placeholder="Teste Muscular" id="teste_muscular" name="teste_muscular">
									{{ old('teste_muscular',  isset($area->aptidao->teste_muscular) ? $area->aptidao->teste_muscular : null) }}
								</textarea>
								@if($errors->has('teste_muscular')) {!! $errors->first('teste_muscular', '<span class="help-block">:message</span>') !!} @endif						
				        	</div>
						</div>   
						<!-- Text Area-->
						<div class="form-group @if($errors->has('analise_da_marcha')) {!! 'has-error' !!} @endif">
							<label class="col-md-4 control-label" for="analise_da_marcha">Análise da Marcha</label>
							<div class="col-md-6">
								<textarea class="textarea form-control input-md" placeholder="Análise da Marcha" id="analise_da_marcha" name="analise_da_marcha">
									{{ old('analise_da_marcha',  isset($area->aptidao->analise_da_marcha) ? $area->aptidao->analise_da_marcha : null) }}
								</textarea>
								@if($errors->has('analise_da_marcha')) {!! $errors->first('analise_da_marcha', '<span class="help-block">:message</span>') !!} @endif						
				        	</div>
						</div>    
						<!-- Text Area-->
						<div class="form-group @if($errors->has('analise_ventilatoria')) {!! 'has-error' !!} @endif">
							<label class="col-md-4 control-label" for="analise_ventilatoria">Análise da Ventilatória</label>
							<div class="col-md-6">
								<textarea class="textarea form-control input-md" placeholder="Análise da Ventilatória" id="analise_ventilatoria" name="analise_ventilatoria">
									{{ old('analise_ventilatoria',  isset($area->aptidao->analise_ventilatoria) ? $area->aptidao->analise_ventilatoria : null) }}
								</textarea>
								@if($errors->has('analise_ventilatoria')) {!! $errors->first('analise_ventilatoria', '<span class="help-block">:message</span>') !!} @endif						
				        	</div>
						</div>      
      					<!-- Text input-->
						<div class="form-group @if($errors->has('fr')) {!! 'has-error' !!} @endif">
							<label class="col-md-4 control-label" for="fr">FR</label>
							<div class="col-md-4">
								<input id="fr" name="fr" type="text"
									placeholder="FR" class="form-control input-md"
									value="{{ old('fr', isset($area->aptidao->fr) ? $area->aptidao->fr: null) }}">
									@if($errors->has('fr')) {!! $errors->first('fr', '<span class="help-block">:message</span>') !!} @endif
							</div>
						</div>	   
      					<!-- Text input-->
						<div class="form-group @if($errors->has('temp_auxiliar')) {!! 'has-error' !!} @endif">
							<label class="col-md-4 control-label" for="temp_auxiliar">Temp. Auxiliar</label>
							<div class="col-md-4">
								<input id="temp_auxiliar" name="temp_auxiliar" type="text"
									placeholder="Temp. Auxiliar" class="form-control input-md"
									value="{{ old('temp_auxiliar', isset($area->aptidao->temp_auxiliar) ? $area->aptidao->temp_auxiliar: null) }}">
									@if($errors->has('temp_auxiliar')) {!! $errors->first('temp_auxiliar', '<span class="help-block">:message</span>') !!} @endif
							</div>
						</div>	 
      					<!-- Text input-->
						<div class="form-group @if($errors->has('sao2')) {!! 'has-error' !!} @endif">
							<label class="col-md-4 control-label" for="sao2">SaO2</label>
							<div class="col-md-4">
								<input id="sao2" name="sao2" type="text"
									placeholder="SaO2" class="form-control input-md"
									value="{{ old('sao2', isset($area->aptidao->sao2) ? $area->aptidao->sao2: null) }}">
									@if($errors->has('sao2')) {!! $errors->first('sao2', '<span class="help-block">:message</span>') !!} @endif
							</div>
						</div>	     
      					<!-- Text input-->
						<div class="form-group @if($errors->has('ausculta_pulmonar')) {!! 'has-error' !!} @endif">
							<label class="col-md-4 control-label" for="ausculta_pulmonar">Ausculta Pulmonar</label>
							<div class="col-md-4">
								<input id="ausculta_pulmonar" name="ausculta_pulmonar" type="text"
									placeholder="Ausculta Pulmonar" class="form-control input-md"
									value="{{ old('ausculta_pulmonar', isset($area->aptidao->ausculta_pulmonar) ? $area->aptidao->ausculta_pulmonar: null) }}">
									@if($errors->has('ausculta_pulmonar')) {!! $errors->first('ausculta_pulmonar', '<span class="help-block">:message</span>') !!} @endif
							</div>
						</div>	      
						<!-- Text Area-->
						<div class="form-group @if($errors->has('dor_toracica')) {!! 'has-error' !!} @endif">
							<label class="col-md-4 control-label" for="dor_toracica">Dor Torácica</label>
							<div class="col-md-6">
								<textarea class="textarea form-control input-md" placeholder="Dor Torácica" id="dor_toracica" name="dor_toracica">
									{{ old('dor_toracica',  isset($area->aptidao->dor_toracica) ? $area->aptidao->dor_toracica : null) }}
								</textarea>
								@if($errors->has('dor_toracica')) {!! $errors->first('dor_toracica', '<span class="help-block">:message</span>') !!} @endif						
				        	</div>
						</div>     
					</div>   
					<!-- Button -->
					<div class="form-group">
						<label class="col-md-4 control-label" for="cadastrarAnamnese"></label>
						<div class="col-md-4">
							<button type="submit" class="btn btn-success">Salvar</button>
							<a href="{!! url('consulta/detalhes/'.$agendamento_id) !!}" class="btn btn-default">Voltar</a>
						<p class="help-block">Algumas informações são baseadas na ACSM.</p>
						</div>
					</div>
				</div> <!-- End tab-content -->	   
			</div> <!-- End nav -->
			
			{!! csrf_field() !!} 
		</fieldset>
	</form> 
</section>
<!-- /.content -->




@endsection 
@section('additionalsJavascript')  
	@include('javascript.consulta.area.jquery') 
@endsection
