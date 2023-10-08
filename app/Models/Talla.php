<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Talla extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = 'talla';
    protected $fillable = ['id', 'nombre'];
    public function productos(): HasMany {
        return $this->hasMany(Producto::class, 'id_talla');
    }

}
