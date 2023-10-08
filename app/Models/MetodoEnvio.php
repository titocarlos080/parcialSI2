<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class MetodoEnvio extends Model
{
    use HasFactory;
    protected $table = 'metodo_envio';
    protected $fillable = ['id','nombre','costo'];

    public function envios() :HasMany
     { 
        return $this->hasMany(Envio::class,'id_direccion');
        
    } 

}
