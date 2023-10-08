<?php

namespace App\Http\Controllers;


use App\Models\Usuario;
use Illuminate\Http\Request;

class RegistroController extends Controller
{   
    //
    public function registro()
    {
        return view('register');
    }
    public function registrar(Request $request)
    {     
         
        $usuario= new Usuario();
        $usuario->nombre=$request->nombre;
        $usuario->email=$request->email;
        $usuario->foto=$request->foto || '';
        $usuario->telefono=$request->telefono || '';
        $usuario->password=$request->password;
        $usuario->id_rol=2;
        $usuario->save(); 
        return redirect()->route('login');
 
    }
}
