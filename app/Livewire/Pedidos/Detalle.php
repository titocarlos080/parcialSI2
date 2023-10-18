<?php

namespace App\Livewire\Pedidos;

use Illuminate\Support\Facades\DB;
use Livewire\Attributes\On;
use Livewire\Component;

class Detalle extends Component
{
    public $detallepedido;

    public function cancelar()
    {
        $this->dispatch('cerrar-vista_detalle');
    }
    #[On('salta-vista_detalle')]
    public function vista($id)
    {
         dd($id);
         $this->dispatch('abrir-vista_detalle');
      
    }


    public function render()
    {
        return view('livewire.pedidos.detalle');
    }
}
