
@extends('layouts.app')


@section('content')
<form id="centroT" method="POST" action="{{ route('centro') }}">
    @csrf
    @method('PUT')
    <div class="input-group mb-3">
    <div class="input-group-prepend">
        <span class="input-group-text" id="basic-addon1"><i class="fa fa-list-ul" aria-hidden="true"></i></span>
    </div>
        <input type="text" id="clave" name="clave" class="form-control" placeholder="Clave del Centro de Trabajo" required>
    </div>

    <div class="input-group mb-3">
    <div class="input-group-prepend">
        <span class="input-group-text" id="basic-addon1"><i class="fa fa-building" aria-hidden="true"></i></span>
    </div>
        <input type="text" id="nombre" name="nombre" class="form-control" placeholder="Nombre del Centro de Trabajo" required>
    </div>
    
    <div class="input-group mb-3">
    <div class="input-group-prepend">
        <span class="input-group-text" id="basic-addon1"><i class="fa fa-phone-square" aria-hidden="true"></i></span>
    </div>
    <input type="text" id="telefono" name="telefono" class="form-control" placeholder="Teléfono" required>
    </div>

    <div class="input-group mb-3">
    <div class="input-group-prepend">
        <span class="input-group-text" id="basic-addon1"><i class="fa fa-map-marker" aria-hidden="true"></i></span>
    </div>
    <input type="text" id="direccion" name="direccion" class="form-control" placeholder="Dirección" required>
    </div>

    <div class="modal-footer">
    <button type="submit" class="btn btn-success">Guardar</button>
    <button type="button" class="btn btn-danger" data-dismiss="modal">cancelar</button>
    </div>
</form>>
@endsection

@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Edit Post</h1>
        <form action="{{ route('posts.update', $post->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="title">Title</label>
                <input type="text" name="title" class="form-control" value="{{ old('title', $post->title) }}">
            </div>

            <div class="form-group">
                <label for="content">Content</label>
                <textarea name="content" class="form-control">{{ old('content', $post->content) }}</textarea>
            </div>

            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
@endsection
