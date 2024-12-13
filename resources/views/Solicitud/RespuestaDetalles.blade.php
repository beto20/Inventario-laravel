@extends('layouts.app')

@section('content')
<div class="card">
  <div class="card-header text-white" bg-color="#248801" align="center" >
    <h2>Detalles de la Solicitud</h2>
  </div>
  <br>
  <div class="row">
    <div class="col-8 text-right">
      <p><strong class="badge badge-danger">*Nota: </strong>En esta sección se deberá revisar la información de la solicitud recibida, para de esa forma validar o rechazar la misma.</p>
    </div>
    <div class="col-4 text-right" >
      <a href="{{ route('respuesta.solicitud') }}" class="btn btn-warning"><i class="fa fa-angle-double-left" aria-hidden="true"></i>&nbsp;Regresar</a> &nbsp;
    </div>
  </div>
  <br>
    @foreach($solicitud as $soli)  
      <div class="container">
        <div class="row">
          <div class="border border-dark col-12 bg-secondary text-white text-center">
            <h2>Detalles para la Solicitud Número {{ $soli->id }}</h2>
          </div>
        </div>
        <h5>
          <div class="row">
            <div class="border border-dark col-6">
              <strong>Solicitante: </strong>{{ $soli->nombre }}
            </div>
            <div class="border border-dark col-6 text-justify">
              <strong>Descripción: </strong>{{ $soli->descripcion }}
            </div>
          </div>
          <div class="row">
            <div class="border border-dark col-3">
              <strong>Producto: </strong>
            </div>
            <div class="border border-dark col-3">
              {{ $soli->clave_producto }} | {{ $soli->nombre_producto }}
            </div>
            <div class="border border-dark col-3">
              <strong>Cantidad: </strong>
            </div>
            <div class="border border-dark col-3">
                {{ $soli->cantidad }}
            </div>
          </div>
        </h5>
        <div class="row">
          <div class="col-12" align="center">
            @if($soli->estatus_solicitud == "Rechazada")
              <p class="alert alert-danger col-3">La solicitud ha sido rechazada.</p>
            @elseif($soli->estatus_solicitud == "Autorizada")
              <p class="alert alert-success col-3">La solicitud fue autorizada.</p>
            @else
            <form id="form-validacion" action="{{ route('solicitud.update', $soli->id) }}" method="POST">
                @csrf
                @method('PUT')
                <input type="hidden" name="producto" id="producto" value="{{ $soli->producto_id }}">
                <input type="hidden" name="centro" id="centro" value="{{ $soli->ct_id }}">

                <div class="row">
                  <div class="col-12" align="center">
                    <label>
                        <input type="radio" name="opcion" value="1" id="opcion1" checked> <p class="badge badge-success">Autorizar</p>
                    </label>
  
                    <label>
                        <input type="radio" name="opcion" value="2" id="opcion2"> <p class="badge badge-danger">Rechazar</p>
                    </label>
                  </div>
                </div>
                
              <!-- Información que se mostrará al seleccionar la opción 1 -->
                  <div id="informacion1" class="informacion">
                    <label for="cantidad">Ingrese la cantidad de productos a autorizar</label>
                    <input type="number" name="cantidad" id="cantidad" class="form-control col-2">
                    <br>
                    <button id="btn-autorizar" type="submit" name="estatus" value="autorizar" class="btn btn-success">Autorizar</button>
                  </div>

                  <!-- Información que se mostrará al seleccionar la opción 2 -->
                  <div id="informacion2" class="informacion" style="display: none;">
                    <button id="btn-rechazar" type="submit" name="estatus" value="rechazar" class="btn btn-danger">Rechazar</button>
                  </div>

            </form>
            @endif
          </div>
        </div>
      </div>
    @endforeach 
  <br>
</div>



<script>
  document.addEventListener('DOMContentLoaded', function () {
        const opcion1 = document.getElementById('opcion1');
        const opcion2 = document.getElementById('opcion2');
        const info1 = document.getElementById('informacion1');
        const info2 = document.getElementById('informacion2');

        opcion1.addEventListener('change', function () {
            if (this.checked) {
                info1.style.display = 'block';
                info2.style.display = 'none';
            }
        });

        opcion2.addEventListener('change', function () {
            if (this.checked) {
                info1.style.display = 'none';
                info2.style.display = 'block';
            }
        });
    });

  
</script>
@endsection