<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('productos', function (Blueprint $table) {
            $table->integerIncrements('id')->unsigned()->comment('Identificador unívoco de los productos');
            // Llave foránea hacia las categorías
            $table->unsignedInteger('categoria_id')->nullable(true)->comment('Llave foránea hacia la tabla de categorias');
            $table->string('clave_producto', '50')->nullable()->comment('Almacena la clave correspondiente al producto');
            $table->string('nombre_producto', '200')->nullable()->comment('Almacena el nombre dle producto');
            $table->string('detalles', '100')->nullable()->comment('Almacena los detalles de cada producto');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('productos');
    }
}
