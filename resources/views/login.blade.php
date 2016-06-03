<!DOCTYPE html>
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
    <!-- Theme style -->
    <link href="{{ asset('/bower_components/admin-lte/dist/css/AdminLTE.min.css')}}" rel="stylesheet" type="text/css" />
    <!-- AdminLTE Skins. We have chosen the skin-blue for this starter
          page. However, you can choose any other skin. Make sure you
          apply the skin class to the body tag so the changes take effect.
    -->
    <link href="{{ asset('/bower_components/admin-lte/dist/css/skins/_all-skins.min.css')}}" rel="stylesheet" type="text/css" />
	<!-- Sweet Alert -->
	<link rel="stylesheet" type="text/css" href="{{asset('node_modules/sweetalert/dist/sweetalert.css')}}">   
	<!-- Sweet Alert -->
	<script src="{{asset('node_modules/sweetalert/dist/sweetalert.min.js')}}"></script>
	    
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js'></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js'></script>
    <![endif]-->
<style type="text/css">
/* Sticky footer styles
-------------------------------------------------- */
html {
	position: relative;
	min-height: 100%;
}

body {
	/* Margin bottom by footer height */
	margin-bottom: 60px;
}

.footer {
	position: absolute;
	bottom: 0;
	width: 100%;
	/* Set the fixed height of the footer here */
	height: 60px;
	background-color: #f5f5f5;
}

/* Custom page CSS
-------------------------------------------------- */
/* Not required for template or sticky footer method. */
.container {
	width: auto;
	max-width: 680px;
	padding: 0 15px;
}

.container .text-muted {
	margin: 20px 0;
}
</style>
</head>
<body class="skin-green fixed">

	<div id="container">
		<!-- Static navbar -->
		<nav class="navbar navbar-default ">
			<div class="container-fluid">
				<div class="navbar-header">
					<button type="button" class="navbar-toggle collapsed"
						data-toggle="collapse" data-target="#navbar" aria-expanded="false"
						aria-controls="navbar">
						<span class="sr-only">Toggle navigation</span> <span
							class="icon-bar"></span> <span class="icon-bar"></span> <span
							class="icon-bar"></span>
					</button>
					<a class="navbar-brand" href="#"><b>SGCF</b> - Sistema de Gestão
						para Clínica de Fisioterapia</a>
					<!--/.nav-collapse -->
				</div>
				<!--/.container-fluid -->
				<ul class="nav navbar-nav navbar-right">
	              <li class="active"><a href="{{ route('home.index') }}">Home</a></li> 
	            </ul>
			</div> 
		</nav>
		<div id="content">
			<div class="container-fluid">
				<div class="row">
					<div class="col-sm-offset-4 col-sm-4">
						<div class="panel panel-default">
							<div class="panel-heading">
								<h1 class="panel-title">
									<i class="fa fa-lock"></i> Entre com sua credencial
								</h1>
							</div>
							<div class="panel-body">
								<!-- Mensagem de erro -->
								@unless($errors->isEmpty())
								<div class="alert alert-danger alert-dismissable">
									<button type="button" class="close" data-dismiss="alert"
										aria-hidden="true">×</button>
									@foreach($errors->getMessages() as $error)
									<p>{{ $error[0] }}</p>
									@endforeach
								</div>
								@endunless
								<form action="{{ route('login.autenticar') }}" method="post">
									<div class="form-group">
										<label for="input-username">Usuário</label>
										<div class="input-group">
											<span class="input-group-addon"><i class="fa fa-user"></i></span>
											<input type="text" name="identificacao" id="identificacao"
												value="{{ old('identificacao') }}"
												placeholder="Login ou matricula" class="form-control" />
										</div>
									</div>
									<div class="form-group">
										<label for="input-password">Senha</label>
										<div class="input-group">
											<span class="input-group-addon"><i class="fa fa-lock"></i></span>
											<input type="password" name="senha" placeholder="Senha"
												id="senha" class="form-control" />
										</div>
									</div>

									<div class="row">

										<div class="col-xs-8">
											<div class="checkbox icheck"> 
												<a href="" data-toggle="modal" data-target="#myModal">Esqueceu a senha ?</a> 
											</div>
										</div>

										<div class="col-xs-4">
											<button type="submit" class="btn btn-success btn-block">Entrar</button>
										</div>
										<!-- /.col -->

									</div>
									{!! csrf_field() !!}
								</form>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	
	<!-- Modal -->
	<div id="myModal" class="modal fade" role="dialog">
	  <div class="modal-dialog">
	
	    <!-- Modal content-->
	    <div class="modal-content">
	      <div class="modal-header">
	        <button type="button" class="close" data-dismiss="modal">&times;</button>
	        <h4 class="modal-title">Recuperar senha</h4>
	      </div>
		  <form action="{{ route('login.recuperar') }}" method="post">
	      	<div class="modal-body">
				
				<div class="form-group">
					<label for="input-username">Email</label>
					<div class="input-group">
						<span class="input-group-addon"><i class="fa fa-user"></i></span>
						<input type="email" name="email" id="email"
							value="{{ old('email') }}"
							placeholder="Email" class="form-control" />
					</div>
				</div>
	      
	      	</div>
			{!! csrf_field() !!}
		      <div class="modal-footer">
		        <button type="submit" class="btn btn-success">Enviar</button>
		        <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
		      </div>
		  </form>
	    </div>
	
	  </div>
	</div>
	
	<footer class="footer">
		<div class="container">
			<p class="text-muted">
				<strong>Copyright &copy; 2016 <a href="http://sgcf.dev">SGCF</a>.
				</strong> All rights reserved.
			</p>
		</div>
	</footer>
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
</body>
</html>
