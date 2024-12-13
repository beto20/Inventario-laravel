@extends('layouts.app')

@section('content')
 

    <div class="container">
        <h2>{{$articulo->nombre}}</h2>
        <hr>
        <div class="row">
            <div class="col-4">
                <h4>Categoria: {{$articulo->categoria}} </h4>
                <br>
                <h4>Descripcion: {{$articulo->descripcion}} </h4>
                <br>
                <h4>Cantidad: {{$articulo->cantidad}}</h4>
                <br>
                <h4>Tipo: {{$articulo->tipo}} </h4>
                <br>
                <h4>Fecha de creacion: {{$articulo->created_at}}</h4>
            </div>
            <div class="col-4">
                <h4>Costo: {{$articulo->costo}} </h4>
                <br>
                <h4>Precio de venta: {{$articulo->p_venta}} </h4>
                <br>
                <h4>Stock maximo: {{$articulo->stock_max}} </h4>
                <br>
                <h4>Stock minimo: {{$articulo->stock_min}} </h4>
                <br>
                
            </div>
            <div class="col-4">
                <br><br><br><br><br>
                <a href="{{url('/inicioArticulos')}}" class="btn btn-danger">Regresar</a>
                <a href="{{ url('/editarArticulo/'.$articulo->id) }}" class="btn btn-success">Editar</a>
            </div>
        </div>
    </div>
    <hr>


@endsection