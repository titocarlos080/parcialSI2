<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Facades\Hash;

class Sucursal extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = 'sucursal';
    protected $fillable = ['id', 'id_ciudad'];

    public function ciudad(): BelongsTo
    {
        return $this->belongsTo(Ciudad::class, 'id_ciudad');
    }
    public function productos(): HasMany
    {
        return $this->hasMany(Producto::class, 'id_sucursal');
    }
}
