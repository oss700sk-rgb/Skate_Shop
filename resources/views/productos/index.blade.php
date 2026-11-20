<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Productos
        </h2>
    </x-slot>

    <div class="py-8">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

            @if (session('success'))
                <div class="mb-4 p-4 rounded-md bg-green-100 text-green-800">
                    {{ session('success') }}
                </div>
            @endif

            {{-- Buscador y botón para crear (solo admin) --}}
            <div class="mb-4 flex flex-col sm:flex-row sm:justify-between gap-4">
                <form method="GET" action="{{ route('productos.index') }}" class="flex gap-2">
                    <x-text-input name="consulta" value="{{ request('consulta') }}" placeholder="Buscar producto..." />
                    <x-primary-button>Buscar</x-primary-button>
                </form>

                @if (auth()->user()->esAdmin())
                    <a href="{{ route('productos.create') }}"
                        class="inline-flex items-center px-4 py-2 bg-yellow-400 rounded-md font-semibold text-xs text-gray-900 uppercase tracking-widest hover:bg-yellow-300">
                        + Nuevo producto
                    </a>
                @endif
            </div>

            {{-- Filtro por tipo: cada botón manda ?tipo=... en la URL --}}
            <div class="mb-6 flex flex-wrap gap-2">
                <a href="{{ route('productos.index') }}"
                    class="px-3 py-1 rounded-full text-sm {{ request('tipo') ? 'bg-white text-gray-700' : 'bg-gray-900 text-white' }}">Todos</a>
                @foreach (\App\Models\Producto::TIPOS as $tipo)
                    <a href="{{ route('productos.index', ['tipo' => $tipo]) }}"
                        class="px-3 py-1 rounded-full text-sm {{ request('tipo') === $tipo ? 'bg-gray-900 text-white' : 'bg-white text-gray-700' }}">{{ $tipo }}</a>
                @endforeach
            </div>

            
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
                @forelse ($productos as $producto)
                    <div class="tarjeta-simple overflow-hidden flex flex-col">
                        @if ($producto->imagen)
                            <img src="{{ asset('storage/'.$producto->imagen) }}" alt="{{ $producto->nombre }}" class="h-48 w-full object-cover">
                        @else
                            <div class="h-48 bg-gray-200 flex items-center justify-center text-gray-500 text-sm">Sin foto</div>
                        @endif

                        <div class="p-4 flex flex-col flex-1">
                            <p class="text-xs text-gray-500 uppercase">{{ $producto->tipo }} · {{ $producto->marca }}</p>
                            <h3 class="font-semibold text-gray-900">{{ $producto->nombre }}</h3>
                            <p class="text-sm text-gray-500">Medida/talla: {{ $producto->medida }}</p>
                            <p class="mt-2 text-lg font-bold">Q {{ number_format($producto->precio, 2) }}</p>
                            <p class="text-sm {{ $producto->stock > 0 ? 'text-gray-500' : 'text-red-600' }}">
                                {{ $producto->stock > 0 ? $producto->stock.' disponibles' : 'Agotado' }}
                            </p>

                            <div class="mt-auto pt-4 flex items-center gap-3">
                                @if ($producto->stock > 0)
                                    <a href="{{ route('pedidos.create', $producto) }}"
                                        class="px-4 py-2 bg-gray-900 text-white text-sm rounded-md hover:bg-gray-700">Comprar</a>
                                @endif

                                @if (auth()->user()->esAdmin())
                                    <a href="{{ route('productos.edit', $producto) }}" class="text-sm text-gray-900 hover:underline">Editar</a>
                                    <form method="POST" action="{{ route('productos.destroy', $producto) }}"
                                        onsubmit="return confirm('¿Seguro que quieres eliminar este producto?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="text-sm text-gray-900 hover:underline">Eliminar</button>
                                    </form>
                                @endif
                            </div>
                        </div>
                    </div>
                @empty
                    <p class="text-gray-500">No hay productos.</p>
                @endforelse
            </div>

            
        </div>
    </div>
</x-app-layout>

