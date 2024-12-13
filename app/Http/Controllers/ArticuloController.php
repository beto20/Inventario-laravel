<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\HttpFoundation\Response;


use Maatwebsite\Excel\Facades\Excel;
use App\Exports\ArticulosExport;

use App\Articulo;
use App\Proveedor;
use App\Inventario;
use App\CentrosTrabajo;
use App\Producto;
use App\Categoria;

class ArticuloController extends Controller
{
    public function seleccionArticulos(){  
        $articulos = DB::table('articulos as a')
        ->join('users as u', 'a.user_id', '=', 'u.id')
        ->join('categorias as c', 'a.categoria_id', '=', 'c.id')
        ->join('productos as p', 'a.producto_id', '=', 'p.id')
        ->join('proveedores as pro', 'a.proveedor_id', '=', 'pro.id')
        ->select('a.*', 'u.name','c.id as id_cat', 'c.nombre as n_categoria','p.id as id_prod', 'p.nombre_producto', 'pro.id as id_pro', 'pro.nom_empresa')
        ->orderBy('id','desc')->get();

        $categorias = Categoria::all();
        $productos = Producto::all();
        $proveedores = Proveedor::all();

        
        return view('inventario.inicioArticulos', array(
            'articulos'=>$articulos,
            'categorias' => $categorias,
            'productos' => $productos,
            'proveedores' => $proveedores
        ));
    }  

    public function guardarArticulo(Request $request){
        //validar formulario
        $validatedData=$this->validate($request,[
            'categoria'=>'required',
            'producto'=>'required',
            'proveedor'=>'required',
            'fecha'=>'required',
            'Pcompra'=>'numeric|required',
            'Pventa'=>'numeric|required',
            'cantidad'=>'numeric|required',
            'descripcion'=>'required',
        ]);

        $articulo= new Articulo();
        $user=\Auth::user();
        $articulo->user_id=$user->id;
        //$articulo->inventario_id=$inventario->id;
        $articulo->categoria_id=$request->input('categoria');
        $articulo->producto_id=$request->input('producto');
        $articulo->proveedor_id=$request->input('proveedor');
        $articulo->fecha_ingreso=$request->input('fecha');
        $articulo->Pcompra=$request->input('Pcompra');
        $articulo->Pventa=$request->input('Pventa');
        $articulo->cantidad=$request->input('cantidad');
        $articulo->descripcion=$request->input('descripcion');

        $articulo->save();

        return redirect()->back()->with(array(
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

    public function eliminarArticulo($articulo_id){
        Articulo::destroy($articulo_id);
        $message=array('message'=>'Articulo eliminado');
        return redirect()->route('inicioArticulos')->with($message);
    }

    public function editarArticulo($articulo_id){
        $user=\Auth::user();
        $articulo=Articulo::findOrFail($articulo_id);
        return view('articulo.editarArticulo', array('articulo'=>$articulo));
    }

    public function actualizarArticulo($articulo_id,Request $request){
        
        $validatedData=$this->validate($request,[
            'categoria'=>'required',
            'producto'=>'required',
            'proveedor'=>'required',
            'fecha'=>'required',
            'Pcompra'=>'numeric|required',
            'Pventa'=>'numeric|required',
            'cantidad'=>'numeric|required',
            'descripcion'=>'required',
        ]);
        
        $user=\Auth::user();
        $articulo=Articulo::findOrFail($articulo_id);
        
        $articulo->user_id=$user->id;
        $articulo->categoria_id=$request->input('categoria');
        $articulo->producto_id=$request->input('producto');
        $articulo->proveedor_id=$request->input('proveedor');
        $articulo->fecha_ingreso=$request->input('fecha');
        $articulo->Pcompra=$request->input('Pcompra');
        $articulo->Pventa=$request->input('Pventa');
        $articulo->cantidad=$request->input('cantidad');
        $articulo->descripcion=$request->input('descripcion');
        $articulo->update();

        return redirect()->route('inicioArticulos')->with(array(
            "message"=>'Articulo actualizado correctamente'
        ));


    }

    public function buscarArticulo($buscar=null,$filtro=null){
        if (is_null($buscar)) {
            $buscar=\Request::get('buscar');
            return redirect()->route('buscarArticulo', array('buscar'=>$buscar));
        }

        if (is_null($filtro) && \Request::get('filtro') && !is_null($buscar)) {
            $filtro=\Request::get('filtro');

            return redirect()->route('buscarArticulo', array('buscar'=>$buscar, 'filtro'=>$filtro));
        }

        $column='id';
        $order='desc';
        if (!is_null($filtro)) {
            if ($filtro=='nuevo') {
                $column='id';
                $order='desc';
            }
            if ($filtro=='viejo') {
                $column='id';
                $order='asc';
            }
        }

        $articulo = DB::table('articulos as a')
        ->join('users as u', 'a.user_id', '=', 'u.id')
        ->join('categorias as c', 'a.categoria_id', '=', 'c.id')
        ->join('productos as p', 'a.producto_id', '=', 'p.id')
        ->join('proveedores as pro', 'a.proveedor_id', '=', 'pro.id')
        ->select('a.*', 'u.name','c.id as id_cat', 'c.nombre as n_categoria','p.id as id_prod', 'p.nombre_producto', 'pro.id as id_pro', 'pro.nom_empresa')
        ->where('p.nombre_producto','LIKE','%'.$buscar.'%')->orderBy($column, $order)->paginate(5);;

        $categorias = Categoria::all();
        $productos = Producto::all();
        $proveedores = Proveedor::all();

        return view('articulo.buscarArticulo',array(
            'articulos'=>$articulo,
            'buscar'=>$buscar,
            'categorias' => $categorias,
            'productos' => $productos,
            'proveedores' => $proveedores 
        ));
    }

    public function exportarExcel(Request $request)
    {
        $articulo= new Articulo();
        $user=\Auth::user();
        $articulo->user_id=$user->id;

        return Excel::download(new ArticulosExport($request->user_id=$user->id), 'MttRegistrations.xlsx');

        //$articulo->user_id=$user->id;
    }



}