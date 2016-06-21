@extends('layouts.master') @section('content')

<!-- Main content -->
<section class="content">
	<!-- form start --> 
	@if(isset($area))  
	<form class="form-horizontal" action="{{route('consulta.area.neuro.update', $area->id ) }}" method="post"> 
		<input type="hidden" name="_method" value="PUT">
	@else 
	<form class="form-horizontal" action="{{route('consulta.area.neuro.store')}}" method="post"> 
	@endif 
		<input type="hidden" name="agendamento_id" id="agendamento_id" value="{!! $agendamento_id !!}">
		<input type="hidden" name="paciente_id" id="paciente_id" value="{!! $paciente_id !!}"> 
		<fieldset>  
			<div class="nav-tabs-custom">
		    	<ul class="nav nav-tabs">
		        	<li class="active"><a href="#tab_1" data-toggle="tab">Exame Físico</a></li>
		        	<li><a href="#tab_2" data-toggle="tab">Reflexos Posturais Mudancas de Decúbito</a></li> 
		        	<li><a href="#tab_3" data-toggle="tab">Equilíbrio</a></li> 
		        	<li><a href="#tab_4" data-toggle="tab">Reflexo Superficiais</a></li>   
		        	<li><a href="#tab_5" data-toggle="tab">Coordenacão</a></li> 
		        	<li><a href="#tab_6" data-toggle="tab">Monabras Deficitárias da Motricidade</a></li> 
		        	<li><a href="#tab_7" data-toggle="tab">Sensibilidade</a></li>
		   		</ul>
   				<div class="tab-content">
      				<div class="tab-pane active" id="tab_1"> 
						<!-- Text input-->
						<div class="form-group @if($errors->has('fc_bpm')) {!! 'has-error' !!} @endif">
							<label class="col-md-4 control-label" for="fc_bpm">Fc. BPM</label>
							<div class="col-md-4">
								<input id="fc_bpm" name="fc_bpm" type="number"
									placeholder="Fc. BPM" class="form-control input-md"
									value="{{ old('fc_bpm', isset($area->exame->fc_bpm) ? $area->exame->fc_bpm : null) }}">
									@if($errors->has('fc_bpm')) {!! $errors->first('fc_bpm', '<span class="help-block">:message</span>') !!} @endif
							</div>
						</div>	  
						<!-- Text input-->
						<div class="form-group @if($errors->has('fr_irpm')) {!! 'has-error' !!} @endif">
							<label class="col-md-4 control-label" for="fr_irpm">Fr. IRPM</label>
							<div class="col-md-4">
								<input id="fr_irpm" name="fr_irpm" type="number"
									placeholder="Fr. IRPM" class="form-control input-md"
									value="{{ old('fr_irpm', isset($area->exame->fr_irpm) ? $area->exame->fr_irpm : null) }}">
									@if($errors->has('fr_irpm')) {!! $errors->first('fr_irpm', '<span class="help-block">:message</span>') !!} @endif
							</div>
						</div>	  
						<!-- Text input-->
						<div class="form-group @if($errors->has('pa')) {!! 'has-error' !!} @endif">
							<label class="col-md-4 control-label" for="pa">PA</label>
							<div class="col-md-4">
								<input id="pa" name="pa" type="number"
									placeholder="PA" class="form-control input-md"
									value="{{ old('pa', isset($area->exame->pa) ? $area->exame->pa : null) }}">
									@if($errors->has('pa')) {!! $errors->first('pa', '<span class="help-block">:message</span>') !!} @endif
							</div>
						</div>	  
						<!-- Text input-->
						<div class="form-group @if($errors->has('mmhg')) {!! 'has-error' !!} @endif">
							<label class="col-md-4 control-label" for="mmhg">MMHG</label>
							<div class="col-md-4">
								<input id="mmhg" name="mmhg" type="number"
									placeholder="MMHG" class="form-control input-md"
									value="{{ old('mmhg', isset($area->exame->mmhg) ? $area->exame->mmhg : null) }}">
									@if($errors->has('mmhg')) {!! $errors->first('mmhg', '<span class="help-block">:message</span>') !!} @endif
							</div>
						</div>	  
						<!-- Text input-->
						<div class="form-group @if($errors->has('temperatura')) {!! 'has-error' !!} @endif">
							<label class="col-md-4 control-label" for="temperatura">Temperatura</label>
							<div class="col-md-4">
								<input id="temperatura" name="temperatura" type="number"
									placeholder="Temperatura" class="form-control input-md"
									value="{{ old('temperatura', isset($area->exame->temperatura) ? $area->exame->temperatura : null) }}">
									@if($errors->has('temperatura')) {!! $errors->first('temperatura', '<span class="help-block">:message</span>') !!} @endif
							</div>
						</div>	  
						<!-- Text input-->
						<div class="form-group @if($errors->has('alscuta_pulmonar')) {!! 'has-error' !!} @endif">
							<label class="col-md-4 control-label" for="alscuta_pulmonar">Alscuta Pulmonar</label>
							<div class="col-md-4">
								<input id="alscuta_pulmonar" name="alscuta_pulmonar" type="text"
									placeholder="Alscuta Pulmonar" class="form-control input-md"
									value="{{ old('alscuta_pulmonar', isset($area->exame->alscuta_pulmonar) ? $area->exame->alscuta_pulmonar : null) }}">
									@if($errors->has('alscuta_pulmonar')) {!! $errors->first('alscuta_pulmonar', '<span class="help-block">:message</span>') !!} @endif
							</div>
						</div>	  
						<!-- Text input-->
						<div class="form-group @if($errors->has('inspecao')) {!! 'has-error' !!} @endif">
							<label class="col-md-4 control-label" for="inspecao">Inspeção</label>
							<div class="col-md-4">
								<input id="inspecao" name="inspecao" type="text"
									placeholder="Inspeção" class="form-control input-md"
									value="{{ old('inspecao', isset($area->exame->inspecao) ? $area->exame->inspecao : null) }}">
									@if($errors->has('inspecao')) {!! $errors->first('inspecao', '<span class="help-block">:message</span>') !!} @endif
							</div>
						</div>	  
      					<!-- Text input-->
						<div class="form-group @if($errors->has('geral_atitude')) {!! 'has-error' !!} @endif">
							<label class="col-md-4 control-label" for="geral_atitude">Geral(Atitude)</label>
							<div class="col-md-4">
								<input id="geral_atitude" name="geral_atitude" type="text"
									placeholder="Geral(Atitude)" class="form-control input-md"
									value="{{ old('geral_atitude', isset($area->exame->geral_atitude) ? $area->exame->geral_atitude : null) }}">
									@if($errors->has('geral_atitude')) {!! $errors->first('geral_atitude', '<span class="help-block">:message</span>') !!} @endif
							</div>
						</div>	   
      					<!-- Text input-->
						<div class="form-group @if($errors->has('local')) {!! 'has-error' !!} @endif">
							<label class="col-md-4 control-label" for="local">Face</label>
							<div class="col-md-4">
								<input id="local" name="local" type="text"
									placeholder="Face" class="form-control input-md"
									value="{{ old('local', isset($area->exame->local) ? $area->exame->local : null) }}">
									@if($errors->has('local')) {!! $errors->first('local', '<span class="help-block">:message</span>') !!} @endif
							</div>
						</div>	   
      					<!-- Text input-->
						<div class="form-group @if($errors->has('face')) {!! 'has-error' !!} @endif">
							<label class="col-md-4 control-label" for="face">Face</label>
							<div class="col-md-4">
								<input id="face" name="face" type="text"
									placeholder="Face" class="form-control input-md"
									value="{{ old('face', isset($area->exame->face) ? $area->exame->face : null) }}">
									@if($errors->has('face')) {!! $errors->first('face', '<span class="help-block">:message</span>') !!} @endif
							</div>
						</div>	  
						<!-- Text input-->
						<div class="form-group @if($errors->has('palpacao')) {!! 'has-error' !!} @endif">
							<label class="col-md-4 control-label" for="palpacao">Palpação</label>
							<div class="col-md-4">
								<input id="palpacao" name="palpacao" type="text"
									placeholder="Palpação" class="form-control input-md"
									value="{{ old('palpacao', isset($area->exame->palpacao) ? $area->exame->palpacao : null) }}">
									@if($errors->has('palpacao')) {!! $errors->first('palpacao', '<span class="help-block">:message</span>') !!} @endif
							</div>
						</div>	
						<!-- Text input-->
						<div class="form-group @if($errors->has('movimento_passivo')) {!! 'has-error' !!} @endif">
							<label class="col-md-4 control-label" for="movimento_passivo">Movimento Passivo</label>
							<div class="col-md-4">
								<input id="movimento_passivo" name="movimento_passivo" type="text"
									placeholder="Movimento Passivo" class="form-control input-md"
									value="{{ old('movimento_passivo', isset($area->exame->movimento_passivo) ? $area->exame->movimento_passivo : null) }}">
									@if($errors->has('movimento_passivo')) {!! $errors->first('movimento_passivo', '<span class="help-block">:message</span>') !!} @endif
							</div>
						</div>	
						<!-- Text input-->
						<div class="form-group @if($errors->has('movimento_voluntario')) {!! 'has-error' !!} @endif">
							<label class="col-md-4 control-label" for="movimento_voluntario">Movimento Voluntário</label>
							<div class="col-md-4">
								<input id="movimento_voluntario" name="movimento_voluntario" type="text"
									placeholder="Movimento Voluntário" class="form-control input-md"
									value="{{ old('movimento_voluntario', isset($area->exame->movimento_voluntario) ? $area->exame->movimento_voluntario : null) }}">
									@if($errors->has('movimento_voluntario')) {!! $errors->first('movimento_voluntario', '<span class="help-block">:message</span>') !!} @endif
							</div>
						</div>	 
					</div>
      				<div class="tab-pane" id="tab_2">     
						<!-- Text input-->
						<div class="form-group @if($errors->has('dd_dle')) {!! 'has-error' !!} @endif">
							<label class="col-md-4 control-label" for="dd_dle">DD DLE</label>
							<div class="col-md-4">
								<input id="dd_dle" name="dd_dle" type="text"
									placeholder="DD DLE" class="form-control input-md"
									value="{{ old('dd_dle', isset($area->postural->dd_dle) ? $area->postural->dd_dle : null) }}">
									@if($errors->has('dd_dle')) {!! $errors->first('dd_dle', '<span class="help-block">:message</span>') !!} @endif
							</div>
						</div>	    
						<!-- Text input-->
						<div class="form-group @if($errors->has('dle_dv')) {!! 'has-error' !!} @endif">
							<label class="col-md-4 control-label" for="dle_dv">DLE DV</label>
							<div class="col-md-4">
								<input id="dle_dv" name="dle_dv" type="text"
									placeholder="DLE DV" class="form-control input-md"
									value="{{ old('dle_dv', isset($area->postural->dle_dv) ? $area->postural->dle_dv : null) }}">
									@if($errors->has('dle_dv')) {!! $errors->first('dle_dv', '<span class="help-block">:message</span>') !!} @endif
							</div>
						</div>	    
						<!-- Text input-->
						<div class="form-group @if($errors->has('dv_puppy')) {!! 'has-error' !!} @endif">
							<label class="col-md-4 control-label" for="dv_puppy">DV Puppy</label>
							<div class="col-md-4">
								<input id="dv_puppy" name="dv_puppy" type="text"
									placeholder="DV Puppy" class="form-control input-md"
									value="{{ old('dv_puppy', isset($area->postural->dv_puppy) ? $area->postural->dv_puppy : null) }}">
									@if($errors->has('dv_puppy')) {!! $errors->first('dv_puppy', '<span class="help-block">:message</span>') !!} @endif
							</div>
						</div>	    
						<!-- Text input-->
						<div class="form-group @if($errors->has('puppy_joelhod')) {!! 'has-error' !!} @endif">
							<label class="col-md-4 control-label" for="puppy_joelhod">Puppy Joelho D.</label>
							<div class="col-md-4">
								<input id="puppy_joelhod" name="puppy_joelhod" type="text"
									placeholder="Puppy Joelho D." class="form-control input-md"
									value="{{ old('puppy_joelhod', isset($area->postural->puppy_joelhod) ? $area->postural->puppy_joelhod : null) }}">
									@if($errors->has('puppy_joelhod')) {!! $errors->first('puppy_joelhod', '<span class="help-block">:message</span>') !!} @endif
							</div>
						</div>	    
						<!-- Text input-->
						<div class="form-group @if($errors->has('sentado')) {!! 'has-error' !!} @endif">
							<label class="col-md-4 control-label" for="sentado">Sentado</label>
							<div class="col-md-4">
								<input id="sentado" name="sentado" type="text"
									placeholder="Sentado" class="form-control input-md"
									value="{{ old('sentado', isset($area->postural->sentado) ? $area->postural->sentado : null) }}">
									@if($errors->has('sentado')) {!! $errors->first('sentado', '<span class="help-block">:message</span>') !!} @endif
							</div>
						</div>	     
						<!-- Text input-->
						<div class="form-group @if($errors->has('ajoelhado_semi_ajoelhado')) {!! 'has-error' !!} @endif">
							<label class="col-md-4 control-label" for="ajoelhado_semi_ajoelhado">Ajoelhado Semi Aj.</label>
							<div class="col-md-4">
								<input id="ajoelhado_semi_ajoelhado" name="ajoelhado_semi_ajoelhado" type="text"
									placeholder="Ajoelhado Semi Aj." class="form-control input-md"
									value="{{ old('ajoelhado_semi_ajoelhado', isset($area->postural->ajoelhado_semi_ajoelhado) ? $area->postural->ajoelhado_semi_ajoelhado : null) }}">
									@if($errors->has('ajoelhado_semi_ajoelhado')) {!! $errors->first('ajoelhado_semi_ajoelhado', '<span class="help-block">:message</span>') !!} @endif
							</div>
						</div>	    
						<!-- Text input-->
						<div class="form-group @if($errors->has('rolar')) {!! 'has-error' !!} @endif">
							<label class="col-md-4 control-label" for="rolar">Rolar</label>
							<div class="col-md-4">
								<input id="rolar" name="rolar" type="text"
									placeholder="Rolar" class="form-control input-md"
									value="{{ old('rolar', isset($area->postural->rolar) ? $area->postural->rolar : null) }}">
									@if($errors->has('rolar')) {!! $errors->first('rolar', '<span class="help-block">:message</span>') !!} @endif
							</div>
						</div>	    
						<!-- Text input-->
						<div class="form-group @if($errors->has('arrastar_homolat')) {!! 'has-error' !!} @endif">
							<label class="col-md-4 control-label" for="arrastar_homolat">Arrastar Homolat.</label>
							<div class="col-md-4">
								<input id="arrastar_homolat" name="arrastar_homolat" type="text"
									placeholder="Arrastar Homolat." class="form-control input-md"
									value="{{ old('arrastar_homolat', isset($area->postural->arrastar_homolat) ? $area->postural->arrastar_homolat : null) }}">
									@if($errors->has('arrastar_homolat')) {!! $errors->first('arrastar_homolat', '<span class="help-block">:message</span>') !!} @endif
							</div>
						</div>	    
						<!-- Text input-->
						<div class="form-group @if($errors->has('dd_dld')) {!! 'has-error' !!} @endif">
							<label class="col-md-4 control-label" for="dd_dld">DD DLD</label>
							<div class="col-md-4">
								<input id="dd_dld" name="dd_dld" type="text"
									placeholder="DD DLD" class="form-control input-md"
									value="{{ old('dd_dld', isset($area->postural->dd_dld) ? $area->postural->dd_dld : null) }}">
									@if($errors->has('dd_dld')) {!! $errors->first('dd_dld', '<span class="help-block">:message</span>') !!} @endif
							</div>
						</div>	    
						<!-- Text input-->
						<div class="form-group @if($errors->has('dld_dv')) {!! 'has-error' !!} @endif">
							<label class="col-md-4 control-label" for="dld_dv">DLD DV</label>
							<div class="col-md-4">
								<input id="dld_dv" name="dld_dv" type="text"
									placeholder="DLD DV" class="form-control input-md"
									value="{{ old('dld_dv', isset($area->postural->dld_dv) ? $area->postural->dld_dv : null) }}">
									@if($errors->has('dld_dv')) {!! $errors->first('dld_dv', '<span class="help-block">:message</span>') !!} @endif
							</div>
						</div>	    
						<!-- Text input-->
						<div class="form-group @if($errors->has('puppy_joelhoe')) {!! 'has-error' !!} @endif">
							<label class="col-md-4 control-label" for="puppy_joelhoe">Puppy Joelho E.</label>
							<div class="col-md-4">
								<input id="puppy_joelhoe" name="puppy_joelhoe" type="text"
									placeholder="Puppy Joelho E." class="form-control input-md"
									value="{{ old('puppy_joelhoe', isset($area->postural->puppy_joelhoe) ? $area->postural->puppy_joelhoe : null) }}">
									@if($errors->has('puppy_joelhoe')) {!! $errors->first('puppy_joelhoe', '<span class="help-block">:message</span>') !!} @endif
							</div>
						</div>	     
						<!-- Text input-->
						<div class="form-group @if($errors->has('quatro_apoio')) {!! 'has-error' !!} @endif">
							<label class="col-md-4 control-label" for="quatro_apoio">Quatro Apoio</label>
							<div class="col-md-4">
								<input id="quatro_apoio" name="quatro_apoio" type="text"
									placeholder="Quatro Apoio" class="form-control input-md"
									value="{{ old('quatro_apoio', isset($area->postural->quatro_apoio) ? $area->postural->quatro_apoio : null) }}">
									@if($errors->has('quatro_apoio')) {!! $errors->first('quatro_apoio', '<span class="help-block">:message</span>') !!} @endif
							</div>
						</div>	    
						<!-- Text input-->
						<div class="form-group @if($errors->has('quatro_apoio_ajoelhado')) {!! 'has-error' !!} @endif">
							<label class="col-md-4 control-label" for="quatro_apoio_ajoelhado">Quatro Apoio Aj.</label>
							<div class="col-md-4">
								<input id="quatro_apoio_ajoelhado" name="quatro_apoio_ajoelhado" type="text"
									placeholder="Quatro Apoio Aj." class="form-control input-md"
									value="{{ old('quatro_apoio_ajoelhado', isset($area->postural->quatro_apoio_ajoelhado) ? $area->postural->quatro_apoio_ajoelhado : null) }}">
									@if($errors->has('quatro_apoio_ajoelhado')) {!! $errors->first('quatro_apoio_ajoelhado', '<span class="help-block">:message</span>') !!} @endif
							</div>
						</div>	    
						<!-- Text input-->
						<div class="form-group @if($errors->has('semi_aj_ortoest')) {!! 'has-error' !!} @endif">
							<label class="col-md-4 control-label" for="semi_aj_ortoest">Semi Aj. Ortoest.</label>
							<div class="col-md-4">
								<input id="semi_aj_ortoest" name="semi_aj_ortoest" type="text"
									placeholder="Semi Aj. Ortoest." class="form-control input-md"
									value="{{ old('semi_aj_ortoest', isset($area->postural->semi_aj_ortoest) ? $area->postural->semi_aj_ortoest : null) }}">
									@if($errors->has('semi_aj_ortoest')) {!! $errors->first('semi_aj_ortoest', '<span class="help-block">:message</span>') !!} @endif
							</div>
						</div>	    
						<!-- Text input-->
						<div class="form-group @if($errors->has('arrastar_cruzado')) {!! 'has-error' !!} @endif">
							<label class="col-md-4 control-label" for="arrastar_cruzado">Arrastar Cruzado</label>
							<div class="col-md-4">
								<input id="arrastar_cruzado" name="arrastar_cruzado" type="text"
									placeholder="Arrastar Cruzado" class="form-control input-md"
									value="{{ old('arrastar_cruzado', isset($area->postural->arrastar_cruzado) ? $area->postural->arrastar_cruzado : null) }}">
									@if($errors->has('arrastar_cruzado')) {!! $errors->first('arrastar_cruzado', '<span class="help-block">:message</span>') !!} @endif
							</div>
						</div>	    
						<!-- Text input-->
						<div class="form-group @if($errors->has('tronco')) {!! 'has-error' !!} @endif">
							<label class="col-md-4 control-label" for="tronco">Tronco</label>
							<div class="col-md-4">
								<input id="tronco" name="tronco" type="text"
									placeholder="Tronco" class="form-control input-md"
									value="{{ old('tronco', isset($area->postural->tronco) ? $area->postural->tronco : null) }}">
									@if($errors->has('tronco')) {!! $errors->first('tronco', '<span class="help-block">:message</span>') !!} @endif
							</div>
						</div>	  
					</div>
      				<div class="tab-pane" id="tab_3">     
						<!-- Text input-->
						<div class="form-group @if($errors->has('romberg_simples')) {!! 'has-error' !!} @endif">
							<label class="col-md-4 control-label" for="romberg_simples">Romberg Simples</label>
							<div class="col-md-4">
								<input id="romberg_simples" name="romberg_simples" type="text"
									placeholder="Romberg Simples" class="form-control input-md"
									value="{{ old('romberg_simples', isset($area->equilibrio->romberg_simples) ? $area->equilibrio->romberg_simples : null) }}">
									@if($errors->has('romberg_simples')) {!! $errors->first('romberg_simples', '<span class="help-block">:message</span>') !!} @endif
							</div>
						</div>	    
						<!-- Text input-->
						<div class="form-group @if($errors->has('romberg_sensib')) {!! 'has-error' !!} @endif">
							<label class="col-md-4 control-label" for="romberg_sensib">Romberg Sensib.</label>
							<div class="col-md-4">
								<input id="romberg_sensib" name="romberg_sensib" type="text"
									placeholder="Romberg Sensib." class="form-control input-md"
									value="{{ old('romberg_sensib', isset($area->equilibrio->romberg_sensib) ? $area->equilibrio->romberg_sensib : null) }}">
									@if($errors->has('romberg_sensib')) {!! $errors->first('romberg_sensib', '<span class="help-block">:message</span>') !!} @endif
							</div>
						</div>	   
					</div>
      				<div class="tab-pane" id="tab_4">   
						<!-- Text input-->
						<div class="form-group @if($errors->has('babinski')) {!! 'has-error' !!} @endif">
							<label class="col-md-4 control-label" for="babinski">Babinski</label>
							<div class="col-md-4">
								<input id="babinski" name="babinski" type="text"
									placeholder="Babinski" class="form-control input-md"
									value="{{ old('babinski', isset($area->superficial->babinski) ? $area->superficial->babinski : null) }}">
									@if($errors->has('babinski')) {!! $errors->first('babinski', '<span class="help-block">:message</span>') !!} @endif
							</div>
						</div>	    
						<!-- Text input-->
						<div class="form-group @if($errors->has('gordon')) {!! 'has-error' !!} @endif">
							<label class="col-md-4 control-label" for="gordon">Gordon</label>
							<div class="col-md-4">
								<input id="gordon" name="gordon" type="text"
									placeholder="Gordon" class="form-control input-md"
									value="{{ old('gordon', isset($area->superficial->gordon) ? $area->superficial->gordon : null) }}">
									@if($errors->has('gordon')) {!! $errors->first('gordon', '<span class="help-block">:message</span>') !!} @endif
							</div>
						</div>	    
						<!-- Text input-->
						<div class="form-group @if($errors->has('warterbenrg')) {!! 'has-error' !!} @endif">
							<label class="col-md-4 control-label" for="warterbenrg">Warterbenrg</label>
							<div class="col-md-4">
								<input id="warterbenrg" name="warterbenrg" type="text"
									placeholder="Warterbenrg" class="form-control input-md"
									value="{{ old('warterbenrg', isset($area->superficial->warterbenrg) ? $area->superficial->warterbenrg : null) }}">
									@if($errors->has('warterbenrg')) {!! $errors->first('warterbenrg', '<span class="help-block">:message</span>') !!} @endif
							</div>
						</div>	   
						<!-- Text input-->
						<div class="form-group @if($errors->has('oppenhein')) {!! 'has-error' !!} @endif">
							<label class="col-md-4 control-label" for="oppenhein">Oppenhein</label>
							<div class="col-md-4">
								<input id="oppenhein" name="oppenhein" type="text"
									placeholder="Oppenhein" class="form-control input-md"
									value="{{ old('oppenhein', isset($area->superficial->oppenhein) ? $area->superficial->oppenhein : null) }}">
									@if($errors->has('oppenhein')) {!! $errors->first('oppenhein', '<span class="help-block">:message</span>') !!} @endif
							</div>
						</div>
						<!-- Text input-->
						<div class="form-group @if($errors->has('rossolino')) {!! 'has-error' !!} @endif">
							<label class="col-md-4 control-label" for="rossolino">Rossolino</label>
							<div class="col-md-4">
								<input id="rossolino" name="rossolino" type="text"
									placeholder="Rossolino" class="form-control input-md"
									value="{{ old('rossolino', isset($area->superficial->rossolino) ? $area->superficial->rossolino : null) }}">
									@if($errors->has('rossolino')) {!! $errors->first('rossolino', '<span class="help-block">:message</span>') !!} @endif
							</div>
						</div>	    
						<!-- Text input-->
						<div class="form-group @if($errors->has('cutaneo_abdominal')) {!! 'has-error' !!} @endif">
							<label class="col-md-4 control-label" for="cutaneo_abdominal">Cutanêo Abdominal</label>
							<div class="col-md-4">
								<input id="cutaneo_abdominal" name="cutaneo_abdominal" type="text"
									placeholder="Cutanêo Abdominal" class="form-control input-md"
									value="{{ old('cutaneo_abdominal', isset($area->superficial->cutaneo_abdominal) ? $area->superficial->cutaneo_abdominal : null) }}">
									@if($errors->has('cutaneo_abdominal')) {!! $errors->first('cutaneo_abdominal', '<span class="help-block">:message</span>') !!} @endif
							</div>
						</div>	    
						<!-- Text input-->
						<div class="form-group @if($errors->has('chacddock')) {!! 'has-error' !!} @endif">
							<label class="col-md-4 control-label" for="chacddock">Chacddock</label>
							<div class="col-md-4">
								<input id="chacddock" name="chacddock" type="text"
									placeholder="Chacddock" class="form-control input-md"
									value="{{ old('chacddock', isset($area->superficial->chacddock) ? $area->superficial->chacddock : null) }}">
									@if($errors->has('chacddock')) {!! $errors->first('chacddock', '<span class="help-block">:message</span>') !!} @endif
							</div>
						</div>	    
						<!-- Text input-->
						<div class="form-group @if($errors->has('hoffman')) {!! 'has-error' !!} @endif">
							<label class="col-md-4 control-label" for="hoffman">Hoffman</label>
							<div class="col-md-4">
								<input id="hoffman" name="hoffman" type="text"
									placeholder="Hoffman" class="form-control input-md"
									value="{{ old('hoffman', isset($area->superficial->hoffman) ? $area->superficial->hoffman : null) }}">
									@if($errors->has('hoffman')) {!! $errors->first('hoffman', '<span class="help-block">:message</span>') !!} @endif
							</div>
						</div>	 
						<!-- Text Area-->
						<div class="form-group @if($errors->has('outro')) {!! 'has-error' !!} @endif">
							<label class="col-md-4 control-label" for="outro">Outros</label>
							<div class="col-md-6">
								<textarea class="textarea form-control input-md" placeholder="Outros" id="outro" name="outro">
									{{ old('outro',  isset($area->superficial->outro) ? $area->superficial->outro : null) }}
								</textarea>
								@if($errors->has('outro')) {!! $errors->first('outro', '<span class="help-block">:message</span>') !!} @endif						
				        	</div>
						</div>       
						<!-- Text input-->
						<div class="form-group @if($errors->has('mandibular')) {!! 'has-error' !!} @endif">
							<label class="col-md-4 control-label" for="mandibular">Mandibular</label>
							<div class="col-md-4">
								<input id="mandibular" name="mandibular" type="text"
									placeholder="Mandibular" class="form-control input-md"
									value="{{ old('mandibular', isset($area->superficial->mandibular) ? $area->superficial->mandibular : null) }}">
									@if($errors->has('mandibular')) {!! $errors->first('mandibular', '<span class="help-block">:message</span>') !!} @endif
							</div>
						</div>    
						<!-- Text input-->
						<div class="form-group @if($errors->has('aquileu')) {!! 'has-error' !!} @endif">
							<label class="col-md-4 control-label" for="aquileu">Aquileu</label>
							<div class="col-md-4">
								<input id="aquileu" name="aquileu" type="text"
									placeholder="Aquileu" class="form-control input-md"
									value="{{ old('aquileu', isset($area->superficial->aquileu) ? $area->superficial->aquileu : null) }}">
									@if($errors->has('aquileu')) {!! $errors->first('aquileu', '<span class="help-block">:message</span>') !!} @endif
							</div>
						</div>    
						<!-- Text input-->
						<div class="form-group @if($errors->has('patelar')) {!! 'has-error' !!} @endif">
							<label class="col-md-4 control-label" for="patelar">Patelar</label>
							<div class="col-md-4">
								<input id="patelar" name="patelar" type="text"
									placeholder="Patelar" class="form-control input-md"
									value="{{ old('patelar', isset($area->superficial->patelar) ? $area->superficial->patelar : null) }}">
									@if($errors->has('patelar')) {!! $errors->first('patelar', '<span class="help-block">:message</span>') !!} @endif
							</div>
						</div> 
					</div>
      				<div class="tab-pane" id="tab_5">        
						<!-- Text input-->
						<div class="form-group @if($errors->has('index_index')) {!! 'has-error' !!} @endif">
							<label class="col-md-4 control-label" for="index_index">Índex-Índex</label>
							<div class="col-md-4">
								<input id="index_index" name="index_index" type="text"
									placeholder="Índex-Índex" class="form-control input-md"
									value="{{ old('index_index', isset($area->coordenacao->index_index) ? $area->coordenacao->index_index : null) }}">
									@if($errors->has('index_index')) {!! $errors->first('index_index', '<span class="help-block">:message</span>') !!} @endif
							</div>
						</div>     
						<!-- Text input-->
						<div class="form-group @if($errors->has('index_nariz_index')) {!! 'has-error' !!} @endif">
							<label class="col-md-4 control-label" for="index_nariz_index">Índex-Nariz-Índex</label>
							<div class="col-md-4">
								<input id="index_nariz_index" name="index_nariz_index" type="text"
									placeholder="Índex-Nariz-Índex" class="form-control input-md"
									value="{{ old('index_nariz_index', isset($area->coordenacao->index_nariz_index) ? $area->coordenacao->index_nariz_index : null) }}">
									@if($errors->has('index_nariz_index')) {!! $errors->first('index_nariz_index', '<span class="help-block">:message</span>') !!} @endif
							</div>
						</div>    
						<!-- Text input-->
						<div class="form-group @if($errors->has('index_nariz')) {!! 'has-error' !!} @endif">
							<label class="col-md-4 control-label" for="index_nariz">Índex-Nariz</label>
							<div class="col-md-4">
								<input id="index_nariz" name="index_nariz" type="text"
									placeholder="Índex-Nariz" class="form-control input-md"
									value="{{ old('index_nariz', isset($area->coordenacao->index_nariz) ? $area->coordenacao->index_nariz : null) }}">
									@if($errors->has('index_nariz')) {!! $errors->first('index_nariz', '<span class="help-block">:message</span>') !!} @endif
							</div>
						</div>    
						<!-- Text input-->
						<div class="form-group @if($errors->has('index_index_terapeuta')) {!! 'has-error' !!} @endif">
							<label class="col-md-4 control-label" for="index_index_terapeuta">Índex-Índex(Terapeuta)</label>
							<div class="col-md-4">
								<input id="index_index_terapeuta" name="index_index_terapeuta" type="text"
									placeholder="Índex-Índex(Terapeuta)" class="form-control input-md"
									value="{{ old('index_index_terapeuta', isset($area->coordenacao->index_index_terapeuta) ? $area->coordenacao->index_nariz_terapeuta : null) }}">
									@if($errors->has('index_index_terapeuta')) {!! $errors->first('index_index_terapeuta', '<span class="help-block">:message</span>') !!} @endif
							</div>
						</div>    
						<!-- Text input-->
						<div class="form-group @if($errors->has('diadococinesia')) {!! 'has-error' !!} @endif">
							<label class="col-md-4 control-label" for="diadococinesia">Diadococinesia</label>
							<div class="col-md-4">
								<input id="diadococinesia" name="diadococinesia" type="text"
									placeholder="Diadococinesia" class="form-control input-md"
									value="{{ old('diadococinesia', isset($area->coordenacao->diadococinesia) ? $area->coordenacao->diadococinesia : null) }}">
									@if($errors->has('diadococinesia')) {!! $errors->first('diadococinesia', '<span class="help-block">:message</span>') !!} @endif
							</div>
						</div>    
						<!-- Text input-->
						<div class="form-group @if($errors->has('grafia')) {!! 'has-error' !!} @endif">
							<label class="col-md-4 control-label" for="grafia">Grafia</label>
							<div class="col-md-4">
								<input id="grafia" name="grafia" type="text"
									placeholder="Grafia" class="form-control input-md"
									value="{{ old('grafia', isset($area->coordenacao->grafia) ? $area->coordenacao->grafia : null) }}">
									@if($errors->has('grafia')) {!! $errors->first('grafia', '<span class="help-block">:message</span>') !!} @endif
							</div>
						</div>    
						<!-- Text input-->
						<div class="form-group @if($errors->has('calcanhar_joelho')) {!! 'has-error' !!} @endif">
							<label class="col-md-4 control-label" for="calcanhar_joelho">Calcanhar-Joelho</label>
							<div class="col-md-4">
								<input id="calcanhar_joelho" name="calcanhar_joelho" type="text"
									placeholder="Calcanhar-Joelho" class="form-control input-md"
									value="{{ old('calcanhar_joelho', isset($area->coordenacao->calcanhar_joelho) ? $area->coordenacao->calcanhar_joelho : null) }}">
									@if($errors->has('calcanhar_joelho')) {!! $errors->first('calcanhar_joelho', '<span class="help-block">:message</span>') !!} @endif
							</div>
						</div>    
						<!-- Text input-->
						<div class="form-group @if($errors->has('batida_do_pe')) {!! 'has-error' !!} @endif">
							<label class="col-md-4 control-label" for="batida_do_pe">Batida do Pé</label>
							<div class="col-md-4">
								<input id="batida_do_pe" name="batida_do_pe" type="text"
									placeholder="Batida do Pé" class="form-control input-md"
									value="{{ old('batida_do_pe', isset($area->coordenacao->batida_do_pe) ? $area->coordenacao->batida_do_pe : null) }}">
									@if($errors->has('batida_do_pe')) {!! $errors->first('batida_do_pe', '<span class="help-block">:message</span>') !!} @endif
							</div>
						</div> 
						<!-- Text Area-->
						<div class="form-group @if($errors->has('outros')) {!! 'has-error' !!} @endif">
							<label class="col-md-4 control-label" for="outros">Outros</label>
							<div class="col-md-6">
								<textarea class="textarea form-control input-md" placeholder="Outros" id="outros" name="outros">
									{{ old('outros',  isset($area->coordenacao->outros) ? $area->coordenacao->outros : null) }}
								</textarea>
								@if($errors->has('outros')) {!! $errors->first('outros', '<span class="help-block">:message</span>') !!} @endif						
				        	</div>
						</div> 
					</div>
      				<div class="tab-pane" id="tab_6">     
						<!-- Text input-->
						<div class="form-group @if($errors->has('bracos_estend')) {!! 'has-error' !!} @endif">
							<label class="col-md-4 control-label" for="bracos_estend">Braços Estend.</label>
							<div class="col-md-4">
								<input id="bracos_estend" name="bracos_estend" type="text"
									placeholder="Braços Estend." class="form-control input-md"
									value="{{ old('bracos_estend', isset($area->manobras->bracos_estend) ? $area->manobras->bracos_estend : null) }}">
									@if($errors->has('bracos_estend')) {!! $errors->first('bracos_estend', '<span class="help-block">:message</span>') !!} @endif
							</div>
						</div>    
						<!-- Text input-->
						<div class="form-group @if($errors->has('barre')) {!! 'has-error' !!} @endif">
							<label class="col-md-4 control-label" for="barre">Barre</label>
							<div class="col-md-4">
								<input id="barre" name="barre" type="text"
									placeholder="Barre" class="form-control input-md"
									value="{{ old('barre', isset($area->manobras->barre) ? $area->manobras->barre : null) }}">
									@if($errors->has('barre')) {!! $errors->first('barre', '<span class="help-block">:message</span>') !!} @endif
							</div>
						</div>    
						<!-- Text input-->
						<div class="form-group @if($errors->has('mingazzini')) {!! 'has-error' !!} @endif">
							<label class="col-md-4 control-label" for="mingazzini">Mingazzini</label>
							<div class="col-md-4">
								<input id="mingazzini" name="mingazzini" type="text"
									placeholder="Mingazzini" class="form-control input-md"
									value="{{ old('mingazzini', isset($area->manobras->mingazzini) ? $area->manobras->mingazzini : null) }}">
									@if($errors->has('mingazzini')) {!! $errors->first('mingazzini', '<span class="help-block">:message</span>') !!} @endif
							</div>
						</div>     
					</div>
      				<div class="tab-pane" id="tab_7">   
						<!-- Text input-->
						<div class="form-group @if($errors->has('tatil')) {!! 'has-error' !!} @endif">
							<label class="col-md-4 control-label" for="tatil">Tátil</label>
							<div class="col-md-4">
								<input id="tatil" name="tatil" type="text"
									placeholder="Tátil" class="form-control input-md"
									value="{{ old('tatil', isset($area->tatil) ? $area->tatil : null) }}">
									@if($errors->has('tatil')) {!! $errors->first('tatil', '<span class="help-block">:message</span>') !!} @endif
							</div>
						</div>   
						<!-- Text input-->
						<div class="form-group @if($errors->has('termica')) {!! 'has-error' !!} @endif">
							<label class="col-md-4 control-label" for="termica">Térmica</label>
							<div class="col-md-4">
								<input id="termica" name="termica" type="text"
									placeholder="Térmica" class="form-control input-md"
									value="{{ old('termica', isset($area->termica) ? $area->termica : null) }}">
									@if($errors->has('termica')) {!! $errors->first('termica', '<span class="help-block">:message</span>') !!} @endif
							</div>
						</div>   
						<!-- Text input-->
						<div class="form-group @if($errors->has('dolorosa')) {!! 'has-error' !!} @endif">
							<label class="col-md-4 control-label" for="dolorosa">Dolorosa</label>
							<div class="col-md-4">
								<input id="dolorosa" name="dolorosa" type="text"
									placeholder="Dolorosa" class="form-control input-md"
									value="{{ old('dolorosa', isset($area->dolorosa) ? $area->dolorosa : null) }}">
									@if($errors->has('dolorosa')) {!! $errors->first('dolorosa', '<span class="help-block">:message</span>') !!} @endif
							</div>
						</div>    
						<!-- Text input-->
						<div class="form-group @if($errors->has('palestesia')) {!! 'has-error' !!} @endif">
							<label class="col-md-4 control-label" for="palestesia">Palestesia</label>
							<div class="col-md-4">
								<input id="palestesia" name="palestesia" type="text"
									placeholder="Palestesia" class="form-control input-md"
									value="{{ old('palestesia', isset($area->palestesia) ? $area->palestesia : null) }}">
									@if($errors->has('palestesia')) {!! $errors->first('palestesia', '<span class="help-block">:message</span>') !!} @endif
							</div>
						</div>    
						<!-- Text input-->
						<div class="form-group @if($errors->has('barestesia')) {!! 'has-error' !!} @endif">
							<label class="col-md-4 control-label" for="barestesia">Barestesia</label>
							<div class="col-md-4">
								<input id="barestesia" name="barestesia" type="text"
									placeholder="Barestesia" class="form-control input-md"
									value="{{ old('barestesia', isset($area->barestesia) ? $area->barestesia : null) }}">
									@if($errors->has('barestesia')) {!! $errors->first('barestesia', '<span class="help-block">:message</span>') !!} @endif
							</div>
						</div>    
						<!-- Text input-->
						<div class="form-group @if($errors->has('barognesia')) {!! 'has-error' !!} @endif">
							<label class="col-md-4 control-label" for="barognesia">Barognesia</label>
							<div class="col-md-4">
								<input id="barognesia" name="barognesia" type="text"
									placeholder="Barognesia" class="form-control input-md"
									value="{{ old('barognesia', isset($area->barognesia) ? $area->barognesia : null) }}">
									@if($errors->has('barognesia')) {!! $errors->first('barognesia', '<span class="help-block">:message</span>') !!} @endif
							</div>
						</div>    
						<!-- Text input-->
						<div class="form-group @if($errors->has('grafestesia')) {!! 'has-error' !!} @endif">
							<label class="col-md-4 control-label" for="grafestesia">Grafestesia</label>
							<div class="col-md-4">
								<input id="grafestesia" name="grafestesia" type="text"
									placeholder="Grafestesia" class="form-control input-md"
									value="{{ old('grafestesia', isset($area->grafestesia) ? $area->grafestesia : null) }}">
									@if($errors->has('grafestesia')) {!! $errors->first('grafestesia', '<span class="help-block">:message</span>') !!} @endif
							</div>
						</div>    
						<!-- Text input-->
						<div class="form-group @if($errors->has('propriecptiva')) {!! 'has-error' !!} @endif">
							<label class="col-md-4 control-label" for="propriecptiva">Propriecptiva</label>
							<div class="col-md-4">
								<input id="propriecptiva" name="propriecptiva" type="text"
									placeholder="Propriecptiva" class="form-control input-md"
									value="{{ old('propriecptiva', isset($area->propriecptiva) ? $area->propriecptiva : null) }}">
									@if($errors->has('propriecptiva')) {!! $errors->first('propriecptiva', '<span class="help-block">:message</span>') !!} @endif
							</div>
						</div>    
						<!-- Text input-->
						<div class="form-group @if($errors->has('descricao_de_marcha')) {!! 'has-error' !!} @endif">
							<label class="col-md-4 control-label" for="descricao_de_marcha">Descrição de Marcha</label>
							<div class="col-md-4">
								<input id="descricao_de_marcha" name="descricao_de_marcha" type="text"
									placeholder="Descrição de Marcha" class="form-control input-md"
									value="{{ old('descricao_de_marcha', isset($area->descricao_de_marcha) ? $area->descricao_de_marcha : null) }}">
									@if($errors->has('descricao_de_marcha')) {!! $errors->first('descricao_de_marcha', '<span class="help-block">:message</span>') !!} @endif
							</div>
						</div>    
						<!-- Text input-->
						<div class="form-group @if($errors->has('nervos_cranianos')) {!! 'has-error' !!} @endif">
							<label class="col-md-4 control-label" for="nervos_cranianos">Nervos Cranianos</label>
							<div class="col-md-4">
								<input id="nervos_cranianos" name="nervos_cranianos" type="text"
									placeholder="Nervos Cranianos" class="form-control input-md"
									value="{{ old('nervos_cranianos', isset($area->nervos_cranianos) ? $area->nervos_cranianos : null) }}">
									@if($errors->has('nervos_cranianos')) {!! $errors->first('nervos_cranianos', '<span class="help-block">:message</span>') !!} @endif
							</div>
						</div>    
						<!-- Text input-->
						<div class="form-group @if($errors->has('linguagem')) {!! 'has-error' !!} @endif">
							<label class="col-md-4 control-label" for="linguagem">Linguagem</label>
							<div class="col-md-4">
								<input id="linguagem" name="linguagem" type="text"
									placeholder="Linguagem" class="form-control input-md"
									value="{{ old('linguagem', isset($area->linguagem) ? $area->linguagem : null) }}">
									@if($errors->has('linguagem')) {!! $errors->first('linguagem', '<span class="help-block">:message</span>') !!} @endif
							</div>
						</div>    
						<!-- Text input-->
						<div class="form-group @if($errors->has('comportamento')) {!! 'has-error' !!} @endif">
							<label class="col-md-4 control-label" for="comportamento">Comportamento</label>
							<div class="col-md-4">
								<input id="comportamento" name="comportamento" type="text"
									placeholder="Comportamento" class="form-control input-md"
									value="{{ old('comportamento', isset($area->comportamento) ? $area->comportamento : null) }}">
									@if($errors->has('comportamento')) {!! $errors->first('comportamento', '<span class="help-block">:message</span>') !!} @endif
							</div>
						</div>    
						<!-- Text input-->
						<div class="form-group @if($errors->has('sincinesias')) {!! 'has-error' !!} @endif">
							<label class="col-md-4 control-label" for="sincinesias">Sincinesias</label>
							<div class="col-md-4">
								<input id="sincinesias" name="sincinesias" type="text"
									placeholder="Sincinesias" class="form-control input-md"
									value="{{ old('sincinesias', isset($area->sincinesias) ? $area->sincinesias : null) }}">
									@if($errors->has('sincinesias')) {!! $errors->first('sincinesias', '<span class="help-block">:message</span>') !!} @endif
							</div>
						</div>    
						<!-- Text input-->
						<div class="form-group @if($errors->has('gnosia')) {!! 'has-error' !!} @endif">
							<label class="col-md-4 control-label" for="gnosia">Gnosia</label>
							<div class="col-md-4">
								<input id="gnosia" name="gnosia" type="text"
									placeholder="Gnosia" class="form-control input-md"
									value="{{ old('gnosia', isset($area->gnosia) ? $area->gnosia : null) }}">
									@if($errors->has('gnosia')) {!! $errors->first('gnosia', '<span class="help-block">:message</span>') !!} @endif
							</div>
						</div>  
						<!-- Text input-->
						<div class="form-group @if($errors->has('praxia')) {!! 'has-error' !!} @endif">
							<label class="col-md-4 control-label" for="praxia">Praxia</label>
							<div class="col-md-4">
								<input id="praxia" name="praxia" type="text"
									placeholder="Praxia" class="form-control input-md"
									value="{{ old('praxia', isset($area->praxia) ? $area->praxia : null) }}">
									@if($errors->has('praxia')) {!! $errors->first('praxia', '<span class="help-block">:message</span>') !!} @endif
							</div>
						</div>    
						<!-- Text input-->
						<div class="form-group @if($errors->has('memoria_recente')) {!! 'has-error' !!} @endif">
							<label class="col-md-4 control-label" for="memoria_recente">Memória Recente</label>
							<div class="col-md-4">
								<input id="memoria_recente" name="memoria_recente" type="text"
									placeholder="Memória Recente" class="form-control input-md"
									value="{{ old('memoria_recente', isset($area->memoria_recente) ? $area->memoria_recente : null) }}">
									@if($errors->has('memoria_recente')) {!! $errors->first('memoria_recente', '<span class="help-block">:message</span>') !!} @endif
							</div>
						</div>    
						<!-- Text input-->
						<div class="form-group @if($errors->has('memoria_remota')) {!! 'has-error' !!} @endif">
							<label class="col-md-4 control-label" for="memoria_remota">Memória Remota</label>
							<div class="col-md-4">
								<input id="memoria_remota" name="memoria_remota" type="text"
									placeholder="Memória Remota" class="form-control input-md"
									value="{{ old('memoria_remota', isset($area->memoria_remota) ? $area->memoria_remota : null) }}">
									@if($errors->has('memoria_remota')) {!! $errors->first('memoria_remota', '<span class="help-block">:message</span>') !!} @endif
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
