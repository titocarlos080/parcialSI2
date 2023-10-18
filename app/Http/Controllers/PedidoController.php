<?php

namespace App\Http\Controllers;

use App\Models\DetallePedido;
use App\Models\Estado;
use App\Models\Pedido;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class PedidoController extends Controller
{
    //
    public function realizar_pago(Request $request)
    {
        try {
            DB::beginTransaction();
            $carri  =    $request->carrito;
            $carrito  =  json_decode($carri, true);

            $userid = Auth::user()->id;
            $estado_inicial = Estado::find(1);
            $pedido = new Pedido();
            $pedido->id_usuario = $userid;
            $pedido->id_estado = $estado_inicial->id;
            $pedido->save();

            foreach ($carrito as $prod) {
                $producto =  json_decode($prod, true);

                $detalle_pedido = new DetallePedido();
                $detalle_pedido->id_producto = $producto['id'];
                $detalle_pedido->id_pedido = $pedido->id;
                $detalle_pedido->cantidad = $producto['cantidad'];
                $detalle_pedido->precio = $producto['precio'];
                $detalle_pedido->precio_parcial = $producto['subtotal'];
                $detalle_pedido->save();
            }
            DB::commit();
            return redirect()->back()->with(['pedido' => 'Pedido realizada exitosamente', 'pedido_id' => $pedido->id]);

 
            //code...
        } catch (\Throwable $th) {
            DB::rollBack();
            return redirect()->back()->with('nopedido', ' Ups. Ocurrió un error.');

 
            //throw $th;
        }
    }

    public function mispedidos($iduser)
    {
        return view('livewire.mis-pedidos',['userid'=>$iduser]);
    }
    public function realizar_pedido()
    {
        return view('pedido');
    }
}
