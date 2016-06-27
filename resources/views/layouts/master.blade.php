<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html>
<head>
    <meta charset="UTF-8">
    <title>{{ $page_title or "Sistema de Gestão para Clínica de Fisioterapia" }}</title>
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    <!-- Bootstrap 3.3.2 -->
    <link href="{{ asset('/bower_components/admin-lte/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" />
    <!-- Font Awesome Icons -->
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
    <!-- Ionicons -->
    <link href="http://code.ionicframework.com/ionicons/2.0.0/css/ionicons.min.css" rel="stylesheet" type="text/css" />
    <!-- Select2 -->
    <link href="{{ asset('/bower_components/admin-lte/plugins/select2/select2.min.css')}}" rel='stylesheet'>
    <!-- iCheck -->
    <link href="{{ asset('/bower_components/admin-lte/plugins/iCheck/all.css')}}" rel='stylesheet'>
    <!-- Sweet Alert -->
	<link rel="stylesheet" type="text/css" href="{{asset('node_modules/sweetalert/dist/sweetalert.css')}}">   
	<!-- Sweet Alert -->
	<script src="{{asset('node_modules/sweetalert/dist/sweetalert.min.js')}}"></script>
    <!-- fullCalendar 2.2.5-->  
	<link href="{{ asset('/bower_components/fullcalendar/dist/fullcalendar.min.css')}}" rel='stylesheet' />
	<link href="{{ asset('/bower_components/fullcalendar/dist/fullcalendar.print.css')}}" rel='stylesheet' media='print' />
	<link href="{{ asset('/bower_components/fullcalendar/dist/jquery-ui-custom/custom-theme/jquery-ui.min.css')}}" rel='stylesheet' />
	<link href="{{ asset('/bower_components/fullcalendar-scheduler/dist/scheduler.min.css')}}" rel='stylesheet' />
	<!-- Wysihtml5 --> 
	<link href="{{ asset('/bower_components/admin-lte/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css')}}" rel='stylesheet' />
    <!-- Theme style -->
    <link href="{{ asset('/bower_components/admin-lte/dist/css/AdminLTE.min.css')}}" rel="stylesheet" type="text/css" />
    <!-- AdminLTE Skins. We have chosen the skin-blue for this starter
          page. However, you can choose any other skin. Make sure you
          apply the skin class to the body tag so the changes take effect.
    -->
    <link href="{{ asset('/bower_components/admin-lte/dist/css/skins/skin-green.min.css')}}" rel="stylesheet" type="text/css" />
	
	 
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js'></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js'></script>
    <![endif]-->
</head>
<body class="skin-green sidebar-mini @if( Request::url() == url('agenda') ) sidebar-collapse @endif">
<div class="wrapper">

    <!-- Header -->
    @include('layouts/header')

    <!-- Sidebar -->
    @include('layouts/sidebar')
    

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                {{ $page_title or "Page Title" }}
                <small>{{ $page_description or null }}</small>
            </h1>
            <!-- You can dynamically generate breadcrumbs here -->
            <ol class="breadcrumb">
                <li><a href="{{ route('home.index') }}"><i class="fa fa-home"></i> Home</a></li>
                @if(isset($page_title) && $page_title != "Home") <li class="active">{{ $page_title or null }} </li>@endif
            </ol>
        </section>

        <!-- Main content -->
        <section class="content">
            <!-- Your Page Content Here -->
            @yield('content')
        </section><!-- /.content -->
    </div><!-- /.content-wrapper -->

    <!-- Footer -->
    @include('layouts/footer')

</div><!-- ./wrapper -->

<!-- REQUIRED JS SCRIPTS -->

<!-- jQuery 2.1.3 -->
<script src="{{ asset ('/bower_components/admin-lte/plugins/jQuery/jQuery-2.1.4.min.js') }}"></script>
<!-- Bootstrap 3.3.2 JS -->
<script src="{{ asset ('/bower_components/admin-lte/bootstrap/js/bootstrap.min.js') }}" type="text/javascript"></script>
<!-- AdminLTE App -->
<script src="{{ asset ('/bower_components/admin-lte/dist/js/app.min.js') }}" type="text/javascript"></script>
<!-- SlimScroll -->
<script src="{{asset('/bower_components/admin-lte/plugins/slimScroll/jquery.slimscroll.min.js')}}"></script>
<!-- FastClick -->
<script src="{{asset('/bower_components/admin-lte/plugins/fastclick/fastclick.min.js')}}"></script>
<!-- Redirect -->
<script src="{{asset('/bower_components/jquery.redirect/jquery.redirect.js')}}"></script>
<!-- Wysihtml5 --> 
<script src="{{asset('/bower_components/admin-lte/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js')}}"></script> 
<!-- Select2 -->
<script src="{{asset('/bower_components/admin-lte/plugins/select2/select2.full.min.js')}}"></script>
<script type="text/javascript">
	//Initialize Select2 Elements
	$(".select2").select2();
</script>
<!-- iCheck 1.0.1 -->
<script src="{{ asset('/bower_components/admin-lte/plugins/iCheck/icheck.min.js') }}"></script>
<script type="text/javascript">
//iCheck for checkbox and radio inputs
$('input[type="checkbox"].minimal, input[type="radio"].minimal').iCheck({
	checkboxClass: 'icheckbox_minimal-green',
    radioClass: 'iradio_minimal-green'
});  
</script>
@yield('additionalsJavascript')
</body>
</html>