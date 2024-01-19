<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGrauacademicoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('grauacademico', function (Blueprint $table) {
            $table->id();
            $table->integer('id_funcionario');
            $table->string('nivel_academico');
            $table->string('instituicao');
            $table->string('especializacao');
            $table->string('inicio_termino');
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
        Schema::dropIfExists('grauacademico');
    }
}
