<?php

namespace App\Livewire\Producto;

use App\Models\Categoria;
use App\Models\Producto;
use App\Models\Sucursal;
use App\Models\Talla;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\Features\SupportFileUploads\WithFileUploads;

class Create extends Component
{

    public $categorias;
    public $tallas;

    public $sucursales;

    use WithFileUploads;

    public $nombre;
    public $descripcion;
    public $stock;
    public $precio;
    public $foto;
    public $id_categoria;
    public $id_talla;
    public $id_sucursal;

    public function guardarProducto()
    {
        $this->validate([
            'nombre' => 'required|string',
            'descripcion' => 'required|string',
            'stock' => 'required|integer|min:0',
            'precio' => 'required|numeric|min:0',
            'foto' => 'image|mimes:png,jpeg|max:2048',
        ]);
        try {
            $producto = new Producto();
            $producto->nombre = $this->nombre;
            $producto->descripcion = $this->descripcion;
            $producto->stock = $this->stock;
            $producto->precio = $this->precio;
            $producto->id_categoria = $this->id_categoria;
            $producto->id_talla = $this->id_talla;
            $producto->id_sucursal = $this->id_sucursal;
            $producto->save();
            $extensionImagen = $this->foto->getClientOriginalExtension();
            $nombreImagen = 'PROD' . str_pad($producto->id, STR_PAD_RIGHT) . '.' . $extensionImagen;
            $rutaImagen = $this->foto->storeAs('public/imagenes/productos', $nombreImagen);
            $producto->imagen = Storage::url($rutaImagen);
            $producto->save();
            //code...
        } catch (\Throwable $th) {
            dd($th);
        }
    }
    public function cancelar()
    {
    }
    public function render()
    {
        $this->categorias = Categoria::all();
        $this->tallas = Talla::all();
        $this->sucursales = Sucursal::all();

        return view('livewire.producto.create');
    }
}
