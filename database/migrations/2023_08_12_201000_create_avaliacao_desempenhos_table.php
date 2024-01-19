<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAvaliacaoDesempenhosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
       
        Schema::create('avaliacao_desempenhos', function (Blueprint $table) {
            $table->id();
            $table->integer('id_funcionario');
            $table->string('tipo_avaliacao')->nullable();
            $table->date('data');
            $table->string('acao')->nullable();
            $table->string('c_avaliador')->nullable();
            $table->string('c_avaliado')->nullable();
            $table->string('usuario')->nullable();           
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
        Schema::dropIfExists('avaliacao_desempenhos');
    }
}
