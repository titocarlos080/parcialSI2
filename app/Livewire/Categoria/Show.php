<?php

namespace App\Livewire\Categoria;

use App\Models\Categoria;
use App\Models\Producto;
use League\Flysystem\MountManager;
use Livewire\Component;

class Show extends Component
{
    public $categorias;
    public $nombreEmpresa;
    public $productos_categoria;
    public $productos_mostrar;
    public $productosconcategoria;

    public $categoria_seleccionada='';
    
    public $productos;
    public $buscar;
    public $switch=false;

    public  function mount()
    {
        $this->categorias = Categoria::all();
        $this->nombreEmpresa = "Tawiña";
    }
    public  function conCategoria($id)
    {        
        // $this->switch=true;
        //   $this->productosconcategoria=Producto::where('id_categoria', $id)->get();
       dd('como con');
    } 
    public  function sinCategoria()
    {
        dd('sin cate');
        $this->switch=false;
     }

    public function render()
    { 
        $productos = Producto::where('nombre', 'LIKE', '%' . $this->buscar . '%')->get();
        return view('livewire.categoria.show', ['productos_mostrar' => $productos]);
    }
}
