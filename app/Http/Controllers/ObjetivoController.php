<?php

namespace App\Http\Controllers;

use App\Models\Objetivo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Brian2694\Toastr\Facades\Toastr;

class ObjetivoController extends Controller
{
    public function index()
    {
        $objetivosList = DB::table('objetivos')->get();
        return view('parametrizacao.objetivo', compact('objetivosList'));
    }

    public function saveRecord(Request $request)
    {

        $request->validate([
            'nome' => 'required|string|max:255',
            'descricao' => 'required',
        ]);
        DB::beginTransaction();
        try {
            $objetivo = new Objetivo();
            $objetivo->nome_objetivo  = $request->nome;
            $objetivo->descricao_objetivo  = $request->descricao;
            $objetivo->save();
            DB::commit();
            Toastr::success('Objetivo criado :)', 'Sucesso');
            return redirect()->back();
        } catch (\Exception $e) {
            DB::rollBack();
            Toastr::error('Erro ao criar objetivo :)', 'Erro');
            return redirect()->back();
        }
    }

    //Edit de objetivo
    public function editar($objetivo_id)
    {
        $objetivo = DB::table('objetivos')->where('id', $objetivo_id)->get();
        return view('parametrizacao.edit_objetivo', compact('objetivo'));
    }

    public function updateRecord(Request $request)
    {
        DB::beginTransaction();
        try {
            $update = [
                'id'                         =>  $request->id,
                'nome_objetivo'           =>  $request->nome,
                'descricao_objetivo'      =>  $request->descricao,
            ];
            Objetivo::where('id', $request->id)->update($update);
            DB::commit();
            Toastr::success('Objetivo atualizado :)', 'Sucesso');
            return redirect()->route('listar/objetivos');
        } catch (\Exception $e) {
            DB::rollBack();
            Toastr::error('Erro ao atualizar objetivo :)', 'Erro');
            return redirect()->back();
        }
    }



    public function deleteRecord($objetivo_id)
    {
        DB::beginTransaction();
        try {
            Objetivo::where('id', $objetivo_id)->delete();
            DB::commit();
            Toastr::success('Objetivo excluido :)', 'Sucesso');
            return redirect()->route('listar/objetivos');
        } catch (\Exception $e) {
            DB::rollBack();
            Toastr::error('Erro ao excluir objetivo :)', 'Erro');
            return redirect()->back();
        }
    }


    // A função abaixo faz a exclusão
    public function deleteRecord1(Request $request)
    {
        try {
            Objetivo::destroy($request->id);
            DB::commit();
            Toastr::success('Objetivo excluido :)', 'Sucesso');
            return redirect()->back();
        } catch (\Exception $e) {
            DB::rollback();
            Toastr::error('Erro ao excluir objetivo :)', 'Erro');
            return redirect()->back();
        }
    }
}
