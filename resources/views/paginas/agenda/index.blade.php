@extends('layouts.master') @section('content') 
<!-- Main content -->
<section class="content">

	<!-- Default box -->
	<div class="box box-default">
		@include('sweet::alert')
		<div class="box-header"></div>
		<!-- /.box-header -->
		<div class="box-body">
			 
			<div id="calendar"></div> 

		</div>
		<!-- /.box-body -->
	</div>
	<!-- /.box -->

</section>
<!-- /.content -->

@endsection @section('additionalsJavascript')
@include('javascript.agenda.jquery') @endsection
