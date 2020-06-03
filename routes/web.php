<?php

use Illuminate\Support\Facades\Route;
use App\Articulo;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('index');
});

Auth::routes();

//Route::get('/home', 'HomeController@index')->name('home');
Route::get('/home', array(
    'as'=>'home',
    'middleware'=>'auth',
    'uses'=>'HomeController@index'
));


Auth::routes();

Route::get('/perfil', 'HomeController@perfil')->name('perfil');


Route::get('/index', function(){
    return view('index');
});
Route::get('/producto',function(){
    return view('producto');
});
Route::get('/nosotros', function(){
    return view('nosotros');
});
Route::get('/blog', function(){
    return view('blog');
});

Route::get('agregarArticulo',array(
    'as'=>'agregarArticulo',
    'middleware'=>'auth',
    'uses'=>'ArticuloController@agregarArticulo'
));

Route::post('/guardarArticulo',array(
    'as'=>'guardarArticulo',
    'middleware'=>'auth',
    'uses'=>'ArticuloController@guardarArticulo'
));

Route::get('/imagen/{filename}', array(
    'as'=>'imagenArticulo',
    'middleware'=>'auth',
    'uses'=>'ArticuloController@getImagen'
));

Route::get('/articulo/{articulo_id}',array(
    'as'=>'detallesArticulo',
    'middleware'=>'auth',
    'uses'=>'ArticuloController@getArticuloDetalle'
));

