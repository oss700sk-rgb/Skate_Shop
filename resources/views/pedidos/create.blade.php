<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Comprar
        </h2>
    </x-slot>

    <div class="py-8">
        <div class="max-w-2xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="caja-skate p-6">

                {{-- Resumen del producto que se va a comprar --}}
                <div class="flex gap-4 mb-6">
                    @if ($producto->imagen)
                        <img src="{{ asset('storage/'.$producto->imagen) }}" alt="{{ $producto->nombre }}" class="h-24 w-24 object-cover rounded">
                    @endif
                    <div>
                        <p class="text-xs text-gray-500 uppercase">{{ $producto->tipo }} · {{ $producto->marca }}</p>
                        <h3 class="font-semibold text-lg">{{ $producto->nombre }}</h3>
                        <p class="text-gray-700">Q {{ number_format($producto->precio, 2) }} c/u · {{ $producto->stock }} disponibles</p>
                    </div>
                </div>

                <form method="POST" action="{{ route('pedidos.store', $producto) }}" class="space-y-4">
                    @csrf

                    <div>
                        <x-input-label for="cantidad" value="Cantidad" />
                        <x-text-input id="cantidad" name="cantidad" type="number" min="1" max="{{ $producto->stock }}"
                            class="mt-1 block w-full" value="{{ old('cantidad', 1) }}" required />
                        <x-input-error :messages="$errors->get('cantidad')" class="mt-2" />
                    </div>

                    <h3 class="font-semibold pt-2">Datos de envío</h3>

                    <div>
                        <x-input-label for="nombre_envio" value="Nombre de quien recibe" />
                        <x-text-input id="nombre_envio" name="nombre_envio" type="text" class="mt-1 block w-full"
                            value="{{ old('nombre_envio', auth()->user()->name) }}" required />
                        <x-input-error :messages="$errors->get('nombre_envio')" class="mt-2" />
                    </div>

                    <div>
                        <x-input-label for="telefono" value="Teléfono" />
                        <x-text-input id="telefono" name="telefono" type="text" class="mt-1 block w-full"
                            value="{{ old('telefono') }}" required />
                        <x-input-error :messages="$errors->get('telefono')" class="mt-2" />
                    </div>

                    <div>
                        <x-input-label for="direccion" value="Dirección" />
                        <x-text-input id="direccion" name="direccion" type="text" class="mt-1 block w-full"
                            value="{{ old('direccion') }}" required />
                        <x-input-error :messages="$errors->get('direccion')" class="mt-2" />
                    </div>

                    <div>
                        <x-input-label for="ciudad" value="Ciudad" />
                        <x-text-input id="ciudad" name="ciudad" type="text" class="mt-1 block w-full"
                            value="{{ old('ciudad') }}" required />
                        <x-input-error :messages="$errors->get('ciudad')" class="mt-2" />
                    </div>

                    <div class="pt-2 flex gap-3">
                        <x-primary-button>Confirmar compra</x-primary-button>
                        <a href="{{ route('productos.index') }}" class="px-4 py-2 text-sm text-gray-600 hover:underline">Cancelar</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
