<?php

namespace App\Imports;

use App\Producto;
use Maatwebsite\Excel\Concerns\ToModel;

class ProductoImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Producto([
            'categoria_id' => $row[0],
            'clave_producto' => $row[1],
            'nombre_producto' => $row[2],
            'detalles' => $row[3]


        ]);
    }
}
