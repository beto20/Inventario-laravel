<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\HttpFoundation\Response;

use App\Inventario;
use App\Categoria;
use App\Producto;
use App\Articulo;

class InventarioController extends Controller
{
    public function agregarInventario(){
        return view('inventario.agregarInventario');
    }    

    public function guardarInventario(Request $request){
        //validar formulario
        $validatedData=$this->validate($request,[
            'nombre'=>'required',
            'descripcion'=>'required'
        ]);

        $inventario= new Inventario();
        $user=\Auth::user();
        $inventario->user_id=$user->id;
        $inventario->nombre=$request->input('nombre');
        $inventario->descripcion=$request->input('descripcion');


        $inventario->save();
        return redirect()->route('inicioInventarios')->with(array(
            "message"=>'Inventario agregado correctamente'
        ));



    }



    public function getInventarioDetalle($inventario_id){
        $inventario=Inventario::find($inventario_id);
        return view('inventario.detallesInventario', array(
            'inventario'=>$inventario
        ));
    }

    public function eliminarInventario($inventario_id){

        Inventario::destroy($inventario_id);
        $message=array('message'=>'Inventario eliminado');
        return redirect()->route('inicioInventarios')->with($message);
    }

    public function editarInventario($inventario_id){
        $user=\Auth::user();
        $inventario=Inventario::findOrFail($inventario_id);
        return view('inventario.editarInventario', array('inventario'=>$inventario));
    }

    public function actualizarInventario($inventario_id,Request $request){
        
        $validatedData=$this->validate($request,[
            'nombre'=>'required',
            'descripcion'=>'required'
            
        ]);

        $user=\Auth::user();
        $inventario=Inventario::findOrFail($inventario_id);
        
        $inventario->user_id=$user->id;
        $inventario->nombre=$request->input('nombre');
        $inventario->descripcion=$request->input('descripcion');

        $inventario->update();
        return redirect()->route('inicioInventarios')->with(array(
            "message"=>'Inventario actualizado correctamente'
        ));


    }

    public function buscarInventario($buscar=null){
        if (is_null($buscar)) {
            $buscar=\Request::get('buscar');
            return redirect()->route('buscarInventario', array('buscar'=>$buscar));
        }

       
        $inventario=Inventario::where('nombre','LIKE','%'.$buscar.'%')->paginate(5);

        return view('inventario.buscarInventario',array(
            'inventarios'=>$inventario,
            'buscar'=>$buscar 
        ));
    }

    public function getProds($categoryId){
        
        $products = Producto::where('categoria_id', $categoryId)->get();
        return response()->json($products);

    }
}
