<?php

namespace App\Http\Controllers;

use App\Models\Pedido;
use App\Models\Producto;
use Illuminate\Http\Request;

class PedidoController extends Controller
{
    // lista de pedidos 
    public function index(Request $request)
    {
        if ($request->user()->esAdmin()) {
            $pedidos = Pedido::latest()->get();
        } else {
            $pedidos = Pedido::where('user_id', $request->user()->id)->latest()->get();
        }

        return view('pedidos.index', compact('pedidos'));
    }

    // Formulario de compra de un producto
    public function create(Producto $producto)
    {
        return view('pedidos.create', compact('producto'));
    }

    // Guarda el pedido y descuenta el stock
    public function store(Request $request, Producto $producto)
    {
        $request->validate([
            'cantidad' => ['required', 'integer', 'min:1', 'max:'.$producto->stock],
            'nombre_envio' => ['required', 'string', 'max:255'],
            'telefono' => ['required', 'string', 'max:20'],
            'direccion' => ['required', 'string', 'max:255'],
            'ciudad' => ['required', 'string', 'max:100'],
        ]);

        Pedido::create([
            'user_id' => $request->user()->id,
            'producto_id' => $producto->id,
            'producto_nombre' => $producto->nombre,
            'cantidad' => $request->cantidad,
            'total' => $producto->precio * $request->cantidad,
            'nombre_envio' => $request->nombre_envio,
            'telefono' => $request->telefono,
            'direccion' => $request->direccion,
            'ciudad' => $request->ciudad,
        ]);

        // Le resto al stock lo que se compró
        $producto->stock = $producto->stock - $request->cantidad;
        $producto->save();

        return redirect()->route('pedidos.index')->with('success', 'Compra realizada. Tu pedido quedó registrado.');
    }
}
