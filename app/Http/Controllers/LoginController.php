<?php

namespace App\Http\Controllers;

use App\Models\Usuario;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use function Laravel\Prompts\password;

class LoginController extends Controller
{

    public function index()
    {
        return view('index');
    }

    public function login()
    {
        return view('login');
    }

    public function categorias()
    {

        return dd("dashboard.categoria");
    }


    public function authenticate(Request $request): RedirectResponse
    {

        $credencial = $request->validate(['email' => ['required', 'email'], 'password' => ['required']]);

        $credenciales = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);
        if (Auth::attempt($credenciales)) {
            $request->session()->regenerate();
            $usuario = Auth::user();
            $rol=$usuario->rol->nombre;
            if ($rol==='Administrador' || $rol==='Empleado') {
                return redirect()->route('home');
            }
            return redirect('/');
        }
        return back()->with('error', 'Credenciales incorrectas');
    }

    public function logout(Request $request)
    {
        //registrarBitacora('Ha cerrado sesión.');

        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/');
    }
}
