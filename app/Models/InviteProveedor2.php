<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InviteProveedor2 extends Model
{
    use HasFactory;
    protected $table = 'invite_proveedores_2';

    public function proveedor_estudio()
    {
        return $this->belongsTo(Estudios::class, 'estudio', 'id');
    }
}
