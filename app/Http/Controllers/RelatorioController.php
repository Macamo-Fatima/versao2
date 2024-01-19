<?php

namespace App\Http\Controllers;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\DB;

class RelatorioController extends Controller
{
    public function index()
    {
        $dados = DB::table('cargos')
            ->join('funcionarios', 'funcionarios.funcao', '=', 'cargos.id')
            ->join('avaliacao_desempenhos', 'avaliacao_desempenhos.id_funcionario', '=', 'funcionarios.id')          
            ->select('funcionarios.*', 'cargos.nome_cargo', 'cargos.grupo_funcional',  'avaliacao_desempenhos.*')
            ->get();
            $avaliacoesFeitas = DB::table('avaliacao_desempenhos')->count();
        return view('relatorios.index', compact('dados', 'avaliacoesFeitas'));
    }

    public function generate_pdf()
    {
        $data = 'webjourney.dev';
        $pdf = Pdf::loadView('relatorios.relatorio', compact('data'));
        return $pdf->stream('relatorio');
    }

    public function download_pdf()
    {
        $data = 'webjourney.dev';
        $pdf = Pdf::loadView('relatorios.relatorio', compact('data'));
        return $pdf->download('relatorio.pdf');
    }


    public function visualizar($id_avaliacao)
    {
        $dados = DB::table('cargos')
            ->join('funcionarios', 'funcionarios.funcao', '=', 'cargos.id')
            ->join('avaliacao_desempenhos', 'avaliacao_desempenhos.id_funcionario', '=', 'funcionarios.id')
            ->join('competences', 'competences.id_avaliacao', '=', 'avaliacao_desempenhos.id')
            ->join('objetives', 'objetives.id_avaliacao', '=', 'avaliacao_desempenhos.id')
            ->select('funcionarios.nome_completo', 'funcionarios.sexo', 'funcionarios.email_prof', 'funcionarios.contato_prof', 'funcionarios.contato_pessoal', 'funcionarios.departamento', 'funcionarios.nuit', 'funcionarios.tipo_documento', 'funcionarios.nr_documento', 'cargos.nome_cargo', 'cargos.grupo_funcional', 'competences.*', 'objetives.*', 'avaliacao_desempenhos.*')
            ->where('avaliacao_desempenhos.id', '=', $id_avaliacao)
            ->get();
        // dd($dados);
        $pdf = Pdf::loadView('relatorios.relatorio', compact('dados'));
        return $pdf->stream('relatorio');
    }

    public function download($id_avaliacao)
    {
        $nome_ficheiro = Str::random(10) . 'relatorio.pdf';
        $dados = DB::table('cargos')
            ->join('funcionarios', 'funcionarios.funcao', '=', 'cargos.id')
            ->join('avaliacao_desempenhos', 'avaliacao_desempenhos.id_funcionario', '=', 'funcionarios.id')
            ->join('competences', 'competences.id_avaliacao', '=', 'avaliacao_desempenhos.id')
            ->join('objetives', 'objetives.id_avaliacao', '=', 'avaliacao_desempenhos.id')
            ->select('funcionarios.nome_completo', 'funcionarios.sexo', 'funcionarios.email_prof', 'funcionarios.contato_prof', 'funcionarios.contato_pessoal', 'funcionarios.departamento', 'funcionarios.nuit', 'funcionarios.tipo_documento', 'funcionarios.nr_documento', 'cargos.nome_cargo', 'cargos.grupo_funcional', 'competences.*', 'objetives.*', 'avaliacao_desempenhos.*')
            ->where('avaliacao_desempenhos.id', '=', $id_avaliacao)
            ->get();
        $pdf = Pdf::loadView('relatorios.relatorio', compact('dados'));
        return $pdf->download('relatorio.pdf');
    }
}
