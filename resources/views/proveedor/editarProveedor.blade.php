@extends('layouts.app')

@section('content')
    
    <form action="{{url('/actualizarProveedor/'.$proveedor->id)}}" method="post" enctype="multipart/form-data" class="col-lg-6" style="margin-left:45px; padding-bottom:25px; ">
        {!!csrf_field()!!}

        
        <h1>Editar {{$proveedor->nom_empresa}}</h1>
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
                    <label for="nom_empresa">Nombre de la empresa</label>
                    <input type="text" class="form-control" id="nom_empresa" name="nom_empresa" value="{{$proveedor->nom_empresa}}">
                </div>

                <div class="form-group">
                    <label for="descripcion">Descripcion</label>
                    <input type="text" class="form-control" id="descripcion" name="descripcion" value="{{$proveedor->descripcion}}">
                </div>
                <div class="form-group">
                    <label for="rubro">Rubro</label>
                    <input type="text" class="form-control" id="rubro" name="rubro" value="{{$proveedor->rubro}}">
                </div>

                <input type="submit" class="btn btn-success" value="Guardar">
                <a href="{{url('/inicioProveedores')}}"  class="btn btn-danger" >Cancelar</a>
            </div>

                
                
        </div>
        

    </form>








@endsection