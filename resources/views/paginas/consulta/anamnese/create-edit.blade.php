@extends('layouts.master') @section('content')

<!-- Main content -->
<section class="content"> 
	<div class="box box-default"> 
		<div class="box-header"> 
		</div>
		<!-- form start -->   
		@if( isset($anamnese) && $anamnese->agendamento_id == $agendamento_id ) 
		<form class="form-horizontal" action="{{route('consulta.anamnese.update', $anamnese->id ) }}" method="post"> 
			<input type="hidden" name="_method" value="PUT">
		@else 
		<form class="form-horizontal" action="{{route('consulta.anamnese.store')}}" method="post"> 
		@endif 
			<fieldset>
				<input type="hidden" name="agendamento_id" id="agendamento_id" value="{!! $agendamento_id !!}">
				<input type="hidden" name="paciente_id" id="paciente_id" value="{!! $paciente_id !!}">
		  		  
				<!-- Select input-->
				<div class="form-group @if($errors->has('area_funcional')) {!! 'has-error' !!} @endif">
					<label class="col-md-4 control-label" for="area_funcional">Área Funcional</label>
					<div class="col-md-4"> 
						<select required id="area_funcional" name="area_funcional" class="form-control select2"  style="width: 100%;">
							<option value="">Selecione a área funcional</option>
							@forelse($areas_funcionais as $area_key => $area_value) 
							<option value="{!!  $area_key !!}" @if(isset($anamnese->area_funcional)) @if($anamnese->area_funcional == $area_key) selected @endif @endif>
								{!!  $area_value !!}
							</option>
							@empty 
							<option value="">Problemas ao carregar as áreas funcionais.</option>
							@endforelse
						</select>  
					</div>
				</div>
				
				<!-- Text input-->
				<div class="form-group @if($errors->has('QP')) {!! 'has-error' !!} @endif">
					<label class="col-md-4 control-label" for="QP">QP</label>
					<div class="col-md-4">
						<input id="QP" name="QP" type="text"
							placeholder="QP" class="form-control input-md"
							value="{{ old('QP',  isset($anamnese->QP) ? $anamnese->QP : null) }}">
							@if($errors->has('QP')) {!! $errors->first('QP', '<span class="help-block">:message</span>') !!} @endif
					</div>
				</div>

				<!-- Text input-->
				<div class="form-group @if($errors->has('HDA')) {!! 'has-error' !!} @endif">
					<label class="col-md-4 control-label" for="HDA">HDA</label>
					<div class="col-md-4">
						<input id="HDA" name="HDA" type="text"
							placeholder="HDA" class="form-control input-md"
							value="{{ old('HDA',  isset($anamnese->HDA) ? $anamnese->HDA : null) }}">
							@if($errors->has('HDA')) {!! $errors->first('HDA', '<span class="help-block">:message</span>') !!} @endif
					</div>
				</div>

				<!-- Text input-->
				<div class="form-group @if($errors->has('HPP')) {!! 'has-error' !!} @endif">
					<label class="col-md-4 control-label" for="HPP">HPP</label>
					<div class="col-md-4">
						<input id="HPP" name="HPP" type="text"
							placeholder="HPP" class="form-control input-md"
							value="{{ old('HPP',  isset($anamnese->HPP) ? $anamnese->HPP : null) }}">
							@if($errors->has('HPP')) {!! $errors->first('HPP', '<span class="help-block">:message</span>') !!} @endif
					</div>
				</div>

				<!-- Text input-->
				<div class="form-group @if($errors->has('HS')) {!! 'has-error' !!} @endif">
					<label class="col-md-4 control-label" for="HS">HS</label>
					<div class="col-md-4">
						<input id="HS" name="HS" type="text"
							placeholder="HS" class="form-control input-md"
							value="{{ old('HS',  isset($anamnese->HS) ? $anamnese->HS : null) }}">
							@if($errors->has('HS')) {!! $errors->first('HS', '<span class="help-block">:message</span>') !!} @endif
					</div>
				</div>

				<!-- Text input-->
				<div class="form-group @if($errors->has('HFAM')) {!! 'has-error' !!} @endif">
					<label class="col-md-4 control-label" for="HFAM">HFAM</label>
					<div class="col-md-4">
						<input id="HFAM" name="HFAM" type="text"
							placeholder="HFAM" class="form-control input-md"
							value="{{ old('HFAM',  isset($anamnese->HFAM) ? $anamnese->HFAM : null) }}">
							@if($errors->has('HFAM')) {!! $errors->first('HFAM', '<span class="help-block">:message</span>') !!} @endif
					</div>
				</div>

				<!-- Text input-->
				<div class="form-group @if($errors->has('AVDS')) {!! 'has-error' !!} @endif">
					<label class="col-md-4 control-label" for="AVDS">AVDS</label>
					<div class="col-md-4">
						<input id="AVDS" name="AVDS" type="text"
							placeholder="AVDS" class="form-control input-md"
							value="{{ old('AVDS',  isset($anamnese->AVDS) ? $anamnese->AVDS : null) }}">
							@if($errors->has('AVDS')) {!! $errors->first('AVDS', '<span class="help-block">:message</span>') !!} @endif
					</div>
				</div>

				<!-- Text Area-->
				<div class="form-group @if($errors->has('medicamentos')) {!! 'has-error' !!} @endif">
					<label class="col-md-4 control-label" for="medicamentos">Medicamentos</label>
					<div class="col-md-6"> 
						<textarea class="textarea form-control input-md" placeholder="Medicamentos" id="medicamentos" name="medicamentos">
							{{ old('medicamentos',  isset($anamnese->medicamentos) ? $anamnese->medicamentos : null) }}
						</textarea>
						@if($errors->has('medicamentos')) {!! $errors->first('medicamentos', '<span class="help-block">:message</span>') !!} @endif						
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
				   
				<!-- Button -->
				<div class="form-group">
					<label class="col-md-4 control-label" for="cadastrarAnamnese"></label>
					<div class="col-md-4">
						<button type="submit" id="cadastrarAnamnese" name="cadastrarAnamnese"
							class="btn btn-success">Salvar</button>
						<a href="{!! url('consulta/detalhes/'.$agendamento_id) !!}" class="btn btn-default">Voltar</a>
					</div>
				</div>
				
				{!! csrf_field() !!}

			</fieldset>
		</form>


	</div>
	<!-- /.box -->
</section>
<!-- /.content -->


@endsection 
@section('additionalsJavascript')  
	@include('javascript.consulta.anamnese.jquery')
@endsection
