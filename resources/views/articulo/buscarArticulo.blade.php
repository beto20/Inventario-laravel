@extends('layouts.app')

@section('content')

    <div class="container" >
        <div class="row">
            <div class="col-4">
    
                <a href="{{url('agregarArticulo')}}" class="btn btn-success" style="margin:33px 0px 0px 50px"> Agregar articulo</a>
                <br>
                <a href="{{url('/inicioArticulos')}}" class="btn btn-danger" style="margin:33px 0px 0px 50px">Regresar</a>
            
            </div>
            <div class="col-4">
                <form action="{{url('/buscarArticulo')}}" role="buscar" method="get" class="col-md-10"> 
                    
                    <label for="buscar">Buscar</label>
                    <br>
                    <input type="text" class="form-control" name="buscar"> 
                    <br>
                    <input type="submit" value="buscar" class="btn btn-info">
                     
                    
                </form>
            </div>
            <div class="col-4">
 

                <form action="{{url('/buscarArticulo/'.$buscar ) }}" method="get" class="col-md-10 fa-pull-right">
                    <div class="col-sm">
                        <label for="filtro">Filtro</label>

                        <select name="filtro" class="form-control">
                            <option value="nuevo">Articulos mas recientes</option>
                            <option value="viejo">Articulos mas antiguos</option>
                        </select>
                        <br>
                        <input type="submit" value="ordenar" class="btn btn-info">
                         
                    </div>
                </form>
 
            </div>
        </div>
    </div>

  
    <hr>
    <h2 style="text-align:center">Busqueda: {{$buscar}}</h2>
    <br>
    @include('inventario.listaArticulo')
    <br>
    <div class="fa-pull-right" >
        {{$articulos->links()}}
    </div>
    
    <hr>

@endsection
