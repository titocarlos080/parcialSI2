<?php

namespace App\Http\Controllers;

use App\Models\Direccion;
use Illuminate\Http\Request;

class ControllerDireccion extends Controller
{
    //
    public function crear(Request $request)
    {
        try {
            $request->validate([
                'ciudad' => 'required',
                'calle' => 'required',
                'numero' => 'required',
            ]);
            $user =  auth()->user();
            $direccion = new Direccion();
            $direccion->ciudad = $request->ciudad;
            $direccion->calle = $request->calle;
            $direccion->numero = $request->numero;
            $direccion->id_usuario = $user->id;
            $direccion->save();
            return redirect()->back()->with('success', 'Dirección creada exitosamente');
        
        } catch (\Throwable $th) {

            return redirect()->back()->with('error', 'Ocurrió un error al crear la dirección');
        }
    }
}
