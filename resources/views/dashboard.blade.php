@extends('layouts.app')

@include('Centro.centros')

@section('content')
<div class="card-header text-white" align="center">
  <h3><strong> Centros de Trabajo</strong></h3>
</div>
<br>
<div align="center">
    <button type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#Centros">
        <i class="fa fa-plus-square-o" aria-hidden="true"></i>&nbsp;Nuevo Centro de Trabajo
    </button>
</div>
<br>
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

<script src="{{ asset(url('js/Centros/centros.js')) }}"></script>
@endsection