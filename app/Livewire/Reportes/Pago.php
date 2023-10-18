<?php

namespace App\Livewire\Reportes;

use App\Models\DetallePedido;
use App\Models\Pedido;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class Pago extends Component
{
     public $pedidoSeleccionado;
     public $total;
     public $estado;


    public function generarPDF($pedido_id)
    {   
        $this->estado =DB::select('select nombre from pedido,estado where pedido.id_estado=estado.id  and pedido.id = ?', [$pedido_id]);
        $nombre = $this->estado[0]->nombre;
       
        
         

      
         
        $detallePedido=DetallePedido::where('id_pedido',$pedido_id)->get();
        $this->pedidoSeleccionado=$pedido_id;
        $pdf= pdf::loadView('livewire.reportes.pago',['detallepedido'=>$detallePedido,'estado'=>$nombre]);
        return $pdf->stream('reporte.pdf');
    }
    public function render()
    {

        return view('livewire.reportes.pago');
    }
}
