<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<title>SGCF | Sistema de Gestão para Clínica de Fisioterapia</title>
<!-- Tell the browser to be responsive to screen width -->
<meta
	content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no"
	name="viewport">
<!-- Bootstrap 3.3.5 -->
<link rel="stylesheet"
	href="{{asset('adminLTE/bootstrap/css/bootstrap.min.css')}}">
<!-- Font Awesome -->
<link rel="stylesheet"
	href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
<!-- Ionicons -->
<link rel="stylesheet"
	href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
<!-- Theme style -->
<link rel="stylesheet"
	href="{{asset('adminLTE/dist/css/AdminLTE.min.css')}}">
<!-- AdminLTE Skins. Choose a skin from the css/skins
	         folder instead of downloading all of them to reduce the load. -->
<link rel="stylesheet"
	href="{{asset('adminLTE/dist/css/skins/_all-skins.min.css')}}">
<!-- Sweet Alert -->
<link rel="stylesheet" type="text/css"
	href="{{asset('adminLTE/plugins/sweetAlert/dist/sweetalert.css')}}">
<!-- Sweet Alert -->
<script
	src="{{asset('adminLTE/plugins/sweetAlert/dist/sweetalert.min.js')}}"></script>

<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>
	        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
	        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
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
												<label class=""> <a href="#">Esquecu a senha ?</a></label>
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

	<footer class="footer">
		<div class="container">
			<p class="text-muted">
				<strong>Copyright &copy; 2016 <a href="http://sgcf.dev">SGCF</a>.
				</strong> All rights reserved.
			</p>
		</div>
	</footer>

</body>
</html>
