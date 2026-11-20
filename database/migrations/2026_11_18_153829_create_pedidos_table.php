<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('pedidos', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->cascadeOnDelete();
            $table->foreignId('producto_id')->nullable()->constrained()->nullOnDelete();
            $table->string('producto_nombre');
            $table->integer('cantidad');
            $table->decimal('total', 10, 2);
            $table->string('nombre_envio');
            $table->string('telefono');
            $table->string('direccion');
            $table->string('ciudad');
            $table->string('estado')->default('Pendiente');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pedidos');
    }
};
