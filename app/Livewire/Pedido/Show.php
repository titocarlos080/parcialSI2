<?php

namespace App\Livewire\Pedido;

use App\Models\DetallePedido;
use App\Models\Direccion;
use App\Models\Estado;
use App\Models\MetodoPago;
use App\Models\Pedido;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use PhpParser\Node\Stmt\TryCatch;

class Show extends Component
{
    public $pagar = false;
    public $carrito ;
    public $metodoPagos;
    public $direcciones;
  

     

    public function realizarPago()
    {
        $this->pagar = true;
    }
    public function render()
    {
        $user= Auth::user()->id;
        
        $this->direcciones=Direccion::where('id_usuario',$user)->get();
         
         $this->metodoPagos=MetodoPago::all();
        return view('livewire.pedido.show');
    }
}
