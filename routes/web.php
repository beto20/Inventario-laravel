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

//RUTAS INTERNAS DE ADMINISTRACION

Route::get('/home', array(
    'as'=>'home',
    'middleware'=>'auth',
    'uses'=>'HomeController@index'
));

Route::get('/soporte',array(
    'as'=>'soporte',
    'middleware'=>'auth',
    'uses'=>'HomeController@soporte'
));


Route::get('/inicioArticulos/{inventario_id}',array(
    'as'=>'inicioArticulos',
    'middleware'=>'auth',
    'uses'=>'HomeController@seleccionArticulos'
));

Route::get('/inicioProveedores',array(
    'as'=>'inicioProveedores',
    'middleware'=>'auth',
    'uses'=>'HomeController@seleccionProveedores'
));

Route::get('/inicioInventarios',array(
    'as'=>'inicioInventarios',
    'middleware'=>'auth',
    'uses'=>'HomeController@seleccionInventarios'
));

Auth::routes();

Route::get('/perfil', 'HomeController@perfil')->name('perfil');

/*--------------------------------------------------------------------------------*/ 


//SECCIONES DE LA PAGINA

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

/*--------------------------------------------------------------------------------*/ 

//RUTAS PARA LOS ARTICULOS

Route::get('agregarArticulo/',array(
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


Route::delete('/eliminarArticulo/{articulo_id}', array(
    'as'=>'eliminarArticulo',
    'middleware'=>'auth',
    'uses'=>'ArticuloController@eliminarArticulo'
));

Route::get('/editarArticulo/{articulo_id}',array(
    'as'=>'editarArticulo',
    'middleware'=>'auth',
    'uses'=>'ArticuloController@editarArticulo'
));

Route::post('/actualizarArticulo/{articulo_id}', array(
    'as'=>'actualizarArticulo',
    'middleware'=>'auth',
    'uses'=>'ArticuloController@actualizarArticulo'
));

Route::get('/buscarArticulo/{buscar?}/{filtro?}', array(
    'as'=>'buscarArticulo',
    'middleware'=>'auth',
    'uses'=>'ArticuloController@buscarArticulo'
    
));

/*--------------------------------------------------------------------------------*/ 

//RUTAS PARA LOS PROVEEDORES


Route::get('agregarProveedor',array(
    'as'=>'agregarProveedor',
    'middleware'=>'auth',
    'uses'=>'ProveedorController@agregarProveedor'
));

Route::post('/guardarProveedor',array(
    'as'=>'guardarProveedor',
    'middleware'=>'auth',
    'uses'=>'ProveedorController@guardarProveedor'
));


Route::get('/Proveedor/{proveedor_id}',array(
    'as'=>'detallesProveedor',
    'middleware'=>'auth',
    'uses'=>'ProveedorController@getProveedorDetalle'
));


Route::delete('/eliminarProveedor/{proveedor_id}', array(
    'as'=>'eliminarProveedor',
    'middleware'=>'auth',
    'uses'=>'ProveedorController@eliminarProveedor'
));

Route::get('/editarProveedor/{proveedor_id}',array(
    'as'=>'editarProveedor',
    'middleware'=>'auth',
    'uses'=>'ProveedorController@editarProveedor'
));

Route::post('/actualizarProveedor/{proveedor_id}', array(
    'as'=>'actualizarProveedor',
    'middleware'=>'auth',
    'uses'=>'ProveedorController@actualizarProveedor'
));

Route::get('/buscarProveedor/{buscar?}', array(
    'as'=>'buscarProveedor',
    'middleware'=>'auth',
    'uses'=>'ProveedorController@buscarProveedor'
    
));


/*--------------------------------------------------------------------------------*/ 

//RUTAS PARA LOS INVENTARIOS

Route::get('agregarInventario',array(
    'as'=>'agregarInventario',
    'middleware'=>'auth',
    'uses'=>'InventarioController@agregarInventario'
));

Route::post('/guardarInventario',array(
    'as'=>'guardarInventario',
    'middleware'=>'auth',
    'uses'=>'InventarioController@guardarInventario'
));



Route::get('/Inventario/{inventario_id}',array(
    'as'=>'detallesInventario',
    'middleware'=>'auth',
    'uses'=>'InventarioController@getInventarioDetalle'
));


Route::delete('/eliminarInventario/{inventario_id}', array(
    'as'=>'eliminarInventario',
    'middleware'=>'auth',
    'uses'=>'InventarioController@eliminarInventario'
));

Route::get('/editarInventario/{inventario_id}',array(
    'as'=>'editarInventario',
    'middleware'=>'auth',
    'uses'=>'InventarioController@editarInventario'
));

Route::post('/actualizarInventario/{inventario_id}', array(
    'as'=>'actualizarInventario',
    'middleware'=>'auth',
    'uses'=>'InventarioController@actualizarInventario'
));

Route::get('/buscarInventario/{buscar?}', array(
    'as'=>'buscarInventario',
    'middleware'=>'auth',
    'uses'=>'InventarioController@buscarInventario'
    
));
