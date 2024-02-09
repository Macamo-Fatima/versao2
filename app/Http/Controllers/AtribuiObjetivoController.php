<?php

namespace App\Http\Controllers;

use App\Models\AtribuiObjetivo;
use App\Models\ObjetivoGroup;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Brian2694\Toastr\Facades\Toastr;

class AtribuiObjetivoController extends Controller
{
    public function index()
    {
        $cargosList = DB::table('cargos')->get();
        $locaisList = DB::table('local_de_trabalhos')->get();
        $departamentosList = DB::table('departamentos')->get();
        $objetivosList = DB::table('objetivos')->get();
        $funcionariosList = DB::table('funcionarios')->get();
        $dados = DB::table('cargos')
            ->join('atribui_objetivos', 'atribui_objetivos.cargo_funcionario', '=', 'cargos.id')
            ->select('atribui_objetivos.*', 'cargos.nome_cargo', 'cargos.grupo_funcional')
            ->get();
        return view('parametrizacao.atribuir_objetivo', compact('funcionariosList', 'cargosList', 'locaisList', 'departamentosList', 'objetivosList', 'dados'));
    }

    public function saveRecord(Request $request)
    {
        // $request->validate(['nome' => 'required|string|max:255',]);
        DB::beginTransaction();
        try {
            $atribuicao_objetivo                                 = new AtribuiObjetivo();
            $atribuicao_objetivo->nome_funcionario              = $request->funcao;
            $atribuicao_objetivo->cargo_funcionario              = $request->cargo;
            $atribuicao_objetivo->dep_funcionario                = $request->departamento;
            $atribuicao_objetivo->missao_funcionario             = $request->missao;
            $atribuicao_objetivo->local_funcionario              = $request->local;
            $atribuicao_objetivo->reporte_funcionario            = $request->reporte;
            $atribuicao_objetivo->save();

            $lastInsertedId = DB::getPdo()->lastInsertId();
            $objetivos = $request->input('objetivos');
            $nome_funcionario = $request->input('funcao');
            foreach ($objetivos as $objetivo) {
                ObjetivoGroup::create([
                    'nome_funcionario' => $nome_funcionario,
                    'tipo_objetivo' => $objetivo,
                    'id_objetivo' => $lastInsertedId,
                ]);
            }

            DB::commit();
            Toastr::success('Atribuição de objetivo salva :)', 'Sucesso');
            return redirect()->back();
        } catch (\Exception $e) {
            DB::rollBack();
            Toastr::error('Erro ao atribuir objetivo:)', 'Erro');
            return redirect()->back();
        }
    }


    //Edit de atribuicao de objetivos
    public function viewRecord($desempenho_id)
    {
        $cargosList = DB::table('cargos')->get();
        $locaisList = DB::table('local_de_trabalhos')->get();
        $departamentosList = DB::table('departamentos')->get();
        $objetivosList = DB::table('objetivos')->get();
        $dados = DB::table('cargos')
            ->join('atribui_objetivos', 'atribui_objetivos.cargo_funcionario', '=', 'cargos.id')
            ->select('atribui_objetivos.*', 'cargos.nome_cargo', 'cargos.grupo_funcional')
            ->where('atribui_objetivos.id', '=', $desempenho_id)
            ->get();

        return view('parametrizacao.edit_atribuir_objetivo', compact('cargosList', 'departamentosList', 'objetivosList', 'dados', 'locaisList'));

        // dd($funcionario_id, $grau_academico_id, $especificacao_id);
    }



    //Update avaliação
    public function updateRecord(Request $request)
    {
        DB::beginTransaction();
        try {
            $updateAtribuicao = [
                'id'                             => $request->id,
                'cargo_funcionario'              => $request->funcao,
                'dep_funcionario'                => $request->departamento,
                'missao_funcionario'             => $request->missao,
                'local_funcionario'              => $request->local,
                'reporte_funcionario'            => $request->reporte,
                'objetivo_atribuicao'            => $request->objetivo,

            ];

            AtribuiObjetivo::where('id', $request->id)->update($updateAtribuicao);
            DB::commit();
            Toastr::success('Atribuicão de objetivo atualizada :)', 'Success');
            return redirect()->route('listar/atribuicoes');
        } catch (\Exception $e) {
            DB::rollback();
            Toastr::error('Erro ao atualizar atribuição de objetivo :)', 'Error');
            return redirect()->back();
        }
    }

    //Delete avaliação
    public function deleteRecord($id_avaliacao)
    {
        DB::beginTransaction();
        try {
            AtribuiObjetivo::where('id', $id_avaliacao)->delete();
            DB::table('objetivo_groups')
                ->where('id_objetivo', $id_avaliacao)
                ->delete();
            DB::commit();
            Toastr::success('Atribuicão de objetivo excluida :)', 'Sucesso');
            return redirect()->route('listar/atribuicoes');
        } catch (\Exception $e) {
            DB::rollback();
            Toastr::error('Erro ao excluir Atribuicão de objetivo :)', 'Erro');
            return redirect()->route('listar/atribuicoes');
            // echo $e;
        }
    }
    public function verDetalhesObjetivos($nome, $id_cargo)
    {

        $resultado = DB::table('cargos')
            ->select(
                'cargos.nome_cargo',
                'cargos.grupo_funcional',
                'objetivo_groups.tipo_objetivo',
                'atribui_objetivos.missao_funcionario',
                'atribui_objetivos.local_funcionario',
                'funcionarios.contato_pessoal',
                'funcionarios.endereco_fisico',
                'funcionarios.nome_completo',
                'funcionarios.contato_prof',
                'funcionarios.email_prof',
                'funcionarios.reporte',
                'funcionarios.turno',
                'funcionarios.categoria',
                'funcionarios.departamento',
                'funcionarios.estado_civil',
                'funcionarios.data_nascimento',
                'funcionarios.sexo',
                'funcionarios.tipo_contrato'
            )
            ->join('funcionarios', 'funcionarios.funcao', '=', 'cargos.id')
            ->join('atribui_objetivos', 'atribui_objetivos.nome_funcionario', '=', 'funcionarios.nome_completo')
            ->join('objetivo_groups', 'objetivo_groups.nome_funcionario', '=', 'atribui_objetivos.nome_funcionario')
            ->where('atribui_objetivos.cargo_funcionario', '=', $id_cargo)
            ->where('objetivo_groups.nome_funcionario', '=', $nome)
            ->distinct('objetivo_groups.tipo_objetivo')
            ->get();



        $conjuntoObjetivos = DB::table('objetivo_groups')
            ->select('objetivo_groups.tipo_objetivo')
            ->where('objetivo_groups.nome_funcionario', '=', $nome)
            ->distinct('objetivo_groups.tipo_objetivo')
            ->get();



        return view('parametrizacao.detalhes_objetivos', compact('resultado', 'conjuntoObjetivos'));
    }
}
