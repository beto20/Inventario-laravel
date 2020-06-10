<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Proveedor extends Model
{
    protected $table='proveedores';
    public function persona(){
        return $this->belongsTo('App\User','persona_id');
    }
    protected $primaryKey='id';
}
