<?php

namespace App\Http\Controllers;

use App\Models\ActivityLog;
use Carbon\Carbon;
use App\Models\Form;
use App\Models\User;
use App\Models\Employee;
use Illuminate\Http\Request;
use App\Rules\MatchOldPassword;
use App\Models\ProfileInformation;
use Illuminate\Support\Facades\DB;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class UserManagementController extends Controller
{

    public function userChart()
    {
        $users = User::selectRaw('MONTH(created_at) as month, COUNT(*) as count')
            ->whereYear('created_at', date('Y'))
            ->groupBy('month')
            ->orderBy('month')
            ->get();
        $labels = [];
        $data = [];
        $colors = ['#FF6384', '#36A2EB', '#FFCE56', '#8BC34A', '#FF5722', '#009688', '#795548', '#9C2780', '#2196F3', '#FF9800', '#CDDC39', '#607D8B'];

        for ($i = 1; $i <= 12; $i++) {
            $month = date('F', mktime(0, 0, 0, $i, 1));
            $count = 0;

            foreach ($users as  $user) {
                if ($user->month == $i) {
                    $count = $user->count;
                    break;
                }
            }

            array_push($labels, $month);
            array_push($data, $count);
        }

        $datasets = [

            [
                'label' => 'Users',
                'data' => $data,
                'background' => $colors
            ]
        ];

        return view('usuarios.charts', compact('datasets', 'labels'));
    }
    public function index()
    {
        $usuariosList = DB::table('users')->get();
        return view('usuarios.index', compact('usuariosList'));
    }

    public function gridView()
    {
        $usuariosList = DB::table('users')->simplePaginate(6);
        return view('usuarios.gridview', compact('usuariosList'));
    }

    public function logs()
    {
        $logsList = DB::table('activity_logs')->get();
        return view('usuarios.logs', compact('logsList'));
    }

    public function novoUsuario()
    {
        return view('usuarios.create');
    }

    public function register(Request $request)
    {
        $request->validate([
            'name'     => ['required', 'string', 'max:255'],
            'email'    => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);


        // if ($user->save()) {
        //     Toastr::success('Usuário cadastrado :)', 'Sucesso');
        //     return redirect()->route('admin/listar/usuario');
        // } else {
        //     Toastr::error('Erro ao cadastrar usuário :)', 'Erro');
        //     return redirect()->route('admin/listar/usuario');
        // }


        //Verifica se o email existe ou não


        DB::beginTransaction();

        // if (User::where('email', '=', $request->email)->count() > 0) {
        //     DB::rollBack();
        //     Toastr::error('O email já existe :)', 'Erro');
        //     return redirect()->route('admin/listar/usuario');
        // }

        try {
            $user           = new User();
            $user->name     = $request->name;
            $user->email    = $request->email;
            $user->role     = $request->role;
            $user->status   = $request->status;
            $user->contato  = $request->contato;
            $user->password = Hash::make($request->password);
            if ($request->hasfile('fotografia')) {
                $file = $request->file('fotografia');
                $filename = time() . '.' . $file->getClientOriginalExtension();
                $file->move('uploads/usuario/', $filename);
                $user->fotografia = $filename;
            }
            $user->save();
            DB::commit();
            Toastr::success('Usuário cadastrado :)', 'Sucesso');
            return redirect()->route('admin/listar/usuario');
        } catch (\Exception $e) {
            DB::rollBack();
            Toastr::error('Erro ao cadastrar usuário :)', 'Erro');
            return redirect()->route('admin/listar/usuario');
        }
    }

    //Edit de funcionário
    public function editar($usuario_id)
    {
        $usuario = DB::table('users')->where('id', $usuario_id)->get();
        return view('usuarios.edit', compact('usuario'));
    }

    public function updateRecord(Request $request)
    {
        DB::beginTransaction();
        try {
            $id      = $request->id;
            $name    = $request->name;
            $email   = $request->email;
            $role    = $request->role;
            $status   = $request->status;
            $contato    = $request->contato;
            if ($request->file('fotografia') != '') {
                if ($request->hasfile('fotografia')) {
                    $destination = 'uploads/usuario' . $request->fotografia;
                    //verifica se o caminho existe ou nao, e depois apaga o ficheiro se existir
                    if (File::exists($destination)) {
                        File::delete($destination);
                    }
                    $file = $request->file('fotografia');
                    $filename = time() . '.' . $file->getClientOriginalExtension();
                    $file->move('uploads/usuario/', $filename);
                    $dado = $filename;
                }
            } else {
                $dado = $request->fotografia_antiga;
            }
            $update  = [
                'id'            =>   $id,
                'name'          =>   $name,
                'email'         =>   $email,
                'role'          =>   $role,
                'status'        =>   $status,
                'contato'       =>   $contato,
                'fotografia'    =>   $dado,
            ];
            User::where('id', $request->id)->update($update);
            DB::commit();
            Toastr::success('Usuário atualizado :)', 'Sucesso');
            return redirect()->route('admin/listar/usuario');
        } catch (\Exception $e) {
            DB::rollBack();
            Toastr::error('Erro ao atualizar usuário :)', 'Erro');
            return redirect()->route('admin/listar/usuario');
        }
    }

    public function deleteRecord($usuario_id)
    {
        DB::beginTransaction();
        try {
            User::where('id', $usuario_id)->delete();
            DB::commit();
            Toastr::success('Usuário excluido :)', 'Sucesso');
            return redirect()->route('admin/listar/usuario');
        } catch (\Exception $e) {
            DB::rollback();
            Toastr::error('Erro ao excluir usuário :)', 'Erro');
            return redirect()->back();
        }
    }

    public function deleteHistorico($activity_id)
    {
        DB::beginTransaction();
        try {
            ActivityLog::where('id', $activity_id)->delete();
            DB::commit();
            Toastr::success('Log excluido :)', 'Sucesso');
            return redirect()->route('admin/logs/usuario');
        } catch (\Exception $e) {
            DB::rollback();
            Toastr::error('Erro ao excluir log :)', 'Erro');
            return redirect()->route('admin/logs/usuario');
        }
    }



    public function excluirRegistros($ids)
    {
        $registrosSelecionados = explode(',', $ids);

        // Verifica se há registros selecionados
        if (!empty($registrosSelecionados)) {
            // Excluir os registros
            ActivityLog::whereIn('id', $registrosSelecionados)->delete();
            return redirect()->route('admin/logs/usuario');
        } else {
            return redirect()->route('admin/logs/usuario');
        }
    }


    public function search(Request $request)
    {
        $query = $request->input('query');

        $users = User::where('name', 'like', "%$query%")
            ->orWhere('email', 'like', "%$query%")
            ->orWhere('contato', 'like', "%$query%")
            ->get();

        return response()->json($users);
    }
}
