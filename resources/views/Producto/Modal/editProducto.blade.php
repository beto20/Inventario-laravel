<!-- Modal -->
<div class="modal fade" id="editProducto{{ $pro->id }}" tabindex="-1" role="dialog" aria-labelledby="NuevoProductoLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="NuevoProductoLabel">Actualizar Producto</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form id="Producto" method="POST" action="{{ route('editar.producto', $pro->id) }}">
        @method('PUT')
        @csrf
            <div class="input-group mb-3">
              <div class="input-group-prepend">
                <span class="input-group-text" id="basic-addon1"><i class="fa fa-outdent" aria-hidden="true"></i></span>
              </div>
              <select name="producto" id="producto" class="form-control" required>
                <option selected disabled>{{ $pro->nom_cat }}</option>
                @foreach($categoria as $cat)
                  <option value="{{$cat->id}}">{{$cat->nombre}}</option>
                @endforeach
              </select>
            </div>

            <div class="input-group mb-3">
              <div class="input-group-prepend">
                <span class="input-group-text" id="basic-addon1"><i class="fa fa-sort-numeric-asc" aria-hidden="true"></i></span>
              </div>
              <input type="text" id="clave" name="clave" class="form-control" value="{{ $pro->clave_producto }}" required>
            </div>

            <div class="input-group mb-3">
              <div class="input-group-prepend">
                <span class="input-group-text" id="basic-addon1"><i class="fa fa-archive" aria-hidden="true"></i></span>
              </div>
              <input type="text" id="nombre" name="nombre" class="form-control" value="{{ $pro->nombre_producto }}" required>
            </div>

            <div class="input-group mb-3">
              <div class="input-group-prepend">
                <span class="input-group-text" id="basic-addon1"><i class="fa fa-align-center" aria-hidden="true"></i></span>
              </div>
              <input type="text" id="detalles" name="detalles" class="form-control" value="{{ $pro->detalles }}" required>
            </div>
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-success">Guardar</button>
          <button type="button" class="btn btn-danger" data-dismiss="modal">cerrar</button>
        </div>
        </form>
    </div>
  </div>
</div>