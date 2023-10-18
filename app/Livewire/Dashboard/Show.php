<?php

namespace App\Livewire\Dashboard;

use Illuminate\Support\Facades\DB;
use Livewire\Component;

class Show extends Component
{
   public  $monto;
    public function render()
    {   $this->monto= DB::table('detalle_pedido')->sum('precio_parcial');
        return view('livewire.dashboard.show');
    }
}
