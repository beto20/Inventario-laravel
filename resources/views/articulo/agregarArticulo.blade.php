
@extends('layouts.app')

@section('content')






    <form action="{{url('/guardarArticulo')}}" method="post" enctype="multipart/form-data" class="col-lg-6" style="margin-left:45px; padding-bottom:25px; ">
        {!!csrf_field()!!}

        
        <h1>Agregar nuevo articulo</h1>
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
            <input type="hidden" name="inventario_id" value="{{$inventario_id=0}}" required>
                <div class="form-group">
                    <label for="nombre">Nombre del articulo</label>
                    <input type="text" class="form-control" id="nombre" name="nombre" value="{{old('nombre')}}">
                </div>
                <div class="form-group">
                    <label for="categoria">Categoria</label>
                    <input type="text" class="form-control" id="categoria" name="categoria" value="{{old('categoria')}}">
                </div>
                <div class="form-group">
                    <label for="descripcion">Descripcion</label>
                    <input type="text" class="form-control" id="descripcion" name="descripcion" value="{{old('descripcion')}}">
                </div>
                <div class="form-group">
                    <label for="cantidad">Cantidad </label>
                    <input type="text" class="form-control" id="cantidad" name="cantidad" value="{{old('cantidad')}}">
                </div>
                <div class="form-group">
                    <label for="tipo">Tipo </label>
                    <input type="text" class="form-control" id="tipo" name="tipo" value="{{old('tipo')}}">
                </div>
                <input type="submit" class="btn btn-success" value="Agregar">
            </div>

            <div style="float:right;" class="col-md-6">
                <div class="form-group">
                    <label for="stock_max">Stock maximo </label>
                    <input type="text" class="form-control" id="stock_max" name="stock_max" value="{{old('stock_max')}}">
                </div>
                <div class="form-group">
                    <label for="stock_min">Stock minimo</label>
                    <input type="text" class="form-control" id="stock_min" name="stock_min" value="{{old('stock_min')}}">
                </div>

                <div class="form-group">
                    <label for="p_venta">Precio de venta </label>
                    <input type="text" class="form-control" id="p_venta" name="p_venta" value="{{old('p_venta')}}">
                </div>

                <div class="form-group">
                    <label for="costo">Costo</label>
                    <input type="text" class="form-control" id="costo" name="costo" value="{{old('costo')}}">
                </div>
                <div class="form-group">
                    <label for="imagen">Imagen </label>
                    <input type="file" class="form-control" id="imagen" name="imagen" value="{{old('imagen')}}">
                </div>
                <a href="{{url('/home')}}"  class="btn btn-danger" >Cancelar</a>
            </div>
                
                
        </div>

    </form>

  
@endsection