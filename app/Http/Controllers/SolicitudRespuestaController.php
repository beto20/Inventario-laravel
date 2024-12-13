<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Solicitud;
use App\solicitudRespuesta;
use App\CentrosTrabajo;
use App\Articulo;
use DB;

class SolicitudRespuestaController extends Controller
{
    public function index(){
        $solicitud = Solicitud::select('solicitud.*', 'centros_trabajo.nombre_ct')
        ->join('centros_trabajo', 'solicitud.ct_id', '=', 'centros_trabajo.clave_ct')
        ->get();

        return view('Solicitud.RespuestaSolicitud', ['solicitud' => $solicitud]);
    }

    public function detalles($id){
        $solicitud = DB::table('solicitud as s')
        ->join('productos as p', 's.producto_id', '=', 'p.id')
        ->select('s.*','p.clave_producto', 'p.nombre_producto')->where('s.id', $id)->get();
        
        return view('Solicitud.RespuestaDetalles', compact('solicitud'));
    }

    public function update(Request $request, $id)
    {
        // Encontrar la solicitud
        $solicitud = Solicitud::findOrFail($id);

        // Determinar la acción (autorizar o rechazar)
        if ($request->estatus == 'autorizar') {
            $estatus = 'Autorizada';

            $solicitud->estatus_solicitud = $estatus;
            $solicitud->save();

            // Guardar el detalle en la tabla de detalles de la solicitud
            solicitudRespuesta::create([
            'solicitud_id' => $solicitud->id,
            'producto_id' => $request->producto,
            'estatus' => $estatus,
            'cantidad' => $request->cantidad,  // Por si se quiere agregar cantidad
            'ct_id' => $request->centro
            ]);
            
            //Actualizar Cantidad de productos en inventario
            DB::table('articulos')
            ->where('producto_id', $request->producto)
            ->update([
                'cantidad' => DB::raw('cantidad - '.$request->cantidad),
            ]);


        } elseif ($request->estatus == 'rechazar') {
            $estatus = 'Rechazada';

            // Actualizar el estatus en la tabla principal
            $solicitud->estatus_solicitud = $estatus;
            $solicitud->save();

            // Guardar el detalle en la tabla de detalles de la solicitud
            solicitudRespuesta::create([
                'solicitud_id' => $solicitud->id,
                'producto_id' => $request->producto,
                'estatus' => $estatus,
                'cantidad' => 0,  
                'ct_id' => $request->centro
                ]);
        }

        // Redirigir o enviar una respuesta
        return redirect()->back();
    }

}
