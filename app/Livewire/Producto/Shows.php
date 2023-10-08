<?php

namespace App\Livewire\Producto;

use App\Models\Categoria;
use App\Models\Producto;
use App\Models\Talla;
use Livewire\Component;

class Shows extends Component
{
 
    public $productos;
    public $crearProducto=false;
    public $editarProducto=false;
    public $categorias;
    public $tallas;


    public function nuevoProducto()
    {
        $this->crearProducto=true;
    }
      public function render()
    {
       $this->productos=Producto::all();
       $this->categorias=Categoria::all();
       $this->tallas=Talla::all();

        return view('livewire.producto.shows');
    }    
    
}
