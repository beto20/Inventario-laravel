@extends('layouts.app')

@section('content')
    
    <form action="{{url('/actualizarInventario/'.$inventario->id)}}" method="post" enctype="multipart/form-data" class="col-lg-6" style="margin-left:45px; padding-bottom:25px; ">
        {!!csrf_field()!!}

        
        <h1>Editar {{$inventario->nombre}}</h1>
        @if($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach($errors->all() as $error)
                        <li>{{$error}}</li>
                    @endforeach
                </ul>

            </div>
        @endif

        <hr>
        <div id="content" style=" padding-bottom:25px; ">
            <div style="float:left;" class="col-md-6">
                <div class="form-group">
                    <label for="nombre">Nombre del inventario</label>
                    <input type="text" class="form-control" id="nombre" name="nombre" value="{{$inventario->nombre}}">
                </div>
                
                <div class="form-group">
                    <label for="descripcion">Descripcion</label>
                    <input type="text" class="form-control" id="descripcion" name="descripcion" value="{{$inventario->descripcion}}">
                </div>
               
                <input type="submit" class="btn btn-success" value="Guardar">
                <a href="{{url('/inicioInventarios')}}"  class="btn btn-danger" >Cancelar</a>
            </div>
        </div>
    </form>

@endsection