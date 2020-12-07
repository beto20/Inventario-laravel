
@extends('layouts.app')

@section('content')

<center>
    <h2>Panel de inicio</h2>
    <br>
    <div class="contenedor">
    <div class="row">
        <div class="col-sm">
            <img src="{{asset('img/inventario2.jpg')}}" alt="" style="margin: 10px 0px 20px 0px; width: 200px; height: 190px;">
            <br>
        <a href="{{url('/inicioArticulos')}}" class="btn btn-info">Ver inventario</a> 
        </div>
        <div class="col-sm">
            <img src="{{asset('img/proveedores.jpg')}}" alt="" style="margin: 10px 0px 20px 0px; width: 290px; height: 190px;">
            <br>
            <a href="{{route('inicioProveedores')}}" class="btn btn-info">Ver proveedores</a> 
        </div>
        <div class="col-sm">
            <img src="{{asset('img/perfil.png')}}" alt="" style="margin: 10px 0px 20px 0px; width: 200px; height: 190px;">
            <br>
            <a href="{{url('/perfil')}}" class="btn btn-info">Ver mi perfil</a> 
        </div>
        <div class="col-sm">
            <img src="{{asset('img/soporte.jpg')}}" alt="" style="margin: 10px 0px 20px 0px; width: 200px; height: 190px;">
            <br>
            <a href="{{url('/soporte')}}" class="btn btn-info">Contacta soporte tecnico</a> 
        </div>
    </div>
    </div>
</center>

<br>
@endsection
