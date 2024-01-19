<?php

namespace App\Http\Controllers;

use App\Models\AvaliacaoDesempenho;
use App\Models\Desempenho;
use App\Models\Funcionario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\Auth;

class AvaliacaoDesempenhoController extends Controller
{
    public function index()
    {

        $dados = DB::table('cargos')
            ->join('funcionarios', 'funcionarios.funcao', '=', 'cargos.id')
            ->join('avaliacao_desempenhos', 'avaliacao_desempenhos.id_funcionario', '=', 'funcionarios.id')
            ->join('competences', 'competences.id_avaliacao', '=', 'avaliacao_desempenhos.id')
            ->join('objetives', 'objetives.id_avaliacao', '=', 'avaliacao_desempenhos.id')
            ->select('funcionarios.*', 'cargos.nome_cargo', 'cargos.grupo_funcional', 'competences.*', 'objetives.*', 'avaliacao_desempenhos.*')
            ->get();

        $funcionariosList = DB::table('cargos')
            ->join('funcionarios', 'funcionarios.funcao', '=', 'cargos.id')
            ->select('funcionarios.*', 'cargos.nome_cargo', 'cargos.grupo_funcional', 'cargos.id')
            ->get();



        $avaliacoesList = DB::table('cargos')
            ->join('funcionarios', 'funcionarios.funcao', '=', 'cargos.id')
            ->join('avaliacao_desempenhos', 'avaliacao_desempenhos.id_funcionario', '=', 'funcionarios.id')
            ->select('avaliacao_desempenhos.*', 'cargos.nome_cargo', 'cargos.grupo_funcional', 'funcionarios.nome_completo', 'funcionarios.departamento')
            ->get();

        return view('avaliacao.index', compact('dados', 'funcionariosList', 'avaliacoesList'));
    }



    public function avaliacaoGridView()
    {
        $dados = DB::table('cargos')
            ->join('funcionarios', 'funcionarios.funcao', '=', 'cargos.id')
            ->join('avaliacao_desempenhos', 'avaliacao_desempenhos.id_funcionario', '=', 'funcionarios.id')
            ->select('avaliacao_desempenhos.*', 'cargos.nome_cargo', 'cargos.grupo_funcional', 'funcionarios.nome_completo', 'funcionarios.departamento', 'funcionarios.data_nascimento', 'funcionarios.fotografia', 'funcionarios.email_prof', 'funcionarios.contato_prof')
            ->simplePaginate(6);
        return view('avaliacao.gridview', compact('dados'));
    }

    public function novaAvaliacao()
    {
        $funcionariosList = DB::table('cargos')
            ->join('funcionarios', 'funcionarios.funcao', '=', 'cargos.id')
            ->select('funcionarios.*', 'cargos.nome_cargo', 'cargos.grupo_funcional')
            ->distinct()
            ->get();

        $funcionariosListSelect = DB::table('cargos')
        ->join('funcionarios', 'funcionarios.funcao', '=', 'cargos.id')
        ->select('funcionarios.funcao as funcao', 'cargos.nome_cargo as cargo')
        ->groupBy('funcionarios.funcao', 'cargos.nome_cargo')
        ->get();


        $funcionariosNomesListSelect = DB::table('objetivo_groups')
        ->join('funcionarios', 'funcionarios.nome_completo', '=', 'objetivo_groups.nome_funcionario')
        ->select('funcionarios.nome_completo as nome_completo', 'objetivo_groups.nome_funcionario as nome_funcionario')
        ->groupBy('funcionarios.nome_completo', 'objetivo_groups.nome_funcionario')
        ->get();





        return view('avaliacao.create', compact('funcionariosList', 'funcionariosListSelect', 'funcionariosNomesListSelect'));
    }



