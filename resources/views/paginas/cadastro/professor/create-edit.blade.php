@extends('layouts.master') @section('content')

<!-- Main content -->
<section class="content"> 
	<div class="box box-default">
		<div class="box-header"> 
		</div>
		<!-- form start --> 
		
		@if(isset($professor->id))
			<form class="form-horizontal" action="{{route('cadastro.professor.update', $professor->id)}}" method="post">
				<input type="hidden" name="_method" value="PUT">
		@else
			<form class="form-horizontal" action="{{route('cadastro.professor.store')}}" method="post">
		@endif
		
			<fieldset>

				<!-- Text input-->
				<div class="form-group @if($errors->has('login')) {!! 'has-error' !!} @endif">
					<label class="col-md-4 control-label" for="login">Login</label>
					<div class="col-md-4">
						<input id="login" name="login" type="text"
							placeholder="Login de acesso" class="form-control input-md"
							value="{{ old('login',  isset($professor->login) ? $professor->login : null) }}">
							@if($errors->has('login')) {!! $errors->first('login', '<span class="help-block">:message</span>') !!} @endif
					</div>
				</div>

				<!-- Text input-->
				<div class="form-group @if($errors->has('nome')) {!! 'has-error' !!} @endif">
					<label class="col-md-4 control-label" for="nome">Nome</label>
					<div class="col-md-4">
						<input id="nome" name="nome" type="text"
							placeholder="Nome completo" class="form-control input-md"
							value="{{ old('nome',  isset($professor->usuario->nome) ? $professor->usuario->nome : null) }}">
							@if($errors->has('nome')) {!! $errors->first('nome', '<span class="help-block">:message</span>') !!} @endif
					</div>
				</div>

				<!-- Text input-->
				<div class="form-group @if($errors->has('email')) {!! 'has-error' !!} @endif">
					<label class="col-md-4 control-label" for="email">Email</label>
					<div class="col-md-4">
						<input id="email" name="email" type="text"
							placeholder="Email" class="form-control input-md"
							value="{{ old('email',  isset($professor->usuario->email) ? $professor->usuario->email : null) }}">
							@if($errors->has('email')) {!! $errors->first('email', '<span class="help-block">:message</span>') !!} @endif
					</div>
				</div>

				<!-- Text input-->
				<div class="form-group">
					<label class="col-md-4 control-label" for="crefito">Crefito</label>
					<div class="col-md-4">
						<input id="crefito" name="crefito" type="text"
							placeholder="Crefito" class="form-control input-md"
							value="{{ old('crefito',  isset($professor->crefito) ? $professor->crefito : null) }}">
							@if($errors->has('crefito')) {!! $errors->first('crefito', '<span class="help-block">:message</span>') !!} @endif
					</div>
				</div>
				
				@if(!isset($professor->id))
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
						<label class="col-md-4 control-label" for="confSenha">Confirmação
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
					<label class="col-md-4 control-label" for="cadastrarProfessor"></label>
					<div class="col-md-4">
						<button id="cadastrarProfessor" name="cadastrarProfessor"
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
