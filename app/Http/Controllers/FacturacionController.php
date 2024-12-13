<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Facturacion;
use App\CentrosTrabajo;
use App\Categoria;
use App\Producto;
use App\Articulo;
use Barryvdh\DomPDF\Facade as PDF;
use DB;

class FacturacionController extends Controller
{
    //
    public function index(){
        $facturas = DB::table('facturas as f')
        ->leftjoin('productos as p', 'f.producto_id', '=', 'p.id')
        ->select('f.*', 'p.nombre_producto')->get();

        $centros = CentrosTrabajo::OrderBy('clave_ct', 'ASC')->get();
        $categoria = Categoria::all();
        $producto = Producto::all();
        $totalFa = Facturacion::sum('total');
        $articulos = DB::table('articulos as a')
                        ->join('productos as p', 'a.producto_id', '=', 'p.id')
                        ->select('a.*', 'p.nombre_producto')->get();

        $ultimoNumeroFactura = Facturacion::max('numero_factura');
        $nuevoNumeroFactura = $ultimoNumeroFactura ? $ultimoNumeroFactura + 1 : 1;

        return view('Facturacion.facturacion', compact('facturas','centros','categoria','producto', 'totalFa','articulos','nuevoNumeroFactura'));
    }

    public function crearFactura(Request $request){
        $user=\Auth::user();

        // Validar los datos de la factura
        $validatedData = $request->validate([
            'numero_factura' => 'required',
            'producto_id' => 'required|exists:articulos,id',
            'centro' => 'required',
            'fecha' => 'required',
            'precio' => 'required',
            'cantidad' => 'required|integer|min:1',
            'total' => 'required'
        ]);

        // Crear la nueva factura
        $factura = Facturacion::create([
            'numero_factura' => $validatedData['numero_factura'],
            'producto_id' => $validatedData['producto_id'],
            'ct_id' => $validatedData['centro'],
            'fecha_factura' => $validatedData['fecha'],
            'precio' => $validatedData['precio'],
            'cantidad' => $validatedData['cantidad'],
            'total' => $validatedData['total'],
            'user_id' => $user->id
            // otros campos
        ]);

        // Obtener el artículo relacionado
        $articulo = Articulo::find($validatedData['producto_id']);

        // Verificar si hay suficiente stock
        if ($articulo->cantidad >= $validatedData['cantidad']) {
            // Restar la cantidad seleccionada
            $articulo->cantidad -= $validatedData['cantidad'];
            $articulo->save();
        } else {
            return back()->withErrors(['error' => 'No hay suficiente stock del artículo.']);
        }

        return redirect()->back()->with('success', 'Factura creada y cantidad de artículo actualizada.');
    }

    public function getProductos($categoryId){
        
        $products = Producto::where('categoria_id', $categoryId)->get();
        return response()->json($products);

    }

    public function getProductoPrecio($id){

        $producto = Articulo::find($id);

        if($producto){
            return response()->json(['precio' => $producto->Pventa]);
        }else{
            return response()->json(['precio' => 0]);
        }

    }

    public function eliminarFactura($id){
        $factura = Facturacion::find($id);
        $factura->delete();

        return redirect()->back();

    }

    public function descargarFactura($id){
        $factura = DB::table('facturas')->select('*')->where('id', $id)->get();

        $pdf = \PDF::loadview('Facturacion.PDF.Factura', compact('factura'))->setPaper('a4','landscape');
        return $pdf->download('Factura.pdf');


    }
}