    public function saveRecord(Request $request)
    {


        $request->validate([
            'avaliacao'            => 'required|string|max:255',
            'data_realizacao'      => 'required',
            'acao'                 => 'required',
            'recomendacao'         => 'required',
            'comentario'           => 'required',

        ]);
        DB::beginTransaction();
        try {
            $funcionario                          = new AvaliacaoDesempenho();
            $funcionario->tipo_avaliacao          = $request->avaliacao;
            $funcionario->data                    = $request->data_realizacao;
            $funcionario->id_funcionario          = $request->funcionario;
            $funcionario->acao                    = $request->acao;
            $funcionario->c_avaliador             = $request->recomendacao;
            $funcionario->c_avaliado              = $request->comentario;
            $funcionario->usuario                 = Auth::user()->name;
            $funcionario->save();
            $lastInsertedId = DB::getPdo()->lastInsertId();


            $competencias = [
                'id_avaliacao'             => $lastInsertedId,
                'inspirar'                 => $request->inspirar,
                'networking'               => $request->networking,
                'cooperar'                 => $request->cooperar,
                'envolver'                 => $request->envolver,
                'autonomia'                => $request->autonomia,
            ];
            DB::table('tbcompetencias')->insert($competencias);



            $objetivos = [
                'id_avaliacao'                 => $lastInsertedId,
                'disponibilidade_info'         => $request->disponibilidade_info,
                'cumprimento_legislacao'       => $request->cumprimento_legislacao,
                'garantir_efetividade'         => $request->garantir_efetividade,
                'niveis_liquidez'              => $request->niveis_liquidez,
                'assessorar'                   => $request->assessorar,
            ];
            DB::table('tbobjetivos')->insert($objetivos);


            DB::commit();
            Toastr::success('Avaliação criada :)', 'Sucesso');
            return redirect()->route('listar/avaliacoes');
        } catch (\Exception $e) {
            DB::rollBack();
            Toastr::error('Erro ao criar avaliação :)', 'Erro');
            return redirect()->route('listar/avaliacoes');
        }
    }

    //Edit de avaliação
    public function viewRecord($id_avaliacao, $id_competencia, $id_objetivo)
    {
        $cargosList = DB::table('cargos')->get();

        $dados = DB::table('cargos')
            ->join('funcionarios', 'funcionarios.funcao', '=', 'cargos.id')
            ->join('avaliacao_desempenhos', 'avaliacao_desempenhos.id_funcionario', '=', 'funcionarios.id')
            ->join('tbcompetencias', 'tbcompetencias.id_avaliacao', '=', 'avaliacao_desempenhos.id')
            ->join('tbobjetivos', 'tbobjetivos.id_avaliacao', '=', 'avaliacao_desempenhos.id')
            ->select('funcionarios.*', 'cargos.nome_cargo', 'cargos.grupo_funcional', 'tbcompetencias.*', 'tbobjetivos.*', 'avaliacao_desempenhos.*')
            ->where('avaliacao_desempenhos.id', '=', $id_avaliacao)
            ->where('tbobjetivos.id_objetivo', '=', $id_objetivo)
            ->where('tbcompetencias.id_competencia', '=', $id_competencia)
            ->get();

        $funcionariosList = DB::table('cargos')
            ->join('funcionarios', 'funcionarios.funcao', '=', 'cargos.id')
            ->select('funcionarios.*', 'cargos.nome_cargo', 'cargos.grupo_funcional')
            ->get();
        return view('avaliacao.edit', compact('cargosList', 'dados', 'funcionariosList'));
    }


