<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ReceptionistController extends Controller
{
    public function index()
    {
        return view('dashboards.recept.index');
    }
    public function perfil()
    {
        return view('dashboards.recept.perfil');
    }
    public function configuracoes()
    {
        return view('dashboards.recept.configuracoes');
    }
}
