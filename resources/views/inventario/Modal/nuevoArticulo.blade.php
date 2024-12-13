<!-- Modal -->
<div class="modal fade" id="articulo" tabindex="-1" role="dialog" aria-labelledby="articuloLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="articuloLabel">Nuevo Artículo</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="{{url('/guardarArticulo')}}" method="post" enctype="multipart/form-data">
        @csrf
            <div class="row">
                <div class="input-group mb-3 col-6">
                    <div class="input-group-prepend">
                        <button class="btn btn-outline-primary btn-sm" type="button"><i class="fa fa-outdent" aria-hidden="true"></i></button>
                    </div>
                    <select id="category-select" name="categoria" class="form-control" aria-label="Default select example" required>
                        <option value="">Seleccione una Categoria</option>
                        @foreach($categorias as $cat)
                        <option value="{{$cat->id}}">{{$cat->nombre}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="input-group mb-3 col-6">
                    <div class="input-group-prepend">
                        <button class="btn btn-outline-info btn-sm" type="button"><i class="fa fa-archive" aria-hidden="true"></i></button>
                    </div>
                    <select id="product-select" name="producto" class="form-control" aria-label="Default select example" required>
                        <option value="">Seleccione un Producto</option>
                    </select>
                </div>
            </div>
            &nbsp;
            <div class="row">
                <div class="input-group mb-3 col-6">
                    <div class="input-group-prepend">
                        <button class="btn btn-outline-success btn-sm" type="button"><i class="fa fa-users" aria-hidden="true"></i></button>
                    </div>
                    <select id="proveedor" name="proveedor" class="form-control" aria-label="Default select example" required>
                        <option value="">Seleccione un Proveedor</option>
                        @foreach($proveedores as $prove)
                            <option value="{{$prove->id}}">{{$prove->nom_empresa}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="input-group mb-3 col-6">
                    <div class="input-group-prepend">
                        <button class="btn btn-outline-warning btn-sm" type="button"><i class="fa fa-calendar" aria-hidden="true"></i></button>
                    </div>
                    <input id="fecha" name="fecha" type="date" class="form-control" placeholder="Fecha de Ingreso" aria-label="" aria-describedby="basic-addon1" required>
                </div>
            </div>
            &nbsp;
            <div class="row">
                <div class="input-group mb-3 col-6">
                    <div class="input-group-prepend">
                        <button class="btn btn-outline-danger btn-sm" type="button"><i class="fa fa-dollar" aria-hidden="true"></i></button>
                    </div>
                    <input id="Pcompra" name="Pcompra" type="text" class="form-control" placeholder="Precio de Compra" aria-label="" aria-describedby="basic-addon1" required>
                </div>
                <div class="input-group mb-3 col-6">
                    <div class="input-group-prepend">
                        <button class="btn btn-outline-primary btn-sm" type="button"><i class="fa fa-dollar" aria-hidden="true"></i></button>
                    </div>
                    <input id="Pventa" name="Pventa" type="text" class="form-control" placeholder="Precio de Venta" aria-label="" aria-describedby="basic-addon1" required>
                </div>
            </div>
            &nbsp;
            <div class="row">
                <div class="input-group mb-3 col-6">
                    <div class="input-group-prepend">
                        <button class="btn btn-outline-success btn-sm" type="button"><i class="fa fa-plus" aria-hidden="true"></i></button>
                    </div>
                    <input id="cantidad" name="cantidad" type="number" class="form-control" placeholder="Cantidad" aria-label="" aria-describedby="basic-addon1" required>
                </div>
                <div class="input-group mb-3 col-6">
                    <div class="input-group-prepend">
                        <button class="btn btn-outline-info btn-sm" type="button"><i class="fa fa-edit" aria-hidden="true"></i></button>
                    </div>
                    <input id="descripcion" name="descripcion" type="text" class="form-control" placeholder="Descripción" aria-label="" aria-describedby="basic-addon1" required>
                </div>
            </div>
            &nbsp;
            <div class="row">
                <div class="col-12" align="right">
                    <input type="submit" class="btn btn-success" value="Agregar">
                    <a href="{{url('/inicioArticulos')}}"  class="btn btn-danger" >Cancelar</a>
                </div>
            </div>
        </form>
      </div>
    </div>
  </div>
</div>