@extends('layouts.app')

@section('content')
 

    <div class="container">
        <h2>{{$inventario->nombre}}</h2>
        <hr>
        <div class="row">
            <div class="col-4">
                <a href="{{url('/inicioInventarios')}}" class="btn btn-danger">Regresar</a>
                <a href="{{ url('/editarInventario/'.$inventario->id) }}" class="btn btn-warning">Editar</a>
            </div>
            <div class="col-4">
                <h4>Categoria: {{$inventario->categoria}} </h4>
                <br>
                <h4>Descripcion: {{$inventario->descripcion}} </h4>
                <br>
                <h4>Fecha de creacion: {{$inventario->created_at}}</h4>
            </div>
            
        </div>
    </div>
    <hr>


@endsection