<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\HttpFoundation\Response;

use App\Proveedor;

class ProveedorController extends Controller
{

    public function agregarProveedor(){
        return view('proveedor.agregarProveedor');
    }    

    public function guardarProveedor(Request $request){
        //validar formulario
        $validatedData=$this->validate($request,[
            'nom_empresa'=>'required',
            'descripcion'=>'required',
            'rubro'=>'required'

        ]);

        $proveedor= new Proveedor();
        $user=\Auth::user();
        $proveedor->user_id=$user->id;
        $proveedor->nom_empresa=$request->input('nom_empresa');
        $proveedor->descripcion=$request->input('descripcion');
        $proveedor->rubro=$request->input('rubro');



        $proveedor->save();
        return redirect()->route('inicioProveedores')->with(array(
            "message"=>'Proveedor agregado correctamente'
        ));

    }


    public function getProveedorDetalle($proveedor_id){
        $proveedor=Proveedor::find($proveedor_id);
        return view('proveedor.detallesProveedor', array(
            'proveedor'=>$proveedor
        ));
    }

    public function eliminarProveedor($proveedor_id){
        Proveedor::destroy($proveedor_id);
        $message=array('message'=>'Proveedor eliminado');
        return redirect()->route('inicioProveedores')->with($message);
    }

    public function editarProveedor($proveedor_id){
        $user=\Auth::user();
        $proveedor=Proveedor::findOrFail($proveedor_id);
        return view('proveedor.editarProveedor', array('proveedor'=>$proveedor));
    }

    public function actualizarProveedor($proveedor_id,Request $request){
        
        $validatedData=$this->validate($request,[
            'nom_empresa'=>'required',
            'descripcion'=>'required',
            'rubro'=>'required'
        ]);
        
        $user=\Auth::user();
        $proveedor=Proveedor::findOrFail($proveedor_id);
        
        $proveedor->user_id=$user->id;
        $proveedor->nom_empresa=$request->input('nom_empresa');
        $proveedor->descripcion=$request->input('descripcion');
        $proveedor->rubro=$request->input('rubro');


        $proveedor->update();
        return redirect()->route('inicioProveedores')->with(array(
            "message"=>'Proveedor actualizado correctamente'
        ));


    }

    public function buscarProveedor($buscar=null){
        if (is_null($buscar)) {
            $buscar=\Request::get('buscar');
            return redirect()->route('buscarProveedor', array('buscar'=>$buscar));
        }

        $proveedor=Proveedor::where('rubro','LIKE','%'.$buscar.'%')->paginate(5);

        return view('proveedor.buscarProveedor',array(
            'proveedores'=>$proveedor,
            'buscar'=>$buscar 
        ));
    }

}
