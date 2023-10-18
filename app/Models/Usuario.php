<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
 use Laravel\Sanctum\HasApiTokens;
 use Illuminate\Notifications\Notifiable;
 use Illuminate\Foundation\Auth\User as Authenticatable;

class Usuario extends  Authenticatable
{
    use HasFactory;
    use HasApiTokens, HasFactory, Notifiable;

    public $timestamps = false;
    protected $table = 'usuario';
    protected $fillable = ['id','nombre', 'email','foto','telefono', 'password' , 'id_rol'];

    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];
    public function direccion(): HasMany
    {
        return $this->hasMany(Direccion::class, 'id_usuario');
    }
    public function pedido(): HasMany {
        return $this->hasMany(Pedido::class, 'id_usuario');
    }  
    public function rol(): BelongsTo {
        return $this->belongsTo(Rol::class, 'id_rol');
    }

// 123456789/*-Azure
}
