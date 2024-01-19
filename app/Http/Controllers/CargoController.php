<?php

namespace App\Http\Controllers;

use App\Models\Cargo;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Brian2694\Toastr\Facades\Toastr;

class CargoController extends Controller
{
    public function index()
    {
        $cargosList = DB::table('cargos')->get();
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
        return view('parametrizacao.cargos', compact('cargosList', 'quantidadeDocs', 'dadosDocs', 'quantidadeAniversariantes', 'dadosAniversariantes' ));
    }

    public function saveRecord(Request $request)
    {

        $request->validate(['nome' => 'required|string|max:255',]);
        DB::beginTransaction();
        try {
            $cargo                   = new Cargo();
            $cargo->nome_cargo       = $request->nome;
            $cargo->grupo_funcional  = $request->grupo_funcional;
            $cargo->save();
            //$lastInsertedId = $cargo->id; first way to get last inserted id
            //  $lastInsertedId = DB::getPdo()->lastInsertId(); second way to get last inserted id
            // dd($lastInsertedId);
            DB::commit();
            Toastr::success('Cargo criado :)', 'Sucesso');
            return redirect()->back();
        } catch (\Exception $e) {
            DB::rollBack();
            Toastr::error('Erro ao criar cargo :)', 'Erro');
            return redirect()->back();
        }
    }

    public function updateRecord(Request $request)
    {
        DB::beginTransaction();
        try {
            $update = [
                'id'                   =>  $request->id,
                'nome_cargo'           =>  $request->nome,
                'grupo_funcional'      =>  $request->grupo_funcional,

            ];
            Cargo::where('id', $request->id)->update($update);
            DB::commit();
            Toastr::success('Cargo atualizado :)', 'Sucesso');
            return redirect()->back();
        } catch (\Exception $e) {
            DB::rollBack();
            Toastr::error('Erro ao atualizar cargo :)', 'Erro');
            return redirect()->back();
        }
    }



    public function deleteRecord($cargo_id)
    {
        DB::beginTransaction();
        try {
            Cargo::where('id', $cargo_id)->delete();
            DB::commit();
            Toastr::success('Cargo excluido :)', 'Sucesso');
            return redirect()->back();
        } catch (\Exception $e) {
            DB::rollBack();
            Toastr::error('Erro ao excluir cargo :)', 'Erro');
            return redirect()->back();
        }
    }


    // A função abaixo faz a exclusão
    public function deleteRecord1(Request $request)
    {
        try {
            Cargo::destroy($request->id);
            DB::commit();
            Toastr::success('Cargo excluido :)', 'Sucesso');
            return redirect()->back();
        } catch (\Exception $e) {

            DB::rollback();
            Toastr::error('Erro ao excluir cargo :)', 'Erro');
            return redirect()->back();
        }
    }
}
