<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuxiliarController extends Controller
{
    public function index()
    {
        return view('dashboards.auxiliar.index');
    }
    public function perfil()
    {
        return view('dashboards.auxiliar.perfil');
    }
    public function configuracoes()
    {
        return view('dashboards.auxiliar.configuracoes');
    }
}
