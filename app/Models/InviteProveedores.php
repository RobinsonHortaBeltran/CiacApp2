<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InviteProveedores extends Model
{
    use HasFactory;
    protected $table = 'invite_proveedores';

    public function invite_creator()
    {
        return $this->belongsTo(User::class, 'creator', 'id');
    }
}
