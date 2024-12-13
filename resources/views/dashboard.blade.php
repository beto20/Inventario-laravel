@extends('layouts.app')

@include('Centro.centros')

@section('content')
<div class="card-header bg-info text-white" align="center">
  <h3><strong> Centros de Trabajo</strong></h3>
</div>
<br>
<div align="center">
    <button type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#Centros">
        <i class="fa fa-plus-square-o" aria-hidden="true"></i>&nbsp;Nuevo Centro de Trabajo
    </button>
</div>
@include('Mensajes.msg')

<div class="container col-12" align="center">


    <table id="myTable" class="table table-striped" align="center">
        <thead  class="bg-secondary text-white" align="center">
            <tr>
                <th colspan="6"><h3>Listado de Centros de Trabajo</h3></th>
            </tr>
            <tr>
                <th>Clave Centro</th>
                <th>Nombre Centro</th>
                <th>Teléfono</th>
                <th>Dirección</th>
                <th>Editar</th>
                <th>Eliminar</th>
            </tr>
        </thead>
        <tbody align="center">
            @if(count($Centros) > 0)
                @foreach($Centros as $cen)
                    <tr>
                        <th>{{$cen->clave_ct}}</th>
                        <td>{{$cen->nombre_ct}}</td>
                        <td>{{$cen->telefono}}</td>
                        <td>{{$cen->direccion}}</td>
                        <td>
                            <button type="button" class="btn btn-info" data-toggle="modal" data-target="#editCentro{{ $cen->id }}" >
                                <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                            </button>
                        </td>
                        <td>
                            <form action="{{route('deleteCentro', $cen->id)}}" class="formulario-eliminar">
                                <button class="btn btn-danger"><i class="fa fa-trash" aria-hidden="true"></i></button>
                            </form>
                        </td>
                    </tr>
                    <!-- MODAL EDITAR -->
                    @include('Centro.Modal.editarCentro')
                @endforeach
            @else
                    <th class="alert-danger" colspan="6"><i class="fa fa-exclamation-circle" aria-hidden="true"></i>&nbsp;No existe ningun centro de trabajo.</th>
            @endif
        </tbody>
    </table>
</div>


<script>
    $('#myTable').DataTable({
        "responsive": true,
        "columnDefs": [
          // { targets: [1,2,3], render: $.fn.dataTable.render.number( ',', '.', 2, '$ ' ) },
          {
            responsivePriority: 1,
            targets: 0
          }
        ],
        "order": [
          [0, "asc"]
        ],
        "pageLength": 15,
        "lengthChange": false,
        // "paging":   false,
        // "ordering": false,
        // "info":     false
        "language": {
          "decimal": ".",
          "thousands": ",",
          search: "Buscar Centro:",
          lengthMenu: "Mostrar _MENU_ registros por página",
          zeroRecords: "No hay registros para mostrar",
          info: "Mostrando página _PAGE_ de _PAGES_",
          infoEmpty: "No hay registros disponibles",
          infoFiltered: "(filtrado de _MAX_ de registros)",
          paginate: {
            first: "Primera",
            previous: "Anterior",
            next: "Siguiente",
            last: "Última"
          }
        },
        // Habilitar búsqueda insensible a acentos con el plugin accent-neutralise
        "search": {
          "caseInsensitive": true, // Habilita la búsqueda insensible a mayúsculas y minúsculas
          "accentNeutralise": true // Habilita la búsqueda insensible a acentos
        }
      });
</script>

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