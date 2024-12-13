@extends('layouts.app')

@section('scripts')
<script src="script.js"></script>
@endsection

@include('Producto.Modal.nuevacategoria')

@section('content')

    <div class="card-header text-white" align="center">
        <h3><strong>Categorías</strong></h3>
    </div>    
<br>

  <div align="center">
      <button type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#NuevaCategoria">
          <i class="fa fa-plus-square-o" aria-hidden="true"></i>&nbsp;Nueva Categoría
      </button>
  </div>

<br>
    <div class="card">
        <table class="table table-striped">
            <thead  class="bg-secondary text-white" align="center">
                <tr>
                    <th colspan="3"><h3>Listado de Categorías</h3></th>
                </tr>
                <tr>
                    <th>Nombre</th>
                    <th>Editar</th>
                    <th>Eliminar</th>
                </tr>
            </thead>
            <tbody align="center">
                @if(count($categoria) > 0)
                    @foreach($categoria as $cat)
                        <tr>
                            <td>{{$cat->nombre}}</td>
                            <td>
                                <button type="button" class="btn btn-info" data-toggle="modal" data-target="#editCategoria{{ $cat->id }}" >
                                    <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                                </button>
                            </td>
                            <td>
                                <form action="{{ route('eliminar.categoria', $cat->id) }}" class="formulario-eliminar">
                                    <button type="submit" class="btn btn-danger"><i class="fa fa-trash" aria-hidden="true"></i></button>
                                </form>
                            </td>
                        </tr>
                        @include('Producto.Modal.editCategoria')
                    @endforeach
                @else
                <th class="alert alert-danger" colspan="3"><i class="fa fa-exclamation-circle" aria-hidden="true"></i>&nbsp;No existe ninguna categoría</th>
                @endif
            </tbody>
        </table>
    </div>


<script>
    $('.formulario-eliminar').submit(function(e){
    e.preventDefault();

    Swal.fire({
        title: '¿Estas Seguro?',
        text: "¡No podrás modificarlo después!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#d33',
        cancelButtonColor: '#3085d6',
        confirmButtonText: '¡Si, Eliminar!'
      }).then((result) => {
        if (result.value) {
            this.submit()
          }
    })
  });
</script>
@endsection