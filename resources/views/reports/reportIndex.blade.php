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
            <li role="presentation" class="active li-report-custom"><a href="#home" aria-controls="home" role="tab" data-toggle="tab">Aguas</a></li>
            <li role="presentation" class=" li-report-custom"><a href="#profile" aria-controls="profile" role="tab" data-toggle="tab">Aves</a></li>
            <li role="presentation" class="li-report-custom"><a href="#messages" aria-controls="messages" role="tab" data-toggle="tab">Suelos</a></li>
          </ul>

          <!-- Tab panes -->
          <div class="tab-content">
            <div role="tabpanel" class="tab-pane active" id="home">
              @include('reports.reportAguas')
            </div>

            <div role="tabpanel" class="tab-pane" id="profile">
              
            </div>

            <div role="tabpanel" class="tab-pane" id="messages">
              
            </div>
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