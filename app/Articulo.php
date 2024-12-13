<?php

namespace App;

use App\Facturacion;
use Illuminate\Database\Eloquent\Model;

class Articulo extends Model
{
    protected $table='articulos';
    protected $primaryKey='id';
    protected $fillable = ['id', 'categoria_id', 'producto_id', 'Pventa', 'cantidad'];

    public function persona(){
        return $this->belongsTo('App\User','persona_id');
    }

    //Relación con facturas
    public function facturas(){
        return $this->hasMany(Factura::class);
    }



}
