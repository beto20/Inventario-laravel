<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Categoria;
use App\Producto;
use App\Imports\ProductoImport;
use App\Exports\ArticulosExport;
use Maatwebsite\Excel\Facades\Excel;
use DB;

class ProductoController extends Controller
{
    public function index(){
        $categoria = DB::table('categorias')->select('*')->get();

        $producto = DB::table('productos as p')
        ->leftjoin('categorias as c', 'p.categoria_id', '=', 'c.id')
        ->select('p.*', 'c.nombre as nom_cat')
        ->get();

        return view('Producto.producto', compact('categoria', 'producto'));
    }

    public function import(Request $request) 
    {
        $file = $request->file('documento_excel');

        Excel::import(new ProductoImport, $file);

        return redirect()->back()->with('success', 'All good!');
    }

    public function guardarProducto(Request $request){
        Producto::create([
            'categoria_id' => $request->producto,
            'clave_producto' => $request->clave,
            'nombre_producto' => $request->nombre,
            'detalles' => $request->detalles,
        ]);

        return redirect()->back();
    }

    public function editarCategoria(Request $request, $id){
        $categoria = Categoria::findOrFail($id);

        $categoria->nombre = $request->nombre;
        $categoria->save();

        return redirect()->back();
    }

    public function eliminarCategoria($id){
        $categoria = Categoria::find($id);
        $categoria->delete();

        return redirect()->back();
    }

    public function editarProducto(Request $request, $id){
        $producto = Producto::findOrFail($id);

        $producto->categoria_id = $request->producto;
        $producto->nombre_producto = $request->nombre;
        $producto->detalles = $request->detalles;
        $producto->save();

        return redirect()->back();

    }

    public function eliminarProducto($id){
        $producto = Producto::find($id);
        $producto->delete();
        
        return redirect()->back();

    }

    public function exportarExcel(){
        return Excel::download(new ArticulosExport, 'productos.xlsx');
    }
        
}
