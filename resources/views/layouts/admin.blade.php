<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Tallertriplej </title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.5 
    <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">-->
    <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="{{asset('bower_components/bootstrap/dist/css/bootstrap.min.css')}}">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{asset('css/font-awesome.css')}}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{asset('css/AdminLTE.min.css')}}">
<!-- DataTables --> 
<link rel="stylesheet" href="{{asset('bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css')}}">
  <link rel="stylesheet" href="{{asset('bower_components/datatables.net-bs/css/responsive.bootstrap.min.css')}}">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="{{asset('css/_all-skins.min.css')}}">
    <link rel="apple-touch-icon" href="{{asset('img/tallerimg.png')}}">
    <link rel="shortcut icon" href="{{asset('img/tallerimg.ico')}}">
    <!-- Ionicons -->
  <link rel="stylesheet" href="{{asset('bower_components/Ionicons/css/ionicons.min.css')}}">
  </head>
  <body class="hold-transition skin-blue sidebar-mini">
    <div class="wrapper">

      <header class="main-header">
        <!-- Logo -->
        <a href="{{url('clienteap/graficas')}}" class="logo">
          <!-- mini logo for sidebar mini 50x50 pixels -->
          <span class="logo-mini"><b>AD</b>T</span>
          <!-- logo for regular state and mobile devices -->
          <span class="logo-lg"><b>Sistema Taller</b> <img src="{{asset('img/ic2.ico')}}" alt="" height="35px" width="40px"></span>
        </a>

        <!-- Header Navbar: style can be found in header.less -->
        <nav class="navbar navbar-static-top" role="navigation">
          <!-- Sidebar toggle button-->
          <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">Navegación</span>
          </a>
          <!-- Navbar Right Menu -->
          <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
              <!-- Messages: style can be found in dropdown.less-->
              
              <!-- User Account: style can be found in dropdown.less -->
              <li class="dropdown user user-menu">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                  <small class="bg-red">Online</small>
                  <span class="hidden-xs">{{$name=Auth::user()->name}}</span>
                </a>
                <ul class="dropdown-menu">
                  <!-- User image -->
                  <li class="user-header">
                    <p>Taller de Electrónica Triple J</p>
                    <br>
                    <p>{{$name=Auth::user()->name}}</p>
                  </li>
                  <!-- Menu Footer-->
                  <li class="user-footer">
                    <div class="pull-right">
                      <a href="{{url('/logout')}}" class="btn btn-default btn-flat">Cerrar</a>
                    </div>
                  </li>
                </ul>
              </li>
              
            </ul>
          </div>

        </nav>
      </header>
      <!-- Left side column. contains the logo and sidebar -->
      <aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
          <!-- Sidebar user panel -->
                    
          <!-- sidebar menu: : style can be found in sidebar.less -->
          <ul class="sidebar-menu">
            <li class="header"></li>
            <li class="active"> <a href="{{url('clienteap/graficas')}}">	
            <i class="fa fa-home"></i> <span>Inicio</span>	</a></li>
            <li class="treeview">
              <a href="#">
                <i class="fa fa-th"></i>
                <span>Cliente-Aparato</span>
                 <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li><a href="{{url('clienteap/cliente_aparato/create')}}"><i class="fa fa-circle-o"></i> Ingresar</a></li>
                <li><a href="{{url('clienteap/cliente_aparato')}}"><i class="fa fa-circle-o"></i> Registros</a></li>
                <li><a href="{{url('clienteap/entregar')}}"><i class="fa fa-circle-o"></i> Entregar</a></li>
              </ul>
            </li>
            
            <li class="treeview">
              <a href="#">
                <i class="fa fa-briefcase"></i>
                <span>Huesera</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li><a href="{{url('huesera/aparatosh')}}"><i class="fa fa-circle-o"></i> Aparatos-Huesera</a></li>
                <li><a href="{{url('huesera/placas')}}"><i class="fa fa-circle-o"></i> Placas</a></li>
                <li><a href="{{url('huesera/flybacks')}}"><i class="fa fa-circle-o"></i> Flybacks</a></li>
                <li><a href="{{url('huesera/ics')}}"><i class="fa fa-circle-o"></i> Ics</a></li>
                <li><a href="{{url('huesera/transistores')}}"><i class="fa fa-circle-o"></i> Transistores</a></li>
                <li><a href="{{url('huesera/pantallas')}}"><i class="fa fa-circle-o"></i> Pantallas</a></li>
                <li><a href="{{url('huesera/caratulas')}}"><i class="fa fa-circle-o"></i> Caratulas</a></li>
                <li><a href="{{url('huesera/controles')}}"><i class="fa fa-circle-o"></i> Controles</a></li>
                <li><a href="{{url('huesera/otros')}}"><i class="fa fa-circle-o"></i> Otros</a></li>
              </ul>
            </li>
            <li class="treeview">
              <a href="#">
                <i class="fa fa-shopping-cart"></i>
                <span>Piezas a pedir</span>
                 <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li><a href="{{url('pedir/papedir')}}"><i class="fa fa-circle-o"></i> Registros</a></li>
              </ul>
            </li>
                       
            <li class="treeview">
              <a href="#">
                <i class="fa fa-folder"></i> <span>Accesos</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              @if((($email=Auth::user()->email)=="fernandogutierres801@gmail.com") || (($email=Auth::user()->email)=="jorgegutierrezhernandez1@gmail.com") || (($email=Auth::user()->email)=="electronicatriplej@gmail.com"))
              <ul class="treeview-menu">
                <li> <a href="{{url('seguridad/usuario')}}"><i class="fa fa-user"></i>Usuarios</a></li>
              </ul>
              @endif
            </li>
            <li>
              <a href="{{url('fallas/fallas')}}">
                <i class="fa fa-book"></i> <span>Fallas</span>
                <small class="label pull-right bg-yellow"></small>
              </a>
            </li>
            <li>
              <a href="{{url('acercade')}}">
                <i class="fa fa-info-circle"></i> <span>Acerca De...</span>
                <small class="label pull-right bg-yellow"><></small>
              </a>
            </li>
                        
          </ul>
        </section>
        <!-- /.sidebar -->
      </aside>

       <!--Contenido-->
      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        
        <!-- Main content -->
        <section class="content">
          
          <div class="row">
            <div class="col-md-12">
              <div class="box">
                <div class="box-header with-border">
                  <h2 class="box-title">Taller de Electrónica Tripe J              </h2><span><img src="{{asset('img/tallerimg.ico')}}" alt="" height="35px" width="35px"></span>
                  <div class="box-tools pull-right">
                    <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                    <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                  </div>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                  	<div class="row">
	                  	<div class="col-md-12">
                                  <!--Contenido-->
                                  @yield('contenido')
		                          <!--Fin Contenido-->
                           </div>
                        </div>
		                    
                  		</div>
                  	</div><!-- /.row -->
                </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div><!-- /.col -->
          </div><!-- /.row -->

        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->
      <!--Fin-Contenido-->
      <footer class="main-footer">
        <div class="pull-right hidden-xs">
          <b>Version</b> 1.0
        </div>
        <strong>Copyright &copy; 2020 <a href="electronicatriplej@gmail.com">Electrónica Triple J</a>.</strong> All rights reserved.
      </footer>

      
    <!-- jQuery 2.1.4 
    <script src="{{asset('js/jQuery-2.1.4.min.js')}}"></script>-->
     <!-- jQuery 3 -->
  <script src="{{asset('bower_components/jquery/dist/jquery.min.js')}}"></script>
  @stack('scripts')
    <!-- Bootstrap 3.3.5 
    <script src="{{asset('js/bootstrap.min.js')}}"></script>-->
     <!-- Bootstrap 3.3.7 -->
  <script src="{{asset('bower_components/bootstrap/dist/js/bootstrap.min.js')}}"></script>

