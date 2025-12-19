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
        Schema::create('expedientes', function (Blueprint $table) {
            $table->id();
            $table->foreignId('proveedor_id')->constrained('users')->onDelete('cascade');            $table->string('titulo'); // Ej: "Cédula Fiscal"
            $table->string('ruta_archivo'); // La ruta donde se guardó el PDF/IMG
            $table->string('estado')->default('NUEVO'); // pendiente, aprobado, rechazado
            $table->text('comentarios')->nullable(); // Por si rechazas el documento
            $table->date('fecha_vencimiento')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('expedientes');
    }
};
