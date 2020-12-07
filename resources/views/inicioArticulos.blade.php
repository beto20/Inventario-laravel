@extends('layouts.app')

@section('content')

    <div class="container" >
        <div class="row">
            <div class="col-4">
                <a href="{{url('agregarArticulo/')}}" class="btn btn-success" style="margin:33px 0px 0px 50px"> Agregar articulo</a>
                <br>
                
            
                <br>
                <a href="{{url('/home')}}"  class="btn btn-danger" style="margin:33px 0px 0px 50px">Regresar</a>
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
    @include('articulo.listaArticulo')
    <br>
    <div class="fa-pull-right" >
        {{$articulos->links()}}
    </div>
    <hr>
@endsection
