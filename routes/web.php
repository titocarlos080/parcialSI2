<?php

use App\Http\Controllers\ControllerDireccion;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\EmpleadoController;
use App\Http\Controllers\PedidoController;
use App\Http\Controllers\RegistroController;
use App\Livewire\Direccion\Create;
use App\Livewire\Reportes\Pago;
use App\Mail\Pedido\ConfirmarPedido;
use Illuminate\Support\Facades\Route;

Route::middleware('guest')->group(
    function () {
        Route::get('/', [LoginController::class, 'index'])->name('index');
        Route::get('/login', [LoginController::class, 'login'])->name('login');
        Route::get('/registro', [RegistroController::class, 'registro'])->name('registro');
        Route::post('/registrar', [RegistroController::class, 'registrar'])->name('registrar');
        Route::post('/login', [LoginController::class, 'authenticate']);
        Route::get('/categoria', [DashboardController::class, 'categorias'])->name('categoria');
        Route::get('/realizar_pedido', [PedidoController::class, 'realizar_pedido'])->name('realizar_pedido');
    }
);
// Rutas protegidas 
Route::middleware(['auth', 'auth.admin'])->group(
    function () {
        Route::get('/dashboard', [DashboardController::class, 'home'])->name('home');
        Route::get('/dashboard/gestionar_productos', [DashboardController::class, 'productos'])->name('gestionar_productos');
        Route::get('/dashboard/gestionar_pedidos', [DashboardController::class, 'pedidos'])->name('gestionar_pedidos');
        Route::get('/dashboard/gestionar_sucursales', [DashboardController::class, 'sucursales'])->name('gestionar_sucursales');
        Route::get('/dashboard/gestionar_empleados', [DashboardController::class, 'empleados'])->name('gestionar_empleados');
        Route::get('/dashboard/gestionar_reportes', [DashboardController::class, 'reportes'])->name('gestionar_reportes');
        Route::get('/dashboard/gestionar_notasventa', [DashboardController::class, 'notaventa'])->name('gestionar_notaventa');
        Route::get('/dashboard/gestionar_Historial', [DashboardController::class, 'notaventa'])->name('gestionar_Historial');
        Route::get('/dashboard/confirmar_pedido/{idpedido}', [ConfirmarPedido::class, 'confirmarpedido'])->name('confirmar_pedido');
       
      
      
    }
);

Route::middleware(['auth', 'auth.cliente'])->group(
    function () {
        Route::get('/realizar_pedido', [PedidoController::class, 'realizar_pedido'])->name('realizar_pedido');
        Route::post('/realizar_pago', [PedidoController::class, 'realizar_pago'])->name('realizar_pago');
        Route::get('/productos/cliente', [LoginController::class, 'index'])->name('cliente');
        Route::get('/mis_pedidos/{idcliente}', [PedidoController::class, 'mispedidos'])->name('pedidos_cliente');
        Route::post('/nueva_direccion', [ControllerDireccion::class, 'crear']);

    }
);
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
Route::get('/reportes/pago/{id}', [Pago::class, 'generarPDF']);

 
