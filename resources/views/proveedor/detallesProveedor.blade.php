@extends('layouts.app')

@section('content')
 

    <div class="container">
        <h2>{{$proveedor->nom_empresa}}</h2>
        <hr>
        <div class="row">
            <div class="col-4">
                <a href="{{url('/inicioProveedores')}}" class="btn btn-danger">Regresar</a>
                <a href="{{ url('/editarProveedor/'.$proveedor->id) }}" class="btn btn-warning">Editar</a>
            </div>
            <div class="col-4">
                <h4>Rubro: {{$proveedor->rubro}} </h4>
                <br>
                <h4>Descripcion: {{$proveedor->descripcion}} </h4>
                <br>
                <h4>Fecha de creacion: {{$proveedor->created_at}}</h4>
            </div>
           
        </div>
    </div>
    <hr>


@endsection