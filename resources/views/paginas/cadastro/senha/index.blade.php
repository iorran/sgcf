@extends('layouts.master') @section('content')

<!-- Main content -->
<section class="content"> 
	<div class="box box-default"> 
		<div class="box-header"> 
		</div>
		<!-- form start -->  
		<form class="form-horizontal" action="{{route('update.senha', $id)}}" method="post">
			<input type="hidden" name="_method" value="PUT"> 
			<fieldset>  
				
				<!-- Text input-->
				<div class="form-group @if($errors->has('senha_atual')) {!! 'has-error' !!} @endif">
					<label class="col-md-4 control-label" for="senha_atual">Senha Atual</label>
					<div class="col-md-4">
						<input required id="senha_atual" name="senha_atual" type="password"
							placeholder="Senha Antiga" class="form-control input-md" value="{{ old('senha_atual') }}">
							@if($errors->has('senha_atual')) {!! $errors->first('senha_atual', '<span class="help-block">:message</span>') !!} @endif
					</div>
				</div>

				<!-- Password input-->
				<div class="form-group @if($errors->has('senha')) {!! 'has-error' !!} @endif">
					<label class="col-md-4 control-label" for="senha">Senha</label>
					<div class="col-md-4">
						<input required id="senha" name="senha" type="password" placeholder="Senha"
							class="form-control input-md">
						@if($errors->has('senha')) {!! $errors->first('senha', '<span class="help-block">:message</span>') !!} @endif	
					</div>
				</div>
			
				<!-- Password input-->
				<div class="form-group @if($errors->has('senha')) {!! 'has-error' !!} @endif">
					<label class="col-md-4 control-label" for="senha_confirmation">Confirmação
						de senha</label>
					<div class="col-md-4">
						<input required id="senha_confirmation" name="senha_confirmation" type="password"
							placeholder="Confirme a senha"
							class="form-control input-md"> 	
					</div>
				</div>
		
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
