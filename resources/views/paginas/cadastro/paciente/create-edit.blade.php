@extends('layouts.master') @section('content')

<!-- Main content -->
<section class="content">
	<div class="box box-primary">
		<div class="box-header">
			<legend>Gerenciar Paciente</legend>
		</div>
		<div class="box-body">
			<!-- form start --> 
			@if(isset($paciente->id))
				<form class="form-horizontal" action="{{route('cadastro.paciente.update', $paciente->id)}}" method="post">
					<input type="hidden" name="_method" value="PUT"> 
			@else
				<form class="form-horizontal" action="{{route('cadastro.paciente.store')}}" method="post">
			@endif 
					<fieldset>  
				
						<div class="nav-tabs-custom">
	                		<ul class="nav nav-tabs">
	                  			<li class="active"><a href="#tab_1" data-toggle="tab">Informações Pessoais</a></li>
	                  			<li><a href="#tab_2" data-toggle="tab">Endereço</a></li> 
	                		</ul>
	                		<div class="tab-content">
	                  			<div class="tab-pane active" id="tab_1">  
									<!-- Text input-->
									<div class="form-group @if($errors->has('nome')) {!! 'has-error' !!} @endif">
										<label class="col-md-4 control-label" for="nome">Nome</label>
										<div class="col-md-4">
											<input id="nome" name="nome" type="text"
												placeholder="Nome completo" class="form-control input-md" 
												value="{{ old('nome',  isset($paciente->nome) ? $paciente->nome : null) }}">
												@if($errors->has('nome')) {!! $errors->first('nome', '<span class="help-block">:message</span>') !!} @endif
										</div>
									</div>
									<!-- Text input-->
									<div class="form-group @if($errors->has('profissao')) {!! 'has-error' !!} @endif">
										<label class="col-md-4 control-label" for="profissao">Profissão</label>
										<div class="col-md-4">
											<input id="profissao" name="profissao" type="text"
												placeholder="Profissão" class="form-control input-md" 
												value="{{ old('profissao',  isset($paciente->profissao) ? $paciente->profissao : null) }}">
												@if($errors->has('profissao')) {!! $errors->first('profissao', '<span class="help-block">:message</span>') !!} @endif
										</div>
									</div>
									<!-- Text input-->
									<div class="form-group @if($errors->has('telefone')) {!! 'has-error' !!} @endif">
										<label class="col-md-4 control-label" for="telefone">Telefone</label>
										<div class="col-md-4">
											<input id="telefone" name="telefone" type="number"
												placeholder="DDD + Número " class="form-control input-md"
												value="{{ old('telefone',  isset($paciente->telefone) ? $paciente->telefone : null) }}">
												@if($errors->has('telefone')) {!! $errors->first('telefone', '<span class="help-block">:message</span>') !!} @endif
										</div> 
									</div>	
									<!-- Text input-->
									<div class="form-group @if($errors->has('nascimento')) {!! 'has-error' !!} @endif">  
										<label class="col-md-4 control-label" for="nascimento">Data de
											nascimento</label>
										<div class="col-md-4">
											<input id="nascimento" name="nascimento" type="date"
												placeholder="dd/mm/aaaa" class="form-control input-md"
												value="{{ old('nascimento',  isset($paciente->nascimento) ? $paciente->nascimento : null) }}">
												@if($errors->has('nascimento')) {!! $errors->first('nascimento', '<span class="help-block">:message</span>') !!} @endif
										</div>
									</div>
									<!-- Text input-->
									<div class="form-group @if($errors->has('nacionalidade')) {!! 'has-error' !!} @endif">
										<label class="col-md-4 control-label" for="nacionalidade">Nacionalidade</label>
										<div class="col-md-4">
											<input id="nacionalidade" name="nacionalidade" type="text"
												placeholder="Nacionalidade" class="form-control input-md"
												value="{{ old('nacionalidade',  isset($paciente->nacionalidade) ? $paciente->nacionalidade : null) }}">
												@if($errors->has('nacionalidade')) {!! $errors->first('nacionalidade', '<span class="help-block">:message</span>') !!} @endif
										</div> 
									</div>	
									<!-- Text input-->
									<div class="form-group @if($errors->has('naturalidade')) {!! 'has-error' !!} @endif"> 
										<label class="col-md-4 control-label" for="naturalidade">Naturalidade</label>
										<div class="col-md-4">
											<input id="naturalidade" name="naturalidade" type="text"
												placeholder="Naturalidade" class="form-control input-md"
												value="{{ old('naturalidade',  isset($paciente->naturalidade) ? $paciente->naturalidade : null) }}">
												@if($errors->has('naturalidade')) {!! $errors->first('naturalidade', '<span class="help-block">:message</span>') !!} @endif
										</div>
									</div>  
			                  	</div><!-- /.tab-pane -->
			                  	
			                  	<div class="tab-pane" id="tab_2">  
									<!-- Text input-->
									<div class="form-group @if($errors->has('logradouro')) {!! 'has-error' !!} @endif"> 
										<label class="col-md-4 control-label" for="logradouro">Logradouro</label>
										<div class="col-md-4">
											<input id="logradouro" name="logradouro" type="text"
												placeholder="Logradouro" class="form-control input-md"
												value="{{ old('logradouro',  isset($paciente->logradouro) ? $paciente->logradouro : null) }}">
												@if($errors->has('Logradouro')) {!! $errors->first('Logradouro', '<span class="help-block">:message</span>') !!} @endif
										</div>
									</div>
									<!-- Text input-->
									<div class="form-group @if($errors->has('numero')) {!! 'has-error' !!} @endif">
										<label class="col-md-4 control-label" for="numero">Número</label>
										<div class="col-md-4">
											<input id="numero" name="numero" type="number" placeholder="Nº"
												class="form-control input-md"
												value="{{ old('numero',  isset($paciente->numero) ? $paciente->numero : null) }}">
												@if($errors->has('numero')) {!! $errors->first('numero', '<span class="help-block">:message</span>') !!} @endif
										</div> 
									</div> 
									<!-- Text input-->
									<div class="form-group @if($errors->has('cep')) {!! 'has-error' !!} @endif">
										<label class="col-md-4 control-label" for="cep">CEP</label>
										<div class="col-md-4">
											<input id="cep" name="cep" type="number" placeholder="CEP"
												class="form-control input-md"
												value="{{ old('cep',  isset($paciente->cep) ? $paciente->cep : null) }}">
												@if($errors->has('cep')) {!! $errors->first('cep', '<span class="help-block">:message</span>') !!} @endif
										</div>
									</div>
									<!-- Text input-->
									<div class="form-group @if($errors->has('bairro')) {!! 'has-error' !!} @endif">
										<label class="col-md-4 control-label" for="bairro">Bairro</label>
										<div class="col-md-4">
											<input id="bairro" name="bairro" type="text" placeholder="Bairro"
												class="form-control input-md"
												value="{{ old('bairro',  isset($paciente->bairro) ? $paciente->bairro : null) }}">
												@if($errors->has('bairro')) {!! $errors->first('bairro', '<span class="help-block">:message</span>') !!} @endif
										</div>  
									</div>	  
									<!-- Text input-->
									<div class="form-group @if($errors->has('cidade')) {!! 'has-error' !!} @endif">
										<label class="col-md-4 control-label" for="cidade">Cidade</label>
										<div class="col-md-4">
											<input id="cidade" name="cidade" type="text" placeholder="Cidade"
												class="form-control input-md"
												value="{{ old('cidade',  isset($paciente->cidade) ? $paciente->cidade : null) }}">
												@if($errors->has('cidade')) {!! $errors->first('cidade', '<span class="help-block">:message</span>') !!} @endif
										</div> 
									</div>	 
									<!-- Text input-->
									<div class="form-group @if($errors->has('estado')) {!! 'has-error' !!} @endif">
										<label class="col-md-4 control-label" for="estado">Estado</label>
										<div class="col-md-4">
											<input id="estado" name="estado" type="text" placeholder="Estado"
												class="form-control input-md"
												value="{{ old('estado',  isset($paciente->estado) ? $paciente->estado : null) }}">
												@if($errors->has('estado')) {!! $errors->first('estado', '<span class="help-block">:message</span>') !!} @endif
										</div>
									</div> 
			                  	</div><!-- /.tab-pane -->
								<!-- Button -->
								<div class="form-group">
									<label class="col-md-4 control-label" for="cadastrarAluno"></label>
									<div class="col-md-4">
										<button id="cadastrarAluno" name="cadastrarAluno"
											class="btn btn-primary">Salvar</button>
										<a href="{{ URL::previous() }}" class="btn btn-default">Voltar</a>
									</div>
								</div>  
	                		</div><!-- /.tab-content -->
	              		</div>  
					</fieldset>  
					{!! csrf_field() !!} 
				</form> 
		</div>
	</div>
	<!-- /.box -->
</section>
<!-- /.content -->


@endsection @section('additionalsJavascript') @endsection
