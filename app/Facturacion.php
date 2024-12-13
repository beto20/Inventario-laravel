<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Facturacion extends Model
{
    //
    protected $table = 'facturas';
    protected $fillable = ['id', 'numero_factura', 'ct_id','fecha_factura','categoria_id ','producto_id','precio','cantidad','total','user_id'];
}
