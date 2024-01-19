<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Funcionario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\AvaliacaoDesempenho;

class AdminController extends Controller
{

    public function index()
    {
        $todosFuncionarios = DB::table('funcionarios')->count();
        $todosUsuarios = DB::table('users')->count();
        //Função que cria um array de funcionários de sexo masculino
        $homens = DB::table('funcionarios')
            ->select(DB::raw('COUNT(*) as sexo_masculino, funcionarios.sexo'))
            ->where('funcionarios.sexo', '<>', 'Feminino')
            ->groupBy('funcionarios.sexo')
            ->get();
        //Função para contar o numero apenas de funcionarios de sexo masculino
        $contarHomens = DB::table('funcionarios')
            ->where('funcionarios.sexo', 'Masculino')
            ->count();
        //Função para contar o numero apenas de funcionarios de sexo feminino
        $contarMulheres = DB::table('funcionarios')
            ->where('funcionarios.sexo', '<>', 'Masculino')
            ->count();


        $data_atual = Carbon::now();
        $dadosAniversariantes = DB::table('funcionarios')
            ->select('funcionarios.nome_completo', 'funcionarios.data_nascimento', 'funcionarios.sexo', 'funcionarios.email_prof', 'funcionarios.fotografia')
            ->whereMonth('funcionarios.data_nascimento', $data_atual->month)
            ->whereDay('funcionarios.data_nascimento', $data_atual->day)
            ->orderByRaw('day(funcionarios.data_nascimento) asc')
            ->limit(4)
            ->get();

        $quantidadeAniversariantes = DB::table('funcionarios')
            ->select('funcionarios.nome_completo', 'funcionarios.data_nascimento', 'funcionarios.sexo', 'funcionarios.email_prof')
            ->whereMonth('funcionarios.data_nascimento', $data_atual->month)
            ->whereDay('funcionarios.data_nascimento', $data_atual->day)
            ->orderByRaw('day(funcionarios.data_nascimento) asc')
            ->count();

        $dadosDocs =   DB::table('funcionarios')
            ->select('funcionarios.nome_completo', 'funcionarios.data_emissao', 'funcionarios.data_validade', 'funcionarios.fotografia', 'funcionarios.tipo_documento')
            ->whereRaw('DATEDIFF(funcionarios.data_validade, NOW()) <= 45')
            ->whereRaw('DATEDIFF(funcionarios.data_validade, NOW()) > 0')
            ->limit(4)
            ->get();

        $quantidadeDocs =   DB::table('funcionarios')
            ->select('funcionarios.nome_completo', 'funcionarios.data_emissao')
            ->whereRaw('DATEDIFF(funcionarios.data_validade, NOW()) <= 45')
            ->whereRaw('DATEDIFF(funcionarios.data_validade, NOW()) > 0')
            ->count();

        $intervalo1 =   DB::table('funcionarios')
            ->whereRaw('YEAR(FROM_DAYS(TO_DAYS(NOW())-TO_DAYS(funcionarios.data_nascimento))) <= 30')
            ->whereRaw('YEAR(FROM_DAYS(TO_DAYS(NOW())-TO_DAYS(funcionarios.data_nascimento))) >= 18')
            ->count();

        $intervalo2 =   DB::table('funcionarios')
            ->whereRaw('YEAR(FROM_DAYS(TO_DAYS(NOW())-TO_DAYS(funcionarios.data_nascimento))) > 30')
            ->whereRaw('YEAR(FROM_DAYS(TO_DAYS(NOW())-TO_DAYS(funcionarios.data_nascimento))) <= 45')
            ->count();
        $intervalo3 =   DB::table('funcionarios')
            ->whereRaw('YEAR(FROM_DAYS(TO_DAYS(NOW())-TO_DAYS(funcionarios.data_nascimento))) > 45')
            ->whereRaw('YEAR(FROM_DAYS(TO_DAYS(NOW())-TO_DAYS(funcionarios.data_nascimento))) <= 60')
            ->count();

        $intervalo4 =   DB::table('funcionarios')
            ->whereRaw('YEAR(FROM_DAYS(TO_DAYS(NOW())-TO_DAYS(funcionarios.data_nascimento))) > 60')
            ->whereRaw('YEAR(FROM_DAYS(TO_DAYS(NOW())-TO_DAYS(funcionarios.data_nascimento))) <= 75')
            ->count();

        $percentagemIntervalo1 = round(($intervalo1 / $todosFuncionarios) * 100, 1);
        $percentagemIntervalo2 = round(($intervalo2 / $todosFuncionarios) * 100, 1);
        $percentagemIntervalo3 = round(($intervalo3 / $todosFuncionarios) * 100, 1);
        $percentagemIntervalo4 = round(($intervalo4 / $todosFuncionarios) * 100, 1);
        $percentagemHomens = round(($contarHomens / $todosFuncionarios) * 100, 1);
        $percentagemMulheres = round(($contarMulheres / $todosFuncionarios) * 100, 1);


        $chartData = Funcionario::select(DB::raw('
        CASE 
            WHEN TIMESTAMPDIFF(YEAR, data_nascimento, NOW()) BETWEEN 18 AND 25 THEN "18-25 anos"
            WHEN TIMESTAMPDIFF(YEAR, data_nascimento, NOW()) BETWEEN 26 AND 30 THEN "26-30 anos"
            WHEN TIMESTAMPDIFF(YEAR, data_nascimento, NOW()) BETWEEN 31 AND 35 THEN "31-35 anos"
            WHEN TIMESTAMPDIFF(YEAR, data_nascimento, NOW()) BETWEEN 36 AND 40 THEN "36-40 anos"
            WHEN TIMESTAMPDIFF(YEAR, data_nascimento, NOW()) BETWEEN 41 AND 45 THEN "41-45 anos"
            WHEN TIMESTAMPDIFF(YEAR, data_nascimento, NOW()) BETWEEN 46 AND 50 THEN "46-50 anos"
            WHEN TIMESTAMPDIFF(YEAR, data_nascimento, NOW()) BETWEEN 51 AND 55 THEN "51-55 anos"
            ELSE "56+"
        END as age_group'))
            ->selectRaw('SUM(CASE WHEN sexo = "Masculino" THEN 1 ELSE 0 END) as male')
            ->selectRaw('SUM(CASE WHEN sexo = "Feminino" THEN 1 ELSE 0 END) as female')
            ->selectRaw('COUNT(*) as total')
            ->groupBy('age_group')
            ->orderBy('age_group')
            ->get();


        $totalFuncionarios = Funcionario::count();
        $totalMasculinos = Funcionario::where('sexo', 'Masculino')->count();
        $totalFemininos = Funcionario::where('sexo', 'Feminino')->count();

        $dados = [
            ['Label' => 'Total', 'Funcionarios' => $totalFuncionarios],
            ['Label' => 'Homens', 'Funcionarios' => $totalMasculinos],
            ['Label' => 'Mulheres', 'Funcionarios' => $totalFemininos],
        ];

        $dadosPizza = [
            // ['label' => 'Total', 'value' => $totalFuncionarios],
            ['label' => 'Homens', 'value' => $totalMasculinos],
            ['label' => 'Mulheres', 'value' => $totalFemininos],
        ];

        //Faz contagem de de funcionarios para cada cargo específico
        $quantidadeCargos = DB::table('funcionarios')
            ->join('cargos', 'funcionarios.funcao', '=', 'cargos.id')
            ->select('cargos.nome_cargo as cargo', DB::raw('COUNT(*) as quantidade'))
            ->groupBy('cargos.nome_cargo')
            ->get();


        //Faz contagem de de funcionarios para cada cargo específico agrupando por 3 barras duas por genero e total naquelas duas
        $dataCargosPorGenero = DB::table('funcionarios')
            ->join('cargos', 'funcionarios.funcao', '=', 'cargos.id')
            ->select(
                'cargos.nome_cargo as cargo',
                DB::raw('SUM(CASE WHEN funcionarios.sexo = "Masculino" THEN 1 ELSE 0 END) as masculino'),
                DB::raw('SUM(CASE WHEN funcionarios.sexo = "Feminino" THEN 1 ELSE 0 END) as feminino'),
                DB::raw('COUNT(*) as total')
            )
            ->groupBy('cargos.nome_cargo')
            ->get();

        //faz a contagem de funcionarios para cada nivel academico especifico
        $niveisAcademicos = DB::table('funcionarios')
            ->join('grauacademico', 'funcionarios.id', '=', 'grauacademico.id_funcionario')
            ->select('grauacademico.nivel_academico  as nivel', DB::raw('COUNT(*) as quantidade'))
            ->groupBy('grauacademico.nivel_academico')
            ->get();

        $dataNiveisAcademicos = DB::table('funcionarios')
            ->join('grauacademico', 'funcionarios.id', '=', 'grauacademico.id_funcionario')
            ->select(
                'grauacademico.nivel_academico  as nivel',
                DB::raw('SUM(CASE WHEN funcionarios.sexo = "Masculino" THEN 1 ELSE 0 END) as masculino'),
                DB::raw('SUM(CASE WHEN funcionarios.sexo = "Feminino" THEN 1 ELSE 0 END) as feminino'),
                DB::raw('COUNT(*) as total')
            )
            ->groupBy('grauacademico.nivel_academico')
            ->get();


        $resumoAvaliacoes = DB::table('funcionarios')
            ->join('avaliacao_desempenhos', 'funcionarios.id', '=', 'avaliacao_desempenhos.id_funcionario')
            ->select(
                'avaliacao_desempenhos.tipo_avaliacao  as tipo',
                DB::raw('SUM(CASE WHEN funcionarios.sexo = "Masculino" THEN 1 ELSE 0 END) as masculino'),
                DB::raw('SUM(CASE WHEN funcionarios.sexo = "Feminino" THEN 1 ELSE 0 END) as feminino'),
                DB::raw('COUNT(*) as total')
            )
            ->groupBy('avaliacao_desempenhos.tipo_avaliacao')
            ->get();

        $totalAvaliacoes = AvaliacaoDesempenho::count();
        $totalAnuais = AvaliacaoDesempenho::where('tipo_avaliacao', 'Anual')->count();
        $totalSemestrais = AvaliacaoDesempenho::where('tipo_avaliacao', 'Semestral')->count();

        $avaliacoes = [
            ['Label' => 'Total', 'Avaliacões' => $totalAvaliacoes],
            ['Label' => 'Anuais', 'Avaliacões' => $totalAnuais],
            ['Label' => 'Semestrais', 'Avaliacões' => $totalSemestrais],
        ];

        //mostra a quant de homens vs mulheres e o total em cada departamento // 3 barras para cada dept
        $dataDepartamentos = DB::table('funcionarios')
            ->select(
                'funcionarios.departamento as dept',
                DB::raw('SUM(CASE WHEN funcionarios.sexo = "Masculino" THEN 1 ELSE 0 END) as masculino'),
                DB::raw('SUM(CASE WHEN funcionarios.sexo = "Feminino" THEN 1 ELSE 0 END) as feminino'),
                DB::raw('COUNT(*) as total')
            )
            ->groupBy('funcionarios.departamento')
            ->get();


        //mostra a quant de homens vs mulheres e o total em cada departamento // 3 barras para cada dept
        $dataTurnos = DB::table('funcionarios')
            ->select(
                'funcionarios.turno as turno',
                DB::raw('SUM(CASE WHEN funcionarios.sexo = "Masculino" THEN 1 ELSE 0 END) as masculino'),
                DB::raw('SUM(CASE WHEN funcionarios.sexo = "Feminino" THEN 1 ELSE 0 END) as feminino'),
                DB::raw('COUNT(*) as total')
            )
            ->groupBy('funcionarios.turno')
            ->get();


        return view(
            'dashboards.admin.index',
            compact(
                'dadosDocs',
                'quantidadeDocs',
                'todosFuncionarios',
                'todosUsuarios',
                'contarHomens',
                'contarMulheres',
                'dadosAniversariantes',
                'quantidadeAniversariantes',
                'intervalo1',
                'intervalo2',
                'intervalo3',
                'intervalo4',
                'percentagemIntervalo1',
                'percentagemIntervalo2',
                'percentagemIntervalo3',
                'percentagemIntervalo4',
                'percentagemMulheres',
                'percentagemHomens',
                'chartData',
                'dados',
                'dadosPizza',
                'quantidadeCargos',
                'niveisAcademicos',
                'dataCargosPorGenero',
                'dataNiveisAcademicos',
                'resumoAvaliacoes',
                'avaliacoes',
                'dataDepartamentos',
                'dataTurnos'

            )
        );
    }
    public function perfil()
    {
        return view('dashboards.admin.perfil');
    }
    public function configuracoes()
    {
        return view('dashboards.admin.configuracoes');
    }
}
