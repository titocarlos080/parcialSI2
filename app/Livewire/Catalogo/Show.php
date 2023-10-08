<?php

namespace App\Livewire\Catalogo;

use App\Models\Catalogo;
use App\Models\Categoria;
use App\Models\Ciudad;
use App\Models\Producto;
use App\Models\Sucursal;
use Livewire\Component;

use function PHPUnit\Framework\isEmpty;

class Show extends Component
{
    public $ciudades;
    public $cambioCiudad=false;
    public $ciudadSeleccionada = 1;
    public $sucursales;
    public $sucursalSeleccionada = 1;
    public $categorias;
    public $nombreEmpresa;
    public $productos_categoria;
    public $productosconcategoria;
    public $buscar = '';
    public $switch = false;

    public  function mount()
    {
        $this->ciudades = Ciudad::all();
        $this->sucursales = Sucursal::where('id_ciudad', $this->ciudadSeleccionada)->get();
        $this->categorias = Categoria::all();
        $this->nombreEmpresa = "Tawiña";
    }

    public  function conCategoria($id)
    {


        $this->switch = true;
        $this->productosconcategoria = Producto::where('id_categoria', $id)->get();
    }

    public  function sinCiudad()
    {
        $this->cambioCiudad = false;
        $this->productosconcategoria = '';
    }
    public  function conCiudad($id)
    {
        $this->cambioCiudad = true;
        $this->ciudadSeleccionada = $id;
        $this->sucursales = Sucursal::where('id_ciudad', $this->ciudadSeleccionada)->get();
    }

    public  function sinCategoria()
    {
        $this->switch = false;
        $this->productosconcategoria = '';
    }
    public  function abrirProbador()
    {
        $this->emit('abrirCamara');
    }

    public function render()
    {
        $productos_mostrar = Producto::where('nombre', 'LIKE', '%' . $this->buscar . '%')
            ->orWhere('descripcion', 'LIKE', '%' . $this->buscar . '%')
            ->Where('id_sucursal',$this->sucursalSeleccionada)
            ->get();
        return view('livewire.catalogo.show', ['productos_mostrar' => $productos_mostrar]);
    }
}
