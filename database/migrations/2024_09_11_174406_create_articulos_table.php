<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateArticulosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('articulos', function (Blueprint $table) {
            $table->integerIncrements('id')->unsigned()->comment('Identificador unívoco de los artículos');
            $table->unsignedInteger('categoria_id')->nullable(false)->comment('Almacena el ID de la categoría seleccionada');
            $table->unsignedInteger('producto_id')->nullable(false)->comment('Almacena el ID del producto seleccionado');
            $table->unsignedInteger('proveedor_id')->nullable(false)->comment('Almacena el ID del proveedor');
            $table->date('fecha_ingreso')->nullable()->comment('Almacena la fecha en que se ingresa el artículo');
            $table->decimal('Pcompra', 8,4)->nullable()->comment('Almacena el precio de compra del artículo');
            $table->decimal('Pventa', 8,4)->nullable()->comment('Almacena el precio de venta del artículo');
            $table->integer('cantidad')->nullable()->comment('Almacena la cantidad de artículos ingresada');
            $table->string('descripcion', '250')->nullable()->comment('Descripción del artículo ingresado');
            // Llave foránea hacia los usuarios
            $table->unsignedInteger('user_id')->nullable(true)->comment('Usuario que registra al proveedor');
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
        Schema::dropIfExists('articulos');
    }
}
