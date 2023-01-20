<?php

namespace App\Imports;

use App\Models\Items;
use Maatwebsite\Excel\Concerns\ToModel;

class ItemsImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {

        return new Items([
            'material'   => $row[0],
            'servicio'   => $row[1],
            'cantidad'   => $row[2],
            'u_medida'   => $row[3],
            'forma_pago' => $row[4],
            'estudio_id' => $row[5],
            'creator'    => auth()->id()
        ]);
    }
}
