<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Funcionario extends Model
{
    use HasFactory;
    protected $fillable = [
        'nome_completo',
        'sexo',
        'data_nascimento',
        'contato_pessoal',
        'endereco_fisico',
        'provincia',
        'estado_civil',
        'nome_conjuge',
        'nacionalidade',
        'local_nascimento',
        'tipo_documento',
        'nr_documento',
        'doencas_cronicas',
        'data_validade',
        'data_emissao',
        'deficiencias_alergias',
        'grau_deficiencia',
        'outros',
        'contato_emerg',
        'nome_emerg',
        'nome_dependente',
        'datanasc_dependente',
        'contato_prof',
        'email_prof',
        'funcao',
        'grupo_funcional',
        'categoria',
        'reporte',
        'turno',
        'tipo_contrato',
        'data_vigor',
        'nib',
        'nuit',
        'departamento',
        'prazo',
        'fotografia',
    ];
}
