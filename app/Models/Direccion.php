<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Direccion extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = 'direccion';
    protected $fillable = ['id','ciudad','calle','numero' ,'id_usuario'];

    public function usuario(): BelongsTo {
        return $this->belongsTo(Usuario::class, 'id_usuario');
    }
    public function envio(): HasOne
    {
        return $this->hasOne(Envio::class, 'id_direccion');
    }
}

 
