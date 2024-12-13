<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Proveedor extends Model
{
    protected $table='proveedores';
    protected $fillable = ['nom_empresa', 'correo', 'telefono','direccion'];

    public function persona(){
        return $this->belongsTo('App\User','persona_id');
    }
    protected $primaryKey='id';
}
