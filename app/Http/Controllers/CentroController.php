<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\CentrosTrabajo; // Importa el modelo correspondiente
use DB;

class CentroController extends Controller
{
    public function inicio(){
        $Centros = DB::table('centros_trabajo')->select('*')->orderBy('clave_ct', 'ASC')->get();
        return view('dashboard',compact('Centros'));
    } 

    public function guardar(Request $request)
    {
        // Crear el nuevo registro en la base de datos
        CentrosTrabajo::create([
            'clave_ct' => $request->clave,
            'nombre_ct' => $request->nombre,
            'telefono' => $request->telefono,
            'direccion' => $request->direccion,
        ]);

        return redirect()->back()->with(array(
            "message"=>'El Centro de Trabajo se agrego correctamente'
        ));
    }

    public function deleteCentro($id){
        $centro = CentrosTrabajo::find($id);
        $centro->delete();

        return redirect()->back()->with(array(
            "Elimessage"=>'El Centro de Trabajo se elimino correctamente'
        ));
    }

    // Actualizar registro CT
    public function updateCentro(Request $request, $id){
        $centro = CentrosTrabajo::findOrFail($id);

        $centro->clave_ct = $request->clave;
        $centro->nombre_ct = $request->nombre;
        $centro->telefono = $request->telefono;
        $centro->direccion = $request->direccion;

        $centro->save();

        return redirect()->back()->with(array(
            "Upmessage"=>'El Centro de Trabajo se actualizo correctamente'
        ));
    }

}
