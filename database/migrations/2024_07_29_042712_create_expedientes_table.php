<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateExpedientesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('expedientes', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_participante');
            $table->unsignedBigInteger('id_requisito_convocatoria');
            $table->boolean('entregado');
            $table->string('ruta_archivo');
            $table->boolean('validado');
            $table->timestamps();

            $table->foreign('id_participante')->references('id')->on('participantes')->onDelete('cascade');
            $table->foreign('id_requisito_convocatoria')->references('id')->on('requisitos_convocatorias')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('expedientes');
    }
}