    //Update avaliação
    public function updateRecord(Request $request)
    {
        DB::beginTransaction();
        try {
            $updateAvaliacao = [
                'id'                      => $request->id,
                'tipo_avaliacao'          => $request->avaliacao,
                'data'                    => $request->data_realizacao,
                'id_funcionario'          => $request->funcionario,
                'acao'                    => $request->acao,
                'c_avaliador'             => $request->recomendacao,
                'c_avaliado'              => $request->comentario,

            ];

            $updateCompetencias = [
                'id_competencia'           => $request->id_competencia,
                'inspirar'                 => $request->inspirar,
                'networking'               => $request->networking,
                'cooperar'                 => $request->cooperar,
                'envolver'                 => $request->envolver,
                'autonomia'                => $request->autonomia,
            ];

            $updateObjetivos = [
                'id_objetivo'                => $request->id_objetivo,
                'disponibilidade_info'       => $request->disponibilidade_info,
                'cumprimento_legislacao'     => $request->cumprimento_legislacao,
                'garantir_efetividade'       => $request->garantir_efetividade,
                'niveis_liquidez'            => $request->niveis_liquidez,
                'assessorar'                 => $request->assessorar,
            ];

            AvaliacaoDesempenho::where('id', $request->id)->update($updateAvaliacao);
            DB::table('tbcompetencias')->where('id_competencia', $request->id_competencia)->update($updateCompetencias);
            DB::table('tbobjetivos')->where('id_objetivo', $request->id_objetivo)->update($updateObjetivos);
            DB::commit();
            Toastr::success('Avaliação atualizaada:)', 'Success');
            return redirect()->route('listar/avaliacoes');
        } catch (\Exception $e) {
            DB::rollback();
            Toastr::error('Erro ao atualizar avaliação :)', 'Error');
            return redirect()->back();
        }
    }

    //Delete avaliação
    public function deleteRecord($id_avaliacao)
    {
        DB::beginTransaction();
        try {
            AvaliacaoDesempenho::where('id', $id_avaliacao)->delete();
            DB::table('objetives')->where('id_avaliacao', $id_avaliacao)->delete();
            DB::table('competences')->where('id_avaliacao', $id_avaliacao)->delete();
            DB::commit();
            Toastr::success('Avaliação excluida :)', 'Sucesso');
            return redirect()->route('listar/avaliacoes');
        } catch (\Exception $e) {
            DB::rollback();
            Toastr::error('Erro ao excluir avaliação :)', 'Erro');
            return redirect()->route('listar/avaliacoes');
            // echo $e;
        }
    }

    public function teste()
    {
        return view('avaliacao.avaliacao');
    }


    public function funcionariosGridViewAvaliacao()
    {
        $resultado = DB::table('funcionarios')->get();
        $dados = DB::table('funcionarios')
            ->join('grauacademico', 'funcionarios.id', '=', 'grauacademico.id_funcionario')
            ->join('especificacoes', 'funcionarios.id', '=', 'especificacoes.id_funcionario')
            ->select('funcionarios.*', 'especificacoes.*',  'grauacademico.*', DB::raw('YEAR(CURDATE()) - YEAR(data_nascimento) - IF(STR_TO_DATE(CONCAT(YEAR(CURDATE()), "-", MONTH(data_nascimento), "-", DAY(data_nascimento)), "%Y-%m-%d") > CURDATE(), 1, 0) AS idade'))
            ->simplePaginate(6);
        return view('avaliacao.workers', compact('dados'));
    }

    public function avaliarFuncionario($funcionario_id)
    {

        $funcionariosList = DB::table('cargos')
            ->join('funcionarios', 'funcionarios.funcao', '=', 'cargos.id')
            ->select('funcionarios.*', 'cargos.nome_cargo', 'cargos.grupo_funcional')
            ->where('funcionarios.id', '=', $funcionario_id)
            ->get();
        return view('avaliacao.teste', compact('funcionariosList'));
    }


