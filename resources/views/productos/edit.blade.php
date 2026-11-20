<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Editar producto
        </h2>
    </x-slot>

    <div class="py-8">
        <div class="max-w-2xl mx-auto sm:px-6 lg:px-8">
            <div class="caja-skate p-6">
                <form method="POST" action="{{ route('productos.update', $producto) }}" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    @include('productos._form')

                    <div class="mt-6 flex gap-3">
                        <x-primary-button>Actualizar</x-primary-button>
                        <a href="{{ route('productos.index') }}" class="px-4 py-2 text-sm text-gray-600 hover:underline">Cancelar</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>

