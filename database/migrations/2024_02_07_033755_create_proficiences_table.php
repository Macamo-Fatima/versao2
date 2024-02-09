<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProficiencesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('proficiences', function (Blueprint $table) {
            $table->id();
            $table->string('nome_do_cargo')->nullable();
            $table->string('nome_da_competencia')->nullable();            
            $table->integer('nivel_proficiencia')->nullable();
            $table->integer('id_da_avaliacao')->nullable();
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
        Schema::dropIfExists('proficiences');
    }
}
