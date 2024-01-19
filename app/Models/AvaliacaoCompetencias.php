<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AvaliacaoCompetencias extends Model
{
    use HasFactory;
    protected $fillable = [
        'id_avaliacao',
        'inspirar',
        'cooperar',
        'envolver',
        'desenvolver_outros',
        'comunicacao_eficaz',
        'orientacao_resultados',
        'analise_sentido',
        'negociacao_persuacao',
        'planear_organizar',
        'autonomia',
        'pensamento_estrategico',
        'networking',
        'gerir_conflitos',
        'gerir_mudanca',
        'empreender_proagir',
        'adaptar_contexto',
        'desenvolver_gerir',
        'aprender',
        'empreender',
        'inovar',
        'focalizar_cliente',
        'dirigir_alinhar',
        'concretizar_resultados',
        'criar_oportunidades',
        'focalizar_objetivos',
        'auto_motivacao',
        'decidir',
        'organizar_controlar',
        'planear',
        'garantir_qualidade',
        'optimizacao',
        'tomada_decisao',
        'gerir_informacao',
    ];
}
