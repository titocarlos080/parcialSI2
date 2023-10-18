<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Pago extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = 'pago';
    protected $fillable = ['id','monto','descripcion','id_metodo','id_pedido'];

    public function metodopago(): BelongsTo {
        return $this->belongsTo(MetodoPago::class, 'id_metodo');
    } 
    public function pedido(): HasMany {
        return $this->hasMany(Pedido::class, 'id_pedido');
    }
      

}
/*
 CREATE TABLE pago(
	id serial PRIMARY KEY,
	monto real CHECK(monto>0),	
	descripcion varchar(60),
	id_metodo int NOT NULL,
	id_pedido int NOT NULL,
	FOREIGN KEY (id_pedido) REFERENCES pedido(id),
	FOREIGN KEY (id_metodo) REFERENCES metodo_pago(id)
);

 */