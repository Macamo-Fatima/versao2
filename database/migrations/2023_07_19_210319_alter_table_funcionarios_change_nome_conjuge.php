<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterTableFuncionariosChangeNomeConjuge extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('funcionarios', function (Blueprint $table) {
            $table->string('nome_conjuge')->nullable()->changed();
            $table->string('local_nascimento')->nullable()->changed();
            $table->string('doencas_cronicas')->nullable()->changed();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('funcionarios', function (Blueprint $table) {
            $table->dropColumn('nome_conjuge');
            $table->dropColumn('local_nascimento');
            $table->dropColumn('doencas_cronicas');
        });
    }
}
