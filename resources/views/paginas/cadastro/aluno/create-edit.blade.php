@extends('layouts.master') @section('content')

<!-- Main content -->
<section class="content"> 
	<div class="box box-default"> 
		<div class="box-header"> 
		</div>
		<!-- form start --> 
		
		@if(isset($aluno->id))
			<form class="form-horizontal" action="{{route('cadastro.aluno.update', $aluno->id)}}" method="post">
				<input type="hidden" name="_method" value="PUT">
		@else
			<form class="form-horizontal" action="{{route('cadastro.aluno.store')}}" method="post">
		@endif
		
			<fieldset>

				<!-- Text input-->
				<div class="form-group @if($errors->has('matricula')) {!! 'has-error' !!} @endif">
					<label class="col-md-4 control-label" for="matricula">Matrícula</label>
					<div class="col-md-4">
						<input id="matricula" name="matricula" type="number"
							placeholder="Somente números(12 caracteres)" class="form-control input-md"
							value="{{ old('matricula',  isset($aluno->matricula) ? $aluno->matricula : null) }}">
							@if($errors->has('matricula')) {!! $errors->first('matricula', '<span class="help-block">:message</span>') !!} @endif
					</div>
				</div>

				<!-- Text input-->
				<div class="form-group @if($errors->has('nome')) {!! 'has-error' !!} @endif">
					<label class="col-md-4 control-label" for="nome">Nome</label>
					<div class="col-md-4">
						<input id="nome" name="nome" type="text"
							placeholder="Nome completo" class="form-control input-md"
							value="{{ old('nome',  isset($aluno->usuario->nome) ? $aluno->usuario->nome : null) }}">
							@if($errors->has('nome')) {!! $errors->first('nome', '<span class="help-block">:message</span>') !!} @endif
					</div>
				</div>

				<!-- Text input-->
				<div class="form-group @if($errors->has('email')) {!! 'has-error' !!} @endif">
					<label class="col-md-4 control-label" for="email">Email</label>
					<div class="col-md-4">
						<input id="email" name="email" type="text"
							placeholder="Email" class="form-control input-md"
							value="{{ old('email',  isset($aluno->usuario->email) ? $aluno->usuario->email : null) }}">
							@if($errors->has('email')) {!! $errors->first('email', '<span class="help-block">:message</span>') !!} @endif
					</div>
				</div>

				<!-- Text input-->
				<div class="form-group @if($errors->has('telefone')) {!! 'has-error' !!} @endif">
					<label class="col-md-4 control-label" for="telefone">Telefone</label>
					<div class="col-md-4">
						<input id="telefone" name="telefone" type="number"
							placeholder="DDD + Número " class="form-control input-md"
							value="{{ old('telefone',  isset($aluno->usuario->telefone) ? $aluno->usuario->telefone : null) }}">
							@if($errors->has('telefone')) {!! $errors->first('telefone', '<span class="help-block">:message</span>') !!} @endif
					</div>
				</div>
				
				@if(!isset($aluno->id))
					<!-- Password input-->
					<div class="form-group @if($errors->has('senha')) {!! 'has-error' !!} @endif">
						<label class="col-md-4 control-label" for="senha">Senha</label>
						<div class="col-md-4">
							<input id="senha" name="senha" type="password" placeholder="Senha"
								class="form-control input-md">
							@if($errors->has('senha')) {!! $errors->first('senha', '<span class="help-block">:message</span>') !!} @endif	
						</div>
					</div>
				
					<!-- Password input-->
					<div class="form-group @if($errors->has('senha')) {!! 'has-error' !!} @endif">
						<label class="col-md-4 control-label" for="senha_confirmation">Confirmação
							de senha</label>
						<div class="col-md-4">
							<input id="senha_confirmation" name="senha_confirmation" type="password"
								placeholder="Confirme a senha"
								class="form-control input-md"> 	
						</div>
					</div>
				@endif
		
				<!-- Button -->
				<div class="form-group">
					<label class="col-md-4 control-label" for="cadastrarAluno"></label>
					<div class="col-md-4">
						<button type="submit" id="cadastrarAluno" name="cadastrarAluno"
							class="btn btn-success">Salvar</button>
						<a href="{{ URL::previous() }}" class="btn btn-default">Voltar</a>
					</div>
				</div>
				
				{!! csrf_field() !!}

			</fieldset>
		</form>


	</div>
	<!-- /.box -->
</section>
<!-- /.content -->


@endsection @section('additionalsJavascript') @endsection
