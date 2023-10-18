<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function home()
    {
        return view("dashboard.dashboard");
    }
    public function productos()
    {
        return view("dashboard.productos"); // aqui adentro tallas y categorias +++ = INVENTARIO
    }
    public function pedidos() 
    {
        return view("dashboard.pedidos");
    }
    public function ciudades()
    {
        return view("dashboard.ciudades");// aqui adentro mas sucursales
    }
    
}
