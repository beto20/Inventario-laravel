<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CentrosTrabajo extends Model
{
    protected $table = 'centros_trabajo';
    protected $fillable = ['clave_ct', 'nombre_ct', 'telefono', 'direccion'];
}
