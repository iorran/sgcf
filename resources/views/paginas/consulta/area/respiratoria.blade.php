@extends('layouts.master') @section('content')

<!-- Main content -->
<section class="content">
	<form class="form-horizontal" action="{{route('consulta.area.respiratoria.store')}}" method="post"> 
		<input type="hidden" name="agendamento_id" id="agendamento_id" value="{!! $agendamento_id !!}">
		<input type="hidden" name="paciente_id" id="paciente_id" value="{!! $paciente_id !!}"> 
		<fieldset>  
			<div class="nav-tabs-custom">
		    	<ul class="nav nav-tabs">
		        	<li class="active"><a href="#tab_1" data-toggle="tab">Informações Gerais</a></li>
		        	<li><a href="#tab_2" data-toggle="tab">Testes Específicos</a></li> 
		        	<li><a href="#tab_3" data-toggle="tab">Avaliação Motora</a></li> 
		        	<li><a href="#tab_4" data-toggle="tab">Avaliação Muscular</a></li> 
		        	<li><a href="#tab_5" data-toggle="tab">Avaliação Respiratória</a></li> 
		        	<li><a href="#tab_6" data-toggle="tab">Sinais Vitais</a></li> 
		   		</ul>
   				<div class="tab-content">
      				<div class="tab-pane active" id="tab_1">     
						<!-- Text input-->
						<div class="form-group @if($errors->has('analise_postural')) {!! 'has-error' !!} @endif">
							<label class="col-md-4 control-label" for="analise_postural">Análise Postural</label>
							<div class="col-md-4">
								<input id="analise_postural" name="analise_postural" type="text"
									placeholder="Análise Postural" class="form-control input-md"
									value="{{ old('analise_postural') }}">
									@if($errors->has('analise_postural')) {!! $errors->first('analise_postural', '<span class="help-block">:message</span>') !!} @endif
							</div>
						</div>	
					
						<!-- Text input-->
						<div class="form-group @if($errors->has('avds')) {!! 'has-error' !!} @endif">
							<label class="col-md-4 control-label" for="avds">AVDs</label>
							<div class="col-md-4">
								<input id="avds" name="avds" type="text"
									placeholder="AVDs" class="form-control input-md"
									value="{{ old('avds') }}">
									@if($errors->has('avds')) {!! $errors->first('avds', '<span class="help-block">:message</span>') !!} @endif
							</div>
						</div>	
					
						<!-- Text input-->
						<div class="form-group @if($errors->has('linha_axilar')) {!! 'has-error' !!} @endif">
							<label class="col-md-4 control-label" for="linha_axilar">Linha Axilar</label>
							<div class="col-md-4">
								<input id="linha_axilar" name="linha_axilar" type="text"
									placeholder="Linha Axilar" class="form-control input-md"
									value="{{ old('linha_axilar') }}">
									@if($errors->has('linha_axilar')) {!! $errors->first('linha_axilar', '<span class="help-block">:message</span>') !!} @endif
							</div>
						</div>	
						 
						<!-- Text input-->
						<div class="form-group @if($errors->has('ap_xifoide')) {!! 'has-error' !!} @endif">
							<label class="col-md-4 control-label" for="ap_xifoide">Ap. Xifoide</label>
							<div class="col-md-4">
								<input id="ap_xifoide" name="ap_xifoide" type="text"
									placeholder="Ap. Xifoide" class="form-control input-md"
									value="{{ old('ap_xifoide') }}">
									@if($errors->has('ap_xifoide')) {!! $errors->first('ap_xifoide', '<span class="help-block">:message</span>') !!} @endif
							</div>
						</div>	
						 
						<!-- Text input-->
						<div class="form-group @if($errors->has('ultimas_costelas')) {!! 'has-error' !!} @endif">
							<label class="col-md-4 control-label" for="ultimas_costelas">Últimas Costelas</label>
							<div class="col-md-4">
								<input id="ultimas_costelas" name="ultimas_costelas" type="text"
									placeholder="Últimas Costelas" class="form-control input-md"
									value="{{ old('ultimas_costelas') }}">
									@if($errors->has('ultimas_costelas')) {!! $errors->first('ultimas_costelas', '<span class="help-block">:message</span>') !!} @endif
							</div>
						</div>	
						 
						<!-- Text input-->
						<div class="form-group @if($errors->has('cicatriz_umbilical')) {!! 'has-error' !!} @endif">
							<label class="col-md-4 control-label" for="cicatriz_umbilical">Cicatriz Umbilical</label>
							<div class="col-md-4">
								<input id="cicatriz_umbilical" name="cicatriz_umbilical" type="text"
									placeholder="Cicatriz Umbilical" class="form-control input-md"
									value="{{ old('cicatriz_umbilical') }}">
									@if($errors->has('cicatriz_umbilical')) {!! $errors->first('cicatriz_umbilical', '<span class="help-block">:message</span>') !!} @endif
							</div>
						</div>	
	
						<!-- Text Area-->
						<div class="form-group @if($errors->has('ex_complementares')) {!! 'has-error' !!} @endif">
							<label class="col-md-4 control-label" for="ex_complementares">Ex. Complementares</label>
							<div class="col-md-6">
								<textarea class="textarea form-control input-md" placeholder="Ex. Complementares" id="ex_complementares" name="ex_complementares">
									{{ old('ex_complementares',  isset($anamnese->ex_complementares) ? $anamnese->ex_complementares : null) }}
								</textarea>
								@if($errors->has('ex_complementares')) {!! $errors->first('ex_complementares', '<span class="help-block">:message</span>') !!} @endif						
									
				        	</div>
						</div>
					</div> <!-- End tab1 -->	
					
      				<div class="tab-pane" id="tab_2">  
						<!-- Text input-->
						<div class="form-group @if($errors->has('manovacuamento')) {!! 'has-error' !!} @endif">
							<label class="col-md-4 control-label" for="manovacuamento">Manovacuamento</label>
							<div class="col-md-4">
								<input id="manovacuamento" name="manovacuamento" type="text"
									placeholder="Manovacuamento" class="form-control input-md"
									value="{{ old('manovacuamento') }}">
									@if($errors->has('manovacuamento')) {!! $errors->first('manovacuamento', '<span class="help-block">:message</span>') !!} @endif
							</div>
						</div>	 
						<!-- Text input-->
						<div class="form-group @if($errors->has('ventilometro')) {!! 'has-error' !!} @endif">
							<label class="col-md-4 control-label" for="ventilometro">Ventilômetro</label>
							<div class="col-md-4">
								<input id="ventilometro" name="ventilometro" type="text"
									placeholder="Ventilômetro" class="form-control input-md"
									value="{{ old('ventilometro') }}">
									@if($errors->has('ventilometro')) {!! $errors->first('ventilometro', '<span class="help-block">:message</span>') !!} @endif
							</div>
						</div>	 
						<!-- Text input-->
						<div class="form-group @if($errors->has('peak_flow')) {!! 'has-error' !!} @endif">
							<label class="col-md-4 control-label" for="peak_flow">Peak Flow</label>
							<div class="col-md-4">
								<input id="peak_flow" name="peak_flow" type="text"
									placeholder="Peak Flow" class="form-control input-md"
									value="{{ old('peak_flow') }}">
									@if($errors->has('peak_flow')) {!! $errors->first('peak_flow', '<span class="help-block">:message</span>') !!} @endif
							</div>
						</div>	  
					</div> <!-- End tab2 -->
      				<div class="tab-pane" id="tab_3">
						<!-- Text input-->
						<div class="form-group @if($errors->has('palpitacao')) {!! 'has-error' !!} @endif">
							<label class="col-md-4 control-label" for="palpitacao">Palpitação Trofismo Tonus</label>
							<div class="col-md-4">
								<input id="palpitacao" name="palpitacao" type="text"
									placeholder="Palpitação Trofismo Tonus" class="form-control input-md"
									value="{{ old('palpitacao') }}">
									@if($errors->has('palpitacao')) {!! $errors->first('palpitacao', '<span class="help-block">:message</span>') !!} @endif
							</div>
						</div>	     
					</div> <!-- End tab3 -->
      				<div class="tab-pane" id="tab_4">   
						<!-- Text input-->
						<div class="form-group @if($errors->has('diafragma')) {!! 'has-error' !!} @endif">
							<label class="col-md-4 control-label" for="diafragma">Diafragma</label>
							<div class="col-md-4">
								<input id="diafragma" name="diafragma" type="text"
									placeholder="Diafragma" class="form-control input-md"
									value="{{ old('diafragma') }}">
									@if($errors->has('diafragma')) {!! $errors->first('diafragma', '<span class="help-block">:message</span>') !!} @endif
							</div>
						</div>	  
						<!-- Text input-->
						<div class="form-group @if($errors->has('abdominais')) {!! 'has-error' !!} @endif">
							<label class="col-md-4 control-label" for="abdominais">Abdominais</label>
							<div class="col-md-4">
								<input id="abdominais" name="abdominais" type="text"
									placeholder="Abdominais" class="form-control input-md"
									value="{{ old('abdominais') }}">
									@if($errors->has('abdominais')) {!! $errors->first('abdominais', '<span class="help-block">:message</span>') !!} @endif
							</div>
						</div>	 
						<!-- Text input-->
						<div class="form-group @if($errors->has('ecom')) {!! 'has-error' !!} @endif">
							<label class="col-md-4 control-label" for="ecom">Ecom</label>
							<div class="col-md-4">
								<input id="ecom" name="ecom" type="text"
									placeholder="Ecom" class="form-control input-md"
									value="{{ old('ecom') }}">
									@if($errors->has('ecom')) {!! $errors->first('ecom', '<span class="help-block">:message</span>') !!} @endif
							</div>
						</div>	 
						<!-- Text input-->
						<div class="form-group @if($errors->has('trapezio')) {!! 'has-error' !!} @endif">
							<label class="col-md-4 control-label" for="trapezio">Trapézio</label>
							<div class="col-md-4">
								<input id="trapezio" name="trapezio" type="text"
									placeholder="Trapézio" class="form-control input-md"
									value="{{ old('trapezio') }}">
									@if($errors->has('trapezio')) {!! $errors->first('trapezio', '<span class="help-block">:message</span>') !!} @endif
							</div>
						</div>	  
						<!-- Text input-->
						<div class="form-group @if($errors->has('vertebrais')) {!! 'has-error' !!} @endif">
							<label class="col-md-4 control-label" for="vertebrais">Para vertebrais</label>
							<div class="col-md-4">
								<input id="vertebrais" name="vertebrais" type="text"
									placeholder="Para vertebrais" class="form-control input-md"
									value="{{ old('vertebrais') }}">
									@if($errors->has('vertebrais')) {!! $errors->first('vertebrais', '<span class="help-block">:message</span>') !!} @endif
							</div>
						</div>	  
						<!-- Text input-->
						<div class="form-group @if($errors->has('peitoral')) {!! 'has-error' !!} @endif">
							<label class="col-md-4 control-label" for="peitoral">Peitoral</label>
							<div class="col-md-4">
								<input id="peitoral" name="peitoral" type="text"
									placeholder="Peitoral" class="form-control input-md"
									value="{{ old('peitoral') }}">
									@if($errors->has('peitoral')) {!! $errors->first('peitoral', '<span class="help-block">:message</span>') !!} @endif
							</div>
						</div>	  
						<!-- Text input-->
						<div class="form-group @if($errors->has('intercostais')) {!! 'has-error' !!} @endif">
							<label class="col-md-4 control-label" for="intercostais">Intercostais</label>
							<div class="col-md-4">
								<input id="intercostais" name="intercostais" type="text"
									placeholder="Intercostais" class="form-control input-md"
									value="{{ old('intercostais') }}">
									@if($errors->has('intercostais')) {!! $errors->first('intercostais', '<span class="help-block">:message</span>') !!} @endif
							</div>
						</div>	   
					</div> <!-- End tab4 -->
      				<div class="tab-pane" id="tab_5">  
						<!-- Text input-->
						<div class="form-group @if($errors->has('ritmo')) {!! 'has-error' !!} @endif">
							<label class="col-md-4 control-label" for="ritmo">Ritmo Respiratório</label>
							<div class="col-md-4">
								<input id="ritmo" name="ritmo" type="text"
									placeholder="Ritmo Respiratório" class="form-control input-md"
									value="{{ old('ritmo') }}">
									@if($errors->has('ritmo')) {!! $errors->first('ritmo', '<span class="help-block">:message</span>') !!} @endif
							</div>
						</div>	  
						<!-- Text input-->
						<div class="form-group @if($errors->has('tipo')) {!! 'has-error' !!} @endif">
							<label class="col-md-4 control-label" for="tipo">Tipo Respiratório</label>
							<div class="col-md-4">
								<input id="tipo" name="tipo" type="text"
									placeholder="Tipo Respiratório" class="form-control input-md"
									value="{{ old('tipo') }}">
									@if($errors->has('tipo')) {!! $errors->first('tipo', '<span class="help-block">:message</span>') !!} @endif
							</div>
						</div>	  
						<!-- Text input-->
						<div class="form-group @if($errors->has('amplitude')) {!! 'has-error' !!} @endif">
							<label class="col-md-4 control-label" for="amplitude">Amplitude</label>
							<div class="col-md-4">
								<input id="amplitude" name="amplitude" type="text"
									placeholder="Amplitude" class="form-control input-md"
									value="{{ old('amplitude') }}">
									@if($errors->has('amplitude')) {!! $errors->first('amplitude', '<span class="help-block">:message</span>') !!} @endif
							</div>
						</div>	
						<!-- Text input-->
						<div class="form-group @if($errors->has('musculatura')) {!! 'has-error' !!} @endif">
							<label class="col-md-4 control-label" for="musculatura">Musculatura Acessória</label>
							<div class="col-md-4">
								<input id="musculatura" name="musculatura" type="text"
									placeholder="Musculatura Acessória" class="form-control input-md"
									value="{{ old('musculatura') }}">
									@if($errors->has('musculatura')) {!! $errors->first('musculatura', '<span class="help-block">:message</span>') !!} @endif
							</div>
						</div>	
						<!-- Text input-->
						<div class="form-group @if($errors->has('tosse')) {!! 'has-error' !!} @endif">
							<label class="col-md-4 control-label" for="tosse">Tosse Expectoração</label>
							<div class="col-md-4">
								<input id="tosse" name="tosse" type="text"
									placeholder="Tosse Expectoração" class="form-control input-md"
									value="{{ old('tosse') }}">
									@if($errors->has('tosse')) {!! $errors->first('tosse', '<span class="help-block">:message</span>') !!} @endif
							</div>
						</div>	 
						<!-- Text input-->
						<div class="form-group @if($errors->has('percussao')) {!! 'has-error' !!} @endif">
							<label class="col-md-4 control-label" for="percussao">Percussão</label>
							<div class="col-md-4">
								<input id="percussao" name="percussao" type="text"
									placeholder="Percussão" class="form-control input-md"
									value="{{ old('percussao') }}">
									@if($errors->has('percussao')) {!! $errors->first('percussao', '<span class="help-block">:message</span>') !!} @endif
							</div>
						</div>
						<!-- Text input-->
						<div class="form-group @if($errors->has('ausculta')) {!! 'has-error' !!} @endif">
							<label class="col-md-4 control-label" for="ausculta">Ausculta</label>
							<div class="col-md-4">
								<input id="ausculta" name="ausculta" type="text"
									placeholder="Ausculta" class="form-control input-md"
									value="{{ old('percussao') }}">
									@if($errors->has('percussao')) {!! $errors->first('percussao', '<span class="help-block">:message</span>') !!} @endif
							</div>
						</div>	     
					</div> <!-- End tab5 -->	
      				<div class="tab-pane" id="tab_6">  
						<!-- Text input-->
						<div class="form-group @if($errors->has('pa')) {!! 'has-error' !!} @endif">
							<label class="col-md-4 control-label" for="pa">PA</label>
							<div class="col-md-4">
								<input id="pa" name="pa" type="text"
									placeholder="PA" class="form-control input-md"
									value="{{ old('pa') }}">
									@if($errors->has('pa')) {!! $errors->first('pa', '<span class="help-block">:message</span>') !!} @endif
							</div>
						</div>	    
						<!-- Text input-->
						<div class="form-group @if($errors->has('fc')) {!! 'has-error' !!} @endif">
							<label class="col-md-4 control-label" for="fc">FC</label>
							<div class="col-md-4">
								<input id="fc" name="fc" type="number"
									placeholder="FC" class="form-control input-md"
									value="{{ old('fc') }}">
									@if($errors->has('fc')) {!! $errors->first('fc', '<span class="help-block">:message</span>') !!} @endif
							</div>
						</div>	
						<!-- Text input-->
						<div class="form-group @if($errors->has('fr')) {!! 'has-error' !!} @endif">
							<label class="col-md-4 control-label" for="fr">FR</label>
							<div class="col-md-4">
								<input id="fr" name="fr" type="text"
									placeholder="FR" class="form-control input-md"
									value="{{ old('fr') }}">
									@if($errors->has('fr')) {!! $errors->first('fr', '<span class="help-block">:message</span>') !!} @endif
							</div>
						</div>	     
						<!-- Text input-->
						<div class="form-group @if($errors->has('t')) {!! 'has-error' !!} @endif">
							<label class="col-md-4 control-label" for="t">T</label>
							<div class="col-md-4">
								<input id="t" name="t" type="number"
									placeholder="T" class="form-control input-md"
									value="{{ old('t') }}">
									@if($errors->has('t')) {!! $errors->first('t', '<span class="help-block">:message</span>') !!} @endif
							</div>
						</div>	  
						<!-- Text input-->
						<div class="form-group @if($errors->has('spo2')) {!! 'has-error' !!} @endif">
							<label class="col-md-4 control-label" for="spo2">spO2</label>
							<div class="col-md-4">
								<input id="spo2" name="spo2" type="number"
									placeholder="spO2" class="form-control input-md"
									value="{{ old('spo2') }}">
									@if($errors->has('spo2')) {!! $errors->first('spo2', '<span class="help-block">:message</span>') !!} @endif
							</div>
						</div>	  
						<!-- Text input-->
						<div class="form-group @if($errors->has('imc')) {!! 'has-error' !!} @endif">
							<label class="col-md-4 control-label" for="imc">IMC</label>
							<div class="col-md-4">
								<input id="imc" name="imc" type="number"
									placeholder="IMC" class="form-control input-md"
									value="{{ old('imc') }}">
									@if($errors->has('imc')) {!! $errors->first('imc', '<span class="help-block">:message</span>') !!} @endif
							</div>
						</div>	  
						<!-- Text input-->
						<div class="form-group @if($errors->has('inspecao')) {!! 'has-error' !!} @endif">
							<label class="col-md-4 control-label" for="imc">Inspeção</label>
							<div class="col-md-4">
								<input id="inspecao" name="inspecao" type="text"
									placeholder="Inspeção" class="form-control input-md"
									value="{{ old('inspecao') }}">
									@if($errors->has('inspecao')) {!! $errors->first('inspecao', '<span class="help-block">:message</span>') !!} @endif
							</div>
						</div>	    
					</div> <!-- End tab6 -->	
		
					<!-- Button -->
					<div class="form-group">
						<label class="col-md-4 control-label" for="cadastrarAnamnese"></label>
						<div class="col-md-4">
							<button type="submit" class="btn btn-success">Salvar</button>
							<a href="{{ URL::previous() }}" class="btn btn-default">Voltar</a>
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
