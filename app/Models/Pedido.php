<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

#[Fillable(['user_id', 'producto_id', 'producto_nombre', 'cantidad', 'total', 'nombre_envio', 'telefono', 'direccion', 'ciudad', 'estado'])]
class Pedido extends Model
{
    // Cada pedido pertenece a un usuario 
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
