<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Model;

#[Fillable(['nombre', 'marca', 'medida', 'tipo', 'precio', 'stock', 'descripcion', 'imagen'])]
class Producto extends Model
{
    // Los tipos de producto que vende la tienda 
    public const TIPOS = ['Tabla', 'Ruedas', 'Trucks', 'Bearings', 'Lija', 'Ropa', 'Accesorios'];
}

