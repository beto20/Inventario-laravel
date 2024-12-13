@extends('layouts.app')

@section('scripts')
<script src="script.js"></script>
@endsection

@section('content')
<div class="container">
    <!-- Nav tabs -->
    <ul class="nav nav-tabs" role="tablist" class="navbar navbar-light" style="background-color: #e3f2fd;">
        <li class="nav-item">
        <a class="nav-link active" data-toggle="tab" href="#categorias">Categorias</a>
        </li>
        <li class="nav-item">
        <a class="nav-link" data-toggle="tab" href="#productos">Productos</a>
        </li>
        <li class="nav-item">
        <a class="nav-link" data-toggle="tab" href="#proveedores">Proveedores</a>
        </li>
    </ul>

    <div class="tab-content">
        <div id="categorias" class="container tab-pane active">
            <br>
            <button class="btn btn-primary btn-sm">Nueva Categoria</button>
            <br><br>
            <!-- <label for="categorySelect">Categoría:</label>
            <select id="categorySelect" onchange="updateOptions()">
                <option value="">Seleccione una categoría</option>
                <option value="frutas">Frutas</option>
                <option value="verduras">Verduras</option>
            </select>

            <label for="itemSelect">Item:</label>
            <select id="itemSelect" disabled>
                <option value="">Seleccione un item</option>
            </select> -->
            <table class="table">
                <thead  class="thead-primary" align="center">
                    <th>Nombre</th>
                    <th>Editar</th>
                    <th>Eliminar</th>
                </thead>
                <tbody align="center">
                    <td colspan="3">
                        <div class="alert-danger">No existe ninguna categoria</div>
                    </td>
                </tbody>
            </table>
        </div>

        <div id="productos" class="container tab-pane fade">
            <h1>Productos</h1>
        </div>

        <div id="proveedores" class="container tab-pane fade">
            <h1>Proveedores</h1>
        </div>

    </div>
</div>

@endsection