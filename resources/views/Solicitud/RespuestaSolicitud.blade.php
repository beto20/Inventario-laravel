@extends('layouts.app')

@section('content')
<div class="card">
  <div class="card-header text-white" bg-color="#248801" align="center" >
    <h2>Listado de Solicitudes</h2>
  </div>
<br>
  <table class="table table-striped text-center">
    <thead>
        <tr>
            <th>N° Solicitud</th>
            <th>Centro de Trabajo</th>
            <th>Estatus</th>
            <th>Acción</th>
        </tr>
    </thead>
    <tbody>
        @foreach($solicitud as $soli)
            <tr>
                <td>{{ $soli->id }}</td>
                <td><strong>{{ $soli->nombre_ct }}</strong></td>
                <td>
                  @if($soli->estatus_solicitud == 'Rechazada')
                    <span class="badge badge-danger">{{ $soli->estatus_solicitud }}</span>
                  @elseif($soli->estatus_solicitud == 'Autorizada')
                    <span class="badge badge-success">{{ $soli->estatus_solicitud }}</span>
                  @else
                    <span class="badge badge-info">{{ $soli->estatus_solicitud }}</span>
                  @endif
                </td>
                <td><a href="{{route('detalles', $soli->id)}}"><i class="fa fa-eye" aria-hidden="true"></i></a></td>
            </tr>
        @endforeach
    </tbody>
  </table>

  
</div>
@endsection