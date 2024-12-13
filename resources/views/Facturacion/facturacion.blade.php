@extends('layouts.app')

@section('content')
<div class="card">
    <div class="card-header text-white" align="center" >
        <h2>Facturación</h2>
    </div>
    <div class="card-body" align="right">
            <button id="toggleButton" class="btn btn-success m-3">Nueva Factura</button>
    <!-- AQUI COMIENZA FORMULARIO PARA AGREGAR FACTURA -->
        <div id="myCard" class="card" style="display: none;">
            <div class="card-body">
                <div class="card" align="center">
                    <div class="card-body">
                        <form action="{{ route('crear.factura') }}" method="POST" enctype='multipart/form-data'>
                            @csrf
                            <div class="row col-12">
                                <div class="input-group mb-3 col-5">
                                    <div class="input-group-prepend">
                                        <button class="btn btn-outline-primary btn-sm" type="button"><i class="fa fa-outdent" aria-hidden="true"></i></button>
                                    </div>
                                    <select id="centro" name="centro" class="form-control" aria-label="Default select example" required>
                                        <option value="">Selecciona un Centro de Trabajo</option>
                                        @foreach($centros as $cent)
                                        <option value="{{ $cent->clave_ct }}">{{ $cent->clave_ct }} | {{ $cent->nombre_ct }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="input-group mb-3 col-5">
                                    <label for="fecha:"><strong>Introduzca la fecha de factura:&nbsp; </strong></label>
                                    <div class="input-group-prepend">
                                        <button class="btn btn-outline-info btn-sm" type="button"><i class="fa fa-calendar" aria-hidden="true"></i></button>
                                    </div>
                                    <input type="date" id="fecha" name="fecha" placeholder="Selecciona la fecha para la factura" required>
                                </div>
                            </div>

                            <table class="table table-bordered" id="tablaFacturas">
                                <thead class="bg-info" align="center">
                                    <th>N° Factura</th>
                                    <th class="col-4">Producto</th>
                                    <th class="col-2">Precio</th>
                                    <th class="col-2">Cantidad</th>
                                    <th class="col-2">Total</th>
                                    <!-- <th>Acción</th> -->
                                </thead>
                                <tbody align="center">
                                    <tr>
                                        <td><input type="text" name="numero_factura" id="numero_factura" class="form-control" value="{{ $nuevoNumeroFactura }}" readonly></td>
                                        <td>
                                            <select name="producto_id" id="articulo" class="form-control" onchange="getProductoPrecio()" required>
                                            <option value="">Seleccione un producto...</option>
                                                @foreach($articulos as $articulo)
                                                    <option value="{{ $articulo->id }}" data-stock="{{ $articulo->cantidad }}">
                                                        {{ $articulo->nombre_producto }} | (Disponible: {{ $articulo->cantidad }})
                                                    </option>
                                                @endforeach
                                            </select>
                                        </td>
                                        <td><input type="number" id="precio" name="precio" class="form-control" min="1" oninput="calcularTotal()" readonly></td>
                                        <td><input type="number" id="cantidad" name="cantidad" class="form-control" oninput="calcularTotal()" required></td>
                                        <td><input type="number" id="total" name="total" step="0.01" class="form-control" readonly></td>
                                        <!-- <td><button type="button" class="btn btn-danger btn-sm eliminarFila"><i class="fa fa-trash-o" aria-hidden="true"></i></button></td> -->
                                    </tr>
                                </tbody>
                            </table>
                            
                            <!-- <button type="button" id="agregarProducto" class="btn btn-primary ">Agregar Producto</button> -->
                            <button type="submit" class="btn btn-success col-2">Crear Factura</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    <!-- ACA TERMINA FORMULARIO-->
    </div>
</div>

<div class="container">
    @if(session('success'))
        <div class="alert alert-success">
            {{session('success')}}
        </div>   
    @endif
</div>

<table class="table table-bordered">
    <thead class="bg-secondary text-white" align="center">
        <tr><th colspan="8"><h3>Listado de Facturas Emitidas</h3></th></tr>
        <tr>
            <th>N° Factura</th>
            <th>Producto</th>
            <th>Fecha Factura</th>
            <th>Cantidad</th>
            <th>Precio</th>
            <th>Total Factura</th>
            <th>Acción</th>
        </tr>
    </thead>
    <tbody align="center">
        @if($facturas->count() >= 1)
            @foreach($facturas as $fact)
                <tr>
                    <th>{{ $fact->numero_factura }}</th>
                    <th>{{ $fact->nombre_producto }}</th>
                    <th>{{ Carbon\Carbon::parse($fact->fecha_factura)->format('d-m-Y') }}</th>
                    <th>{{ $fact->cantidad }}</th>
                    <th>$ {{ $fact->precio }}</th>
                    <th>$ {{ $fact->total }}</th>
                    <th>
                        <form action="{{ route('eliminar.factura', $fact->id) }}" class="formulario-eliminar">
                            <button class="btn btn-danger btn-sm m-1"><i class="fa fa-trash" aria-hidden="true"></i></button>
                        </form>
                        <a href="{{route('factura.pdf', $fact->id)}}" class="btn btn-warning btn-sm"><i class="fa fa-file-pdf-o" aria-hidden="true"></i></a>
                    </th>
                </tr>
            @endforeach
                <tr>
                    <th colspan="7" class="text-right">TOTAL: $ {{$totalFa}}</th>
                    
                </tr>
        @else
            <tr align="center">
                <td colspan="8" class="alert alert-danger"><i class="fa fa-exclamation-circle" aria-hidden="true"></i>&nbsp;No existe ninguna factura</td>
            </tr>
        @endif
    </tbody>
</table>


<script>
    function getProductoPrecio(){
        var productoId = document.getElementById('articulo').value;

        if(productoId){
            //Se realiza la petición AJAX a laravel para obtener el precio del producto
            fetch('/get-producto-precio/' + productoId)
                .then(response => response.json())
                .then(data => {
                    //Se asigna el precio al input
                    document.getElementById('precio').value = data.precio;
                })
                .catch(error => console.error('Error:', error));
        }else{
            document.getElementById('precio').value = '';
        }
    }
</script>

<script>
    const articuloSelect = document.getElementById('articulo');
    const cantidadInput = document.getElementById('cantidad');

    articuloSelect.addEventListener('change', function () {
        const stockDisponible = parseInt(articuloSelect.selectedOptions[0].getAttribute('data-stock'));
        cantidadInput.setAttribute('max', stockDisponible);
    });
</script>

<script>
        document.getElementById('category-select').addEventListener('change', function() {
        var categoryId = this.value;
        
        // Limpiar el select de productos
        var productSelect = document.getElementById('product-select');
        productSelect.innerHTML = '<option value="">Seleccione un producto</option>';
        
        if (categoryId) {
            // Hacer la solicitud AJAX para obtener los productos
            fetch(`/get-products-by-category/${categoryId}`)
                .then(response => response.json())
                .then(data => {
                    data.forEach(function(product) {
                        var option = document.createElement('option');
                        option.value = product.id;
                        option.text = product.nombre_producto;
                        productSelect.appendChild(option);
                    });
                })
                .catch(error => console.error('Error:', error));
        }
    });

    $('.formulario-eliminar').submit(function(e){
        e.preventDefault();

        Swal.fire({
            title: '¿Estas Seguro?',
            text: "¡No podrás modificarlo después!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#d33',
            cancelButtonColor: '#3085d6',
            confirmButtonText: '¡Si, Eliminar!'
        }).then((result) => {
            if (result.value) {
                this.submit()
            }
        })
    });
</script>

<script src="{{asset(url('js/Factura/factura.js'))}}"></script>
@endsection