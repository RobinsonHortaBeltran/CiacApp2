<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Items extends Model
{
    use HasFactory;
    protected $fillable = [
        'material',
        'servicio',
        'cantidad',
        'u_medida',
        'creator',
        'forma_pago',
        'estudio_id',
        'condicion_requerida'

    ];

    public function item_cotizacion()
    {
        return $this->belongsTo(cotizacion::class, 'id', 'id_item');
    }
    public function um()
    {
        return $this->belongsTo(UnidadMedida::class, 'u_medida', 'id');
    }
    public function pago()
    {
        return $this->belongsTo(FormaPago::class, 'forma_pago', 'id');
    }
    public function condicion()
    {
        return $this->belongsTo(Condiciones::class, 'condicion_requerida', 'id');
    }
}
