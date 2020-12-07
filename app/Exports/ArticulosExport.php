<?php

namespace App\Exports;

use App\Articulo;
use Maatwebsite\Excel\Concerns\FromCollection;

class ArticulosExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */

    protected $user_id;

    function __construct($user_id) {
            $this->user_id = $user_id;
    }
    
    

    public function collection()
    {
        return Articulo::where('user_id',$this->user_id)->get()([
            'nombre', 'cantidad'
        ]);
    }

    /*




    public function collection()
    {
        return Articulo::all();
    }

    */
}
