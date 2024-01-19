<?php

namespace App\Http\Controllers\Auth;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\Auth;
use App\Providers\RouteServiceProvider;
use Illuminate\Support\Facades\Session;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;
    protected function redirectTo()
    {
        if (Auth::user()->role == 1) {
            return route('admin.painel');
        }
        if (Auth::user()->role == 2) {
            return route('recept.painel');
        }
        if (Auth::user()->role == 3) {
            return route('aux.painel');
        }
        if (Auth::user()->role == 4) {
            return route('user.painel');
        }
    }

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function login(Request $request)
    {
        $input = $request->all();
        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $dt         = Carbon::now();
        $todayDate  = $dt->toDayDateTimeString();
        $activityLog = [
            'name'        => $request->email,
            'email'       => $request->email,
            'description' => 'Iniciou sua sessão ou fez Login',
            'date_time'   => $todayDate,
        ];
        if (auth()->attempt(array('email' => $input['email'], 'password' => $input['password']))) {
            if (Auth::user()->role == 1) {
                DB::table('activity_logs')->insert($activityLog);
                Toastr::success('Logado com sucesso  :)', 'Sucesso');
                return redirect()->route('admin.painel');
            }
            if (Auth::user()->role == 2) {
                DB::table('activity_logs')->insert($activityLog);
                Toastr::success('Logado com sucesso  :)', 'Sucesso');
                return redirect()->route('recept.painel');
            }
            if (Auth::user()->role == 3) {
                DB::table('activity_logs')->insert($activityLog);
                Toastr::success('Logado com sucesso  :)', 'Sucesso');
                return redirect()->route('aux.painel');
            }
            if (Auth::user()->role == 4) {
                DB::table('activity_logs')->insert($activityLog);
                Toastr::success('Logado com sucesso  :)', 'Sucesso');
                return redirect()->route('user.painel');
            }
        } else {
            Toastr::error('Email ou password inválido :)', 'Erro');
            return redirect()->route('login');
        }
    }



    public function logout()
    {
        $user = Auth::User();
        Session::put('user', $user);
        $user = Session::get('user');

        $name       = $user->name;
        $email      = $user->email;
        $dt         = Carbon::now();
        $todayDate  = $dt->toDayDateTimeString();

        $activityLog = [

            'name'        => $name,
            'email'       => $email,
            'description' => 'Terminou sua sessão ou fez Logout',
            'date_time'   => $todayDate,
        ];
        DB::table('activity_logs')->insert($activityLog);
        Auth::logout();
        Toastr::success('Logout com  sucesso :)', 'Sucesso');
        return redirect()->route('login');
    }
}
