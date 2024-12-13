<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Solicitud extends Model
{
    protected $table='solicitud';
    protected $fillable = ['nombre', 'ct_id', 'producto_id','cantidad', 'descripcion'];
}
