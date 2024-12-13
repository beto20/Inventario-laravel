@extends('layouts.app')

@section('content')
@if (session('agregar') == 'ok')
    <script>
        Swal.fire({
        title: "¡Registrado!",
        text: "El usuario se registro con éxito.",
        icon: "success"
        });     
    </script>
@endif
<div class="card">
    <div class="card-header text-white" align="center">
      <h3><strong> Registrar nuevo usuario</strong></h3>
    </div>
    <br>

    <div class="card-body">
                    <form id="form-registrar" method="POST" action="{{ route('registrar.usuario') }}" enctype='multipart/form-data'>
                        @csrf
                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">Nombres y Apellidos</label>
                            <div class="col-md-6">
                                <input id="name" name="name" type="text" class="form-control" value="{{ old('name') }}" required>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">Correo Electrónico</label>
                            <div class="col-md-6">
                                <input id="email" name="email" type="email" class="form-control" value="{{ old('email') }}" required>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="role" class="col-md-4 col-form-label text-md-right">Rol del Usuario</label>
                            <div class="col-md-6">
                                <select name="role" id="role" class="form-control">
                                    <option value="">Selecciona un Rol...</option>
                                    <option value="admin">Administrador</option>
                                    <option value="user">Usuario</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="empresa" class="col-md-4 col-form-label text-md-right">Empresa</label>
                            <div class="col-md-6">
                                <input id="empresa" name="empresa" type="text" class="form-control" value="{{ old('empresa') }}" required>
                            </div>
                        </div>
                        @php
                            use App\CentrosTrabajo;
                            $centros = CentrosTrabajo::all();
                        @endphp
                        <div class="form-group row">
                            <label for="centro" class="col-md-4 col-form-label text-md-right">Centro de Trabajo</label>

                            <div class="col-md-6">
                                <select name="centro" id="centro" class="form-control" value="{{ old('centro') }}" required autocomplete="centro">
                                    <option value="">Seleccione un centro de trabajo...</option>
                                    @foreach($centros as $centro)
                                    <option value="{{ $centro->clave_ct }}">{{ $centro->clave_ct }} | {{ $centro->nombre_ct }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>


                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">Contraseña</label>
                            <div class="col-md-6">
                                <input id="password" name="password" type="password" class="form-control" required>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password_confirmation" class="col-md-4 col-form-label text-md-right">Repetir contraseña</label>
                            <div class="col-md-6">
                                <input id="password_confirmation" name="password_confirmation" type="password" class="form-control" required>
                            </div>
                        </div>

                        <div class="form-group row mb-0" align="center">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-success" id="btn-registrar" >Registrar</button>
                                <a href="/home"><span class="btn btn-danger"> {{ __('Cancelar') }}</span></a>
                            </div>
                        </div>

                    </form>
                </div>
</div>



<script>
document.getElementById('btn-registrar').addEventListener('click', function(event) {
    event.preventDefault(); // Evitar el submit inmediato

    Swal.fire({
        title: '¿Estás seguro?',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Sí, registrar!',
        cancelButtonText: 'Cancelar'
    }).then((result) => {
        if (result.isConfirmed) {
            // Si el usuario confirma, se envía el formulario
            document.getElementById('form-registrar').submit();
        }
    });
});
</script>
@endsection