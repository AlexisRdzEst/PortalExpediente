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
        Schema::create('proveedores', function (Blueprint $table) {
            $table->id();
            $table->string('proveedor_nombre');
            $table->string('proveedor_type');
            $table->string('proveedor_RFC')->unique();
            $table->string('proveedor_clabe',20);
            $table->string('proveedor_numeroCuenta');
            $table->text('proveedor_sucursal');
            $table->string('proveedor_refBanco');
            $table->string('proveedor_tarjetaBanco');
            $table->string('proveedor_banco');
            $table->string('proveedor_email')->nullable();
            $table->string('proveedor_telefono')->nullable();
            $table->string('proveedor_estatus');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('proveedores');
    }
};
