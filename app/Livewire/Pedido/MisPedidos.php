<?php

namespace App\Livewire\Pedido;

use App\Models\Pedido;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class MisPedidos extends Component
{
    public $user;
    public $pedidos;

    public function render()
    {
        $userid = Auth::user()->id ;
        $this->pedidos = Pedido::where('id_usuario',$userid)->get();
        return view('livewire.pedido.mis-pedidos');
    }
}
