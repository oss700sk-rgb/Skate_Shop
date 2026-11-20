<?php

namespace Database\Seeders;

use App\Models\Producto;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $productos = [
            // Tablas
            ['nombre' => 'Tabla Primitive Rodriguez', 'marca' => 'Primitive', 'medida' => '8.25"', 'tipo' => 'Tabla', 'precio' => 750.00, 'stock' => 6, 'descripcion' => 'Tabla de maple de 7 capas, cóncavo medio.'],
            ['nombre' => 'Tabla Element Section', 'marca' => 'Element', 'medida' => '8.0"', 'tipo' => 'Tabla', 'precio' => 650.00, 'stock' => 10, 'descripcion' => 'Tabla resistente para calle y park.'],
            ['nombre' => 'Tabla Baker Logo', 'marca' => 'Baker', 'medida' => '8.5"', 'tipo' => 'Tabla', 'precio' => 700.00, 'stock' => 4, 'descripcion' => 'Tabla ancha para transición.'],

            // Trucks
            ['nombre' => 'Trucks Independent Stage 11', 'marca' => 'Independent', 'medida' => '144mm', 'tipo' => 'Trucks', 'precio' => 780.00, 'stock' => 8, 'descripcion' => 'Par de trucks para tablas de 8.0" a 8.25".'],
            ['nombre' => 'Trucks Thunder Hi', 'marca' => 'Thunder', 'medida' => '148mm', 'tipo' => 'Trucks', 'precio' => 760.00, 'stock' => 5, 'descripcion' => 'Par de trucks livianos y firmes.'],

            // Bearings
            ['nombre' => 'Bearings Bones Reds', 'marca' => 'Bones', 'medida' => '608', 'tipo' => 'Bearings', 'precio' => 250.00, 'stock' => 20, 'descripcion' => 'Juego de 8 bearings, los clásicos.'],
            ['nombre' => 'Bearings Bronson G3', 'marca' => 'Bronson', 'medida' => '608', 'tipo' => 'Bearings', 'precio' => 450.00, 'stock' => 12, 'descripcion' => 'Juego de 8 bearings de alta velocidad.'],

            // Ruedas
            ['nombre' => 'Ruedas Spitfire Formula Four', 'marca' => 'Spitfire', 'medida' => '53mm', 'tipo' => 'Ruedas', 'precio' => 520.00, 'stock' => 15, 'descripcion' => 'Juego de 4 ruedas duras 99A.'],
            ['nombre' => 'Ruedas Ricta Clouds', 'marca' => 'Ricta', 'medida' => '54mm', 'tipo' => 'Ruedas', 'precio' => 480.00, 'stock' => 9, 'descripcion' => 'Ruedas suaves para cruzar la ciudad.'],

            // Lija
            ['nombre' => 'Lija Mob Grip Negra', 'marca' => 'Mob Grip', 'medida' => '9" x 33"', 'tipo' => 'Lija', 'precio' => 90.00, 'stock' => 30, 'descripcion' => 'Lija de agarre fuerte.'],

            // Ropa
            ['nombre' => 'Sudadero Primitive Dirty P', 'marca' => 'Primitive', 'medida' => 'M', 'tipo' => 'Ropa', 'precio' => 650.00, 'stock' => 7, 'descripcion' => 'Sudadero con capucha, algodón.'],
            ['nombre' => 'Playera Primitive Logo', 'marca' => 'Primitive', 'medida' => 'L', 'tipo' => 'Ropa', 'precio' => 300.00, 'stock' => 14, 'descripcion' => 'Playera de manga corta.'],
            ['nombre' => 'Gorra Primitive', 'marca' => 'Primitive', 'medida' => 'Unitalla', 'tipo' => 'Ropa', 'precio' => 280.00, 'stock' => 10, 'descripcion' => 'Gorra ajustable.'],

            // Accesorios
            ['nombre' => 'Herramienta multiuso', 'marca' => 'Silver', 'medida' => 'Única', 'tipo' => 'Accesorios', 'precio' => 120.00, 'stock' => 18, 'descripcion' => 'Llave para trucks, ruedas y tornillos.'],
        ];

        foreach ($productos as $producto) {
            Producto::updateOrCreate(
                ['nombre' => $producto['nombre']],
                $producto
            );
        }
    }
}
