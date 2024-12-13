<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFacturasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('facturas', function (Blueprint $table) {
            $table->integerIncrements('id')->unsigned()->comment('Identificador unívoco de las facturas');
            // Llave foránea hacia los usuarios
            $table->unsignedInteger('ct_id')->nullable(true)->comment('Centro de trabajo para el cual es la factura');
            $table->date('fecha_factura')->nullable()->comment('Almacena la fecha en que se generra la factura');
            $table->unsignedInteger('categoria_id')->nullable(false)->comment('Almacena el ID de la categoría seleccionada');
            $table->unsignedInteger('producto_id')->nullable(false)->comment('Almacena el ID del producto seleccionado');
            $table->decimal('precio', 8,4)->nullable()->comment('Almacena el precio de venta del artículo');
            $table->integer('cantidad')->nullable()->comment('Almacena la cantidad de artículos ingresada');
            $table->decimal('total', 10,2)->nullable()->comment('Almacena el precio total de la factura');
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
        Schema::dropIfExists('facturas');
    }
}
