@extends('layouts.app')

@section('content')
<div class="card">
    <div class="card-header text-white" align="center">
      <h3><strong> Listado de Usuarios</strong></h3>
    </div>
    <br>
    <table class="table table-striped">
        <tr class="text-center">
            <th>N°</th>
            <th>Nombre</th>
            <th>Email</th>
            <th>Centro de Trabajo</th>
            <th>Rol</th>
        </tr>
        <?php $cont=0; ?>
        @foreach($users as $user)
            <tr class="text-center">
                <td>{{++$cont}}</td>
                <td>{{$user->name}}</td>
                <td>{{$user->email}}</td>
                <td>{{$user->nombre_ct}}</td>
                <td>{{$user->role}}</td>
            </tr>
        @endforeach
    </table>

</div>


@endsection