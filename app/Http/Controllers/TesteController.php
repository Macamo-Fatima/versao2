<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TesteController extends Controller
{

    public function index(){
        $funcionariosList = DB::table('cargos')
            ->join('funcionarios', 'funcionarios.funcao', '=', 'cargos.id')
            ->select('funcionarios.*', 'cargos.nome_cargo', 'cargos.grupo_funcional', 'cargos.id')
            ->get();
        return view('avaliacao.create', compact('funcionariosList'));
    } 

    public function workerCompetencias($funcao)
    {
        $competencias  = DB::table('desempenhos')->where('cargo', $funcao)->get();      
        return response()->json($competencias);
    }
}
