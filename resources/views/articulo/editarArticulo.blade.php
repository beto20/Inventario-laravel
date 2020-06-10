@extends('layouts.app')

@section('content')
    
    <form action="{{url('/actualizarArticulo/'.$articulo->id)}}" method="post" enctype="multipart/form-data" class="col-lg-6" style="margin-left:45px; padding-bottom:25px; ">
        {!!csrf_field()!!}

        
        <h1>Editar {{$articulo->nombre}}</h1>
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
                    <label for="nombre">Nombre del articulo</label>
                    <input type="text" class="form-control" id="nombre" name="nombre" value="{{$articulo->nombre}}">
                </div>
                <div class="form-group">
                    <label for="categoria">Categoria</label>
                    <input type="text" class="form-control" id="categoria" name="categoria" value="{{$articulo->categoria}}">
                </div>
                <div class="form-group">
                    <label for="descripcion">Descripcion</label>
                    <input type="text" class="form-control" id="descripcion" name="descripcion" value="{{$articulo->descripcion}}">
                </div>
                <div class="form-group">
                    <label for="cantidad">Cantidad </label>
                    <input type="text" class="form-control" id="cantidad" name="cantidad" value="{{ $articulo->cantidad}}">
                </div>
                <div class="form-group">
                    <label for="tipo">Tipo </label>
                    <input type="text" class="form-control" id="tipo" name="tipo" value="{{$articulo->tipo}}">
                </div>
                <input type="submit" class="btn btn-success" value="Guardar">
            </div>

            <div style="float:right;" class="col-md-6">
                <div class="form-group">
                    <label for="stock_max">Stock maximo </label>
                    <input type="text" class="form-control" id="stock_max" name="stock_max" value="{{ $articulo->stock_max}}">
                </div>
                <div class="form-group">
                    <label for="stock_min">Stock minimo</label>
                    <input type="text" class="form-control" id="stock_min" name="stock_min" value="{{$articulo->stock_min}}">
                </div>

                <div class="form-group">
                    <label for="p_venta">Precio de venta </label>
                    <input type="text" class="form-control" id="p_venta" name="p_venta" value="{{$articulo->p_venta}}">
                </div>

                <div class="form-group">
                    <label for="costo">Costo</label>
                    <input type="text" class="form-control" id="costo" name="costo" value="{{$articulo->costo}}">
                </div>
                <div class="form-group">
                    <img src="{{url('/imagen/'.$articulo->imagen)}}" alt="">

                    <input type="file" class="form-control" id="imagen" name="imagen" value="{{$articulo->imagen}}">
                </div>
                <a href="{{url('/inicioArticulo')}}"  class="btn btn-danger" >Cancelar</a>
            </div>
                
                
        </div>
        

    </form>



<!--
    <form action="{{url('/guardarArticulo')}}" method="post" enctype="multipart/form-data" class="col-md-6" style="margin-left:45px; padding-bottom:25px; ">
        {!!csrf_field()!!}

        
        <h1>Editar {{$articulo->nombre}}</h1>
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










    
        <div class="container">

            <div class="row">
                <div class="col-md-6">
                    <div>
                        <label for="imagen">Imagen </label>
                        <img src="{{url('/imagen/'.$articulo->imagen)}}" alt="">

                        <input type="file" class="form-control" id="imagen" name="imagen" value="{{$articulo->imagen}}">
                    </div>

                </div>
                <div class="col-md-6">
                    <div >
                        <label for="nombre">Nombre del articulo</label>
                        <input type="text" class="form-control" id="nombre" name="nombre" value="{{$articulo->nombre}}">
                    </div>
                    <div >
                        <label for="categoria">Categoria</label>
                        <input type="text" class="form-control" id="categoria" name="categoria" value="{{$articulo->categoria}}">
                    </div>
                    <div >
                        <label for="descripcion">Descripcion</label>
                        <input type="text" class="form-control" id="descripcion" name="descripcion" value="{{$articulo->descripcion}}">
                    </div>
                    <div >
                        <label for="cantidad">Cantidad </label>
                        <input type="text" class="form-control" id="cantidad" name="cantidad" value="{{ $articulo->cantidad}}">
                    </div>
                    <div>
                        <label for="tipo">Tipo </label>
                        <input type="text" class="form-control" id="tipo" name="tipo" value="{{$articulo->tipo}}">
                    </div>
                    <div>
                        <input type="submit" class="btn btn-success" value="Guardar">
                    </div>

                </div>

                <div class="col-md-6">
                    <div >
                        <label for="stock_max">Stock maximo </label>
                        <input type="text" class="form-control" id="stock_max" name="stock_max" value="{{ $articulo->stock_max}}">
                    </div>
                    <div >
                        <label for="stock_min">Stock minimo</label>
                        <input type="text" class="form-control" id="stock_min" name="stock_min" value="{{$articulo->stock_min}}">
                    </div>

                    <div >
                        <label for="p_venta">Precio de venta </label>
                        <input type="text" class="form-control" id="p_venta" name="p_venta" value="{{$articulo->p_venta}}">
                    </div>

                    <div >
                        <label for="costo">Costo</label>
                        <input type="text" class="form-control" id="costo" name="costo" value="{{$articulo->costo}}">
                    </div>
                    <div>
                        <a href="{{url('/home')}}"  class="btn btn-danger" >Cancelar</a>
                    </div>
                    
                </div>
                
            </div>
        </div>
    <hr>



-->


    </form>
















@endsection