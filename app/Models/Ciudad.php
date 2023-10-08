<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Ciudad extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = 'ciudad';
    protected $fillable = ['id', 'nombre'];
    public function sucursales(): HasMany {
        return $this->hasMany(Sucursal::class, 'id_sucursal');
    }
}
