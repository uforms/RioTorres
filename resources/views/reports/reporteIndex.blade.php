<!-- Modal -->
<div class="modal fade" id="modalReportes" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Generar Reporte</h4>
      </div>
      <div class="modal-body">
        <!-- Toogle panel -->
          <div role="tabpanel">
          <p>Seleccione el tipo de reporte:</p>
          <!-- Nav tabs -->
          <ul class="nav nav-pills" role="tablist">
            <li role="presentation" class="active li-report-custom"><a href="#aguasReporte" aria-controls="home" role="tab" data-toggle="tab"><i class="glyphicon glyphicon-tint"></i> Aguas</a></li>
            <li role="presentation" class=" li-report-custom"><a href="#avesReporte" aria-controls="profile" role="tab" data-toggle="tab"><i class="fa fa-twitter"></i> Aves</a></li>
            <li role="presentation" class="li-report-custom"><a href="#suelosReporte" aria-controls="messages" role="tab" data-toggle="tab"><i class="fa fa-globe"></i> Suelos</a></li>
          </ul>

          <!-- Tab panes -->
          <div class="tab-content">
            <div role="tabpanel" class="tab-pane active" id="aguasReporte">
              @include('reports.reporteAguas')
            </div>

            <div role="tabpanel" class="tab-pane" id="avesReporte">
              @include('reports.reporteAves')
            </div>

            <div role="tabpanel" class="tab-pane" id="suelosReporte">
              
            </div>
          </div>

        </div>
          <!-- end Toggle panel -->

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal"><i class="glyphicon glyphicon-remove"></i> Cerrar</button>
      </div>
    </div>
  </div>
</div>