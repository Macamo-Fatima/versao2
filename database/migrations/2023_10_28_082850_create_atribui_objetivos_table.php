<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAtribuiObjetivosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('atribui_objetivos', function (Blueprint $table) {
            $table->id();
            $table->integer('cargo_funcionario')->nullable();
            $table->string('dep_funcionario')->nullable();
            $table->string('missao_funcionario')->nullable();
            $table->string('local_funcionario')->nullable();
            $table->string('reporte_funcionario')->nullable();
            $table->string('objetivo_atribuicao')->nullable();
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
        Schema::dropIfExists('atribui_objetivos');
    }
}
