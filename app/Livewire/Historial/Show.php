<?php

namespace App\Livewire\Historial;

use Illuminate\Support\Facades\DB;
use Livewire\Component;

class Show extends Component
{
    public $pedidos; 
    public function render()
    {
        
        $this->pedidos= DB::select('select * from pedido where id_estado = ?', [4]);
        return view('livewire.historial.show');
    }
}
