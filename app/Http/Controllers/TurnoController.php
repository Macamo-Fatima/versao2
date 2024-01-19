<?php

namespace App\Http\Controllers;

use App\Models\Turno;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Brian2694\Toastr\Facades\Toastr;

class TurnoController extends Controller
{
    public function index()
    {
        $turnosList = DB::table('turnos')->get();

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
        return view('parametrizacao.turnos', compact('turnosList', 'quantidadeDocs', 'dadosDocs', 'quantidadeAniversariantes', 'dadosAniversariantes'));
    }

    public function saveRecord(Request $request)
    {

        $request->validate(['nome' => 'required|string|max:255',]);
        DB::beginTransaction();
        try {
            $turno = new Turno();
            $turno->nome_turno  = $request->nome;
            $turno->save();
            DB::commit();
            Toastr::success('Turno criado :)', 'Sucesso');
            return redirect()->back();
        } catch (\Exception $e) {
            DB::rollBack();
            Toastr::error('Erro ao criar turno :)', 'Erro');
            return redirect()->back();
        }
    }

    public function updateRecord(Request $request)
    {
        DB::beginTransaction();
        try {
            $update = [
                'id'                   =>  $request->id,
                'nome_turno'           =>  $request->nome,

            ];
            Turno::where('id', $request->id)->update($update);
            DB::commit();
            Toastr::success('Turno atualizado :)', 'Sucesso');
            return redirect()->back();
        } catch (\Exception $e) {
            DB::rollBack();
            Toastr::error('Erro ao atualizar turno :)', 'Erro');
            return redirect()->back();
        }
    }



    public function deleteRecord($turno_id)
    {
        DB::beginTransaction();
        try {
            Turno::where('id', $turno_id)->delete();
            DB::commit();
            Toastr::success('Turno excluido :)', 'Sucesso');
            return redirect()->back();
        } catch (\Exception $e) {
            DB::rollBack();
            Toastr::error('Erro ao excluir turno :)', 'Erro');
            return redirect()->back();
        }
    }


    // A função abaixo faz a exclusão
    public function deleteRecord1(Request $request)
    {
        try {
            Turno::destroy($request->id);
            DB::commit();
            Toastr::success('Turno excluido :)', 'Sucesso');
            return redirect()->back();
        } catch (\Exception $e) {
            DB::rollback();
            Toastr::error('Erro ao excluir turno :)', 'Erro');
            return redirect()->back();
        }
    }
}
