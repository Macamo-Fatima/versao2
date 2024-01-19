<?php

namespace App\Http\Controllers;

use App\Models\Competencia;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Brian2694\Toastr\Facades\Toastr;

class CompetenciaController extends Controller
{
    public function index()
    {
        $competenciasList = DB::table('competencias')->get();
        return view('parametrizacao.competencia', compact('competenciasList'));
    }

    public function saveRecord(Request $request)
    {

        $request->validate(['nome' => 'required|string|max:255',]);
        DB::beginTransaction();
        try {
            $competencia = new Competencia();
            $competencia->nome_competencia  = $request->nome;
            $competencia->descricao_competencia  = $request->descricao;
            $competencia->save();
            DB::commit();
            Toastr::success('Competência criada :)', 'Sucesso');
            return redirect()->back();
        } catch (\Exception $e) {
            DB::rollBack();
            Toastr::error('Erro ao criar competência :)', 'Erro');
            return redirect()->back();
        }
    }


    //Edit de competencia
    public function editar($competencia_id)
    {
        $competencia = DB::table('competencias')->where('id', $competencia_id)->get();
        return view('parametrizacao.edit_competencia', compact('competencia'));
    }

    public function updateRecord(Request $request)
    {
        DB::beginTransaction();
        try {
            $update = [
                'id'                         =>  $request->id,
                'nome_competencia'           =>  $request->nome,
                'descricao_competencia'      =>  $request->descricao,

            ];
            Competencia::where('id', $request->id)->update($update);
            DB::commit();
            Toastr::success('Competência atualizada :)', 'Sucesso');
            return redirect()->route('listar/competencias');
        } catch (\Exception $e) {
            DB::rollBack();
            Toastr::error('Erro ao atualizar competência :)', 'Erro');
            return redirect()->back();
        }
    }



    public function deleteRecord($competencia_id)
    {
        DB::beginTransaction();
        try {
            Competencia::where('id', $competencia_id)->delete();
            DB::commit();
            Toastr::success('Competência excluida :)', 'Sucesso');
            return redirect()->route('listar/competencias');
        } catch (\Exception $e) {
            DB::rollBack();
            Toastr::error('Erro ao excluir competência :)', 'Erro');
            return redirect()->back();
        }
    }

    // A função abaixo faz a exclusão
    public function deleteRecord1(Request $request)
    {
        try {
            Competencia::destroy($request->id);
            DB::commit();
            Toastr::success('Competência excluida :)', 'Sucesso');
            return redirect()->back();
        } catch (\Exception $e) {
            DB::rollback();
            Toastr::error('Erro ao excluir competência :)', 'Erro');
            return redirect()->back();
        }
    }
}
