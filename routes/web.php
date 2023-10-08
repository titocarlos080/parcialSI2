<?php

use App\Http\Controllers\LoginController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PedidoController;
use App\Http\Controllers\RegistroController;

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
        
    }
);
Route::middleware(['auth', 'auth.empleado'])->group(
    function () {
        Route::get('/empleado/dashboard', [DashboardController::class, 'home'])->name('empleado');
        Route::get('/dashboard/gestionar_productos', [DashboardController::class, 'productos'])->name('gestionar_productos');
        Route::get('/dashboard/gestionar_pedidos', [DashboardController::class, 'pedidos'])->name('gestionar_pedidos');
        Route::get('/dashboard/gestionar_sucursales', [DashboardController::class, 'sucursales'])->name('gestionar_sucursales');
        
    }
);



Route::middleware(['auth', 'auth.cliente'])->group(
    function () {
        Route::get('/realizar_pedido', [PedidoController::class, 'realizar_pedido'])->name('realizar_pedido');
        Route::get('/realizar_pago', [PedidoController::class, 'realizar_pedido'])->name('realizar_pago');
        Route::get('/productos/cliente', [LoginController::class, 'index'])->name('cliente');

    }
);
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

 