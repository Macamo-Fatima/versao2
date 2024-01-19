<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Cluster;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Brian2694\Toastr\Facades\Toastr;

class ClusterController extends Controller
{
    public function index()
    {
        $clustersList = DB::table('clusters')->get();

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
        return view('parametrizacao.clusters', compact('clustersList', 'quantidadeDocs', 'dadosDocs', 'quantidadeAniversariantes', 'dadosAniversariantes'));
    }

    public function saveRecord(Request $request)
    {
        $request->validate(['nome' => 'required|string|max:255',]);
        DB::beginTransaction();
        try {
            $cluster = new Cluster();
            $cluster->nome_cluster  = $request->nome;
            $cluster->save();
            DB::commit();
            Toastr::success('Tipo de cluster criado :)', 'Sucesso');
            return redirect()->back();
        } catch (\Exception $e) {
            DB::rollBack();
            Toastr::error('Erro ao criar tipo cluster :)', 'Erro');
            return redirect()->back();
        }
    }

    public function updateRecord(Request $request)
    {
        DB::beginTransaction();
        try {
            $update = [
                'id_cluster'          =>  $request->id,
                'nome_cluster'        =>  $request->nome,

            ];
            Cluster::where('id_cluster', $request->id)->update($update);
            DB::commit();
            Toastr::success('Tipo cluster atualizado :)', 'Sucesso');
            return redirect()->back();
        } catch (\Exception $e) {
            DB::rollBack();
            Toastr::error('Erro ao atualizar tipo de cluster :)', 'Erro');
            return redirect()->back();
        }
    }



    public function deleteRecord($cluster_id)
    {
        DB::beginTransaction();
        try {
            Cluster::where('id_cluster', $cluster_id)->delete();
            DB::commit();
            Toastr::success('Tipo de cluster excluido :)', 'Sucesso');
            return redirect()->back();
        } catch (\Exception $e) {
            DB::rollBack();
            Toastr::error('Erro ao excluir tipo de cluster :)', 'Erro');
            return redirect()->back();
        }
    }

    // A função abaixo faz a exclusão
    public function deleteRecord1(Request $request)
    {
        try {

            Cluster::where('id_cluster', $request->id)->delete();
            DB::commit();
            Toastr::success('Tipo de cluster excluido :)', 'Sucesso');
            return redirect()->back();
        } catch (\Exception $e) {

            DB::rollback();
            Toastr::error('Erro ao excluir tipo de cluster :)', 'Erro');
            // return redirect()->back();
            echo $e;
        }
    }
}
