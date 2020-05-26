<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Articulos extends Model
{
    protected $table='articulo';

    public function persona(){
        return $this->belongsTo('App\User','persona_id');
    }


}
