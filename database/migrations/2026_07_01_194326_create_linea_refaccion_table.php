<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void {
    Schema::create('linea_refaccion', function (Blueprint $table) {
        $table->id();
        $table->foreignId('linea_id')->constrained('lineas')->onDelete('cascade');
        $table->string('nombre_refaccion');
        $table->timestamps();
    });
}
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('linea_refaccion');
    }
};
