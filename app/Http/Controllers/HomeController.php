<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Articulo;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $articulos=Articulo::orderBy('id','desc')->paginate(5);
        return view('home', array(
            'articulos'=>$articulos
        ));
    }
    public function perfil(){
        return view('perfil');
    }


}
