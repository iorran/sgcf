@extends('layouts.master') @section('content')

<!-- Main content -->
<section class="content">
	<form class="form-horizontal" action="{{route('consulta.area.traumato.store')}}" method="post"> 
		<input type="hidden" name="agendamento_id" id="agendamento_id" value="{!! $agendamento_id !!}">
		<input type="hidden" name="paciente_id" id="paciente_id" value="{!! $paciente_id !!}"> 
		<fieldset>  
			<div class="nav-tabs-custom">
		    	<ul class="nav nav-tabs">
		        	<li class="active"><a href="#tab_1" data-toggle="tab">Informações Gerais</a></li> 
		   		</ul>
   				<div class="tab-content">
      				<div class="tab-pane active" id="tab_1">     
						<!-- Text input-->
						<div class="form-group @if($errors->has('analise_muscular')) {!! 'has-error' !!} @endif">
							<label class="col-md-4 control-label" for="analise_muscular">Análise Muscular</label>
							<div class="col-md-4">
								<input id="analise_muscular" name="analise_muscular" type="text"
									placeholder="Análise Muscular" class="form-control input-md"
									value="{{ old('analise_muscular') }}">
									@if($errors->has('analise_muscular')) {!! $errors->first('analise_muscular', '<span class="help-block">:message</span>') !!} @endif
							</div>
						</div>	  
						<!-- Text input-->
						<div class="form-group @if($errors->has('analise_articular')) {!! 'has-error' !!} @endif">
							<label class="col-md-4 control-label" for="analise_articular">Análise Articular</label>
							<div class="col-md-4">
								<input id="analise_articular" name="analise_articular" type="text"
									placeholder="Análise Articular" class="form-control input-md"
									value="{{ old('analise_articular') }}">
									@if($errors->has('analise_articular')) {!! $errors->first('analise_articular', '<span class="help-block">:message</span>') !!} @endif
							</div>
						</div>	
						<!-- Text input-->
						<div class="form-group @if($errors->has('perimetria')) {!! 'has-error' !!} @endif">
							<label class="col-md-4 control-label" for="perimetria">Perimetria</label>
							<div class="col-md-4">
								<input id="perimetria" name="perimetria" type="text"
									placeholder="Perimetria" class="form-control input-md"
									value="{{ old('perimetria') }}">
									@if($errors->has('perimetria')) {!! $errors->first('perimetria', '<span class="help-block">:message</span>') !!} @endif
							</div>
						</div>	 
						<!-- Text input-->
						<div class="form-group @if($errors->has('imobilizacao')) {!! 'has-error' !!} @endif">
							<label class="col-md-4 control-label" for="imobilizacao">Imobilização</label>
							<div class="col-md-4">
								<input id="Imobilização" name="imobilizacao" type="text"
									placeholder="imobilizacao" class="form-control input-md"
									value="{{ old('imobilizacao') }}">
									@if($errors->has('imobilizacao')) {!! $errors->first('imobilizacao', '<span class="help-block">:message</span>') !!} @endif
							</div>
						</div>	
						<!-- Text input-->
						<div class="form-group @if($errors->has('analise_de_edema')) {!! 'has-error' !!} @endif">
							<label class="col-md-4 control-label" for="analise_de_edema">Análise de Edema</label>
							<div class="col-md-4">
								<input id="analise_de_edema" name="analise_de_edema" type="text"
									placeholder="Análise de Edema" class="form-control input-md"
									value="{{ old('analise_de_edema') }}">
									@if($errors->has('analise_de_edema')) {!! $errors->first('analise_de_edema', '<span class="help-block">:message</span>') !!} @endif
							</div>
						</div>	 
						<!-- Text input-->
						<div class="form-group @if($errors->has('analise_de_dor')) {!! 'has-error' !!} @endif">
							<label class="col-md-4 control-label" for="analise_de_dor">Análise de dor</label>
							<div class="col-md-4">
								<input id="analise_de_dor" name="analise_de_dor" type="text"
									placeholder="Análise de dor" class="form-control input-md"
									value="{{ old('analise_de_dor') }}">
									@if($errors->has('analise_de_dor')) {!! $errors->first('analise_de_dor', '<span class="help-block">:message</span>') !!} @endif
							</div>
						</div>	 
						<!-- Text input-->
						<div class="form-group @if($errors->has('analise_de_cicatriz')) {!! 'has-error' !!} @endif">
							<label class="col-md-4 control-label" for="analise_de_cicatriz">Análise de cicatriz</label>
							<div class="col-md-4">
								<input id="analise_de_cicatriz" name="analise_de_cicatriz" type="text"
									placeholder="Análise de cicatriz" class="form-control input-md"
									value="{{ old('analise_de_cicatriz') }}">
									@if($errors->has('analise_de_cicatriz')) {!! $errors->first('analise_de_cicatriz', '<span class="help-block">:message</span>') !!} @endif
							</div>
						</div>	 
						<!-- Text input-->
						<div class="form-group @if($errors->has('analise_de_crepitacao')) {!! 'has-error' !!} @endif">
							<label class="col-md-4 control-label" for="analise_de_crepitacao">Análise de Crepitação</label>
							<div class="col-md-4">
								<input id="analise_de_crepitacao" name="analise_de_crepitacao" type="text"
									placeholder="Análise de crepitação" class="form-control input-md"
									value="{{ old('analise_de_crepitacao') }}">
									@if($errors->has('analise_de_crepitacao')) {!! $errors->first('analise_de_crepitacao', '<span class="help-block">:message</span>') !!} @endif
							</div>
						</div>	 
						<!-- Text input-->
						<div class="form-group @if($errors->has('analise_de_marcha')) {!! 'has-error' !!} @endif">
							<label class="col-md-4 control-label" for="analise_de_marcha">Análise de marcha</label>
							<div class="col-md-4">
								<input id="analise_de_marcha" name="analise_de_marcha" type="text"
									placeholder="Análise de marcha" class="form-control input-md"
									value="{{ old('analise_de_marcha') }}">
									@if($errors->has('analise_de_marcha')) {!! $errors->first('analise_de_marcha', '<span class="help-block">:message</span>') !!} @endif
							</div>
						</div>	    
						<!-- Text Area-->
						<div class="form-group @if($errors->has('testes_especificos')) {!! 'has-error' !!} @endif">
							<label class="col-md-4 control-label" for="testes_especificos">Testes específicos</label>
							<div class="col-md-6">
								<textarea class="textarea form-control input-md" placeholder="Testes específicos" id="testes_especificos" name="testes_especificos">
									{{ old('testes_especificos',  isset($area_traumato->testes_especificos) ? $area_traumato->testes_especificos : null) }}
								</textarea>
								@if($errors->has('testes_especificos')) {!! $errors->first('testes_especificos', '<span class="help-block">:message</span>') !!} @endif						
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
						<!-- Text Area-->
						<div class="form-group @if($errors->has('objetivos_do_tratamento')) {!! 'has-error' !!} @endif">
							<label class="col-md-4 control-label" for="objetivos_do_tratamento">Objetivos do tratamento</label>
							<div class="col-md-6">
								<textarea class="textarea form-control input-md" placeholder="Objetivos do tratamento" id="objetivos_do_tratamento" name="objetivos_do_tratamento">
									{{ old('objetivos_do_tratamento',  isset($area_traumato->objetivos_do_tratamento) ? $area_traumato->objetivos_do_tratamento : null) }}
								</textarea>
								@if($errors->has('objetivos_do_tratamento')) {!! $errors->first('objetivos_do_tratamento', '<span class="help-block">:message</span>') !!} @endif						
				        	</div>
						</div>
						<!-- Text Area-->
						<div class="form-group @if($errors->has('conduta_fisioterapeutica')) {!! 'has-error' !!} @endif">
							<label class="col-md-4 control-label" for="conduta_fisioterapeutica">Conduta fisioterapêutica</label>
							<div class="col-md-6">
								<textarea class="textarea form-control input-md" placeholder="Conduta fisioterapêutica" id="conduta_fisioterapeutica" name="conduta_fisioterapeutica">
									{{ old('conduta_fisioterapeutica',  isset($area_traumato->conduta_fisioterapeutica) ? $area_traumato->conduta_fisioterapeutica : null) }}
								</textarea>
								@if($errors->has('conduta_fisioterapeutica')) {!! $errors->first('conduta_fisioterapeutica', '<span class="help-block">:message</span>') !!} @endif						
				        	</div>
						</div>
					</div> <!-- End tab1 -->	
					 
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
