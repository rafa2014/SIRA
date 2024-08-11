<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateParticipantesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('participantes', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_aspirante');
            $table->unsignedBigInteger('id_convocatoria');
            $table->dateTime('fecha_inscripcion');
            $table->boolean('activa');
            $table->enum('estatus', ['Inscrito', 'en_proceso', 'completado', 'pendiente', 'suspendido', 'inactivo']);
            $table->timestamps();

            $table->foreign('id_aspirante')->references('id')->on('aspirantes')->onDelete('cascade');
            $table->foreign('id_convocatoria')->references('id')->on('convocatorias')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('participantes');
    }
}
