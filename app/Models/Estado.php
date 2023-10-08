<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Estado extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = 'talla';
    protected $fillable = ['id', 'nombre'];
    public function pedidos(): HasMany {
        return $this->hasMany(Pedido::class, 'id_pedido');
    }

}
/*
CREATE TABLE estado(
	id serial PRIMARY KEY,
	nombre varchar(60) NOT NULL
);
 */