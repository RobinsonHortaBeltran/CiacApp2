<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TipoSubCapacidades extends Model
{
    use HasFactory;
    protected $table = 'tipo_sub_capacidades';

    public function subTipo_item()
    {
        return $this->hasMany(ItemCapacidades::class, 'tipo_sub_capaciodad', 'id');
    }
}
