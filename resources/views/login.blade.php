<!DOCTYPE html>
<html>
	<head>
	    <meta charset="utf-8">
	    <meta http-equiv="X-UA-Compatible" content="IE=edge">
	    <title>SGCF | Sistema de Gestão para Clínica de Fisioterapia</title>
	    <!-- Tell the browser to be responsive to screen width -->
	    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
	    <!-- Bootstrap 3.3.5 -->
	    <link rel="stylesheet" href="{{asset('adminLTE/bootstrap/css/bootstrap.min.css')}}">
	    <!-- Font Awesome -->
	    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
	    <!-- Ionicons -->
	    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
	    <!-- Theme style -->
	    <link rel="stylesheet" href="{{asset('adminLTE/dist/css/AdminLTE.min.css')}}">
	    <!-- AdminLTE Skins. Choose a skin from the css/skins
	         folder instead of downloading all of them to reduce the load. -->
	    <link rel="stylesheet" href="{{asset('adminLTE/dist/css/skins/_all-skins.min.css')}}">
	    <!-- Sweet Alert -->
	    <link rel="stylesheet" type="text/css" href="{{asset('adminLTE/plugins/sweetAlert/dist/sweetalert.css')}}">   
	    <!-- Sweet Alert -->
	    <script src="{{asset('adminLTE/plugins/sweetAlert/dist/sweetalert.min.js')}}"></script>
	
	    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
	    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	    <!--[if lt IE 9]>
	        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
	        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    	<![endif]-->
  	</head>
  	<body class="hold-transition login-page">
    	<div class="login-box">
      		<div class="login-logo"> 
        		<a href="{{ url('/') }}"><b>SGCF</b></a>
      		</div><!-- /.login-logo -->
	      	<div class="login-box-body">
    			@include('sweet::alert') 
	        	<p class="login-box-msg">Sistema de Gestão para Clínica de Fisioterapia</p>
	        	<form action="{{ route('login.autenticar') }}" method="post">
	          		<div class="form-group has-feedback">
	            		<input type="text" class="form-control" name="identificacao" id="identificacao" placeholder="Digite a matricula ou login" value="{{ old('identificacao') }}">
	            		<span class="glyphicon glyphicon-user form-control-feedback"></span>
	          		</div>
	          		<div class="form-group has-feedback">
	            		<input type="password" class="form-control" name="senha" id="senha" placeholder="Digite a senha">
	            		<span class="glyphicon glyphicon-lock form-control-feedback"></span>
	          		</div>
	          		<div class="row">
		
						<div class="col-xs-8">
	              			<div class="checkbox icheck">
	                			<label class="">
	                  			<a href="#">Esquecu a senha ?</a></label>
	              			</div>
	            		</div>
	
	            		<div class="col-xs-4">
	              			<button type="submit" class="btn btn-primary btn-block btn-flat">Entrar</button>
	            		</div><!-- /.col -->
	            		
						{!! csrf_field() !!}
	          		</div>
	        	</form>  
	
	      	</div><!-- /.login-box-body -->
    	</div><!-- /.login-box --> 
	</body>
</html>
