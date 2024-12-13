<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\CentrosTrabajo;
use App\Producto;
use App\Solicitud;
use App\Categoria;
use DB;

class SolicitudController extends Controller
{
    public function index(){
        $centros = CentrosTrabajo::all();
        $productos = Producto::all();
        $categories = Categoria::all();

        return view('Solicitud.CrearSolicitud', compact('centros','productos', 'categories'));
    }

    public function getProductsByCategory($categoryId)
    {
        $products = Producto::where('categoria_id', $categoryId)->get();
        return response()->json($products);
    }

    public function guardar(Request $request){
        $solicitud = new Solicitud();
        $solicitud->nombre = $request->input('nombre');
        $solicitud->ct_id = $request->input('centro');
        $solicitud->categoria_id = $request->input('categoria');
        $solicitud->producto_id = $request->input('producto');
        $solicitud->cantidad = $request->input('cantidad');
        $solicitud->descripcion = $request->input('texto');
        $solicitud->save();

        return redirect()->back()->with('agregar', 'ok');

    }
}
