<?php

namespace App\Http\Controllers;

use App\Models\Desempenho;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\CompetenceGroup;
use Brian2694\Toastr\Facades\Toastr;

class DesempenhoController extends Controller
{
    public function index()
    {
        $cargosList = DB::table('cargos')->get();
        $locaisList = DB::table('local_de_trabalhos')->get();
        $departamentosList = DB::table('departamentos')->get();
        $competenciasList = DB::table('competencias')->get();
        $colaboradoresNomesList = DB::table('funcionarios')
            ->select('nome_completo')
            ->get();
        $dados = DB::table('cargos')
            ->join('desempenhos', 'desempenhos.cargo', '=', 'cargos.id')
            ->select('desempenhos.*', 'cargos.nome_cargo', 'cargos.grupo_funcional', 'cargos.id as novoId')
            ->get();
        return view('parametrizacao.desempenho', compact('cargosList', 'locaisList', 'departamentosList', 'competenciasList', 'colaboradoresNomesList', 'dados'));
    }

    public function saveRecord(Request $request)
    {
        // $request->validate(['nome' => 'required|string|max:255',]);
        DB::beginTransaction();
        try {
            $desempenho                     = new Desempenho();
            $desempenho->cargo              = $request->funcao;
            $desempenho->dep                = $request->departamento;
            $desempenho->missao             = $request->missao;
            $desempenho->local              = $request->local;
            $desempenho->reporte            = $request->reporte;
            $desempenho->proficiencia       = $request->proeficiencia;
            $desempenho->word               = $request->word;
            $desempenho->excel              = $request->excel;
            $desempenho->access             = $request->access;
            $desempenho->powerpoint         = $request->powerpoint;
            $desempenho->save();
            $lastInsertedId = DB::getPdo()->lastInsertId();
            $competencias = $request->input('competencias');
            $cargoId = $request->input('funcao');
            foreach ($competencias as $competencia) {
                CompetenceGroup::create([
                    'id_cargo' => $cargoId,
                    'tipo_competencia' => $competencia,
                    'id_avaliacao' => $lastInsertedId,
                ]);
            }

            DB::commit();
            Toastr::success('Atribuição de competências criada :)', 'Sucesso');
            return redirect()->back();
        } catch (\Exception $e) {
            DB::rollBack();
            Toastr::error('Erro ao criar atribuição de competências :)', 'Erro');
            return redirect()->back();
        }




        // Dump and Die para visualizar os objetivos selecionados
        // $objetivos = $request->input('competencias');
        //  dd($objetivos);
    }


    //Edit de funcionário
    public function viewRecord($desempenho_id)
    {
        $cargosList = DB::table('cargos')->get();
        $locaisList = DB::table('local_de_trabalhos')->get();
        $departamentosList = DB::table('departamentos')->get();
        $competenciasList = DB::table('competencias')->get();
        $dados = DB::table('cargos')
            ->join('desempenhos', 'desempenhos.cargo', '=', 'cargos.id')
            ->select('desempenhos.*', 'cargos.nome_cargo', 'cargos.grupo_funcional')
            ->where('desempenhos.id', '=', $desempenho_id)
            ->get();

        return view('parametrizacao.edit_desempenho', compact('cargosList', 'departamentosList', 'competenciasList', 'dados', 'locaisList'));

        // dd($funcionario_id, $grau_academico_id, $especificacao_id);
    }



    public function verDetalhesCompetencias($novo_id)
    {
        $resultado = DB::table('cargos')
            ->select(
                'cargos.nome_cargo',
                'cargos.grupo_funcional',
                'desempenhos.dep',
                'desempenhos.missao',
                'desempenhos.local',
                'desempenhos.reporte',
                'desempenhos.excel',
                'desempenhos.powerpoint',
                'desempenhos.word',
                'desempenhos.access',
                'competence_groups.tipo_competencia'
            )
            ->join('desempenhos', 'desempenhos.cargo', '=', 'cargos.id')
            ->join('competence_groups', 'competence_groups.id_cargo', '=', 'desempenhos.cargo')
            ->where('competence_groups.id_cargo', '=', $novo_id)
            ->get();



        $conjuntoCompetencias = DB::table('competence_groups')
            ->select('competence_groups.tipo_competencia')
            ->where('competence_groups.id_cargo', '=', $novo_id)
            ->distinct('competence_groups.tipo_competencia')
            ->get();

        return view('parametrizacao.detalhes_competencias', compact('resultado', 'conjuntoCompetencias'));
    }



    //Update avaliação
    public function updateRecord(Request $request)
    {
        DB::beginTransaction();
        try {
            $updateDesempenho = [
                'id'                 => $request->id,
                'cargo'              => $request->funcao,
                'dep'                => $request->departamento,
                'missao'            => $request->missao,
                'local'              => $request->local,
                'reporte'            => $request->reporte,
                'competencia'        => $request->competencia,
                'proficiencia'       => $request->proeficiencia,
                'word'               => $request->word,
                'excel'              => $request->excel,
                'access'             => $request->access,
                'powerpoint'         => $request->powerpoint,

            ];

            Desempenho::where('id', $request->id)->update($updateDesempenho);
            DB::commit();
            Toastr::success('Avaliação atualizaada:)', 'Success');
            return redirect()->route('listar/desempenhos');
        } catch (\Exception $e) {
            DB::rollback();
            Toastr::error('Erro ao atualizar avaliação :)', 'Error');
            return redirect()->back();
        }
    }

    //Delete avaliação
    public function deleteRecord($id_avaliacao, $novoId)
    {
        DB::beginTransaction();
        try {
            Desempenho::where('id', $id_avaliacao)->delete();
            DB::table('competence_groups')
                ->where('id_cargo', $novoId)
                ->where('id_avaliacao', $id_avaliacao)
                ->delete();
            DB::commit();
            Toastr::success('Avaliação excluida :)', 'Sucesso');
            return redirect()->route('listar/desempenhos');
        } catch (\Exception $e) {
            DB::rollback();
            Toastr::error('Erro ao excluir avaliação :)', 'Erro');
            return redirect()->route('listar/desempenhos');
            // echo $e;
        }
    }
}
