<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Inventario extends Model
{
    protected $table='inventarios';
    public function persona(){
        return $this->belongsTo('App\User','persona_id');
    }
}
