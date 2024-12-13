<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\User;
use DB;

class RegistroController extends Controller
{
    public function index(){
        return view('Registro.registrar');
    }

    public function registrar(Request $request){
        // Guardar el usuario con la contraseña encriptada
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->empresa = $request->empresa;
        $user->ct_id = $request->centro;
        $user->password = Hash::make($request->password); // Encriptar la contraseña
        $user->role = $request->role;
        $user->save();

        return redirect()->back()->with('agregar', 'ok');
    }

    public function listado(){
        $users = DB::table('users as us')
        ->join('centros_trabajo as ct', 'us.ct_id', '=', 'ct.clave_ct')
        ->select('us.*', 'ct.nombre_ct')->orderBy('id', 'DESC')->get(); 

        return view('Registro.listado', compact('users'));
    }
}
