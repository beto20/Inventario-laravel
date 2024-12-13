@extends('layouts.app')

@section('content')
@if (session('agregar') == 'ok')
  <script>
    Swal.fire(
        '¡Enviado!',
        'La solicitud se envió con éxito.',
        'success'
    )      
  </script>
@endif
<div class="card">
  <div class="card-header text-white" bg-color="#248801" align="center" >
    <h2>Solicitud para Almacén</h2>
  </div>

  <br>
  <div class="card text-center" >
    <div class="card-body">
      <strong class="badge badge-danger">*Nota: </strong> Ingrese todos los datos para poder realizar una solicitud y posteriormente enviarla para autorización.
    </div>
  </div>
  <br>
  <form id="form-solicitud" action="{{route('guardar.solicitud')}}" method="POST" enctype='multipart/form-data'>
    @csrf
    <div class="container">
      <div class="row">
        <div class="col-6">
          <label for="nombre"><strong>Nombre</strong></label>
          <input type="text" id="nombre" name="nombre" class="form-control" placeholder="Introduzca su nombre completo">
        </div>
        <div class="col-6">
          <label for="centro"><strong>Centro de Trabajo</strong></label>
          <select name="centro" id="centro" class="form-control">
            <option value="">Seleccione un centro de trabajo</option>
            @foreach($centros as $centro)
              <option value="{{ $centro->clave_ct }}">{{ $centro->clave_ct}} | {{ $centro->nombre_ct }}</option>
            @endforeach
          </select>  
        </div>
      </div>
    </div>

    <div class="container">
      <div class="row">
        <div class="col-4">
          <label for="categoria"><strong>Categoria</strong></label>
          <select id="categoria-select" name="categoria" class="form-control" request>
              <option value="">Seleccione una categoría</option>
              @foreach($categories as $categoria)
                  <option value="{{ $categoria->id }}">{{ $categoria->nombre }}</option>
              @endforeach
          </select>
        </div>

        <div class="col-4">
          <label for="producto"><strong>Producto</strong></label>
          <select id="producto-select" name="producto" class="form-control">
              <option value="">Seleccione el producto a solicitar</option>
          </select>
        </div>
        <div class="col-4"><strong>Cantidad</strong></label>
          <input type="number" id="cantidad" name="cantidad" class="form-control" placeholder="Ingrese la cantidad a solicitar del producto">
        </div>
      </div>
    </div>

    <div class="container">
      <div class="row">
        <div class="col-12">
          <label for="texto"><strong>Descripción</strong></label>
          <textarea name="texto" id="texto" class="form-control" placeholder="Introduzca la descripción para la solicitud"></textarea>
        </div>
      </div>

      <div align="right">
        <button type="submit" id="submitBtn" class="btn btn-success col-3 m-3">Enviar</button>
      </div>
    </div>

  </form>
</div>


<script>
document.getElementById('categoria-select').addEventListener('change', function() {
    var categoryId = this.value;
    
    // Limpiar el select de productos
    var productSelect = document.getElementById('producto-select');
    productSelect.innerHTML = '<option value="">Seleccione el producto a solicitar</option>';
    
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



  document.getElementById('submitBtn').addEventListener('click', function(event) {
      event.preventDefault(); // Evita que el formulario se envíe inmediatamente

      Swal.fire({
          title: '¿Estás seguro?',
          text: "No podrás modificar esta acción.",
          icon: 'warning',
          showCancelButton: true,
          confirmButtonColor: '#14982a',
          cancelButtonColor: '#d33',
          confirmButtonText: 'Sí, enviar!'
      }).then((result) => {
          if (result.isConfirmed) {
              // Si el usuario confirma, se envía el formulario
              document.getElementById('form-solicitud').submit();
          }
      });
  });
</script>
@endsection