<!-- FastClick -->
<script src="{{asset('bower_components/fastclick/lib/fastclick.js')}}"></script>
    <!-- AdminLTE App -->
    <script src="{{asset('js/app.min.js')}}"></script>

  <!-- DataTables estas son para que salga la opcion de ordenar segun los parametros de cabecera en las tablas
  $(document).ready( function () {
    $('#myTable').DataTable();
} );
  -->
  <!-- daterangepicker http://www.daterangepicker.com/-->
  <script src="{{asset('bower_components/moment/min/moment.min.js')}}"></script>
  <script src="{{asset('bower_components/bootstrap-daterangepicker/daterangepicker.js')}}"></script>

  <!-- Morris.js charts http://morrisjs.github.io/morris.js/-->
  <script src="{{asset('bower_components/raphael/raphael.min.js')}}"></script>
  <script src="{{asset('bower_components/morris.js/morris.min.js')}}"></script>

  <!-- ChartJS http://www.chartjs.org/-->
  <script src="{{asset('bower_components/Chart.js/Chart.js')}}"></script>
  <!-- Morris chart -->
  <link rel="stylesheet" href="{{asset('bower_components/morris.js/morris.css')}}">

  <script src="{{asset('bower_components/datatables.net/js/jquery.dataTables.min.js')}}"></script>
  <script src="{{asset('bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js')}}"></script>
  <script src="{{asset('bower_components/datatables.net-bs/js/dataTables.responsive.min.js')}}"></script>
  <script src="{{asset('bower_components/datatables.net-bs/js/responsive.bootstrap.min.js')}}"></script>   
  <script src="{{asset('js/plantilla.js')}}"></script>
  <script src="{{asset('js/tamañoinput.js')}}"></script>
  <script src="{{asset('js/verimagenes.js')}}"></script>
  </body>
</html>
 