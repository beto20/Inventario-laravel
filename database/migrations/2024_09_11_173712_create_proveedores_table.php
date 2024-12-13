<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProveedoresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('proveedores', function (Blueprint $table) {
            $table->integerIncrements('id')->unsigned()->comment('Identificador unívoco de los proveedores');
            $table->string('nom_empresa', '150')->nullable()->comment('Almacena el nombre de la empresa');
            $table->string('correo', '150')->nullable()->comment('Correo correspondiente a la empresa');
            $table->string('telefono', '50')->nullable()->comment('Teléfono que corresponde al proveedor');
            $table->string('direccion', '250')->nullable()->comment('Dirección del proveedor');
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
        Schema::dropIfExists('proveedores');
    }
}
