<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCentrosTrabajoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('centros_trabajo', function (Blueprint $table) {
            $table->smallIncrements('id')->unsigned()->comment('Almacena el ID unívoco del Centro de Trabajo');
            $table->string('clave_ct', '10')->nullable()->comment('Almacena la clave del centro de trabajo');
            $table->string('nombre_ct', '200')->nullable()->comment('Almacena el nombre y/o denominación del centro de trabajo');
            $table->string('telefono', '20')->nullable()->comment('Almacena el teléfono correspondiente al centro de trabajo');
            $table->string('direccion', '250')->nullable()->comment('Almacena la dirección del centro de trabajo');
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
        Schema::dropIfExists('centros_trabajo');
    }
}
