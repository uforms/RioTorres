<nav class="navbar navbar-default navbar-custom">
  <div class="container">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
        <span class="sr-only">Toggle Navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="/">Río Torres</a>
    </div>

    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        @if(!Auth::guest())

        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Actividades <span class="caret"></span></a>
          <ul class="dropdown-menu" role="menu">
            <li><a href="{{url('/tomas/Aguas')}}"><i class="glyphicon glyphicon-tint"></i> Aguas</a></li>
            <li><a href="{{url('/tomas/Aves')}}"><i class="fa fa-twitter"></i> Aves</a></li>
            <li><a href="{{url('/tomas/Suelos')}}"><i class="fa fa-globe"></i> Suelos</a></li>
          </ul>
        </li>

        <li><a href="{{url('/gps')}}">GPS</a></li>
        @endif
      </ul>

      <ul class="nav navbar-nav navbar-right">
        @if (Auth::guest())
        <li><a href="{{ url('/auth/login') }}">Ingreso</a></li>
        <li><a href="{{ url('/auth/register') }}">Registro</a></li>
        @else
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Hola {{ Auth::user()->name }} <span class="caret"></span></a>
          <ul class="dropdown-menu" role="menu">
            <li class=""><a href="#"><i class="glyphicon glyphicon-user"></i> Perfil</a></li>
            <li><a href="{{ url('/auth/logout') }}"><i class="glyphicon glyphicon-log-out"></i> Salir</a></li>
          </ul>
        </li>
        @endif
      </ul>
    </div>
  </div>
</nav>