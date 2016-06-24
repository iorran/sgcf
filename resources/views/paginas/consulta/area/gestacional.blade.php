@extends('layouts.master') @section('content')

<!-- Main content -->
<section class="content">
	<!-- form start -->  
	@if(isset($area))  
	<form class="form-horizontal" action="{{route('consulta.area.gestacional.update', $area->id ) }}" method="post"> 
		<input type="hidden" name="_method" value="PUT">
	@else 
	<form class="form-horizontal" action="{{route('consulta.area.gestacional.store')}}" method="post"> 
	@endif 
		<input type="hidden" name="agendamento_id" id="agendamento_id" value="{!! $agendamento_id !!}">
		<input type="hidden" name="paciente_id" id="paciente_id" value="{!! $paciente_id !!}"> 
		<fieldset>  
			<div class="nav-tabs-custom">
		    	<ul class="nav nav-tabs">
		        	<li class="active"><a href="#tab_1" data-toggle="tab">Informações gerais</a></li> 
		        	<li><a href="#tab_2" data-toggle="tab">Histórico de Gestações Anteriores</a></li> 
		        	<li><a href="#tab_3" data-toggle="tab">Sistema Cardiovascular</a></li> 
		        	<li><a href="#tab_4" data-toggle="tab">Sistema Genitourinario</a></li> 
		        	<li><a href="#tab_5" data-toggle="tab">Sistema Digestivo</a></li> 
		        	<li><a href="#tab_6" data-toggle="tab">Sistema Músculo Esquelético</a></li> 
		        	<li><a href="#tab_7" data-toggle="tab">Sistema Nervoso</a></li> 
		        	<li><a href="#tab_8" data-toggle="tab">Sistema Tegumentar</a></li> 
		        	<li><a href="#tab_9" data-toggle="tab">Exame Físico</a></li> 
		        	<li><a href="#tab_10" data-toggle="tab">Testes Especiais</a></li> 
		   		</ul>
   				<div class="tab-content">
      				<div class="tab-pane active" id="tab_1">  
      					<!-- Text input-->
						<div class="form-group @if($errors->has('dum')) {!! 'has-error' !!} @endif">
							<label class="col-md-4 control-label" for="dum">DUM</label>
							<div class="col-md-4">
								<input id="dum" name="dum" type="text"
									placeholder="DUM" class="form-control input-md"
									value="{{ old('dum', isset($area->dum) ? $area->dum : null) }}">
									@if($errors->has('dum')) {!! $errors->first('dum', '<span class="help-block">:message</span>') !!} @endif
							</div>
						</div>	
      					<!-- Text input-->
						<div class="form-group @if($errors->has('dpp')) {!! 'has-error' !!} @endif">
							<label class="col-md-4 control-label" for="dpp">DPP</label>
							<div class="col-md-4">
								<input id="dpp" name="dpp" type="text"
									placeholder="DPP" class="form-control input-md"
									value="{{ old('dpp', isset($area->dpp) ? $area->dpp : null) }}">
									@if($errors->has('dpp')) {!! $errors->first('dpp', '<span class="help-block">:message</span>') !!} @endif
							</div>
						</div>	
						<!-- Text Area-->
						<div class="form-group @if($errors->has('objetivo')) {!! 'has-error' !!} @endif">
							<label class="col-md-4 control-label" for="objetivo">Objetivos</label>
							<div class="col-md-6">
								<textarea class="textarea form-control input-md" placeholder="Objetivos" id="objetivo" name="objetivo">
									{{ old('objetivo',  isset($area->objetivo) ? $area->objetivo : null) }}
								</textarea>
								@if($errors->has('objetivo')) {!! $errors->first('objetivo', '<span class="help-block">:message</span>') !!} @endif						
				        	</div>
						</div> 
	      			</div> 
      				<div class="tab-pane" id="tab_2"> 
	      				<!-- Select input-->
						<div class="form-group @if($errors->has('planejamento')) {!! 'has-error' !!} @endif">
							<label class="col-md-4 control-label" for="planejamento">Planejamento</label>
							<div class="col-md-4"> 
								<select id="planejamento" name="planejamento" class="form-control select2"  style="width: 100%;">
									<option value="">Selecione uma opção</option> 
									<option value="0" @if(isset($area->planejamento)) @if($area->planejamento == 0) selected @endif @endif>
										Não
									</option> 
									<option value="1" @if(isset($area->planejamento)) @if($area->planejamento == 1) selected @endif @endif>
										Sim
									</option> 
								</select>   
							</div>
						</div>
	      				<!-- Select input-->
						<div class="form-group @if($errors->has('tto')) {!! 'has-error' !!} @endif">
							<label class="col-md-4 control-label" for="tto">Realizou TTO</label>
							<div class="col-md-4"> 
								<select id="tto" name="tto" class="form-control select2"  style="width: 100%;">
									<option value="">Selecione uma opção</option> 
									<option value="0" @if(isset($area->tto)) @if($area->tto == 0) selected @endif @endif>
										Não
									</option> 
									<option value="1" @if(isset($area->tto)) @if($area->tto == 1) selected @endif @endif>
										Sim
									</option> 
								</select>   
							</div>
						</div>
	      				<!-- Select input-->
						<div class="form-group @if($errors->has('hasg')) {!! 'has-error' !!} @endif">
							<label class="col-md-4 control-label" for="hasg">HAS/G</label>
							<div class="col-md-4"> 
								<select id="hasg" name="hasg" class="form-control select2"  style="width: 100%;">
									<option value="">Selecione uma opção</option> 
									<option value="0" @if(isset($area->hasg)) @if($area->hasg == 0) selected @endif @endif>
										Não
									</option> 
									<option value="1" @if(isset($area->hasg)) @if($area->hasg == 1) selected @endif @endif>
										Sim
									</option> 
								</select>   
							</div>
						</div>
	      				<!-- Select input-->
						<div class="form-group @if($errors->has('dmg')) {!! 'has-error' !!} @endif">
							<label class="col-md-4 control-label" for="dmg">DM/G</label>
							<div class="col-md-4"> 
								<select id="dmg" name="dmg" class="form-control select2"  style="width: 100%;">
									<option value="">Selecione uma opção</option> 
									<option value="0" @if(isset($area->dmg)) @if($area->dmg == 0) selected @endif @endif>
										Não
									</option> 
									<option value="1" @if(isset($area->dmg)) @if($area->dmg == 1) selected @endif @endif>
										Sim
									</option> 
								</select>   
							</div>
						</div>
	      				<!-- Select input-->
						<div class="form-group @if($errors->has('eclampsia')) {!! 'has-error' !!} @endif">
							<label class="col-md-4 control-label" for="eclampsia">Eclampsia</label>
							<div class="col-md-4"> 
								<select id="eclampsia" name="eclampsia" class="form-control select2"  style="width: 100%;">
									<option value="">Selecione uma opção</option> 
									<option value="0" @if(isset($area->eclampsia)) @if($area->eclampsia == 0) selected @endif @endif>
										Não
									</option> 
									<option value="1" @if(isset($area->eclampsia)) @if($area->eclampsia == 1) selected @endif @endif>
										Sim
									</option> 
								</select>   
							</div>
						</div>
	      				<!-- Select input-->
						<div class="form-group @if($errors->has('parto')) {!! 'has-error' !!} @endif">
							<label class="col-md-4 control-label" for="parto">Parto Prematuro</label>
							<div class="col-md-4"> 
								<select id="parto" name="parto" class="form-control select2"  style="width: 100%;">
									<option value="">Selecione uma opção</option> 
									<option value="0" @if(isset($area->parto)) @if($area->parto == 0) selected @endif @endif>
										Não
									</option> 
									<option value="1" @if(isset($area->parto)) @if($area->parto == 1) selected @endif @endif>
										Sim
									</option> 
								</select>   
							</div>
						</div>
	      				<!-- Select input-->
						<div class="form-group @if($errors->has('ruptura')) {!! 'has-error' !!} @endif">
							<label class="col-md-4 control-label" for="ruptura">Ruptura Prematura da Membrana</label>
							<div class="col-md-4"> 
								<select id="ruptura" name="ruptura" class="form-control select2"  style="width: 100%;">
									<option value="">Selecione uma opção</option> 
									<option value="0" @if(isset($area->ruptura)) @if($area->ruptura == 0) selected @endif @endif>
										Não
									</option> 
									<option value="1" @if(isset($area->ruptura)) @if($area->ruptura == 1) selected @endif @endif>
										Sim
									</option> 
								</select>   
							</div>
						</div>
	      				<!-- Select input-->
						<div class="form-group @if($errors->has('placenta')) {!! 'has-error' !!} @endif">
							<label class="col-md-4 control-label" for="placenta">Placenta Prévia</label>
							<div class="col-md-4"> 
								<select id="placenta" name="placenta" class="form-control select2"  style="width: 100%;">
									<option value="">Selecione uma opção</option> 
									<option value="0" @if(isset($area->placenta)) @if($area->placenta == 0) selected @endif @endif>
										Não
									</option> 
									<option value="1" @if(isset($area->placenta)) @if($area->placenta == 1) selected @endif @endif>
										Sim
									</option> 
								</select>   
							</div>
						</div>
	      				<!-- Select input-->
						<div class="form-group @if($errors->has('incompetencia')) {!! 'has-error' !!} @endif">
							<label class="col-md-4 control-label" for="incompetencia">Incompetência de Cervix</label>
							<div class="col-md-4"> 
								<select id="incompetencia" name="incompetencia" class="form-control select2"  style="width: 100%;">
									<option value="">Selecione uma opção</option> 
									<option value="0" @if(isset($area->incompetencia)) @if($area->incompetencia == 0) selected @endif @endif>
										Não
									</option> 
									<option value="1" @if(isset($area->incompetencia)) @if($area->incompetencia == 1) selected @endif @endif>
										Sim
									</option> 
								</select>   
							</div>
						</div>
	      				<!-- Select input-->
						<div class="form-group @if($errors->has('recem')) {!! 'has-error' !!} @endif">
							<label class="col-md-4 control-label" for="recem">Recém Nascido</label>
							<div class="col-md-4"> 
								<select id="recem" name="recem" class="form-control select2"  style="width: 100%;">
									<option value="">Selecione uma opção</option> 
									<option value="0" @if(isset($area->recem)) @if($area->recem == 0) selected @endif @endif>
										Grande para idade gestacional
									</option> 
									<option value="1" @if(isset($area->recem)) @if($area->recem == 1) selected @endif @endif>
										Pequeno para idade gestacional
									</option> 
								</select>   
							</div>
						</div> 
					</div> 
      				<div class="tab-pane" id="tab_3"> 
	      				<!-- Select input-->
						<div class="form-group @if($errors->has('has')) {!! 'has-error' !!} @endif">
							<label class="col-md-4 control-label" for="has">HAS</label>
							<div class="col-md-4"> 
								<select id="has" name="has" class="form-control select2"  style="width: 100%;">
									<option value="">Selecione uma opção</option> 
									<option value="0" @if(isset($area->cardiovascular->has)) @if($area->cardiovascular->has == 0) selected @endif @endif>
										Não
									</option> 
									<option value="1" @if(isset($area->cardiovascular->has)) @if($area->cardiovascular->has == 1) selected @endif @endif>
										Sim
									</option> 
								</select>   
							</div>
						</div> 
	      				<!-- Select input-->
						<div class="form-group @if($errors->has('haig')) {!! 'has-error' !!} @endif">
							<label class="col-md-4 control-label" for="haig">HAIG</label>
							<div class="col-md-4"> 
								<select id="haig" name="haig" class="form-control select2"  style="width: 100%;">
									<option value="">Selecione uma opção</option> 
									<option value="0" @if(isset($area->cardiovascular->haig)) @if($area->cardiovascular->haig == 0) selected @endif @endif>
										Não
									</option> 
									<option value="1" @if(isset($area->cardiovascular->haig)) @if($area->cardiovascular->haig == 1) selected @endif @endif>
										Sim
									</option> 
								</select>   
							</div>
						</div> 
	      				<!-- Select input-->
						<div class="form-group @if($errors->has('problemas')) {!! 'has-error' !!} @endif">
							<label class="col-md-4 control-label" for="problemas">Problemas Cardíacos</label>
							<div class="col-md-4"> 
								<select id="problemas" name="problemas" class="form-control select2"  style="width: 100%;">
									<option value="">Selecione uma opção</option> 
									<option value="0" @if(isset($area->cardiovascular->problemas)) @if($area->cardiovascular->problemas == 0) selected @endif @endif>
										Não
									</option> 
									<option value="1" @if(isset($area->cardiovascular->problemas)) @if($area->cardiovascular->problemas == 1) selected @endif @endif>
										Sim
									</option> 
								</select>   
							</div>
						</div> 
	      				<!-- Select input-->
						<div class="form-group @if($errors->has('icc')) {!! 'has-error' !!} @endif">
							<label class="col-md-4 control-label" for="icc">ICC</label>
							<div class="col-md-4"> 
								<select id="icc" name="icc" class="form-control select2"  style="width: 100%;">
									<option value="">Selecione uma opção</option> 
									<option value="0" @if(isset($area->cardiovascular->icc)) @if($area->cardiovascular->icc == 0) selected @endif @endif>
										Não
									</option> 
									<option value="1" @if(isset($area->cardiovascular->icc)) @if($area->cardiovascular->icc == 1) selected @endif @endif>
										Sim
									</option> 
								</select>   
							</div>
						</div> 
	      				<!-- Select input-->
						<div class="form-group @if($errors->has('varizes')) {!! 'has-error' !!} @endif">
							<label class="col-md-4 control-label" for="varizes">Varizes</label>
							<div class="col-md-4"> 
								<select id="varizes" name="varizes" class="form-control select2"  style="width: 100%;">
									<option value="">Selecione uma opção</option> 
									<option value="0" @if(isset($area->cardiovascular->varizes)) @if($area->cardiovascular->varizes == 0) selected @endif @endif>
										Não
									</option> 
									<option value="1" @if(isset($area->cardiovascular->varizes)) @if($area->cardiovascular->varizes == 1) selected @endif @endif>
										Sim
									</option> 
								</select>   
							</div>
						</div>
	      				<!-- Select input-->
						<div class="form-group @if($errors->has('hemorroida')) {!! 'has-error' !!} @endif">
							<label class="col-md-4 control-label" for="hemorroida">Hemorróida</label>
							<div class="col-md-4"> 
								<select id="hemorroida" name="hemorroida" class="form-control select2"  style="width: 100%;">
									<option value="">Selecione uma opção</option> 
									<option value="0" @if(isset($area->cardiovascular->hemorroida)) @if($area->cardiovascular->hemorroida == 0) selected @endif @endif>
										Não
									</option> 
									<option value="1" @if(isset($area->cardiovascular->hemorroida)) @if($area->cardiovascular->hemorroida == 1) selected @endif @endif>
										Sim
									</option> 
								</select>   
							</div>
						</div> 
	      				<!-- Select input-->
						<div class="form-group @if($errors->has('tvp')) {!! 'has-error' !!} @endif">
							<label class="col-md-4 control-label" for="tvp">TVP</label>
							<div class="col-md-4"> 
								<select id="tvp" name="tvp" class="form-control select2"  style="width: 100%;">
									<option value="">Selecione uma opção</option> 
									<option value="0" @if(isset($area->cardiovascular->tvp)) @if($area->cardiovascular->tvp == 0) selected @endif @endif>
										Não
									</option> 
									<option value="1" @if(isset($area->cardiovascular->tvp)) @if($area->cardiovascular->tvp == 1) selected @endif @endif>
										Sim
									</option> 
								</select>   
							</div>
						</div> 
	      				<!-- Select input-->
						<div class="form-group @if($errors->has('anemia')) {!! 'has-error' !!} @endif">
							<label class="col-md-4 control-label" for="anemia">Anemia</label>
							<div class="col-md-4"> 
								<select id="anemia" name="anemia" class="form-control select2"  style="width: 100%;">
									<option value="">Selecione uma opção</option> 
									<option value="0" @if(isset($area->cardiovascular->anemia)) @if($area->cardiovascular->anemia == 0) selected @endif @endif>
										Não
									</option> 
									<option value="1" @if(isset($area->cardiovascular->anemia)) @if($area->cardiovascular->anemia == 1) selected @endif @endif>
										Sim
									</option> 
								</select>   
							</div>
						</div>
	      				<!-- Select input-->
						<div class="form-group @if($errors->has('mal')) {!! 'has-error' !!} @endif">
							<label class="col-md-4 control-label" for="mal">Mal Estar</label>
							<div class="col-md-4"> 
								<select id="mal" name="mal" class="form-control select2"  style="width: 100%;">
									<option value="">Selecione uma opção</option> 
									<option value="0" @if(isset($area->cardiovascular->mal)) @if($area->cardiovascular->mal == 0) selected @endif @endif>
										Não
									</option> 
									<option value="1" @if(isset($area->cardiovascular->mal)) @if($area->cardiovascular->mal == 1) selected @endif @endif>
										Sim
									</option> 
								</select>   
							</div>
						</div> 
	      				<!-- Select input-->
						<div class="form-group @if($errors->has('flebite')) {!! 'has-error' !!} @endif">
							<label class="col-md-4 control-label" for="flebite">Flebite</label>
							<div class="col-md-4"> 
								<select id="flebite" name="flebite" class="form-control select2"  style="width: 100%;">
									<option value="">Selecione uma opção</option> 
									<option value="0" @if(isset($area->cardiovascular->flebite)) @if($area->cardiovascular->flebite == 0) selected @endif @endif>
										Não
									</option> 
									<option value="1" @if(isset($area->cardiovascular->flebite)) @if($area->cardiovascular->flebite == 1) selected @endif @endif>
										Sim
									</option> 
								</select>   
							</div>
						</div> 
	      				<!-- Select input-->
						<div class="form-group @if($errors->has('taquicardia')) {!! 'has-error' !!} @endif">
							<label class="col-md-4 control-label" for="taquicardia">Taquicardia</label>
							<div class="col-md-4"> 
								<select id="taquicardia" name="taquicardia" class="form-control select2"  style="width: 100%;">
									<option value="">Selecione uma opção</option> 
									<option value="0" @if(isset($area->cardiovascular->taquicardia)) @if($area->cardiovascular->taquicardia == 0) selected @endif @endif>
										Não
									</option> 
									<option value="1" @if(isset($area->cardiovascular->taquicardia)) @if($area->cardiovascular->taquicardia == 1) selected @endif @endif>
										Sim
									</option> 
								</select>   
							</div>
						</div> 
	      				<!-- Select input-->
						<div class="form-group @if($errors->has('postural')) {!! 'has-error' !!} @endif">
							<label class="col-md-4 control-label" for="postural">Hipotensão Postural</label>
							<div class="col-md-4"> 
								<select id="postural" name="postural" class="form-control select2"  style="width: 100%;">
									<option value="">Selecione uma opção</option> 
									<option value="0" @if(isset($area->cardiovascular->postural)) @if($area->cardiovascular->postural == 0) selected @endif @endif>
										Não
									</option> 
									<option value="1" @if(isset($area->cardiovascular->postural)) @if($area->cardiovascular->postural == 1) selected @endif @endif>
										Sim
									</option> 
								</select>   
							</div>
						</div> 
	      				<!-- Select input-->
						<div class="form-group @if($errors->has('supino')) {!! 'has-error' !!} @endif">
							<label class="col-md-4 control-label" for="supino">Hipotensão Supino</label>
							<div class="col-md-4"> 
								<select id="supino" name="supino" class="form-control select2"  style="width: 100%;">
									<option value="">Selecione uma opção</option> 
									<option value="0" @if(isset($area->cardiovascular->supino)) @if($area->cardiovascular->supino == 0) selected @endif @endif>
										Não
									</option> 
									<option value="1" @if(isset($area->cardiovascular->supino)) @if($area->cardiovascular->supino == 1) selected @endif @endif>
										Sim
									</option> 
								</select>   
							</div>
						</div> 
						<!-- Text Area-->
						<div class="form-group @if($errors->has('cardiovascular_obs')) {!! 'has-error' !!} @endif">
							<label class="col-md-4 control-label" for="cardiovascular_obs">Observações</label>
							<div class="col-md-6">
								<textarea class="textarea form-control input-md" placeholder="Observações" id="cardiovascular_obs" name="cardiovascular_obs">
									{{ old('cardiovascular_obs',  isset($area->cardiovascular->cardiovascular_obs) ? $area->cardiovascular->cardiovascular_obs : null) }}
								</textarea>
								@if($errors->has('cardiovascular_obs')) {!! $errors->first('cardiovascular_obs', '<span class="help-block">:message</span>') !!} @endif						
				        	</div>
						</div> 
					</div>  
      				<div class="tab-pane" id="tab_4"> 
      					<!-- Select input-->
						<div class="form-group @if($errors->has('infeccao')) {!! 'has-error' !!} @endif">
							<label class="col-md-4 control-label" for="infeccao">Infecção Urinária</label>
							<div class="col-md-4"> 
								<select id="infeccao" name="infeccao" class="form-control select2"  style="width: 100%;">
									<option value="">Selecione uma opção</option> 
									<option value="0" @if(isset($area->genito->infeccao)) @if($area->genito->infeccao == 0) selected @endif @endif>
										Não
									</option> 
									<option value="1" @if(isset($area->genito->infeccao)) @if($area->genito->infeccao == 1) selected @endif @endif>
										Sim
									</option> 
								</select>   
							</div>
						</div> 
      					<!-- Select input-->
						<div class="form-group @if($errors->has('perda')) {!! 'has-error' !!} @endif">
							<label class="col-md-4 control-label" for="perda">Perda Urinária</label>
							<div class="col-md-4"> 
								<select id="perda" name="perda" class="form-control select2"  style="width: 100%;">
									<option value="">Selecione uma opção</option> 
									<option value="0" @if(isset($area->genito->perda)) @if($area->genito->perda == 0) selected @endif @endif>
										Não
									</option> 
									<option value="1" @if(isset($area->genito->perda)) @if($area->genito->perda == 1) selected @endif @endif>
										Sim
									</option> 
								</select>   
							</div>
						</div> 
      					<!-- Select input-->
						<div class="form-group @if($errors->has('disuria')) {!! 'has-error' !!} @endif">
							<label class="col-md-4 control-label" for="disuria">Disuria</label>
							<div class="col-md-4"> 
								<select id="disuria" name="disuria" class="form-control select2"  style="width: 100%;">
									<option value="">Selecione uma opção</option> 
									<option value="0" @if(isset($area->genito->disuria)) @if($area->genito->disuria == 0) selected @endif @endif>
										Não
									</option> 
									<option value="1" @if(isset($area->genito->disuria)) @if($area->genito->disuria == 1) selected @endif @endif>
										Sim
									</option> 
								</select>   
							</div>
						</div> 
      					<!-- Select input-->
						<div class="form-group @if($errors->has('sensacao')) {!! 'has-error' !!} @endif">
							<label class="col-md-4 control-label" for="sensacao">Sensação de Esvaziamento Incompleto</label>
							<div class="col-md-4"> 
								<select id="sensacao" name="sensacao" class="form-control select2"  style="width: 100%;">
									<option value="">Selecione uma opção</option> 
									<option value="0" @if(isset($area->genito->sensacao)) @if($area->genito->sensacao == 0) selected @endif @endif>
										Não
									</option> 
									<option value="1" @if(isset($area->genito->sensacao)) @if($area->genito->sensacao == 1) selected @endif @endif>
										Sim
									</option> 
								</select>   
							</div>
						</div> 
      					<!-- Select input-->
						<div class="form-group @if($errors->has('pelvica')) {!! 'has-error' !!} @endif">
							<label class="col-md-4 control-label" for="pelvica">Dor Pélvica</label>
							<div class="col-md-4"> 
								<select id="pelvica" name="pelvica" class="form-control select2"  style="width: 100%;">
									<option value="">Selecione uma opção</option> 
									<option value="0" @if(isset($area->genito->pelvica)) @if($area->genito->pelvica == 0) selected @endif @endif>
										Não
									</option> 
									<option value="1" @if(isset($area->genito->pelvica)) @if($area->genito->pelvica == 1) selected @endif @endif>
										Sim
									</option> 
								</select>   
							</div>
						</div> 
      					<!-- Select input-->
						<div class="form-group @if($errors->has('abdominal')) {!! 'has-error' !!} @endif">
							<label class="col-md-4 control-label" for="abdominal">Dor Abdominal</label>
							<div class="col-md-4"> 
								<select id="abdominal" name="abdominal" class="form-control select2"  style="width: 100%;">
									<option value="">Selecione uma opção</option> 
									<option value="0" @if(isset($area->genito->abdominal)) @if($area->genito->abdominal == 0) selected @endif @endif>
										Não
									</option> 
									<option value="1" @if(isset($area->genito->abdominal)) @if($area->genito->abdominal == 1) selected @endif @endif>
										Sim
									</option> 
								</select>   
							</div>
						</div> 
      					<!-- Select input-->
						<div class="form-group @if($errors->has('vaginal')) {!! 'has-error' !!} @endif">
							<label class="col-md-4 control-label" for="vaginal">Sangramento Vaginal</label>
							<div class="col-md-4"> 
								<select id="vaginal" name="vaginal" class="form-control select2"  style="width: 100%;">
									<option value="">Selecione uma opção</option> 
									<option value="0" @if(isset($area->genito->vaginal)) @if($area->genito->vaginal == 0) selected @endif @endif>
										Não
									</option> 
									<option value="1" @if(isset($area->genito->vaginal)) @if($area->genito->vaginal == 1) selected @endif @endif>
										Sim
									</option> 
								</select>   
							</div>
						</div>  
      					<!-- Select input-->
						<div class="form-group @if($errors->has('costa')) {!! 'has-error' !!} @endif">
							<label class="col-md-4 control-label" for="costa">Dor nas Costas</label>
							<div class="col-md-4"> 
								<select id="costa" name="costa" class="form-control select2"  style="width: 100%;">
									<option value="">Selecione uma opção</option> 
									<option value="0" @if(isset($area->genito->costa)) @if($area->genito->costa == 0) selected @endif @endif>
										Não
									</option> 
									<option value="1" @if(isset($area->genito->costa)) @if($area->genito->costa == 1) selected @endif @endif>
										Sim
									</option> 
								</select>   
							</div>
						</div> 
						<!-- Text Area-->
						<div class="form-group @if($errors->has('genito_obs')) {!! 'has-error' !!} @endif">
							<label class="col-md-4 control-label" for="genito_obs">Observações</label>
							<div class="col-md-6">
								<textarea class="textarea form-control input-md" placeholder="Observações" id="genito_obs" name="genito_obs">
									{{ old('genito_obs',  isset($area->genito->genito_obs) ? $area->genito->genito_obs : null) }}
								</textarea>
								@if($errors->has('genito_obs')) {!! $errors->first('genito_obs', '<span class="help-block">:message</span>') !!} @endif						
				        	</div>
						</div> 
					</div> 
      				<div class="tab-pane" id="tab_5"> 
      					<!-- Select input-->
						<div class="form-group @if($errors->has('constipacao')) {!! 'has-error' !!} @endif">
							<label class="col-md-4 control-label" for="constipacao">Constipação</label>
							<div class="col-md-4"> 
								<select id="constipacao" name="constipacao" class="form-control select2"  style="width: 100%;">
									<option value="">Selecione uma opção</option> 
									<option value="0" @if(isset($area->digestivo->constipacao)) @if($area->digestivo->constipacao == 0) selected @endif @endif>
										Não
									</option> 
									<option value="1" @if(isset($area->digestivo->constipacao)) @if($area->digestivo->constipacao == 1) selected @endif @endif>
										Sim
									</option> 
								</select>   
							</div>
						</div> 
      					<!-- Select input-->
						<div class="form-group @if($errors->has('alteracao')) {!! 'has-error' !!} @endif">
							<label class="col-md-4 control-label" for="alteracao">Alteração de consistência das fezes</label>
							<div class="col-md-4"> 
								<select id="alteracao" name="alteracao" class="form-control select2"  style="width: 100%;">
									<option value="">Selecione uma opção</option> 
									<option value="0" @if(isset($area->digestivo->alteracao)) @if($area->digestivo->alteracao == 0) selected @endif @endif>
										Não
									</option> 
									<option value="1" @if(isset($area->digestivo->alteracao)) @if($area->digestivo->alteracao == 1) selected @endif @endif>
										Sim
									</option> 
								</select>   
							</div>
						</div> 
      					<!-- Select input-->
						<div class="form-group @if($errors->has('esforco')) {!! 'has-error' !!} @endif">
							<label class="col-md-4 control-label" for="esforco">Esforço para evacuar</label>
							<div class="col-md-4"> 
								<select id="esforco" name="esforco" class="form-control select2"  style="width: 100%;">
									<option value="">Selecione uma opção</option> 
									<option value="0" @if(isset($area->digestivo->esforco)) @if($area->digestivo->esforco == 0) selected @endif @endif>
										Não
									</option> 
									<option value="1" @if(isset($area->digestivo->esforco)) @if($area->digestivo->esforco == 1) selected @endif @endif>
										Sim
									</option> 
								</select>   
							</div>
						</div> 
      					<!-- Select input-->
						<div class="form-group @if($errors->has('manobra')) {!! 'has-error' !!} @endif">
							<label class="col-md-4 control-label" for="manobra">Manobras Perineais</label>
							<div class="col-md-4"> 
								<select id="manobra" name="manobra" class="form-control select2"  style="width: 100%;">
									<option value="">Selecione uma opção</option> 
									<option value="0" @if(isset($area->digestivo->manobra)) @if($area->digestivo->manobra == 0) selected @endif @endif>
										Não
									</option> 
									<option value="1" @if(isset($area->digestivo->manobra)) @if($area->digestivo->manobra == 1) selected @endif @endif>
										Sim
									</option> 
								</select>   
							</div>
						</div> 
      					<!-- Select input-->
						<div class="form-group @if($errors->has('digestivo_sensacao')) {!! 'has-error' !!} @endif">
							<label class="col-md-4 control-label" for="digestivo_sensacao">Sensação de Esvaziamento Incompleto</label>
							<div class="col-md-4"> 
								<select id="digestivo_sensacao" name="digestivo_sensacao" class="form-control select2"  style="width: 100%;">
									<option value="">Selecione uma opção</option> 
									<option value="0" @if(isset($area->digestivo->sensacao)) @if($area->digestivo->sensacao == 0) selected @endif @endif>
										Não
									</option> 
									<option value="1" @if(isset($area->digestivo->sensacao)) @if($area->digestivo->sensacao == 1) selected @endif @endif>
										Sim
									</option> 
								</select>   
							</div>
						</div> 
      					<!-- Select input-->
						<div class="form-group @if($errors->has('fecais')) {!! 'has-error' !!} @endif">
							<label class="col-md-4 control-label" for="fecais">Perdas Fecais</label>
							<div class="col-md-4"> 
								<select id="fecais" name="fecais" class="form-control select2"  style="width: 100%;">
									<option value="">Selecione uma opção</option> 
									<option value="0" @if(isset($area->digestivo->fecais)) @if($area->digestivo->fecais == 0) selected @endif @endif>
										Não
									</option> 
									<option value="1" @if(isset($area->digestivo->fecais)) @if($area->digestivo->fecais == 1) selected @endif @endif>
										Sim
									</option> 
								</select>   
							</div>
						</div> 
      					<!-- Select input-->
						<div class="form-group @if($errors->has('flatos')) {!! 'has-error' !!} @endif">
							<label class="col-md-4 control-label" for="flatos">Perda de Flatos</label>
							<div class="col-md-4"> 
								<select id="flatos" name="flatos" class="form-control select2"  style="width: 100%;">
									<option value="">Selecione uma opção</option> 
									<option value="0" @if(isset($area->digestivo->flatos)) @if($area->digestivo->flatos == 0) selected @endif @endif>
										Não
									</option> 
									<option value="1" @if(isset($area->digestivo->flatos)) @if($area->digestivo->flatos == 1) selected @endif @endif>
										Sim
									</option> 
								</select>   
							</div>
						</div> 
						<!-- Text Area-->
						<div class="form-group @if($errors->has('digestivo_obs')) {!! 'has-error' !!} @endif">
							<label class="col-md-4 control-label" for="digestivo_obs">Observações</label>
							<div class="col-md-6">
								<textarea class="textarea form-control input-md" placeholder="Observações" id="digestivo_obs" name="digestivo_obs">
									{{ old('digestivo_obs',  isset($area->digestivo->digestivo_obs) ? $area->digestivo->digestivo_obs : null) }}
								</textarea>
								@if($errors->has('digestivo_obs')) {!! $errors->first('digestivo_obs', '<span class="help-block">:message</span>') !!} @endif						
				        	</div>
						</div> 
					</div> 
      				<div class="tab-pane" id="tab_6"> 
      					<!-- Select input-->
						<div class="form-group @if($errors->has('fratura')) {!! 'has-error' !!} @endif">
							<label class="col-md-4 control-label" for="fratura">Fraturas</label>
							<div class="col-md-4"> 
								<select id="fratura" name="fratura" class="form-control select2"  style="width: 100%;">
									<option value="">Selecione uma opção</option> 
									<option value="0" @if(isset($area->musculo->fratura)) @if($area->musculo->fratura == 0) selected @endif @endif>
										Não
									</option> 
									<option value="1" @if(isset($area->musculo->fratura)) @if($area->musculo->fratura == 1) selected @endif @endif>
										Sim
									</option> 
								</select>   
							</div>
						</div> 
      					<!-- Select input-->
						<div class="form-group @if($errors->has('parestesia')) {!! 'has-error' !!} @endif">
							<label class="col-md-4 control-label" for="parestesia">Parestesia de MMSS</label>
							<div class="col-md-4"> 
								<select id="parestesia" name="parestesia" class="form-control select2"  style="width: 100%;">
									<option value="">Selecione uma opção</option> 
									<option value="0" @if(isset($area->musculo->parestesia)) @if($area->musculo->parestesia == 0) selected @endif @endif>
										Não
									</option> 
									<option value="1" @if(isset($area->musculo->parestesia)) @if($area->musculo->parestesia == 1) selected @endif @endif>
										Sim
									</option> 
								</select>   
							</div>
						</div> 
						<!-- Text Area-->
						<div class="form-group @if($errors->has('musculos_outros')) {!! 'has-error' !!} @endif">
							<label class="col-md-4 control-label" for="musculos_outros">Outros</label>
							<div class="col-md-6">
								<textarea class="textarea form-control input-md" placeholder="Observações" id="musculos_outros" name="musculos_outros">
									{{ old('musculos_outros',  isset($area->musculo->musculos_outros) ? $area->musculo->musculos_outros : null) }}
								</textarea>
								@if($errors->has('musculos_outros')) {!! $errors->first('musculos_outros', '<span class="help-block">:message</span>') !!} @endif						
				        	</div>
						</div>
						<!-- texto -->
						<div class="form-group @if($errors->has('musculos_outros')) {!! 'has-error' !!} @endif">
							<label class="col-md-4 control-label" for="musculos_outros">DOR: OLD CARD</label>
							<div class="col-md-6">
								<ul>
									<li><b>O</b>-Início</li>
									<li><b>L</b>-Localização</li>
									<li><b>D</b>-Duração</li>
									<li><b>C</b>-Carater</li>
									<li><b>A</b>-Fatores Agravantes</li>
									<li><b>R</b>-Fatores Atenuantes</li>
									<li><b>D</b>-Tratamentos Aplicados</li>
								</ul>
							</div>
						</div> 
      					<!-- Text input-->
						<div class="form-group @if($errors->has('emocional')) {!! 'has-error' !!} @endif">
							<label class="col-md-4 control-label" for="emocional">Estado Emocional</label>
							<div class="col-md-4">
								<input id="emocional" name="emocional" type="text"
									placeholder="Estado Emocional" class="form-control input-md"
									value="{{ old('emocional', isset($area->musculo->emocional) ? $area->musculo->emocional : null) }}">
									@if($errors->has('emocional')) {!! $errors->first('emocional', '<span class="help-block">:message</span>') !!} @endif
							</div>
						</div>	
      					<!-- Text input-->
						<div class="form-group @if($errors->has('hf')) {!! 'has-error' !!} @endif">
							<label class="col-md-4 control-label" for="hf">HF</label>
							<div class="col-md-4">
								<input id="hf" name="hf" type="text"
									placeholder="HF" class="form-control input-md"
									value="{{ old('hf', isset($area->musculo->hf) ? $area->musculo->hf : null) }}">
									@if($errors->has('hf')) {!! $errors->first('hf', '<span class="help-block">:message</span>') !!} @endif
							</div>
						</div>	
					</div> 
      				<div class="tab-pane" id="tab_7"> 
      					<!-- Select input-->
						<div class="form-group @if($errors->has('lipotimia')) {!! 'has-error' !!} @endif">
							<label class="col-md-4 control-label" for="lipotimia">Lipotimia</label>
							<div class="col-md-4"> 
								<select id="lipotimia" name="lipotimia" class="form-control select2"  style="width: 100%;">
									<option value="">Selecione uma opção</option> 
									<option value="0" @if(isset($area->nervoso->lipotimia)) @if($area->nervoso->lipotimia == 0) selected @endif @endif>
										Não
									</option> 
									<option value="1" @if(isset($area->nervoso->lipotimia)) @if($area->nervoso->lipotimia == 1) selected @endif @endif>
										Sim
									</option> 
								</select>   
							</div>
						</div> 
      					<!-- Select input-->
						<div class="form-group @if($errors->has('virtigem')) {!! 'has-error' !!} @endif">
							<label class="col-md-4 control-label" for="virtigem">Virtigem</label>
							<div class="col-md-4"> 
								<select id="virtigem" name="virtigem" class="form-control select2"  style="width: 100%;">
									<option value="">Selecione uma opção</option> 
									<option value="0" @if(isset($area->nervoso->virtigem)) @if($area->nervoso->virtigem == 0) selected @endif @endif>
										Não
									</option> 
									<option value="1" @if(isset($area->nervoso->virtigem)) @if($area->nervoso->virtigem == 1) selected @endif @endif>
										Sim
									</option> 
								</select>   
							</div>
						</div> 
      					<!-- Select input-->
						<div class="form-group @if($errors->has('convulcao')) {!! 'has-error' !!} @endif">
							<label class="col-md-4 control-label" for="convulcao">Convulção</label>
							<div class="col-md-4"> 
								<select id="convulcao" name="convulcao" class="form-control select2"  style="width: 100%;">
									<option value="">Selecione uma opção</option> 
									<option value="0" @if(isset($area->nervoso->convulcao)) @if($area->nervoso->convulcao == 0) selected @endif @endif>
										Não
									</option> 
									<option value="1" @if(isset($area->nervoso->convulcao)) @if($area->nervoso->convulcao == 1) selected @endif @endif>
										Sim
									</option> 
								</select>   
							</div>
						</div> 
      					<!-- Select input-->
						<div class="form-group @if($errors->has('parentesca')) {!! 'has-error' !!} @endif">
							<label class="col-md-4 control-label" for="parentesca">Parentesca</label>
							<div class="col-md-4"> 
								<select id="parentesca" name="parentesca" class="form-control select2"  style="width: 100%;">
									<option value="">Selecione uma opção</option> 
									<option value="0" @if(isset($area->nervoso->parentesca)) @if($area->nervoso->parentesca == 0) selected @endif @endif>
										Não
									</option> 
									<option value="1" @if(isset($area->nervoso->parentesca)) @if($area->nervoso->parentesca == 1) selected @endif @endif>
										Sim
									</option> 
								</select>   
							</div>
						</div> 
					</div> 
      				<div class="tab-pane" id="tab_8"> 
      					<!-- Select input-->
						<div class="form-group @if($errors->has('alergia')) {!! 'has-error' !!} @endif">
							<label class="col-md-4 control-label" for="alergia">Alergia</label>
							<div class="col-md-4"> 
								<select id="alergia" name="alergia" class="form-control select2"  style="width: 100%;">
									<option value="">Selecione uma opção</option> 
									<option value="0" @if(isset($area->tegumentar->alergia)) @if($area->tegumentar->alergia == 0) selected @endif @endif>
										Não
									</option> 
									<option value="1" @if(isset($area->tegumentar->alergia)) @if($area->tegumentar->alergia == 1) selected @endif @endif>
										Sim
									</option> 
								</select>   
							</div>
						</div> 
      					<!-- Select input-->
						<div class="form-group @if($errors->has('pele')) {!! 'has-error' !!} @endif">
							<label class="col-md-4 control-label" for="pele">Doença de Pele</label>
							<div class="col-md-4"> 
								<select id="pele" name="pele" class="form-control select2"  style="width: 100%;">
									<option value="">Selecione uma opção</option> 
									<option value="0" @if(isset($area->tegumentar->pele)) @if($area->tegumentar->pele == 0) selected @endif @endif>
										Não
									</option> 
									<option value="1" @if(isset($area->tegumentar->pele)) @if($area->tegumentar->pele == 1) selected @endif @endif>
										Sim
									</option> 
								</select>   
							</div>
						</div> 
						<!-- Text Area-->
						<div class="form-group @if($errors->has('tegumentar_obs')) {!! 'has-error' !!} @endif">
							<label class="col-md-4 control-label" for="tegumentar_obs">Observações</label>
							<div class="col-md-6">
								<textarea class="textarea form-control input-md" placeholder="Observações" id="tegumentar_obs" name="tegumentar_obs">
									{{ old('tegumentar_obs',  isset($area->tegumentar->tegumentar_obs) ? $area->tegumentar->tegumentar_obs : null) }}
								</textarea>
								@if($errors->has('tegumentar_obs')) {!! $errors->first('tegumentar_obs', '<span class="help-block">:message</span>') !!} @endif						
				        	</div>
						</div> 
					</div> 
      				<div class="tab-pane" id="tab_9">   
      					<!-- Text input-->
						<div class="form-group @if($errors->has('pa')) {!! 'has-error' !!} @endif">
							<label class="col-md-4 control-label" for="pa">PA</label>
							<div class="col-md-4">
								<input id="pa" name="pa" type="text"
									placeholder="PA" class="form-control input-md"
									value="{{ old('pa', isset($area->fisico->pa) ? $area->fisico->pa : null) }}">
									@if($errors->has('pa')) {!! $errors->first('pa', '<span class="help-block">:message</span>') !!} @endif
							</div>
						</div>	 
      					<!-- Text input-->
						<div class="form-group @if($errors->has('fc')) {!! 'has-error' !!} @endif">
							<label class="col-md-4 control-label" for="fc">FC</label>
							<div class="col-md-4">
								<input id="fc" name="fc" type="text"
									placeholder="FC" class="form-control input-md"
									value="{{ old('fc', isset($area->fisico->fc) ? $area->fisico->fc : null) }}">
									@if($errors->has('fc')) {!! $errors->first('fc', '<span class="help-block">:message</span>') !!} @endif
							</div>
						</div>	
      					<!-- Text input-->
						<div class="form-group @if($errors->has('fr')) {!! 'has-error' !!} @endif">
							<label class="col-md-4 control-label" for="fr">FR</label>
							<div class="col-md-4">
								<input id="fr" name="fr" type="text"
									placeholder="FR" class="form-control input-md"
									value="{{ old('fr', isset($area->fisico->fr) ? $area->fisico->fr : null) }}">
									@if($errors->has('fr')) {!! $errors->first('fr', '<span class="help-block">:message</span>') !!} @endif
							</div>
						</div>	
      					<!-- Text input-->
						<div class="form-group @if($errors->has('peso_antes')) {!! 'has-error' !!} @endif">
							<label class="col-md-4 control-label" for="peso_antes">Peso Antes da Gestação</label>
							<div class="col-md-4">
								<input id="peso_antes" name="peso_antes" type="text"
									placeholder="Peso Antes da Gestação" class="form-control input-md"
									value="{{ old('peso_antes', isset($area->fisico->peso_antes) ? $area->fisico->peso_antes : null) }}">
									@if($errors->has('peso_antes')) {!! $errors->first('peso_antes', '<span class="help-block">:message</span>') !!} @endif
							</div>
						</div>	 
      					<!-- Text input-->
						<div class="form-group @if($errors->has('peso_atual')) {!! 'has-error' !!} @endif">
							<label class="col-md-4 control-label" for="peso_atual">Peso Atual</label>
							<div class="col-md-4">
								<input id="peso_atual" name="peso_atual" type="text"
									placeholder="Peso Atual" class="form-control input-md"
									value="{{ old('peso_atual', isset($area->fisico->peso_atual) ? $area->fisico->peso_atual : null) }}">
									@if($errors->has('peso_atual')) {!! $errors->first('peso_atual', '<span class="help-block">:message</span>') !!} @endif
							</div>
						</div>	 
      					<!-- Text input-->
						<div class="form-group @if($errors->has('ganho')) {!! 'has-error' !!} @endif">
							<label class="col-md-4 control-label" for="ganho">Ganho Ponteral</label>
							<div class="col-md-4">
								<input id="ganho" name="ganho" type="text"
									placeholder="Ganho Ponteral" class="form-control input-md"
									value="{{ old('ganho', isset($area->fisico->ganho) ? $area->fisico->ganho : null) }}">
									@if($errors->has('ganho')) {!! $errors->first('ganho', '<span class="help-block">:message</span>') !!} @endif
							</div>
						</div>	
      					<!-- Text input-->
						<div class="form-group @if($errors->has('estatura')) {!! 'has-error' !!} @endif">
							<label class="col-md-4 control-label" for="estatura">Estatura</label>
							<div class="col-md-4">
								<input id="estatura" name="estatura" type="text"
									placeholder="Estatura" class="form-control input-md"
									value="{{ old('estatura', isset($area->fisico->estatura) ? $area->fisico->estatura : null) }}">
									@if($errors->has('estatura')) {!! $errors->first('estatura', '<span class="help-block">:message</span>') !!} @endif
							</div>
						</div>	 
      					<!-- Text input-->
						<div class="form-group @if($errors->has('vista_anterior')) {!! 'has-error' !!} @endif">
							<label class="col-md-4 control-label" for="vista_anterior">Vista Anterior</label>
							<div class="col-md-4">
								<input id="vista_anterior" name="vista_anterior" type="text"
									placeholder="Vista Anterior" class="form-control input-md"
									value="{{ old('vista_anterior', isset($area->fisico->vista_anterior) ? $area->fisico->vista_anterior : null) }}">
									@if($errors->has('vista_anterior')) {!! $errors->first('vista_anterior', '<span class="help-block">:message</span>') !!} @endif
							</div>
						</div>	
      					<!-- Text input-->
						<div class="form-group @if($errors->has('vista_lateral')) {!! 'has-error' !!} @endif">
							<label class="col-md-4 control-label" for="vista_lateral">Vista Lateral</label>
							<div class="col-md-4">
								<input id="vista_lateral" name="vista_lateral" type="text"
									placeholder="Vista Lateral" class="form-control input-md"
									value="{{ old('vista_lateral', isset($area->fisico->vista_lateral) ? $area->fisico->vista_lateral : null) }}">
									@if($errors->has('vista_lateral')) {!! $errors->first('vista_lateral', '<span class="help-block">:message</span>') !!} @endif
							</div>
						</div>
      					<!-- Text input-->
						<div class="form-group @if($errors->has('vista_posterior')) {!! 'has-error' !!} @endif">
							<label class="col-md-4 control-label" for="vista_posterior">Vista Posterior</label>
							<div class="col-md-4">
								<input id="vista_posterior" name="vista_posterior" type="text"
									placeholder="Vista Posterior" class="form-control input-md"
									value="{{ old('vista_posterior', isset($area->fisico->vista_posterior) ? $area->fisico->vista_posterior : null) }}">
									@if($errors->has('vista_posterior')) {!! $errors->first('vista_posterior', '<span class="help-block">:message</span>') !!} @endif
							</div>
						</div>	 
      					<!-- Text input-->
						<div class="form-group @if($errors->has('estatico')) {!! 'has-error' !!} @endif">
							<label class="col-md-4 control-label" for="estatico">Exame Estático Sentada</label>
							<div class="col-md-4">
								<input id="estatico" name="estatico" type="text"
									placeholder="PA" class="form-control input-md"
									value="{{ old('estatico', isset($area->fisico->estatico) ? $area->fisico->estatico : null) }}">
									@if($errors->has('estatico')) {!! $errors->first('estatico', '<span class="help-block">:message</span>') !!} @endif
							</div>
						</div>	 
      					<!-- Divisor -->
						<div class="form-group">
							<label class="col-md-4 control-label"><h4>Mamas</h4></label>
							<div class="col-md-4"></div>
						</div>	 
      					<!-- Text input-->
						<div class="form-group @if($errors->has('simetria')) {!! 'has-error' !!} @endif">
							<label class="col-md-4 control-label" for="simetria">Simetria</label>
							<div class="col-md-4">
								<input id="simetria" name="simetria" type="text"
									placeholder="Simetria" class="form-control input-md"
									value="{{ old('simetria', isset($area->fisico->simetria) ? $area->fisico->simetria : null) }}">
									@if($errors->has('simetria')) {!! $errors->first('simetria', '<span class="help-block">:message</span>') !!} @endif
							</div>
						</div>	
      					<!-- Text input-->
						<div class="form-group @if($errors->has('mamilar')) {!! 'has-error' !!} @endif">
							<label class="col-md-4 control-label" for="mamilar">Condição Mamilar</label>
							<div class="col-md-4">
								<input id="mamilar" name="mamilar" type="text"
									placeholder="Condição Mamilar" class="form-control input-md"
									value="{{ old('mamilar', isset($area->fisico->mamilar) ? $area->fisico->mamilar : null) }}">
									@if($errors->has('mamilar')) {!! $errors->first('mamilar', '<span class="help-block">:message</span>') !!} @endif
							</div>
						</div>	
      					<!-- Text input-->
						<div class="form-group @if($errors->has('sensibilidade_mamilar')) {!! 'has-error' !!} @endif">
							<label class="col-md-4 control-label" for="sensibilidade_mamilar">Sensibilidade do Tecido Mamilar</label>
							<div class="col-md-4">
								<input id="sensibilidade_mamilar" name="sensibilidade_mamilar" type="text"
									placeholder="Sensibilidade do Tecido Mamilar" class="form-control input-md"
									value="{{ old('sensibilidade_mamilar', isset($area->fisico->sensibilidade_mamilar) ? $area->fisico->sensibilidade_mamilar : null) }}">
									@if($errors->has('sensibilidade_mamilar')) {!! $errors->first('sensibilidade_mamilar', '<span class="help-block">:message</span>') !!} @endif
							</div>
						</div>	
      					<!-- Text input-->
						<div class="form-group @if($errors->has('secrecao')) {!! 'has-error' !!} @endif">
							<label class="col-md-4 control-label" for="secrecao">Tipo de Secreção Mamilar</label>
							<div class="col-md-4">
								<input id="secrecao" name="secrecao" type="text"
									placeholder="Tipo de Secreção Mamilar" class="form-control input-md"
									value="{{ old('secrecao', isset($area->fisico->secrecao) ? $area->fisico->secrecao : null) }}">
									@if($errors->has('secrecao')) {!! $errors->first('secrecao', '<span class="help-block">:message</span>') !!} @endif
							</div>
						</div>	
      					<!-- Divisor -->
						<div class="form-group">
							<label class="col-md-4 control-label"><h4>Exame DD</h4></label>
							<div class="col-md-4"></div>
						</div>	
      					<!-- Text input-->
						<div class="form-group @if($errors->has('diastase')) {!! 'has-error' !!} @endif">
							<label class="col-md-4 control-label" for="diastase">Distase do Músculo reto Abdominal</label>
							<div class="col-md-4">
								<input id="diastase" name="diastase" type="text"
									placeholder="Distase do Músculo reto Abdominal" class="form-control input-md"
									value="{{ old('diastase', isset($area->fisico->diastase) ? $area->fisico->diastase : null) }}">
									@if($errors->has('diastase')) {!! $errors->first('diastase', '<span class="help-block">:message</span>') !!} @endif
							</div>
						</div>	
      					<!-- Divisor -->
						<div class="form-group">
							<label class="col-md-4 control-label"><h4>Exame Dinâmico</h4></label>
							<div class="col-md-4"></div>
						</div>	 
      					<!-- Text input-->
						<div class="form-group @if($errors->has('flexao_anterior')) {!! 'has-error' !!} @endif">
							<label class="col-md-4 control-label" for="flexao_anterior">Flexão Anterior</label>
							<div class="col-md-4">
								<input id="flexao_anterior" name="flexao_anterior" type="text"
									placeholder="Flexão Anterior" class="form-control input-md"
									value="{{ old('flexao_anterior', isset($area->fisico->flexao_anterior) ? $area->fisico->flexao_anterior : null) }}">
									@if($errors->has('flexao_anterior')) {!! $errors->first('flexao_anterior', '<span class="help-block">:message</span>') !!} @endif
							</div>
						</div>	
      					<!-- Text input-->
						<div class="form-group @if($errors->has('flexao_lateral')) {!! 'has-error' !!} @endif">
							<label class="col-md-4 control-label" for="flexao_lateral">Flexão Lateral</label>
							<div class="col-md-4">
								<input id="flexao_lateral" name="flexao_lateral" type="text"
									placeholder="Flexão Lateral" class="form-control input-md"
									value="{{ old('flexao_lateral', isset($area->fisico->flexao_lateral) ? $area->fisico->flexao_lateral : null) }}">
									@if($errors->has('flexao_lateral')) {!! $errors->first('flexao_lateral', '<span class="help-block">:message</span>') !!} @endif
							</div>
						</div>	
      					<!-- Text input-->
						<div class="form-group @if($errors->has('extensao')) {!! 'has-error' !!} @endif">
							<label class="col-md-4 control-label" for="extensao">Extensão</label>
							<div class="col-md-4">
								<input id="extensao" name="extensao" type="text"
									placeholder="Extensão" class="form-control input-md"
									value="{{ old('extensao', isset($area->fisico->extensao) ? $area->fisico->extensao : null) }}">
									@if($errors->has('extensao')) {!! $errors->first('extensao', '<span class="help-block">:message</span>') !!} @endif
							</div>
						</div>	
      					<!-- Text input-->
						<div class="form-group @if($errors->has('rotacao')) {!! 'has-error' !!} @endif">
							<label class="col-md-4 control-label" for="rotacao">Rotação</label>
							<div class="col-md-4">
								<input id="rotacao" name="rotacao" type="text"
									placeholder="Rotação" class="form-control input-md"
									value="{{ old('rotacao', isset($area->fisico->rotacao) ? $area->fisico->rotacao : null) }}">
									@if($errors->has('rotacao')) {!! $errors->first('rotacao', '<span class="help-block">:message</span>') !!} @endif
							</div>
						</div>	
      					<!-- Text input-->
						<div class="form-group @if($errors->has('av_neuro')) {!! 'has-error' !!} @endif">
							<label class="col-md-4 control-label" for="av_neuro">Avaliação Neurológica</label>
							<div class="col-md-4">
								<input id="av_neuro" name="av_neuro" type="text"
									placeholder="Avaliação Neurológica" class="form-control input-md"
									value="{{ old('av_neuro', isset($area->fisico->av_neuro) ? $area->fisico->av_neuro : null) }}">
									@if($errors->has('av_neuro')) {!! $errors->first('av_neuro', '<span class="help-block">:message</span>') !!} @endif
							</div>
						</div>	
      					<!-- Text input-->
						<div class="form-group @if($errors->has('av_muscular')) {!! 'has-error' !!} @endif">
							<label class="col-md-4 control-label" for="av_muscular">Avaliação Muscular</label>
							<div class="col-md-4">
								<input id="av_muscular" name="av_muscular" type="text"
									placeholder="Avaliação Muscular" class="form-control input-md"
									value="{{ old('av_muscular', isset($area->fisico->av_muscular) ? $area->fisico->av_muscular : null) }}">
									@if($errors->has('av_muscular')) {!! $errors->first('av_muscular', '<span class="help-block">:message</span>') !!} @endif
							</div>
						</div>	
      					<!-- Text input-->
						<div class="form-group @if($errors->has('palpacao')) {!! 'has-error' !!} @endif">
							<label class="col-md-4 control-label" for="palpacao">Palpação</label>
							<div class="col-md-4">
								<input id="palpacao" name="palpacao" type="text"
									placeholder="Palpação" class="form-control input-md"
									value="{{ old('palpacao', isset($area->fisico->palpacao) ? $area->fisico->palpacao : null) }}">
									@if($errors->has('palpacao')) {!! $errors->first('palpacao', '<span class="help-block">:message</span>') !!} @endif
							</div>
						</div>	
      					<!-- Text input-->
						<div class="form-group @if($errors->has('av_func')) {!! 'has-error' !!} @endif">
							<label class="col-md-4 control-label" for="av_func">Avaliação Funcional</label>
							<div class="col-md-4">
								<input id="av_func" name="av_func" type="text"
									placeholder="Avaliação Funcional" class="form-control input-md"
									value="{{ old('av_func', isset($area->fisico->av_func) ? $area->fisico->av_func : null) }}">
									@if($errors->has('av_func')) {!! $errors->first('av_func', '<span class="help-block">:message</span>') !!} @endif
							</div>
						</div>	 
					</div> 
      				<div class="tab-pane" id="tab_10">
      					<!-- Select input-->
						<div class="form-group @if($errors->has('tredelemburg')) {!! 'has-error' !!} @endif">
							<label class="col-md-4 control-label" for="tredelemburg">Tredelemburg</label>
							<div class="col-md-4"> 
								<select id="tredelemburg" name="tredelemburg" class="form-control select2"  style="width: 100%;">
									<option value="">Selecione uma opção</option> 
									<option value="0" @if(isset($area->especial->tredelemburg)) @if($area->especial->tredelemburg == 0) selected @endif @endif>
										Não
									</option> 
									<option value="1" @if(isset($area->especial->tredelemburg)) @if($area->especial->tredelemburg == 1) selected @endif @endif>
										Sim
									</option> 
								</select>   
							</div>
						</div> 
      					<!-- Select input-->
						<div class="form-group @if($errors->has('lasegue')) {!! 'has-error' !!} @endif">
							<label class="col-md-4 control-label" for="lasegue">Lasegue</label>
							<div class="col-md-4"> 
								<select id="lasegue" name="lasegue" class="form-control select2"  style="width: 100%;">
									<option value="">Selecione uma opção</option> 
									<option value="0" @if(isset($area->especial->lasegue)) @if($area->especial->lasegue == 0) selected @endif @endif>
										Não
									</option> 
									<option value="1" @if(isset($area->especial->lasegue)) @if($area->especial->lasegue == 1) selected @endif @endif>
										Sim
									</option> 
								</select>   
							</div>
						</div> 
      					<!-- Select input-->
						<div class="form-group @if($errors->has('phalen')) {!! 'has-error' !!} @endif">
							<label class="col-md-4 control-label" for="phalen">Phalen</label>
							<div class="col-md-4"> 
								<select id="phalen" name="phalen" class="form-control select2"  style="width: 100%;">
									<option value="">Selecione uma opção</option> 
									<option value="0" @if(isset($area->especial->phalen)) @if($area->especial->phalen == 0) selected @endif @endif>
										Não
									</option> 
									<option value="1" @if(isset($area->especial->phalen)) @if($area->especial->phalen == 1) selected @endif @endif>
										Sim
									</option> 
								</select>   
							</div>
						</div> 
      					<!-- Select input-->
						<div class="form-group @if($errors->has('piriforme')) {!! 'has-error' !!} @endif">
							<label class="col-md-4 control-label" for="piriforme">Teste de Piriforme</label>
							<div class="col-md-4"> 
								<select id="piriforme" name="piriforme" class="form-control select2"  style="width: 100%;">
									<option value="">Selecione uma opção</option> 
									<option value="0" @if(isset($area->especial->piriforme)) @if($area->especial->piriforme == 0) selected @endif @endif>
										Não
									</option> 
									<option value="1" @if(isset($area->especial->piriforme)) @if($area->especial->piriforme == 1) selected @endif @endif>
										Sim
									</option> 
								</select>   
							</div>
						</div>  
      					<!-- Text input-->
						<div class="form-group @if($errors->has('mmss')) {!! 'has-error' !!} @endif">
							<label class="col-md-4 control-label" for="mmss">MMSS</label>
							<div class="col-md-4">
								<input id="mmss" name="mmss" type="text"
									placeholder="MMSS" class="form-control input-md"
									value="{{ old('mmss', isset($area->especial->mmss) ? $area->especial->mmss : null) }}">
									@if($errors->has('mmss')) {!! $errors->first('mmss', '<span class="help-block">:message</span>') !!} @endif
							</div>
						</div>	
      					<!-- Text input-->
						<div class="form-group @if($errors->has('mmii')) {!! 'has-error' !!} @endif">
							<label class="col-md-4 control-label" for="mmii">MMII</label>
							<div class="col-md-4">
								<input id="mmii" name="mmii" type="text"
									placeholder="MMII" class="form-control input-md"
									value="{{ old('mmii', isset($area->especial->mmii) ? $area->especial->mmii : null) }}">
									@if($errors->has('mmii')) {!! $errors->first('MMSS', '<span class="help-block">:message</span>') !!} @endif
							</div>
						</div>	
					</div> 
					<!-- Button -->
					<div class="form-group">
						<label class="col-md-4 control-label" for="cadastrarAnamnese"></label>
						<div class="col-md-4">
							<button type="submit" class="btn btn-success">Salvar</button>
							<a href="{!! url('consulta/detalhes/'.$agendamento_id) !!}" class="btn btn-default">Voltar</a>
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
