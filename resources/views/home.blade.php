@extends('layouts.app')

@section('content')
 <!--   <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Dashboard</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        You are logged in!
                    </div>
                </div>
            </div>
        </div>
    </div>-->
    <form action="" method="get"> 
        <div class="container">
            <div class="row">
                <div class="col-sm">

                    <a href="{{url('agregarArticulo')}}" class="btn btn-success"> Agregar articulo</a>

                </div>
                <div class="col-sm">
                    <label for="buscar">Buscar</label>
                    <br>
                    <input type="text" class="form-control" name="search"> 
                    <br>
                    <button class="btn btn-success" >buscar</button>
                </div>
                <div class="col-sm">
                    <label for="filter">Filtro</label>

                    <select name="filter" class="form-control">
                        <option value="nuevos">Articulos mas recientes</option>
                        <option value="viejos">Articulos mas antiguos</option>
                    </select>
                    <br>
                    <input type="submit" value="Ordenar" class="btn btn-info">
                </div>
            </div>
        </div>
    </form>
    <hr>

    <div class="container">
        @if(session('message'))
            <div class="alert alert-success">
                {{session('message')}}
            </div>
        @endif
        
    </div>
    <center>
            <table border="1">
                <thead>
                    <tr>
                        <th>Nombre</th>
                        <th>Categoria</th>
                        <th>Cantidad</th>
                        <th>Descripcion</th>
                        <th>Precio de venta</th>
                        <th>Stock minimo</th>
                        <th>Imagen</th>
                        <th>Opciones</th>
                    </tr>
                </thead>

                

                @foreach($articulos as $articulo)
                    @if(Auth::check() && Auth::user()->id==$articulo->user_id)
                    <tbody>
                        <tr>
                            
                                <th>{{$articulo->nombre}}</th>
                                <th>{{$articulo->categoria}}</th>
                                <th>{{$articulo->cantidad}}</th>
                                <th>{{$articulo->descripcion}}</th>
                                <th>{{$articulo->p_venta}}</th>
                                <th>{{$articulo->stock_min}}</th>
                                <th>
                                    @if(Storage::disk('imagenes')->has($articulo->imagen))
                                        <div class="fa-pull-right">
                                                <img src="{{url('/imagen/'.$articulo->imagen)}}" style="width: 200px; height: 150px; overflow: hidden;">
                                        </div>
                                    @endif
                                </th>
                                <th>
                                    <a href="{{ route('detallesArticulo',['articulo_id' => $articulo->id ] )}}" class="btn btn-success">Ver</a>
                                    <a href="" class="btn btn-warning">Editar</a>
                                    <a href="" class="btn btn-danger">Eliminar</a>
                                </th>
                        
                        </tr>
                    </tbody>
                    @endif
                @endforeach   

                

            </table>
    

        {{$articulos->links()}}
    </center>

@endsection
