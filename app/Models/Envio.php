<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Envio extends Model
{
    use HasFactory;
    protected $table = 'envio';
    protected $fillable = ['id','id_direccion','id_pedido'];

    public function dicreccion() :HasOne
     { 
        return $this->hasOne(Direccion::class,'id_direccion');
        
    }public function pedido() :HasOne
     { 
        return $this->hasOne(Direccion::class,'id_pedido');
        
    }
}
