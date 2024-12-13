function calcularTotal() {
    const cantidad1 = parseFloat(document.getElementById('precio').value) || 0;
    const cantidad2 = parseFloat(document.getElementById('cantidad').value) || 0;
    
    const total = cantidad1 * cantidad2;
    document.getElementById('total').value = total;
}

document.getElementById('toggleButton').addEventListener('click', function() {
    var card = document.getElementById('myCard');
    if (card.style.display === 'none') {
        card.style.display = 'block';
        this.textContent = 'Cancelar';
    } else {
        card.style.display = 'none';
        this.textContent = 'Nueva Factura';
        }
});


$(document).ready(function() {
    $("#agregarProducto").click(function() {
        var nuevaFila = `<tr>
                            <td>
                                <select name="categoria" id="categoria" class="form-control">
                                    <option value="">Selecciona una Categoría</option>
                                    @foreach($categoria as $cate)
                                    <option value="{{ $cate->id }}">{{ $cate->nombre }}</option>
                                    @endforeach
                                </select>
                            </td>
                            <td>
                                <select name="producto" id="producto" class="form-control">
                                    <option value="">Selecciona un Producto</option>
                                    @foreach($producto as $prod)
                                    <option value="{{ $prod->id }}">{{ $prod->nombre_producto }}</option>
                                    @endforeach
                                </select>
                            </td>
                            <td><input type="text" id="precio" name="precio" class="form-control"></td>
                            <td><input type="number" id="cantidad" name="cantidad" class="form-control"></td>
                            <td><input type="number" id="total" name="total" step="0.01" class="form-control"></td>
                            <td><button type="button" class="btn btn-danger btn-sm eliminarFila"><i class="fa fa-trash-o" aria-hidden="true"></i></button></td>
                        </tr>`;
        $("#tablaFacturas tbody").append(nuevaFila);
    });
});

// Manejar el evento de eliminación
$(document).on("click", ".eliminarFila", function() {
    $(this).closest("tr").remove();
});
