<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Pedido extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = 'pedido';
    protected $fillable = ['id', 'id_usuario', 'id_estado'];

    public function usuario(): BelongsTo
    {
        return $this->belongsTo(Usuario::class, 'id_usuario');
    }
    public function detalle(): HasMany
    {
        return $this->hasMany(DetallePedido::class,'id_pedido');
    }
    public function estado(): BelongsTo
    {
        return $this->belongsTo(Estado::class, 'id_estado');
    }
    public function pago(): HasOne
    {
        return $this->hasOne(Pago::class, 'id_pedido');
    }
    
}
/*
CREATE TABLE pedido(
	id serial PRIMARY KEY,
	id_usuario int NOT NULL,
 	id_estado int NOT NULL,
	FOREIGN KEY (id_usuario) REFERENCES  usuario(id),
 	FOREIGN KEY (id_estado) REFERENCES estado(id)

);
*/