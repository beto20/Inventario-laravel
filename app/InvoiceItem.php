<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class InvoiceItem extends Model
{
    //
    protected $table = 'invoice_items';
    protected $fillable = ['id', 'invoice_id', 'producto_id', 'cantidad', 'precio'];
}
