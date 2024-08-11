<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRequisitosConvocatoriasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('requisitos_convocatorias', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_convocatoria');
            $table->unsignedBigInteger('id_requisito');
            $table->smallInteger('cantidad');
            $table->boolean('original');
            $table->boolean('es_indispensable');
            $table->timestamps();

            $table->foreign('id_convocatoria')->references('id')->on('convocatorias')->onDelete('cascade');
            $table->foreign('id_requisito')->references('id')->on('requisitos')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('requisitos_convocatorias');
    }
}
