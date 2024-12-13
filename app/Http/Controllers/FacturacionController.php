<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Facturacion;
use App\CentrosTrabajo;
use App\Categoria;
use App\Producto;
use App\Articulo;

use DB;

class FacturacionController extends Controller
{
    //
    public function index(){
        $facturas = DB::table('facturas as f')
        ->join('categorias as c', 'f.categoria_id', '=', 'c.id')
        ->join('productos as p', 'f.producto_id', '=', 'p.id')
        ->select('f.*', 'c.nombre as nom_cat', 'p.nombre_producto')->get();

        $centros = CentrosTrabajo::OrderBy('clave_ct', 'ASC')->get();
        $categoria = Categoria::all();
        $producto = Producto::all();
        $totalFa = Facturacion::sum('total');

        return view('Facturacion.facturacion', compact('facturas','centros','categoria','producto', 'totalFa'));
    }

    public function crearFactura(Request $request){
        // $validatedData=$this->validate($request,[
        //     'centro'=>'required',
        //     'fecha'=>'required',
        //     'categoria'=>'required',
        //     'producto'=>'required',
        //     'precio'=>'numeric|required',
        //     'cantidad'=>'numeric|required',
        //     'total'=>'numeric|required',

        // ]);
        $facturacion= new Facturacion();
        $user=\Auth::user();
        

        $facturacion->ct_id=$request->input('centro');
        $facturacion->fecha_factura=$request->input('fecha');
        $facturacion->categoria_id=$request->input('categoria');
        $facturacion->producto_id=$request->input('producto');
        $facturacion->precio=$request->input('precio');
        $facturacion->cantidad=$request->input('cantidad');
        $facturacion->total=$request->input('total');
        $facturacion->user_id=$user->id;

        $facturacion->save();

        return redirect()->back();
    }

    public function getProductos($categoryId){
        
        $products = Producto::where('categoria_id', $categoryId)->get();
    return response()->json($products);

    }

    public function eliminarFactura($id){
        $factura = Facturacion::find($id);
        $factura->delete();

        return redirect()->back();

    }

}
