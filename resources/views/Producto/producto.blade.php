@extends('layouts.app')

@section('scripts')
<script src="script.js"></script>
@endsection


@include('Producto.Modal.nuevoproducto')
@include('Producto.Modal.ImportarExcel')

@section('content')

<div class="card">
  <div class="card-header text-white" align="center">
    <h3><strong>Productos</strong></h3>
  </div>

  
    <div class="card-body">
        <div class="content" align="center">
            <button type="button" class="btn btn-info" data-toggle="modal" data-target="#ModalImportar">
                <i class="fa fa-upload" aria-hidden="true"></i>&nbsp;Importar Excel
            </button>
            @if(count($producto) > 0)
              <a href="{{route('articulos.excel')}}" class="btn btn-danger">
                  <i class="fa fa-download" aria-hidden="true"></i>&nbsp;Exportar Excel
              </a>
            @endif
            <button type="button" class="btn btn-success" data-toggle="modal" data-target="#NuevoProducto">
                <i class="fa fa-plus-square-o" aria-hidden="true"></i>&nbsp;Nuevo Producto
            </button>
        </div>
  <br>
        <table class="table table-striped" id="tabla-productos">
            <thead  class="bg-secondary text-white" align="center">
                <tr>
                    <th colspan="5"><h3>Productos</h3></th>
                </tr>
                <tr>
                    <th>Clave</th>
                    <th>Nombre del Producto</th>
                    <th>Detalles</th>
                    <th>Editar</th>
                    <th>Eliminar</th>
                </tr>
            </thead>
            <tbody align="center">
                @if(count($producto) > 0)
                    @foreach($producto as $pro)
                        <tr>
                            <td>{{$pro->clave_producto}}</td>
                            <td>{{$pro->nombre_producto}}</td>
                            <td>{{$pro->detalles}}</td>

                            <td>
                                <button type="button" class="btn btn-info" data-toggle="modal" data-target="#editProducto{{ $pro->id }}" >
                                    <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                                </button>
                            </td>
                            <td>
                                <form action="{{ route('eliminar.producto', $pro->id) }}" class="formulario-eliminar">
                                    <button type="submit" class="btn btn-danger"><i class="fa fa-trash" aria-hidden="true"></i></button>
                                </form>
                            </td>
                        </tr>
                        @include('Producto.Modal.editProducto')
                    @endforeach
                @else
                    <tr><th class="alert alert-danger" colspan="5">No existe ningun producto</th></tr>
                @endif
            </tbody>
        </table>
    </div>
</div>

<script src="{{ asset(url('js/Producto/producto.js')) }}"></script>
@endsection