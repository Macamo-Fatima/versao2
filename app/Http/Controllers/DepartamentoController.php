<?php

namespace App\Http\Controllers;

use App\Models\Departamento;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Brian2694\Toastr\Facades\Toastr;

class DepartamentoController extends Controller
{
    public function index()
    {
       $departamentosList = DB::table('departamentos')->get();

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
        return view('parametrizacao.departamento', compact('departamentosList', 'quantidadeDocs', 'dadosDocs', 'quantidadeAniversariantes', 'dadosAniversariantes'));
    }

    public function saveRecord(Request $request)
    {

        $request->validate(['nome' => 'required|string|max:255',]);
        DB::beginTransaction();
        try {
           $departamento = new Departamento();
           $departamento->nome_departamento  = $request->nome;
           $departamento->sigla_departamento  = $request->sigla;
           $departamento->save();
            DB::commit();
            Toastr::success('Departamento criado :)', 'Sucesso');
            return redirect()->back();
        } catch (\Exception $e) {
            DB::rollBack();
            Toastr::error('Erro ao criar departamento :)', 'Erro');
            return redirect()->back();
        }
    }

    public function updateRecord(Request $request)
    {
        DB::beginTransaction();
        try {
            $update = [
                'id'                          =>  $request->id,
                'nome_departamento'           =>  $request->nome,
                'sigla_departamento'          =>  $request->sigla,

            ];
            Departamento::where('id', $request->id)->update($update);
            DB::commit();
            Toastr::success('Departamento atualizado :)', 'Sucesso');
            return redirect()->back();
        } catch (\Exception $e) {
            DB::rollBack();
            Toastr::error('Erro ao atualizar departamento :)', 'Erro');
            return redirect()->back();
        }
    }



    public function deleteRecord($departamento_id)
    {
        DB::beginTransaction();
        try {
            Departamento::where('id',$departamento_id)->delete();
            DB::commit();
            Toastr::success('Departamento excluido :)', 'Sucesso');
            return redirect()->back();
        } catch (\Exception $e) {
            DB::rollBack();
            Toastr::error('Erro ao excluir departamento :)', 'Erro');
            return redirect()->back();
        }
    }


    // A função abaixo faz a exclusão
    public function deleteRecord1(Request $request)
    {
        try {
            Departamento::destroy($request->id);
            DB::commit();
            Toastr::success('Departamento excluido :)', 'Sucesso');
            return redirect()->back();
        } catch (\Exception $e) {
            DB::rollback();
            Toastr::error('Erro ao excluir departamento :)', 'Erro');
            return redirect()->back();
        }
    }

}
