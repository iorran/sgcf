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
										Grande para idade gestacional
									</option> 
									<option value="1" @if(isset($area->cardiovascular->has)) @if($area->cardiovascular->has == 1) selected @endif @endif>
										Pequeno para idade gestacional
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
										Grande para idade gestacional
									</option> 
									<option value="1" @if(isset($area->cardiovascular->haig)) @if($area->cardiovascular->haig == 1) selected @endif @endif>
										Pequeno para idade gestacional
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
										Grande para idade gestacional
									</option> 
									<option value="1" @if(isset($area->cardiovascular->problemas)) @if($area->cardiovascular->problemas == 1) selected @endif @endif>
										Pequeno para idade gestacional
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
						<div class="form-group @if($errors->has('obs')) {!! 'has-error' !!} @endif">
							<label class="col-md-4 control-label" for="obs">Observações</label>
							<div class="col-md-6">
								<textarea class="textarea form-control input-md" placeholder="Observações" id="obs" name="obs">
									{{ old('obs',  isset($area->obs) ? $area->obs : null) }}
								</textarea>
								@if($errors->has('obs')) {!! $errors->first('obs', '<span class="help-block">:message</span>') !!} @endif						
				        	</div>
						</div> 
					</div>  
      				<div class="tab-pane" id="tab_4"> 
					</div> 
      				<div class="tab-pane" id="tab_5"> 
					</div> 
      				<div class="tab-pane" id="tab_6"> 
					</div> 
      				<div class="tab-pane" id="tab_7"> 
					</div> 
      				<div class="tab-pane" id="tab_8"> 
					</div> 
      				<div class="tab-pane" id="tab_9"> 
					</div> 
      				<div class="tab-pane" id="tab_10"> 
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
