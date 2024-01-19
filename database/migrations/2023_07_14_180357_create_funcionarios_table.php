<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFuncionariosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('funcionarios', function (Blueprint $table) {
            $table->id();
            $table->string('nome_completo');
            $table->string('sexo');
            $table->date('data_nascimento');
            $table->string('contato_pessoal');
            $table->string('endereco_fisico');
            $table->string('provincia');
            $table->string('estado_civil');
            // $table->string('nome_conjuge')->nullable();
            $table->string('nacionalidade');
            // $table->string('local_nascimento');
            $table->string('tipo_documento');
            $table->string('nr_documento');
            // $table->string('doencas_cronicas')->nullable();
            $table->date('data_validade');
            $table->date('data_emissao');
            $table->string('deficiencias_alergias')->nullable();
            $table->string('grau_deficiencia')->nullable();
            $table->string('outros')->nullable();
            $table->string('contato_emerg');
            $table->string('nome_emerg');
            $table->string('nome_dependente')->nullable();
            $table->date('datanasc_dependente')->nullable();
            $table->string('contato_prof');
            $table->string('email_prof');
            $table->string('funcao');
            $table->string('grupo_funcional')->nullable();
            $table->string('categoria')->nullable();
            $table->string('reporte')->nullable();
            $table->string('turno');
            $table->string('tipo_contrato');
            $table->date('data_vigor');
            $table->string('nib')->nullable();
            $table->string('nuit')->nullable();
            $table->string('departamento');
            $table->string('prazo')->nullable();
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
        Schema::dropIfExists('funcionarios');
    }
}
