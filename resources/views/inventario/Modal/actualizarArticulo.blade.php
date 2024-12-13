<!-- Modal -->
<div class="modal fade" id="actArticulo{{$articulo->id}}" tabindex="-1" role="dialog" aria-labelledby="actArticuloLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="actArticuloLabel">Actualizar Artículo</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="{{url('/actualizarArticulo/'.$articulo->id)}}" method="post" enctype="multipart/form-data">
        @csrf
            <div class="row">
                <div class="input-group mb-3 col-6">
                    <div class="input-group-prepend">
                        <button class="btn btn-outline-primary btn-sm" type="button"><i class="fa fa-outdent" aria-hidden="true"></i></button>
                    </div>
                    <select id="categoria" name="categoria" class="form-control" aria-label="Default select example">
                        <option value="{{$articulo->id_cat}}" selected>{{$articulo->n_categoria}}</option>
                        @foreach($categorias as $cat)
                        <option value="{{$cat->id}}">{{$cat->nombre}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="input-group mb-3 col-6">
                    <div class="input-group-prepend">
                        <button class="btn btn-outline-info btn-sm" type="button"><i class="fa fa-archive" aria-hidden="true"></i></button>
                    </div>
                    <select id="producto" name="producto" class="form-control" aria-label="Default select example">
                        <option value="{{$articulo->id_prod}}" selected>{{$articulo->nombre_producto}}</option>
                        @foreach($productos as $pro)
                            <option value="{{$pro->id}}">{{$pro->nombre_producto}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            &nbsp;
            <div class="row">
                <div class="input-group mb-3 col-6">
                    <div class="input-group-prepend">
                        <button class="btn btn-outline-success btn-sm" type="button"><i class="fa fa-users" aria-hidden="true"></i></button>
                    </div>
                    <select id="proveedor" name="proveedor" class="form-control" aria-label="Default select example">
                        <option value="{{$articulo->id_pro}}" selected>{{$articulo->nom_empresa}}</option>
                        @foreach($proveedores as $prove)
                            <option value="{{$prove->id}}">{{$prove->nom_empresa}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="input-group mb-3 col-6">
                    <div class="input-group-prepend">
                        <button class="btn btn-outline-warning btn-sm" type="button"><i class="fa fa-calendar" aria-hidden="true"></i></button>
                    </div>
                    <input id="fecha" name="fecha" type="date" class="form-control" value="{{$articulo->fecha_ingreso}}" aria-label="" aria-describedby="basic-addon1">
                </div>
            </div>
            &nbsp;
            <div class="row">
                <div class="input-group mb-3 col-6">
                    <div class="input-group-prepend">
                        <button class="btn btn-outline-danger btn-sm" type="button"><i class="fa fa-dollar" aria-hidden="true"></i></button>
                    </div>
                    <input id="Pcompra" name="Pcompra" type="text" class="form-control" value="{{$articulo->Pcompra}}" aria-label="" aria-describedby="basic-addon1">
                </div>
                <div class="input-group mb-3 col-6">
                    <div class="input-group-prepend">
                        <button class="btn btn-outline-primary btn-sm" type="button"><i class="fa fa-dollar" aria-hidden="true"></i></button>
                    </div>
                    <input id="Pventa" name="Pventa" type="text" class="form-control" value="{{$articulo->Pventa}}" aria-label="" aria-describedby="basic-addon1">
                </div>
            </div>
            &nbsp;
            <div class="row">
                <div class="input-group mb-3 col-6">
                    <div class="input-group-prepend">
                        <button class="btn btn-outline-success btn-sm" type="button"><i class="fa fa-plus" aria-hidden="true"></i></button>
                    </div>
                    <input id="cantidad" name="cantidad" type="number" class="form-control" value="{{$articulo->cantidad}}" aria-label="" aria-describedby="basic-addon1">
                </div>
                <div class="input-group mb-3 col-6">
                    <div class="input-group-prepend">
                        <button class="btn btn-outline-info btn-sm" type="button"><i class="fa fa-edit" aria-hidden="true"></i></button>
                    </div>
                    <input id="descripcion" name="descripcion" type="text" class="form-control" value="{{$articulo->descripcion}}" aria-label="" aria-describedby="basic-addon1">
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