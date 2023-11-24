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
        Schema::create('productos', function (Blueprint $table) {
            $table->id('idproducto');
            $table->unsignedBigInteger('idcategoria');
            $table->unsignedBigInteger('idproveedor');
            $table->string('nombre_producto');
            $table->decimal('precio', 8, 2);
            $table->integer('stock');
            $table->text('descripcion');
            $table->string('imagen')->nullable();
            $table->timestamps();

            $table->foreign('idcategoria')->references('idcategoria')->on('categorias');
            $table->foreign('idproveedor')->references('idproveedor')->on('proveedores');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('productos');
    }
};
