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
    Schema::create('movimientos', function (Blueprint $table) {

        $table->id();

        $table->unsignedBigInteger('refaccion_id');

        $table->enum('tipo', [
            'entrada',
            'salida'
        ]);

        $table->integer('cantidad');

        $table->text('observacion')->nullable();

        $table->timestamps();

        $table->foreign('refaccion_id')
              ->references('id')
              ->on('refacciones')
              ->onDelete('cascade');

    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('movimientos');
    }
};
