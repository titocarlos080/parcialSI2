<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class MetodoPago extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = 'metodo_pago';
    protected $fillable = ['id', 'nombre'];
    public function pagos(): HasMany {
        return $this->hasMany(Pago::class, 'id_metodo');
    }

}
