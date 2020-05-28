<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
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
    <div class="container"> <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse"><span
                    class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span> </a><a class="brand" href="index.html">@yield('nombrevista') </a>
      <div class="nav-collapse">
        <ul class="nav pull-right">
          <li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown"><i
                            class="icon-cog"></i> Cuenta <b class="caret"></b></a>
            <ul class="dropdown-menu">
              <li><a href="javascript:;">Configuraciones</a></li>
              <li><a href="javascript:;">Ayuda</a></li>
            </ul>
          </li>
          <li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown"><i
                            class="icon-user"></i> Usuario nombre <b class="caret"></b></a>
            <ul class="dropdown-menu">
              <li><a href="javascript:;">Perfil</a></li>
              <li><a href="javascript:;">Logout</a></li>
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
        <li class="dropdown"><a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown"> <i class="icon-list-alt"></i><span>Reportes estrategicos</span> <b class="caret"></b></a>
          <ul class="dropdown-menu">
            <li><a href="icons.html">Comparar ventas</a></li>
            <li><a href="faq.html">Productos mas vendidos por categoria</a></li>
            <li><a href="">Productos menos vendidos por categoria</a></li>
            <li><a href="{{url('/ganancias')}}">Consolidado de ganancias</a></li>
          </ul>
        </li>
        <li class="dropdown"><a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown"> <i class="icon-list-alt"></i><span>Reportes tacticos</span> <b class="caret"></b></a>
          <ul class="dropdown-menu">
            <li><a href="{{url('/productos_actuales')}}">Productos actuales</a></li>
            <li><a href="faq.html">10 productos mas vendidos</a></li>
            <li><a href="pricing.html">10 productos menos vendidos</a></li>
            <li><a href="login.html">Ventas en un rango determinado</a></li>
          </ul>
        </li>
        <li><a href="{{url('/gestion_usuarios')}}"><i class="icon-group"></i><span>Gestión usuarios</span> </a></li>
        <li><a href="{{url('/etl')}}"><i class="icon-refresh"></i><span>Restauración DB</span> </a> </li>
        <li><a href="{{route('bitacora.user')}}"><i class="icon-calendar"></i><span>Bitacora</span> </a> </li>
        <li class="dropdown"><a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown"> <i class="icon-long-arrow-down"></i><span>Drops</span> <b class="caret"></b></a>
          <ul class="dropdown-menu">
            <li><a href="icons.html">Icons</a></li>
            <li><a href="faq.html">FAQ</a></li>
            <li><a href="pricing.html">Pricing Plans</a></li>
            <li><a href="login.html">Login</a></li>
            <li><a href="signup.html">Signup</a></li>
            <li><a href="error.html">404</a></li>
          </ul>
        </li>
        @yield('opcionesmenu')
      </ul>
    </div>
    <!-- /container -->
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

<div class="footer">
  <div class="footer-inner">
    <div class="container">
      <div class="row">
        <div class="span12"> &copy; 2020 <a href="#">Sistema Gerencial</a>. </div>
        <!-- /span12 -->
      </div>
      <!-- /row -->
    </div>
    <!-- /container -->
  </div>
  <!-- /footer-inner -->
</div>
<!-- /footer -->
<!-- Le javascript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<script src="{{asset('js/jquery-1.7.2.min.js')}}"></script>
<script src="{{asset('js/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('js/tablas.js')}}"></script>
<script src="{{asset('js/excanvas.min.js')}}"></script>
<script src="{{asset('js/chart.min.js')}}" type="text/javascript"></script>
<script src="{{asset('js/bootstrap.js')}}"></script>
<script language="javascript" type="text/javascript" src="{{asset('js/full-calendar/fullcalendar.min.js')}}"></script>

<script src="{{asset('js/base.js')}}"></script>
<script src="{{asset('js/signin.js')}}"></script>
@yield('script')
</html>
