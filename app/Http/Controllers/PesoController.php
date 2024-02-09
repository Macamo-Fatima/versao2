<?php

namespace App\Http\Controllers;

use App\Models\Peso;
use App\Models\Cargo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Brian2694\Toastr\Facades\Toastr;

class PesoController extends Controller
{
    public function index()
    {
        $pesosList = DB::table('pesos')->get();
        $cargosList = DB::table('cargos')
            ->select('cargos.grupo_funcional')
            ->distinct('cargos.grupo_funcional')
            ->get();

        $gruposFuncionais = Cargo::whereNotIn('grupo_funcional', Peso::pluck('grupo_funcional'))
            ->groupBy('grupo_funcional')
            ->get(['grupo_funcional']);

        $gruposFuncionaisExistem = count($gruposFuncionais) > 0;
        return view('parametrizacao.pesos', compact('pesosList', 'cargosList', 'gruposFuncionais', 'gruposFuncionaisExistem'));
    }

    public function saveRecord(Request $request)
    {

        $request->validate([
            'grupo_funcional' => 'required|string|max:255',
            'peso_competencias' => 'required',
            'peso_objetivos' => 'required',
        ]);
        DB::beginTransaction();
        try {
            $objetivo = new Peso();
            $objetivo->grupo_funcional  = $request->grupo_funcional;
            $objetivo->peso_competencias  = $request->peso_competencias;
            $objetivo->peso_objetivos  = $request->peso_objetivos;
            $objetivo->save();
            DB::commit();
            Toastr::success('Percentual atribuido :)', 'Sucesso');
            return redirect()->back();
        } catch (\Exception $e) {
            DB::rollBack();
            Toastr::error('Erro ao atribuir percentual :)', 'Erro');
            return redirect()->back();
        }

        //dd($request->grupo_funcional, $request->peso_competencias, $request->peso_objetivos);
    }

    public function updateRecord(Request $request)
    {
        DB::beginTransaction();
        try {
            $update = [
                'id'                         =>  $request->id,
                'grupo_funcional'            => $request->grupo_funcional,
                'peso_competencias'          => $request->peso_competencias,
                'peso_objetivos'             => $request->peso_objetivos,
            ];
            Peso::where('id', $request->id)->update($update);
            DB::commit();
            Toastr::success('Percentual atualizado :)', 'Sucesso');
            return redirect()->route('listar/pesos');
        } catch (\Exception $e) {
            DB::rollBack();
            Toastr::error('Erro ao atualizar percentual :)', 'Erro');
            return redirect()->back();
        }
        //dd($request->grupo_funcional, $request->peso_competencias, $request->peso_objetivos);
    }


    public function deleteRecord(Request $request)
    {
        try {
            Peso::destroy($request->id);
            DB::commit();
            Toastr::success('Registo excluido :)', 'Sucesso');
            return redirect()->back();
        } catch (\Exception $e) {
            DB::rollback();
            Toastr::error('Erro ao excluir o registo :)', 'Erro');
            return redirect()->back();
        }
    }


    public function teste()
    {
        $pesoCompetencias = DB::table('pesos')
            ->where('grupo_funcional', 'Quadros de apoio')
            ->value('peso_competencias');

        $pesoObjetivos = DB::table('pesos')
            ->where('grupo_funcional', 'Quadros de apoio')
            ->value('peso_objetivos');
        dd($pesoCompetencias, $pesoObjetivos);
    }
}
