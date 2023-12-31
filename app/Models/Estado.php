<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Estado extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = 'estado';
    protected $fillable = ['id', 'nombre'];
    public function pedido(): HasMany {
        return $this->hasMany(Pedido::class, 'id_estado');
    }

}
/*
CREATE TABLE estado(
	id serial PRIMARY KEY,
	nombre varchar(60) NOT NULL
);
 */