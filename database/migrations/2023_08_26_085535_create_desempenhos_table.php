<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDesempenhosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('desempenhos', function (Blueprint $table) {
            $table->id();
            $table->integer('cargo')->nullable();
            $table->string('dep')->nullable();
            $table->string('grupo')->nullable();
            $table->string('missao')->nullable();
            $table->string('local')->nullable();
            $table->string('reporte')->nullable();
            $table->string('competencia')->nullable();
            $table->string('proficiencia')->nullable();
            $table->string('excel')->nullable();
            $table->string('powerpoint')->nullable();
            $table->string('word')->nullable();
            $table->string('access')->nullable();
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
        Schema::dropIfExists('desempenhos');
    }
}
