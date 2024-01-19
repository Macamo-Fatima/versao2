<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTbcompetenciasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbcompetencias', function (Blueprint $table) {
            $table->id();



            $table->integer('id_avaliacao');
            $table->integer('inspirar')->nullable()->default(0);
            $table->integer('cooperar')->nullable()->default(0);
            $table->integer('envolver')->nullable()->default(0);
            $table->integer('desenvolver_outros')->nullable()->default(0);
            $table->integer('comunicacao_eficaz')->nullable()->default(0);
            $table->integer('orientacao_resultados')->nullable()->default(0);
            $table->integer('analise_sentido')->nullable()->default(0);
            $table->integer('negociacao_persuacao')->nullable()->default(0);
            $table->integer('planear_organizar')->nullable()->default(0);
            $table->integer('autonomia')->nullable()->default(0);
            $table->integer('pensamento_estrategico')->nullable()->default(0);
            $table->integer('networking')->nullable()->default(0);
            $table->integer('gerir_conflitos')->nullable()->default(0);
            $table->integer('gerir_mudanca')->nullable()->default(0);
            $table->integer('empreender_proagir')->nullable()->default(0);
            $table->integer('adaptar_contexto')->nullable()->default(0);
            $table->integer('desenvolver_gerir')->nullable()->default(0);
            $table->integer('aprender')->nullable()->default(0);
            $table->integer('empreender')->nullable()->default(0);
            $table->integer('inovar')->nullable()->default(0);
            $table->integer('focalizar_cliente')->nullable()->default(0);
            $table->integer('dirigir_alinhar')->nullable()->default(0);
            $table->integer('concretizar_resultados')->nullable()->default(0);
            $table->integer('criar_oportunidades')->nullable()->default(0);
            $table->integer('focalizar_objetivos')->nullable()->default(0);
            $table->integer('auto_motivacao')->nullable()->default(0);
            $table->integer('decidir')->nullable()->default(0);
            $table->integer('organizar_controlar')->nullable()->default(0);
            $table->integer('planear')->nullable()->default(0);
            $table->integer('garantir_qualidade')->nullable()->default(0);
            $table->integer('optimizacao')->nullable()->default(0);
            $table->integer('tomada_decisao')->nullable()->default(0);
            $table->integer('gerir_informacao')->nullable()->default(0);
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
        Schema::dropIfExists('tbcompetencias');
    }
}
