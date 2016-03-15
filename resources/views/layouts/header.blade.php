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