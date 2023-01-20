<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TipoCapacidades extends Model
{
    use HasFactory;
    protected $table = 'tipo_capacidades';
    public function tipo_subTipo()
    {
        return $this->hasMany(TipoSubCapacidades::class, 'tipo_principal', 'id');
    }

    public function subTipo_item()
    {
        return $this->hasMany(ItemCapacidades::class, 'tipo_sub_capaciodad', 'id');
    }
}
