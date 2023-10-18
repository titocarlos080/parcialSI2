<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class DetallePedido extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = 'detalle_pedido';
    protected $fillable = ['id_producto', 'id_pedido', 'cantidad', 'precio','precio_parcial'];
    protected $primaryKey = ['id_producto', 'id_pedido']; // Columnas que conforman la clave primaria compuesta
    public $incrementing = false; 
    public function pedido(): BelongsTo
    {
        return $this->belongsTo(Pedido::class,'id_pedido');
    }
    public function producto(): BelongsTo
    {
        return $this->belongsTo(Producto::class,'id_producto');
    }
}
/*
CREATE TABLE detalle_pedido(
	id_producto int NOT NULL,
	id_pedido int NOT NULL,
	cantidad int NOT NULL,
	precio real CHECK(precio>=0),
	PRIMARY KEY ( id_producto,id_pedido),
 	FOREIGN KEY (id_producto) REFERENCES producto(id) ,
 	FOREIGN KEY (id_pedido) REFERENCES pedido(id)  
	
);
*/