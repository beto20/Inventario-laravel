<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Inventario extends Model
{
    protected $table='inventarios';
    
    protected $primaryKey='id';
    
    public function persona(){
        return $this->belongsTo('App\User','persona_id');
    }

    public function articulos()
    {
        return $this->hasMany('App\Articulo', 'articulo_id', 'id');
    }
}
