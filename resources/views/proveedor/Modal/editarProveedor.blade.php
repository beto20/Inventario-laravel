<!-- Modal -->
<div class="modal fade" id="editProveedor{{ $proveedor->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Editar Proveedor "{{$proveedor->nom_empresa}}"</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

            <form action="{{ route('editar.proveedor', $proveedor->id)}}" method="POST" enctype="multipart/form-data">
            @method('PUT')
            @csrf
                <div class="input-group mb-6">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="basic-addon1"><i class="fa fa-user" aria-hidden="true"></i></span>
                    </div>
                    <input type="text" id="nom_empresa" name="nom_empresa" value="{{ $proveedor->nom_empresa }}" class="form-control" required>
                </div>
                <br>
                <div class="input-group mb-6">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="basic-addon1"><i class="fa fa-envelope-o" aria-hidden="true"></i></span>
                    </div>
                    <input type="text" id="correo" name="correo" value="{{ $proveedor->correo }}" class="form-control" required>
                </div>
                <br>
                <div class="input-group mb-6">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="basic-addon1"><i class="fa fa-phone" aria-hidden="true"></i></span>
                    </div>
                    <input type="text" id="telefono" name="telefono" value="{{ $proveedor->telefono }}" class="form-control" required>
                </div>
                <br>
                <div class="input-group mb-6">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="basic-addon1"><i class="fa fa-map-marker" aria-hidden="true"></i></span>
                    </div>
                    <input type="text" id="direccion" name="direccion" value="{{ $proveedor->direccion }}" class="form-control" required>
                </div>
                <br>
                <div class="modal-footer">
                    <input type="submit" class="btn btn-success" value="Agregar">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button
                </div>
                </div>
            </form>
      </div>
    </div>
  </div>
</div>