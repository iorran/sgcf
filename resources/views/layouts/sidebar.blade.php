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
              			<li class="treeview">
                			<a href=" {{ url('agenda') }}">
	                			<i class="fa fa-calendar"></i> <span>Agenda</span>  
	              			</a>
                		</li>  
            			<li class="treeview">
              				<a href="#">
	                			<i class="fa fa-file-pdf-o"></i> 
	                			<span>Relatórios</span> 
	                			<i class="fa fa-angle-left pull-right"></i>
	              			</a>	
	              			<ul class="treeview-menu">
	                			<li><a href="{{ url('relatorio/consultas-do-dia') }}"><i class="fa fa-circle-o"></i><span>Agenda</span> </a></li>
	              			 
	                			<li><a href="{{ route('relatorio.historico') }}"><i class="fa fa-circle-o"></i> <span>Histórico</span> </a></li>
	              			 
	                			<li><a href="{{ route('relatorio.somatorio') }}"><i class="fa fa-circle-o"></i> <span>Somatório</span> </a></li>
	              			</ul>
            			</li> 
              			<li class="treeview">
                			<a href=" {{ route('trocar.senha') }}">
	                			<i class="fa fa-key" aria-hidden="true"></i><span>Trocar Senha</span>  
	              			</a>
                		</li> 
<!--               			<li class="treeview"> -->
<!--                 			<a href=" {{ route('backup.system') }}"> -->
<!-- 	                			<i class="fa fa-download" aria-hidden="true"></i><span>Backup</span>   -->
<!-- 	              			</a> -->
<!--                 		</li>  -->
					</ul>   
        		</section>
        		<!-- /.sidebar -->
      		</aside>