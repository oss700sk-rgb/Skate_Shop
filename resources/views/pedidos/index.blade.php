<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ auth()->user()->esAdmin() ? 'Todos los pedidos' : 'Mis pedidos' }}
        </h2>
    </x-slot>

    <div class="py-8">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

            @if (session('success'))
                <div class="mb-4 p-4 rounded-md bg-green-100 text-green-800">
                    {{ session('success') }}
                </div>
            @endif

            <div class="bg-white shadow-sm sm:rounded-lg overflow-x-auto">
                <table class="min-w-full text-sm">
                    <thead class="bg-gray-50 text-left text-gray-600">
                        <tr>
                            <th class="px-4 py-3">#</th>
                            <th class="px-4 py-3">Fecha</th>
                            @if (auth()->user()->esAdmin())
                                <th class="px-4 py-3">Cliente</th>
                            @endif
                            <th class="px-4 py-3">Producto</th>
                            <th class="px-4 py-3">Cant.</th>
                            <th class="px-4 py-3">Total</th>
                            <th class="px-4 py-3">Envío</th>
                            <th class="px-4 py-3">Estado</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($pedidos as $pedido)
                            <tr class="border-t">
                                <td class="px-4 py-3">{{ $pedido->id }}</td>
                                <td class="px-4 py-3">{{ $pedido->created_at->format('d/m/Y') }}</td>
                                @if (auth()->user()->esAdmin())
                                    <td class="px-4 py-3">{{ $pedido->user->name }}</td>
                                @endif
                                <td class="px-4 py-3">{{ $pedido->producto_nombre }}</td>
                                <td class="px-4 py-3">{{ $pedido->cantidad }}</td>
                                <td class="px-4 py-3">Q {{ number_format($pedido->total, 2) }}</td>
                                <td class="px-4 py-3">
                                    {{ $pedido->nombre_envio }} · {{ $pedido->telefono }}<br>
                                    <span class="text-gray-500">{{ $pedido->direccion }}, {{ $pedido->ciudad }}</span>
                                </td>
                                <td class="px-4 py-3">
                                    <span class="px-2 py-1 rounded bg-yellow-100 text-yellow-800 text-xs">{{ $pedido->estado }}</span>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="8" class="px-4 py-6 text-center text-gray-500">Todavía no hay pedidos.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-app-layout>
