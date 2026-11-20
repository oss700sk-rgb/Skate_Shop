<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use Illuminate\Http\Request;

class ProductoController extends Controller
{
    public function index(Request $request)
    {
        $productos = Producto::query()
            ->when($request->consulta, function ($query, $consulta) {
                $query->where(function ($b) use ($consulta) {
                    $b->where('nombre', 'like', "%$consulta%")
                        ->orWhere('marca', 'like', "%$consulta%")
                        ->orWhere('tipo', 'like', "%$consulta%")
                        ->orWhere('descripcion', 'like', "%$consulta%");
                });
            })
            ->when($request->tipo, function ($query, $tipo) {
                $query->where('tipo', $tipo);
            })
            ->latest('id')->get();

        return view('productos.index', compact('productos'));
    }

    public function create()
    {
        return view('productos.create');
    }

    public function store(Request $request)
    {
        Producto::create($this->validar($request));

        return redirect()->route('productos.index')->with('success', 'Producto creado.');
    }

    public function edit(Producto $producto)
    {
        return view('productos.edit', compact('producto'));
    }

    public function update(Request $request, Producto $producto)
    {
        $producto->update($this->validar($request));

        return redirect()->route('productos.index')->with('success', 'Producto actualizado.');
    }

    public function destroy(Producto $producto)
    {
        $producto->delete();

        return redirect()->route('productos.index')->with('success', 'Producto eliminado.');
    }

    private function validar(Request $request): array
    {
        $datos = $request->validate([
            'nombre' => ['required', 'string', 'max:255'],
            'marca' => ['required', 'string', 'max:255'],
            'medida' => ['required', 'string', 'max:255'],
            'tipo' => ['required', 'in:'.implode(',', Producto::TIPOS)],
            'precio' => ['required', 'numeric', 'min:0'],
            'stock' => ['required', 'integer', 'min:0'],
            'descripcion' => ['nullable', 'string'],
            'imagen' => ['nullable', 'image', 'max:2048'],
        ]);

            
        unset($datos['imagen']);

        if ($request->hasFile('imagen')) {
            $datos['imagen'] = $request->file('imagen')->store('productos', 'public');
        }

        return $datos;
    }
}
