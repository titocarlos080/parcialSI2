<?php

namespace App\Livewire\Pedido;

use Livewire\Component;

class Show extends Component
{
    public $pagar=false;

    public function realizarPedido() {
        $this->pagar=true;
    }
    public function render()
    {
        return view('livewire.pedido.show');
    }
}
