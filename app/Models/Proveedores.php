<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Proveedores extends Model
{
    use HasFactory;

    public function proveedor_aeronave()
    {
        return $this->hasMany(Aeronaves::class, 'proveedor', 'id');
    }

    public function proveedor_capacidades()
    {
        return $this->hasMany(CapacidadesModel::class, 'proveedor', 'id');
    }
    public function proveedor_otras_capacidades()
    {
        return $this->hasMany(OtrasCapacidades::class, 'proveedor', 'id');
    }

    public function proveedor_configuracion()
    {
        return $this->hasMany(ConfigProveedor::class, 'proveedor', 'id');
    }
}