    public function novaAvaliacaoTeste()
    {
        $funcionariosList = DB::table('cargos')
            ->join('funcionarios', 'funcionarios.funcao', '=', 'cargos.id')
            ->select('funcionarios.*', 'cargos.nome_cargo', 'cargos.grupo_funcional')
            ->get();


        $chartData = Funcionario::select(DB::raw('
        CASE 
            WHEN TIMESTAMPDIFF(YEAR, data_nascimento, NOW()) BETWEEN 0 AND 20 THEN "0-20 anos"
            WHEN TIMESTAMPDIFF(YEAR, data_nascimento, NOW()) BETWEEN 21 AND 40 THEN "21-40 anos"
            WHEN TIMESTAMPDIFF(YEAR, data_nascimento, NOW()) BETWEEN 41 AND 60 THEN "41-60 anos"
            WHEN TIMESTAMPDIFF(YEAR, data_nascimento, NOW()) BETWEEN 61 AND 80 THEN "61-80 anos"
            ELSE "81+"
        END as age_group'))
            ->selectRaw('SUM(CASE WHEN sexo = "Masculino" THEN 1 ELSE 0 END) as male')
            ->selectRaw('SUM(CASE WHEN sexo = "Feminino" THEN 1 ELSE 0 END) as female')
            ->selectRaw('COUNT(*) as total')
            ->groupBy('age_group')
            ->orderBy('age_group')
            ->get();



        return view('avaliacao.teste', compact('funcionariosList', 'chartData'));
    }


    public function workerCompetencias($funcao)
    {
        $competencias  = DB::table('competence_groups')->where('id_cargo', $funcao)->get();
        return response()->json($competencias);
    }

    public function workerObjetivos($funcao)
    {
        $objetivos  = DB::table('objetivo_groups')->where('nome_funcionario', $funcao)->get();
        return response()->json($objetivos);
    }


    public function TesteSalvarCompetencias(Request $request)
    {
        // Valide os dados do formulário conforme necessário
        $data = $request->all();

        $tipoAvaliacao = $data['tipo_avaliacao'];
        $dataAvaliacao = $data['data_realizacao'];
        $funcionarioId = $data['funcionario'];
        $acao = $data['acao'];
        $recomendacao = $data['recomendacao'];
        $comentario = $data['comentario'];

        // Recupere o objeto de avaliações
        $avaliacoes = $data['avaliacao'];
        // Recupere o objeto de objetivos
        $objetivos = $data['objetivo'];

        DB::beginTransaction();
        try {
            $funcionario                          = new AvaliacaoDesempenho();
            $funcionario->tipo_avaliacao          = $tipoAvaliacao;
            $funcionario->data                    = $dataAvaliacao;
            $funcionario->id_funcionario          = $funcionarioId;
            $funcionario->acao                    = $acao;
            $funcionario->c_avaliador             = $recomendacao;
            $funcionario->c_avaliado              = $comentario;
            $funcionario->usuario                 = Auth::user()->name;
            $funcionario->save();
            $lastInsertedId = DB::getPdo()->lastInsertId();

            foreach ($avaliacoes as $competenciaId => $avaliacao) {
                $comp = [
                    'id_avaliacao'                  => $lastInsertedId,
                    'competencia_funcionario'       => $avaliacao,
                ];
                DB::table('competences')->insert($comp);
                // echo "Competência ID: $competenciaId - Avaliação: $avaliacao<br>";
            }

            foreach ($objetivos as $objetivoId => $objetivo) {
                $obj = [
                    'id_avaliacao'                 => $lastInsertedId,
                    'objetivo_funcionario'         =>  $objetivo,
                ];
                DB::table('objetives')->insert($obj);
                // echo "Objetivo ID: $objetivoId - Objetivo: $objetivo<br>";
            }

            DB::commit();
            Toastr::success('Avaliação criada :)', 'Sucesso');
            return redirect()->route('listar/avaliacoes');
        } catch (\Exception $e) {
            DB::rollBack();
            Toastr::error('Erro ao criar avaliação :)', 'Erro');
            return redirect()->route('listar/avaliacoes');
        }
    }

    public function novaAvaliacao1()
    {
        $funcionariosList = DB::table('cargos')
            ->join('funcionarios', 'funcionarios.funcao', '=', 'cargos.id')
            ->select('funcionarios.funcao as funcao', 'cargos.nome_cargo as cargo')
            ->groupBy('funcionarios.funcao','cargos.nome_cargo')
            ->get();
        // dd($funcionariosList);
        foreach ($funcionariosList as $funcionario) {
            echo $funcionario->funcao . '-'. $funcionario->cargo . "<br>";
        }
        // return view('avaliacao.create', compact('funcionariosList'));
    }
}
