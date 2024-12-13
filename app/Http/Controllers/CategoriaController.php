<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Categoria;
use DB;

class CategoriaController extends Controller
{
    public function index(){
        $categoria = DB::table('categorias')->select('*')->get();
        return view('Categoria.categoria',compact('categoria'));
    }

    public function guardarCategoria(Request $request)
    {
        // Crear el nuevo registro en la base de datos
        Categoria::create([
            'nombre' => $request->nombre,
        ]);

        // Redireccionar o responder
        return redirect()->back();
    }
}
