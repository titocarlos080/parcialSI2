<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Envio extends Model
{
    use HasFactory;
    protected $table = 'envio';
    protected $fillable = ['id_direccion','id_pedido','id_metodo_envio'];

    public function dicreccion() :HasOne
     { 
        return $this->hasOne(Direccion::class,'id_direccion');
        
    }public function pedido() :HasOne
     { 
        return $this->hasOne(Direccion::class,'id_pedido');
        
    }public function metodoenvio() :BelongsTo
     { 
        return $this->belongsTo(MetodoEnvio::class,'id_metodo_envio');
        
    }

}

/*
CREATE TABLE envio(
	id_direccion int NOT NULL ,
	id_pedido  	int  NOT NULL,
	id_metodo_envio int NOT NULL,
	PRIMARY KEY(id_direccion,id_pedido),
	FOREIGN KEY (id_metodo_envio) REFERENCES metodo_envio(id) , 
	FOREIGN KEY (id_direccion) REFERENCES direccion(id) , 
	FOREIGN KEY (id_pedido) REFERENCES pedido(id)  

); */