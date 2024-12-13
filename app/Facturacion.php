<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Facturacion extends Model
{
    //
    protected $table = 'facturas';
    protected $fillable = ['id', 'ct_id','fecha_factura','categoria_id ','producto_id','precio','cantidad','total'];
}
