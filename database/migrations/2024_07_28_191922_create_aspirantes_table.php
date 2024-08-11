<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAspirantesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('aspirantes', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->string('apellido_uno');
            $table->string('apellido_dos');
            $table->date('fecha_nacimiento');
            $table->string('escuela_procedencia');
            $table->enum('nivel_escolaridad', ['Licenciatura', 'Maestría', 'Doctorado']);
            $table->string('titulo_descripcion');
            $table->string('curp')->unique()->regex('/^[A-Z]{4}\d{6}[HM][A-Z]{5}[A-Z0-9]\d$/');
            $table->unsignedBigInteger('id_usuario');
            $table->string('num_whatsapp');
            $table->string('num_telefono');
            $table->timestamps();

            $table->foreign('id_usuario')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('aspirantes');
    }
}

