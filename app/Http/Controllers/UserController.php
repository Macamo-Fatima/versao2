<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        return view('dashboards.user.index');
    }
    public function perfil()
    {
        return view('dashboards.user.perfil');
    }
    public function configuracoes()
    {
        return view('dashboards.user.configuracoes');
    }
}
