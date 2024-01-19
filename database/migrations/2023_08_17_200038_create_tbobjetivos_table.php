<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTbobjetivosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbobjetivos', function (Blueprint $table) {
            $table->id();
            $table->integer('id_avaliacao');
            $table->integer('disponibilidade_info')->nullable()->default(0);
            $table->integer('cumprimento_legislacao')->nullable()->default(0);
            $table->integer('desenvolvimento_prof')->nullable()->default(0);
            $table->integer('garantir_efetividade')->nullable()->default(0);
            $table->integer('niveis_liquidez')->nullable()->default(0);
            $table->integer('assessorar')->nullable()->default(0);
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
        Schema::dropIfExists('tbobjetivos');
    }
}
