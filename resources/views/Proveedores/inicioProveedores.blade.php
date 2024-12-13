@extends('layouts.app')

@include('Proveedores.Modal.agregarProveedor')
@section('content')
<div class="card-header text-white" align="center">
  <h3><strong>Proveedores</strong></h3>
</div>
<div class="card">
        <div class="container text-center" >
            <div class="row">
                <div class="col-6">
                    <button type="button" class="btn btn-success" data-toggle="modal" data-target="#exampleModal">
                    <i class="fa fa-plus-square" aria-hidden="true"></i> Agregar proveedor
                    </button>

                </div>
                <div class="col-6">
                    <a href="{{url('/home')}}" class="btn btn-danger"><i class="fa fa-chevron-left" aria-hidden="true"></i> Regresar</a>
                </div>
            </div>
        </div>
        <hr>

        <div class="container">
            @if(session('message'))
                <div class="alert alert-success">
                    {{session('message')}}
                </div>
            @endif
            
        </div>

        @include('proveedor.listaProveedor')
</div>
@endsection
