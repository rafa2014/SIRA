<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateConvocatoriasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('convocatorias', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->text('descripcion');
            $table->dateTime('fecha_inicio');
            $table->dateTime('fecha_termino');
            $table->unsignedBigInteger('id_programa_educativo');
            $table->integer('cantidad_aspirantes');
            $table->date('fecha_examen');
            $table->time('hora_examen');
            $table->timestamps();

            $table->foreign('id_programa_educativo')->references('id')->on('programs')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('convocatorias');
    }
}
