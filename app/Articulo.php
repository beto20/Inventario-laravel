<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Articulo extends Model
{
    protected $table='articulos';
    protected $fillable = ['id', 'categoria_id', 'producto_id','cantidad'];

    public function persona(){
        return $this->belongsTo('App\User','persona_id');
    }



    protected $primaryKey='id';
}
