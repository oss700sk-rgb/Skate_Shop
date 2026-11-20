<?php

use App\Http\Controllers\PedidoController;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// Después de iniciar sesión Breeze manda a /dashboard: lo mandamos al catálogo
Route::get('/dashboard', function () {
    return redirect()->route('productos.index');
})->middleware('auth')->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Cualquier usuario con sesión: ver el catálogo, comprar y ver sus pedidos
    Route::get('/productos', [ProductoController::class, 'index'])->name('productos.index');
    Route::get('/productos/{producto}/comprar', [PedidoController::class, 'create'])->name('pedidos.create');
    Route::post('/productos/{producto}/comprar', [PedidoController::class, 'store'])->name('pedidos.store');
    Route::get('/pedidos', [PedidoController::class, 'index'])->name('pedidos.index');
});

// Solo el admin: crear, editar y eliminar productos
Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::resource('productos', ProductoController::class)->except(['index', 'show']);
});

require __DIR__.'/auth.php';
