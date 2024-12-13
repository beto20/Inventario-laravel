<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Solicitud;

class solicitudRespuesta extends Model
{
    protected $table='solicitud_respuesta';
    protected $fillable = ['solicitud_id', 'producto_id', 'cantidad', 'estatus','ct_id'];

    public function solicitud()
    {
        return $this->belongsTo(Solicitud::class);
    }
}
