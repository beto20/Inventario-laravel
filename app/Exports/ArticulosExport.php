<?php

namespace App\Exports;

use App\Producto;
use DB;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class ArticulosExport implements FromCollection, WithHeadings, WithStyles
{
    /**
    * @return \Illuminate\Support\Collection
    */  
    public function headings(): array
    {
        return [
            'ID',
            'CATEGORÍA',
            'CLAVE',
            'NOMBRE',
            'DETALLES'
        ];
    }

    public function collection()
    {
        $productos = DB::table('productos')->select('id','categoria_id','clave_producto','nombre_producto','detalles')->get();
        return $productos;
    }
    
    public function styles(Worksheet $sheet)
    {
        // Aplica negritas a la primera fila (encabezados)
        return [
            1 => ['font' => ['bold' => true]],
        ];
    }
}
