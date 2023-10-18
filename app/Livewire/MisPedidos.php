<?php

namespace App\Livewire;

use App\Models\Pedido;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class MisPedidos extends Component
{
    public $user;
    public $pedidos;

    public function render()
    {
        $this->user= Auth::user()->id;
        $this->pedidos=$this->user->pedidos;

        return view('livewire.mis-pedidos');
    }
}
