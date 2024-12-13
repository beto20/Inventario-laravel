<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Factura</title>
</head>
<body>
    <div class="invoice-container">
        <div class="invoice-header">
            <h1>Factura</h1>
            <img src="{{asset(url('img/logo-inbal.png'))}}" alt="Logo Empresa" width="300px">
        </div>

        <div class="invoice-info">
            <div>
                <h3>INBAL</h3>
                <p>Instituto Nacional de Bellas Artes y Literatura<br>
                Dirección: Avenida Paseo de la Reforma y Campo Marte s/n, Col. Polanco Chapultepec, Del. Miguel Hidalgo, C. P. 11560, Ciudad de México<br>
                Teléfono: 800 904 4000<br>
                Correo: infoinba@inba.gob.mx</p>
            </div>
    @foreach($factura as $fac)
            <div>
                <h3>Factura Número: {{ $fac->numero_factura }}</h3>
                <p>Fecha de Factura: {{ $fac->fecha_factura }}<br>
            </div>
        </div>

        <table class="table table-striped">
            <thead>
                <tr>

                    <th>Producto</th>
                    <th>Cantidad</th>
                    <th>Precio Unitario</th>
                    <th>Total</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>{{$fac->producto_id}}</td>
                    <td>{{$fac->cantidad}}</td>
                    <td>{{$fac->precio}}</td>
                    <td>{{$fac->total}}</td>
                </tr>
            </tbody>
        </table>

        <div class="invoice-summary">
            <table>
                <tr>
                    <th>Subtotal:</th>
                    <td>$265.00</td>
                </tr>
                <tr>
                    <th>IVA (21%):</th>
                    <td>$55.65</td>
                </tr>
                <tr class="total">
                    <th>Total:</th>
                    <td>$320.65</td>
                </tr>
            </table>
        </div>
    @endforeach
        <div class="footer">
            <p>Gracias. Esta es una factura generada electrónicamente.</p>
        </div>
    </div>
</body>
</html>
