<?php

namespace App\Livewire\Sucursales;

use App\Models\Sucursal;
use Livewire\Component;

class Show extends Component
{
    public $sucursales;
    public function render()
    {
        $this->sucursales= Sucursal::all();
        return view('livewire.sucursales.show');
    }
}
