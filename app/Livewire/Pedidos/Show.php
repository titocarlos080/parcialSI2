<?php

namespace App\Livewire\Pedidos;

use App\Models\DetallePedido;
use App\Models\Estado;
use App\Models\Pedido;
use Illuminate\Support\Facades\DB;
use Livewire\Attributes\On;
use Livewire\Component;

class Show extends Component
{
    public $pedidos;
    public $pedidoSeleccionado;
    public $estados;
    public $id_estado;
    public $detallepedido;
    public $estados_seleccionado;
    public $vistaDetalle = false;
    public $total = 0;

    public function verDetalles($id)
    {
        $this->pedidoSeleccionado = $id;

        $this->detallepedido =   DB::select('SELECT * FROM detalle_pedido WHERE id_pedido=?', [$id]);
    }

    #[On('cerrar-vista_detalle')]
    public function cerrar()
    {
        $this->vistaDetalle = false;
    }
    #[On('abrir-vista_detalle')]
    public function abrir()
    {
        $this->vistaDetalle = true;
    }
    public function actualizarEstado($pedido_id)
    {
        $id = $this->id_estado;
        Pedido::where('id', $pedido_id)->update(['id_estado' => $id]);
         
    }
    public function render()
    {
        $this->pedidos = Pedido::all();
        $this->estados = Estado::all();


        return view('livewire.pedidos.show');
    }
}
