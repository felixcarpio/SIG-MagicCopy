<!DOCTYPE html>
<html lang="en">

<head>
<meta charset="utf-8">
@yield('meta')
<title>@yield('titulo')</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
<meta name="apple-mobile-web-app-capable" content="yes">
<link href="{{ asset('css/bootstrap.min.css')}}" rel="stylesheet">
<link href="{{ asset('css/bootstrap-responsive.min.css')}}" rel="stylesheet">
<link href="{{ asset('css/datatables.min.css')}}" rel="stylesheet">
<link href="http://fonts.googleapis.com/css?family=Open+Sans:400italic,600italic,400,600"
        rel="stylesheet">
<link href="{{ asset('css/font-awesome.css') }}" rel="stylesheet">
<link href="{{ asset('css/style.css') }}" rel="stylesheet">
<link href="{{ asset('css/pages/dashboard.css') }}" rel="stylesheet">
<link href="{{asset('css/pages/signin.css')}}" rel="stylesheet" type="text/css">
<!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
<!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
</head>

<body>
  <div class="navbar navbar-fixed-top">
    <div class="navbar-inner">
      <div class="container"> <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse"><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span> </a><a class="brand" href="{{ url('/') }}">Sistema Gerencial</a>
        <div class="nav-collapse">
          <ul class="nav pull-right">
            
            <li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown">
                <i class="icon-user"></i>{{ Auth::user()->username }}<b class="caret"></b></a>
              <ul class="dropdown-menu">
                <li>Nombres: {{ Auth::user()->name }}</li>
                <li>Apellidos: {{ Auth::user()->surname }}</li>
                <li><a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                    document.getElementById('logout-form').submit();">{{ __('Cerrar Sesion') }}</a> 
                  <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                  </form>
                </li>
              </ul>
            </li>
          </ul>
        </div>
        <!--/.nav-collapse -->
      </div>
      <!-- /container -->
    </div>
    <!-- /navbar-inner -->
  </div>
  <!-- /navbar -->
  <div class="subnavbar">
    <div class="subnavbar-inner">
      <div class="container">
        <ul class="mainnav">
          <li class="active"><a href="{{url('/')}}"><i class="icon-home"></i><span>Inicio</span> </a> </li>
          @can('read rep-estrategico')
          <li class="dropdown"><a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown"> <i class="icon-list-alt"></i><span>Reportes estrategicos</span> <b class="caret"></b></a>
            <ul class="dropdown-menu">
              <li><a href="icons.html">Comparar ventas</a></li>
              <li><a href="faq.html">Productos mas vendidos por categoria</a></li>
              <li><a href="">Productos menos vendidos por categoria</a></li>
              <li><a href="{{url('/ganancias')}}">Consolidado de ganancias</a></li>
            </ul>
          </li>
          @endcan
          @can('read rep-tactico')
          <li class="dropdown"><a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown"> <i class="icon-list-alt"></i><span>Reportes tacticos</span> <b class="caret"></b></a>
            <ul class="dropdown-menu">
              <li><a href="{{url('/productos_actuales')}}">Productos actuales</a></li>
              <li><a href="{{url('/10_productos_mas_vendidos')}}">10 productos mas vendidos</a></li>
              <li><a href="pricing.html">10 productos menos vendidos</a></li>
              <li><a href="login.html">Ventas en un rango determinado</a></li>
            </ul>
          </li>
          @endcan
          @can('read users')
          <li><a href="{{ url('usuarios') }}"><i class="icon-group"></i><span>Gestión usuarios</span> </a></li>
          @endcan
          @can('read restauracionDB')
          <li><a href=""><i class="icon-refresh"></i><span>Restauración DB</span> </a> </li>
          @endcan
          @can('read bitacora')
          <li><a href="{{route('bitacora.user')}}"><i class="icon-calendar"></i><span>Bitacora</span> </a> </li>
          @endcan
          @can('read etl')
          <li><a href="{{url('/etl')}}"><i class="icon-refresh"></i><span>ETL</span> </a> </li>
          @endcan

          @yield('opcionesmenu')
        </ul>
      </div>
    </div>  
    <!-- /subnavbar-inner -->
  </div>
  <!-- /subnavbar -->
  <div class="main">
    <div class="main-inner">
      <div class="container">
        @yield('content')
      </div>
      <!-- /container -->
    </div>
    <!-- /main-inner -->
  </div>
  <!-- /main -->

<!-- Placed at the end of the document so the pages load faster -->
<script src="{{asset('js/jquery-1.7.2.min.js')}}"></script>
<script src="{{asset('js/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('js/tablas.js')}}"></script>
<script src="{{asset('js/excanvas.min.js')}}"></script>
<script src="{{asset('js/chart.min.js')}}" type="text/javascript"></script>
<script src="{{asset('js/bootstrap.js')}}"></script>
<script language="javascript" type="text/javascript" src="{{asset('js/full-calendar/fullcalendar.min.js')}}"></script>

@yield('script')
</html>