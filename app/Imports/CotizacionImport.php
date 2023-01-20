<?php

namespace App\Imports;

use App\Models\cotizacion;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithStartRow;

class CotizacionImport implements ToModel, WithStartRow
{
    protected $dato;

    public function __construct($dato = null)
    {
        $this->dato = $dato;
    }
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {

        return new cotizacion([
            'id_item'              => $row[0],
            'material'             => $row[1],
            'desc_material'        => $row[2],
            'parte_numero'         => $row[3],
            'parte_numero_alterno' => $row[4],
            'condicion'            => $row[5],
            'cantidad'             => $row[6],
            'u_medida'             => $row[7],
            'condicion_ofertada'   => $row[8],
            'um_ofertada'          => $row[9],
            'cantidad_ofertada'    => $row[10],
            'vlr_unidad_sin_iva'   => $row[11],
            'total_sin_iva'        => $row[12],
            'entrega_en_dias'      => $row[13],
            'validez_en_dias'      => $row[14],
            'incoterms'            => $row[15],
            'incoterms'            => $row[16],
            'garantia'             => $row[17],
            'moneda'               => $row[18],
            'observaciones'        => $row[15],
            'proveedor'            => auth()->id(),
            'estudio_id'           => $this->dato,
        ]);
    }

    /**
     * @return int
     */
    public function startRow(): int
    {
        return 2;
    }
}
