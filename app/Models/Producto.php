<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Producto extends Model
{
    use HasFactory;
       
    public $timestamps = false;
    protected $table = 'producto';
    protected $fillable = ['id','nombre','imagen','descripcion','stock','precio','id_categoria','id_talla','id_sucursal'];

    public function talla(): BelongsTo {
        return $this->belongsTo(Talla::class, 'id_talla');
    }

    public function categoria(): BelongsTo {
        return $this->belongsTo(Categoria::class, 'id_categoria');
    }
    public function sucursal(): BelongsTo {
        return $this->belongsTo(Sucursal::class, 'id_sucursal');
    }
    
}
