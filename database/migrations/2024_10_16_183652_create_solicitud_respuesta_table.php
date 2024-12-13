<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSolicitudRespuestaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('solicitud_respuesta', function (Blueprint $table) {
            $table->id();
            $table->integer('solicitud_id');
            $table->integer('producto_id');
            $table->integer('cantidad')->nullable();;
            $table->enum('estatus', ['Autorizada', 'Rechazada'])->nullable(true);
            $table->integer('ct_id');
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
        Schema::dropIfExists('solicitud_respuesta');
    }
}
