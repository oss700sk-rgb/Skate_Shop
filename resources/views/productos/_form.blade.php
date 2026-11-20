{{-- Campos compartidos por "crear" y "editar". Si $producto no existe (crear), quedan vacíos. --}}
<div class="space-y-4">
    <div>
        <x-input-label for="nombre" value="Nombre" />
        <x-text-input id="nombre" name="nombre" type="text" class="mt-1 block w-full"
            value="{{ old('nombre', $producto->nombre ?? '') }}" required />
        <x-input-error :messages="$errors->get('nombre')" class="mt-2" />
    </div>

    <div>
        <x-input-label for="marca" value="Marca" />
        <x-text-input id="marca" name="marca" type="text" class="mt-1 block w-full"
            value="{{ old('marca', $producto->marca ?? '') }}" required />
        <x-input-error :messages="$errors->get('marca')" class="mt-2" />
    </div>

    <div class="grid grid-cols-2 gap-4">
        <div>
            <x-input-label for="tipo" value="Tipo" />
            <select id="tipo" name="tipo" required
                class="mt-1 block w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm">
                <option value="">-- Selecciona --</option>
                @foreach (\App\Models\Producto::TIPOS as $tipo)
                    <option value="{{ $tipo }}" @selected(old('tipo', $producto->tipo ?? '') === $tipo)>{{ $tipo }}</option>
                @endforeach
            </select>
            <x-input-error :messages="$errors->get('tipo')" class="mt-2" />
        </div>
        <div>
            <x-input-label for="medida" value="Medida o talla (8.0, 53mm, M...)" />
            <x-text-input id="medida" name="medida" type="text" class="mt-1 block w-full"
                value="{{ old('medida', $producto->medida ?? '') }}" required />
            <x-input-error :messages="$errors->get('medida')" class="mt-2" />
        </div>
    </div>

    <div class="grid grid-cols-2 gap-4">
        <div>
            <x-input-label for="precio" value="Precio (Q)" />
            <x-text-input id="precio" name="precio" type="number" step="0.01" min="0" class="mt-1 block w-full"
                value="{{ old('precio', $producto->precio ?? '') }}" required />
            <x-input-error :messages="$errors->get('precio')" class="mt-2" />
        </div>
        <div>
            <x-input-label for="stock" value="Stock" />
            <x-text-input id="stock" name="stock" type="number" min="0" class="mt-1 block w-full"
                value="{{ old('stock', $producto->stock ?? '') }}" required />
            <x-input-error :messages="$errors->get('stock')" class="mt-2" />
        </div>
    </div>

    <div>
        <x-input-label for="descripcion" value="Descripción (opcional)" />
        <textarea id="descripcion" name="descripcion" rows="3"
            class="mt-1 block w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm">{{ old('descripcion', $producto->descripcion ?? '') }}</textarea>
        <x-input-error :messages="$errors->get('descripcion')" class="mt-2" />
    </div>

    <div>
        <x-input-label for="imagen" value="Foto (opcional, JPG o PNG de máximo 2 MB)" />
        @if (! empty($producto->imagen))
            <img src="{{ asset('storage/'.$producto->imagen) }}" alt="Foto actual" class="mt-1 h-24 rounded">
        @endif
        <input id="imagen" name="imagen" type="file" accept="image/*" class="mt-1 block w-full text-sm">
        <x-input-error :messages="$errors->get('imagen')" class="mt-2" />
    </div>
</div>
