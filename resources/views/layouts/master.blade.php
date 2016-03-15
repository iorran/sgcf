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
  	<body class="hold-transition skin-green fixed">
    	<!-- Site wrapper -->
    	<div class="wrapper">

      		<header class="main-header">
        		<!-- Logo -->
        		<a href="{{url('')}}" class="logo">
	          		<!-- mini logo for sidebar mini 50x50 pixels -->
			        	<span class="logo-mini"><b>SGCF </b>| Sistema de Gestão para Clínica de Fisioterapia</span>
			          	<!-- logo for regular state and mobile devices -->
			          	<span class="logo-lg"><b>SGCF</b></span>
        		</a>
        		<!-- Header Navbar: style can be found in header.less -->
        		<nav class="navbar navbar-static-top" role="navigation">
          			<!-- Sidebar toggle button-->
          			<a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
            			<span class="sr-only">Toggle navigation</span>
		            	<span class="icon-bar"></span>
			            <span class="icon-bar"></span>
			            <span class="icon-bar"></span>
          			</a>
		          	<span style="font-size: 20px;
				    	line-height: 50px;
					    color:white;	
					    font-family: "Helvetica Neue",Helvetica,Arial,sans-serif;
					    padding: 0 15px;
					    font-weight: 300;">
		            	Sistema de Gestão para Clínica de Fisioterapia
	          		</span>
          			<div class="navbar-custom-menu">
            			<ul class="nav navbar-nav">
			            	<!-- User Account: style can be found in dropdown.less -->
			              	<li class="dropdown user user-menu">
				                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
				              		<i class="fa fa-gears"></i>
				                </a>
				                <ul class="dropdown-menu">
				                	<!-- User image -->
				                  	<li class="user-header">
	                    				<p> 
					                    	{!! Session('usuario.0.nome') !!} 
	                    				</p>
	                  				</li>
	                  				<!-- Menu Footer-->
	                  				<li class="user-footer">
	                      				<a href="{{route('login.sair')}}" class="btn btn-default btn-flat">Sair</a>
	                  				</li>
	                			</ul>
	              			</li>
            			</ul>
          			</div>
        		</nav>
      		</header>

      		<!-- =============================================== -->

      		<!-- Left side column. contains the sidebar -->
      		<aside class="main-sidebar">
        		<!-- sidebar: style can be found in sidebar.less -->
        		<section class="sidebar">
          			<!-- sidebar menu: : style can be found in sidebar.less -->
          			<ul class="sidebar-menu">
            			<li class="header">MENU</li>
            			<li class="treeview">
              				<a href="#">
                			<i class="fa fa-dashboard"></i> <span>Cadastros</span> <i class="fa fa-angle-left pull-right"></i>
              			</a>
              			<ul class="treeview-menu">
                			<li><a href="{{route('cadastro.aluno.index')}}"><i class="fa fa-circle-o"></i> Alunos </a></li>
                			<li><a href="{{route('cadastro.paciente.index')}}"><i class="fa fa-circle-o"></i> Pacientes </a></li>
                			<li><a href="{{route('cadastro.professor.index')}}"><i class="fa fa-circle-o"></i> Professores </a></li>
              			</ul>
            		</li>
            		<!--  
				            <li class="treeview">
				              <a href="#">
				                <i class="fa fa-files-o"></i>
				                <span>Layout Options</span>
				                <span class="label label-primary pull-right">4</span>
				              </a>
				              <ul class="treeview-menu">
				                <li><a href="../layout/top-nav.html"><i class="fa fa-circle-o"></i> Top Navigation</a></li>
				                <li><a href="../layout/boxed.html"><i class="fa fa-circle-o"></i> Boxed</a></li>
				                <li><a href="../layout/fixed.html"><i class="fa fa-circle-o"></i> Fixed</a></li>
				                <li><a href="../layout/collapsed-sidebar.html"><i class="fa fa-circle-o"></i> Collapsed Sidebar</a></li>
				              </ul>
				            </li>
				            <li>
				              <a href="../widgets.html">
				                <i class="fa fa-th"></i> <span>Widgets</span> <small class="label pull-right bg-green">Hot</small>
				              </a>
				            </li>
				            <li class="treeview">
				              <a href="#">
				                <i class="fa fa-pie-chart"></i>
				                <span>Charts</span>
				                <i class="fa fa-angle-left pull-right"></i>
				              </a>
				              <ul class="treeview-menu">
				                <li><a href="../charts/chartjs.html"><i class="fa fa-circle-o"></i> ChartJS</a></li>
				                <li><a href="../charts/morris.html"><i class="fa fa-circle-o"></i> Morris</a></li>
				                <li><a href="../charts/flot.html"><i class="fa fa-circle-o"></i> Flot</a></li>
				                <li><a href="../charts/inline.html"><i class="fa fa-circle-o"></i> Inline charts</a></li>
				              </ul>
				            </li>
				            <li class="treeview">
				              <a href="#">
				                <i class="fa fa-laptop"></i>
				                <span>UI Elements</span>
				                <i class="fa fa-angle-left pull-right"></i>
				              </a>
				              <ul class="treeview-menu">
				                <li><a href="../UI/general.html"><i class="fa fa-circle-o"></i> General</a></li>
				                <li><a href="../UI/icons.html"><i class="fa fa-circle-o"></i> Icons</a></li>
				                <li><a href="../UI/buttons.html"><i class="fa fa-circle-o"></i> Buttons</a></li>
				                <li><a href="../UI/sliders.html"><i class="fa fa-circle-o"></i> Sliders</a></li>
				                <li><a href="../UI/timeline.html"><i class="fa fa-circle-o"></i> Timeline</a></li>
				                <li><a href="../UI/modals.html"><i class="fa fa-circle-o"></i> Modals</a></li>
				              </ul>
				            </li>
				            <li class="treeview">
				              <a href="#">
				                <i class="fa fa-edit"></i> <span>Forms</span>
				                <i class="fa fa-angle-left pull-right"></i>
				              </a>
				              <ul class="treeview-menu">
				                <li><a href="../forms/general.html"><i class="fa fa-circle-o"></i> General Elements</a></li>
				                <li><a href="../forms/advanced.html"><i class="fa fa-circle-o"></i> Advanced Elements</a></li>
				                <li><a href="../forms/editors.html"><i class="fa fa-circle-o"></i> Editors</a></li>
				              </ul>
				            </li>
				            <li class="treeview">
				              <a href="#">
				                <i class="fa fa-table"></i> <span>Tables</span>
				                <i class="fa fa-angle-left pull-right"></i>
				              </a>
				              <ul class="treeview-menu">
				                <li><a href="../tables/simple.html"><i class="fa fa-circle-o"></i> Simple tables</a></li>
				                <li><a href="../tables/data.html"><i class="fa fa-circle-o"></i> Data tables</a></li>
				              </ul>
				            </li>
				            <li>
				              <a href="../calendar.html">
				                <i class="fa fa-calendar"></i> <span>Calendar</span>
				                <small class="label pull-right bg-red">3</small>
				              </a>
				            </li>
				            <li>
				              <a href="../mailbox/mailbox.html">
				                <i class="fa fa-envelope"></i> <span>Mailbox</span>
				                <small class="label pull-right bg-yellow">12</small>
				              </a>
				            </li>
				            <li class="treeview active">
				              <a href="#">
				                <i class="fa fa-folder"></i> <span>Examples</span>
				                <i class="fa fa-angle-left pull-right"></i>
				              </a>
				              <ul class="treeview-menu">
				                <li><a href="invoice.html"><i class="fa fa-circle-o"></i> Invoice</a></li>
				                <li><a href="profile.html"><i class="fa fa-circle-o"></i> Profile</a></li>
				                <li><a href="login.html"><i class="fa fa-circle-o"></i> Login</a></li>
				                <li><a href="register.html"><i class="fa fa-circle-o"></i> Register</a></li>
				                <li><a href="lockscreen.html"><i class="fa fa-circle-o"></i> Lockscreen</a></li>
				                <li><a href="404.html"><i class="fa fa-circle-o"></i> 404 Error</a></li>
				                <li><a href="500.html"><i class="fa fa-circle-o"></i> 500 Error</a></li>
				                <li class="active"><a href="blank.html"><i class="fa fa-circle-o"></i> Blank Page</a></li>
				              </ul>
				            </li>
				            <li class="treeview">
				              <a href="#">
				                <i class="fa fa-share"></i> <span>Multilevel</span>
				                <i class="fa fa-angle-left pull-right"></i>
				              </a>
				              <ul class="treeview-menu">
				                <li><a href="#"><i class="fa fa-circle-o"></i> Level One</a></li>
				                <li>
				                  <a href="#"><i class="fa fa-circle-o"></i> Level One <i class="fa fa-angle-left pull-right"></i></a>
				                  <ul class="treeview-menu">
				                    <li><a href="#"><i class="fa fa-circle-o"></i> Level Two</a></li>
				                    <li>
				                      <a href="#"><i class="fa fa-circle-o"></i> Level Two <i class="fa fa-angle-left pull-right"></i></a>
				                      <ul class="treeview-menu">
				                        <li><a href="#"><i class="fa fa-circle-o"></i> Level Three</a></li>
				                        <li><a href="#"><i class="fa fa-circle-o"></i> Level Three</a></li>
				                      </ul>
				                    </li>
				                  </ul>
				                </li>
				                <li><a href="#"><i class="fa fa-circle-o"></i> Level One</a></li>
				              </ul>
				            </li>
				            <li><a href="../../documentation/index.html"><i class="fa fa-book"></i> <span>Documentation</span></a></li>
				            <li class="header">LABELS</li>
				            <li><a href="#"><i class="fa fa-circle-o text-red"></i> <span>Important</span></a></li>
				            <li><a href="#"><i class="fa fa-circle-o text-yellow"></i> <span>Warning</span></a></li>
				            <li><a href="#"><i class="fa fa-circle-o text-aqua"></i> <span>Information</span></a></li>
				          </ul>
				          -->
        		</section>
        		<!-- /.sidebar -->
      		</aside>

      		<!-- =============================================== -->

      		<!-- Content Wrapper. Contains page content -->
      		<div class="content-wrapper">
        		
        		@yield('content')

      		</div><!-- /.content-wrapper -->

      		<footer class="main-footer">
        		<div class="pull-right hidden-xs">
          			<b>Version</b> 1.0.0
        		</div>
        		<strong>Copyright &copy; 2016 <a href="http://sgcf.dev">SGCF</a>.</strong> All rights reserved.
      		</footer>

      		<div class="control-sidebar-bg"></div>
    	</div><!-- ./wrapper -->

	    <!-- jQuery 2.1.4 -->
	    <script src="{{asset('adminLTE/plugins/jQuery/jQuery-2.1.4.min.js')}}"></script>
	    <!-- Bootstrap 3.3.5 -->
	    <script src="{{asset('adminLTE/bootstrap/js/bootstrap.min.js')}}"></script>
	    <!-- SlimScroll -->
	    <script src="{{asset('adminLTE/plugins/slimScroll/jquery.slimscroll.min.js')}}"></script>
	    <!-- FastClick -->
	    <script src="{{asset('adminLTE/plugins/fastclick/fastclick.min.js')}}"></script>
	    <!-- AdminLTE App -->
	    <script src="{{asset('adminLTE/dist/js/app.min.js')}}"></script>
	    <!-- AdminLTE for demo purposes -->
	    <script src="{{asset('adminLTE/dist/js/demo.js')}}"></script> 
	    
	    @yield('additionalsJavascript')
    
  	</body>
</html>
