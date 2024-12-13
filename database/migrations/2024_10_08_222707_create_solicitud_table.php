<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSolicitudTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('solicitud', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->integer('ct_id');
            $table->integer('categoria_id');
            $table->integer('producto_id');
            $table->integer('cantidad');
            $table->string('descripcion');
            $table->enum('estatus_solicitud', ['Enviada', 'Autorizada', 'Rechazada'])->default('Enviada')->nullable(true);
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
        Schema::dropIfExists('solicitud');
    }
}
