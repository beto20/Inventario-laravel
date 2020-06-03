<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\HttpFoundation\Response;

use App\Articulo;

class ArticuloController extends Controller
{
    public function agregarArticulo(){
        return view('articulo.agregarArticulo');
    }    

    public function guardarArticulo(Request $request){
        //validar formulario
        $validatedData=$this->validate($request,[
            'nombre'=>'required',
            'categoria'=>'required',
            'descripcion'=>'required',
            'cantidad'=>'Integer|required',
            'tipo'=>'required',
            'stock_max'=>'numeric|required',
            'stock_min'=>'numeric|required',
            'p_venta'=>'numeric|required',
            'costo'=>'numeric|required',
            'imagen'=>'required'
        ]);

        $articulo= new Articulo();
        $user=\Auth::user();
        $articulo->user_id=$user->id;
        $articulo->nombre=$request->input('nombre');
        $articulo->categoria=$request->input('categoria');
        $articulo->descripcion=$request->input('descripcion');
        $articulo->cantidad=$request->input('cantidad');
        $articulo->tipo=$request->input('tipo');
        $articulo->stock_max=$request->input('stock_max');
        $articulo->stock_min=$request->input('stock_min');
        $articulo->p_venta=$request->input('p_venta');
        $articulo->costo=$request->input('costo');
        $imagen=$request->file('imagen');

        if ($imagen) {
            $imagen_path=$imagen->getClientOriginalName();
            \Storage::disk('imagenes')->put($imagen_path,\File::get($imagen));
            $articulo->imagen=$imagen_path;
        }


        $articulo->save();
        return redirect()->route('home')->with(array(
            "message"=>'Articulo agregado correctamente'
        ));



    }

    public function getImagen($filename){
        $file=Storage::disk('imagenes')->get($filename);
        return new Response($file,200);
    }

    public function getArticuloDetalle($articulo_id){
        $articulo=Articulo::find($articulo_id);
        return view('articulo.detallesArticulo', array(
            'articulo'=>$articulo
        ));
    }

}
