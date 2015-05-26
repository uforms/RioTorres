<nav class="navbar navbar-inverse navbar-custom">
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
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="glyphicon glyphicon-th"></i> Actividades <span class="caret"></span></a>
          <ul class="dropdown-menu" role="menu">
            <li><a href="{{url('/tomas/Aguas')}}"><i class="glyphicon glyphicon-tint"></i> Aguas</a></li>
            <li><a href="{{url('/tomas/Aves')}}"><i class="fa fa-twitter"></i> Aves</a></li>
            <li><a href="{{url('/tomas/Suelos')}}"><i class="fa fa-globe"></i> Suelos</a></li>
          </ul>
        </li>
        <li><a href="#" data-toggle="modal" data-target="#modalReportes"><i class="glyphicon glyphicon-file" ></i> Reportes</a></li>

        <!-- To Do 
        <li><a href="{{url('/gps')}}"><i class="glyphicon glyphicon-map-marker"></i> GPS</a></li>
        -->
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

<!-- Modal for reports -->
<!-- Button trigger modal -->


<!-- Modal -->
<div class="modal fade" id="modalReportes" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Generar Reporte CVS</h4>
      </div>
      <div class="modal-body">
        <!-- Toogle panel -->
                <div role="tabpanel">
          <p>Seleccione el tipo de reporte:</p>
          <!-- Nav tabs -->
          <ul class="nav nav-tabs" role="tablist">
            <li role="presentation" class="active li-report-custom"><a href="#home" aria-controls="home" role="tab" data-toggle="tab">Aves</a></li>
            <li role="presentation" class="li-report-custom"><a href="#profile" aria-controls="profile" role="tab" data-toggle="tab">Aguas</a></li>
            <li role="presentation" class="li-report-custom"><a href="#messages" aria-controls="messages" role="tab" data-toggle="tab">Suelos</a></li>
          </ul>

          <!-- Tab panes -->
          <div class="tab-content">
            <div role="tabpanel" class="tab-pane active" id="home">1</div>
            <div role="tabpanel" class="tab-pane" id="profile">2</div>
            <div role="tabpanel" class="tab-pane" id="messages">3</div>
          </div>

        </div>
          <!-- end Toggle panel -->
          <br><br><br><br><br><br>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
      </div>
    </div>
  </div>
</div>