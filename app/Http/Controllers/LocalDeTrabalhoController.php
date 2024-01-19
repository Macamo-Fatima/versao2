<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Models\LocalDeTrabalho;
use Illuminate\Support\Facades\DB;
use Brian2694\Toastr\Facades\Toastr;

class LocalDeTrabalhoController extends Controller
{
    public function index()
    {
        $locaisList = DB::table('local_de_trabalhos')->get();

        $data_atual = Carbon::now();
        $dadosAniversariantes = DB::table('funcionarios')
            ->select('nome_completo', 'data_nascimento', 'sexo', 'email_prof', 'fotografia')
            ->whereMonth('data_nascimento', $data_atual->month)
            ->whereDay('data_nascimento', $data_atual->day)
            ->orderByRaw('day(data_nascimento) asc')
            ->limit(4)
            ->get();

        $quantidadeAniversariantes = DB::table('funcionarios')
            ->select('nome_completo', 'data_nascimento', 'sexo', 'email_prof')
            ->whereMonth('data_nascimento', $data_atual->month)
            ->whereDay('data_nascimento', $data_atual->day)
            ->orderByRaw('day(data_nascimento) asc')
            ->count();

        $dadosDocs =   DB::table('funcionarios')
            ->select('nome_completo', 'data_emissao', 'data_validade', 'fotografia', 'tipo_documento')
            ->whereRaw('DATEDIFF(funcionarios.data_validade, NOW()) <= 45')
            ->whereRaw('DATEDIFF(funcionarios.data_validade, NOW()) > 0')
            ->limit(4)
            ->get();

        $quantidadeDocs =   DB::table('funcionarios')
            ->select('nome_completo', 'data_emissao')
            ->whereRaw('DATEDIFF(funcionarios.data_validade, NOW()) <= 45')
            ->whereRaw('DATEDIFF(funcionarios.data_validade, NOW()) > 0')
            ->count();
        return view('parametrizacao.locais', compact('locaisList', 'quantidadeDocs', 'dadosDocs', 'quantidadeAniversariantes', 'dadosAniversariantes'));
    }

    public function saveRecord(Request $request)
    {

        $request->validate(['nome' => 'required|string|max:255',]);
        DB::beginTransaction();
        try {
            $local = new LocalDeTrabalho();
            $local->nome_local  = $request->nome;
            $local->save();
            DB::commit();
            Toastr::success('Local de trabalho criado :)', 'Sucesso');
            return redirect()->back();
        } catch (\Exception $e) {
            DB::rollBack();
            Toastr::error('Erro ao criar local de trabalho :)', 'Erro');
            return redirect()->back();
        }
    }

    public function updateRecord(Request $request)
    {
        DB::beginTransaction();
        try {
            $update = [
                'id'                   =>  $request->id,
                'nome_local'           =>  $request->nome,

            ];
            LocalDeTrabalho::where('id', $request->id)->update($update);
            DB::commit();
            Toastr::success('Local de trabalho atualizado :)', 'Sucesso');
            return redirect()->back();
        } catch (\Exception $e) {
            DB::rollBack();
            Toastr::error('Erro ao atualizar local de trabalho :)', 'Erro');
            return redirect()->back();
        }
    }



    public function deleteRecord($local_id)
    {
        DB::beginTransaction();
        try {
            LocalDeTrabalho::where('id', $local_id)->delete();
            DB::commit();
            Toastr::success('Local de trabalho excluido :)', 'Sucesso');
            return redirect()->back();
        } catch (\Exception $e) {
            DB::rollBack();
            Toastr::error('Erro ao excluir local de trabalho :)', 'Erro');
            return redirect()->back();
        }
    }

    // A função abaixo faz a exclusão
    public function deleteRecord1(Request $request)
    {
        try {
            LocalDeTrabalho::destroy($request->id);
            DB::commit();
            Toastr::success('Local de trabalho excluido :)', 'Sucesso');
            return redirect()->back();
        } catch (\Exception $e) {
            DB::rollback();
            Toastr::error('Erro ao excluir local de trabalho :)', 'Erro');
            return redirect()->back();
        }
    }
}
