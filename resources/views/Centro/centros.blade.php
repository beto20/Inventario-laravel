<!-- Modal -->
<div class="modal fade" id="Centros" tabindex="-1" role="dialog" aria-labelledby="CentrosLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="CentrosLabel">Nuevo Centro de Trabajo</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form id="centroT" method="POST" action="{{ route('centro') }}" class="d-inline formulario-agregar">
          @csrf
          <div class="input-group mb-3">
            <div class="input-group-prepend">
              <span class="input-group-text" id="basic-addon1"><i class="fa fa-list-ul" aria-hidden="true"></i></span>
            </div>
              <input type="text" id="clave" name="clave" class="form-control" placeholder="Clave del Centro de Trabajo" required>
          </div>

          <div class="input-group mb-3">
            <div class="input-group-prepend">
              <span class="input-group-text" id="basic-addon1"><i class="fa fa-building" aria-hidden="true"></i></span>
            </div>
              <input type="text" id="nombre" name="nombre" class="form-control" placeholder="Nombre del Centro de Trabajo" required>
          </div>
          
          <div class="input-group mb-3">
            <div class="input-group-prepend">
              <span class="input-group-text" id="basic-addon1"><i class="fa fa-phone-square" aria-hidden="true"></i></span>
            </div>
            <input type="text" id="telefono" name="telefono" class="form-control" placeholder="Teléfono" required>
          </div>

          <div class="input-group mb-3">
            <div class="input-group-prepend">
              <span class="input-group-text" id="basic-addon1"><i class="fa fa-map-marker" aria-hidden="true"></i></span>
            </div>
            <input type="text" id="direccion" name="direccion" class="form-control" placeholder="Dirección" required>
          </div>
  
          <div class="modal-footer">
            <button type="submit" class="btn btn-success">Guardar</button>
            <button type="button" class="btn btn-danger" data-dismiss="modal">cancelar</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>