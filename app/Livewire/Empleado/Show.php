<?php

namespace App\Livewire\Empleado;

use Illuminate\Support\Facades\DB;
use Livewire\Component;

class Show extends Component
{

    public $empleados;
    public function render()
    { 
        $this->empleados=  DB::select('SELECT * from USUARIO where id_rol = ?', [2]);
        return view('livewire.empleado.show');
    }
}
