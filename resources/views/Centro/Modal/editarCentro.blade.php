<!-- Modal -->
<div class="modal fade" id="editCentro{{ $cen->id }}" tabindex="-1" role="dialog" aria-labelledby="editCentroLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="editCentroLabel">Actualizar Centro de Trabajo</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form id="editForm" method="POST" action="{{ route('updateCentro', $cen->id) }}">
      @method('PUT')
      @csrf
        <div class="modal-body">

          <div class="input-group mb-3">
            <div class="input-group-prepend">
              <span class="input-group-text" id="basic-addon1"><i class="fa fa-list-ul" aria-hidden="true"></i></span>
            </div>
              <input type="text" id="clave" name="clave" class="form-control" value="{{ $cen->clave_ct }}" required>
          </div>

          <div class="input-group mb-3">
            <div class="input-group-prepend">
              <span class="input-group-text" id="basic-addon1"><i class="fa fa-building" aria-hidden="true"></i></span>
            </div>
              <input type="text" id="nombre" name="nombre" class="form-control" value="{{ $cen->nombre_ct }}" required>
          </div>
          
          <div class="input-group mb-3">
            <div class="input-group-prepend">
              <span class="input-group-text" id="basic-addon1"><i class="fa fa-phone-square" aria-hidden="true"></i></span>
            </div>
            <input type="tel" id="telefono" name="telefono" class="form-control" placeholder="55-123-456" value="{{ $cen->telefono }}" required>
          </div>

          <div class="input-group mb-3">
            <div class="input-group-prepend">
              <span class="input-group-text" id="basic-addon1"><i class="fa fa-map-marker" aria-hidden="true"></i></span>
            </div>
            <input type="text" id="direccion" name="direccion" class="form-control" placeholder="Ingresa tu dirección" value="{{ $cen->direccion }}" required>
          </div>
  
          <div class="modal-footer">
            <button type="submit" class="btn btn-success">Actualizar</button>
            <button type="button" class="btn btn-danger" data-dismiss="modal">cancelar</button>
          </div>
        </div>
      </form>
    </div>
  </div>
</div>