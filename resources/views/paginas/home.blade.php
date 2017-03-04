@extends('layouts.master') @section('content')
<!-- Main content -->
<section class="content">
	
	<!-- Default box -->
	<div class="box box-default"> 
    	@include('sweet::alert') 
		<div class="box-header">
			<legend>Bem vindo, {!! Session('usuario.0.nome') !!}</legend> 
		</div>
		<!-- /.box-header -->
		<div class="box-body" align="center">   
			 <!-- HTML AQUI -->
			 <p>
							 A Clínica Escola Fisiocabofrio está vinculada ao curso de Fisioterapia, e tem por objetivo
				
				promover a prática do estágio supervisionado, com atendimento em diversas áreas da
				
				Fisioterapia. A prática do estágio demanda que o aluno-estagiário realize avaliações, evoluções
				
				dos casos em atendimento, traçar condutas fisioterapêuticas e suas intervenções.
				
				Inaugurada no início de 2008, está localizada nas dependências da Universidade
				
				Estácio de Sá, campus Cabo Frio, atendendo a este município e aos circunvizinhos.
			</p>
			<p>
				Missões
			</p>
				
			<p>
				Prestar assistência qualificada e gratuita a todo e qualquer cidadão dentro dos
				
				princípios do Sistema Único de Saúde, de forma articulada com a rede de saúde.
				
				Formar e qualificar profissionais de saúde, desenvolvendo pesquisas cientifica e assim
				
				contribuindo para o crescimento desta área.
				
			</p>
			
			<p>
				
				Divulgar o conhecimento produzido, tornando-o acessível a todos.
			</p>
			
			<br><br>
			 <img alt="Logo" src="{!! asset('images/LOGO_Fisioterapia.jpg') !!}" width="350" height="350"> 
			 
		</div>
		<!-- /.box-body -->
	</div>
	<!-- /.box -->

</section>
<!-- /.content -->

@endsection

@section('additionalsJavascript') 
@endsection
