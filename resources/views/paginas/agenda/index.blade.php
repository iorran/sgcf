@extends('layouts.master') @section('content') 
<!-- Main content -->
<section class="content">

	<!-- Default box -->
	<div class="box box-default">
		@include('sweet::alert')
		<div class="box-header"> 
			<table border="0" CELLPADDING=5 CELLSPACING=5" width="10%">
				<tr align="center"> 
					<td><h4>Legenda</h4></td> 
				</tr>
				<tr align="center"> 
					<td bgcolor="#00a65a" align="center"><font color="#FFF">Marcada</font></td> 
				</tr>
				<tr align="center"> 
					<td bgcolor="#BFC600" align="center"><font color="#FFF">Iniciada</font></td> 
				</tr>  
				<tr align="center">
					<td bgcolor="#018BC6" align="center"><font color="#FFF">Finalizada</font></td>  
				</tr> 
			</table>
			 
		</div>
		<!-- /.box-header -->
		<div class="box-body"> 
		 
			<div id="calendar"></div> 

		</div>
		<!-- /.box-body -->
	</div>
	<!-- /.box -->

</section>
<!-- /.content -->

@endsection 

@section('additionalsJavascript')
	@include('javascript.agenda.jquery') 
@endsection
