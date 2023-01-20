<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class cotizacion extends Model
{
    use HasFactory;
    protected $table = 'cotizacion';
    protected $fillable = [
    'id_item',
    'material',
    'desc_material',
    'parte_numero',
    'parte_numero_alterno',
    'condicion',
    'cantidad',
    'u_medida',
    'condicion_ofertada',
    'um_ofertada',
    'cantidad_ofertada',
    'vlr_unidad_sin_iva',
    'total_sin_iva',
    'entrega_en_dias',
    'validez_en_dias',
    'incoterms',
    'incoterms',
    'garantia',
    'moneda',
    'observaciones',
    'proveedor',
    'estudio_id'
    ];

    public function cotizacion_proveedor()
    {
        return $this->belongsTo(User::class, 'proveedor', 'id');
    }
}
