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
         Schema::create('refacciones', function (Blueprint $table) {
        $table->id();

        $table->string('codigo')->unique();
        $table->string('nombre');
        $table->text('descripcion')->nullable();

        $table->string('marca')->nullable();
        $table->string('modelo')->nullable();

        $table->string('ubicacion')->nullable();

        $table->integer('stock_actual')->default(0);
        $table->integer('stock_minimo')->default(5);

        $table->decimal('costo_unitario', 10, 2)->default(0);

        $table->string('unidad_medida')->default('PZA');

        $table->timestamps();
    });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('refaccions');
    }
};
