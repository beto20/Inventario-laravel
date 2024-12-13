<!-- Modal -->
<div class="modal fade" id="editCategoria{{ $cat->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Actualizar Categoría</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
        <div class="modal-body">
            <form id="Categoria" method="POST" action="{{route('editar.categoria', $cat->id)}}">
            @method('PUT')
            @csrf
                <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="basic-addon1"><i class="fa fa-outdent" aria-hidden="true"></i></span>
                </div>
                    <input type="text" id="nombre" name="nombre" value="{{ $cat->nombre }}" class="form-control">
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