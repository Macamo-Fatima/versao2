<?php

namespace App\Http\Controllers;

use App\Models\Especificacao;
use App\Models\Funcionario;
use App\Models\GrauAcademico;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\File;
use Carbon\Carbon;

use function PHPUnit\Framework\isEmpty;

class FuncionarioController extends Controller
{
    public function index()
    {
        $dados = DB::table('funcionarios')
            ->join('grauacademico', 'funcionarios.id', '=', 'grauacademico.id_funcionario')
            ->join('especificacoes', 'funcionarios.id', '=', 'especificacoes.id_funcionario')
            ->select('funcionarios.*', 'especificacoes.id_especificacao', 'especificacoes.nome_especificacao', 'grauacademico.id_grau_academico', 'grauacademico.nivel_academico', 'grauacademico.instituicao', 'grauacademico.especializacao', 'grauacademico.inicio_termino', DB::raw('YEAR(CURDATE()) - YEAR(data_nascimento) - IF(STR_TO_DATE(CONCAT(YEAR(CURDATE()), "-", MONTH(data_nascimento), "-", DAY(data_nascimento)), "%Y-%m-%d") > CURDATE(), 1, 0) AS idade'))
            ->get();
        $funcionariosList = DB::table('funcionarios')->get();
        $grauAcademicoList = DB::table('grauacademico')->get();
        $especificacoesList = DB::table('especificacoes')->get();
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
        return view('funcionarios.index', compact(
            'cargosList',
            'dados',
            'funcionariosList',
            'grauAcademicoList',
            'especificacoesList',
            'quantidadeDocs',
            'dadosDocs',
            'quantidadeAniversariantes',
            'dadosAniversariantes'
        ));
    }

    public function funcionariosView()
    {
        $resultado = DB::table('funcionarios')->get();
        $dados = DB::table('cargos')
            ->join('funcionarios', 'funcionarios.funcao', '=', 'cargos.id')
            ->select('funcionarios.*', 'cargos.nome_cargo', 'cargos.grupo_funcional', DB::raw('YEAR(CURDATE()) - YEAR(data_nascimento) - IF(STR_TO_DATE(CONCAT(YEAR(CURDATE()), "-", MONTH(data_nascimento), "-", DAY(data_nascimento)), "%Y-%m-%d") > CURDATE(), 1, 0) AS idade'))
            ->get();
        return view('funcionarios.listar', compact('dados'));
    }

    public function funcionariosGridView()
    {
        $resultado = DB::table('funcionarios')->get();

        $dados = DB::table('funcionarios')
            ->join('grauacademico', 'funcionarios.id', '=', 'grauacademico.id_funcionario')
            ->join('especificacoes', 'funcionarios.id', '=', 'especificacoes.id_funcionario')
            ->select('funcionarios.*', 'especificacoes.*',  'grauacademico.*', DB::raw('YEAR(CURDATE()) - YEAR(data_nascimento) - IF(STR_TO_DATE(CONCAT(YEAR(CURDATE()), "-", MONTH(data_nascimento), "-", DAY(data_nascimento)), "%Y-%m-%d") > CURDATE(), 1, 0) AS idade'))
            ->simplePaginate(6);
        return view('funcionarios.gridview', compact('dados'));
    }

    public function novoFuncionario()
    {
        $cargosList = DB::table('cargos')->get();
        $departamentosList = DB::table('departamentos')->get();
        $tipoContratosList = DB::table('tipo_contratos')->get();
        $turnosList = DB::table('turnos')->get();
        return view('funcionarios.create', compact('cargosList', 'departamentosList', 'tipoContratosList', 'turnosList'));
    }


    public function saveRecord(Request $request)
    {


        $request->validate([
            'nome_completo'     => 'required|string|max:255',
            'sexo'              => 'required|string',
            'contato_prof'      => 'required',
            'email_prof'        => 'required|string|max:255',
            'categoria'         => 'required|string',
            'tipo_documento'    => 'required',
            'numero_documento'  => 'required|string|max:255',
            'contato_emerg'     => 'required',
            'departamento'      => 'required',
            'tipo_contrato'     => 'required',
            'funcao'            => 'required',
        ]);

        DB::beginTransaction();
        try {
            $funcionario                          = new Funcionario();
            $funcionario->nome_completo           = $request->nome_completo;
            $funcionario->sexo                    = $request->sexo;
            $funcionario->data_nascimento         = $request->data_nascimento;
            $funcionario->contato_pessoal         = $request->contato;
            $funcionario->endereco_fisico         = $request->endereco;
            $funcionario->provincia               = $request->provincia;

            $funcionario->nacionalidade           = $request->nacionalidade;
            $funcionario->local_nascimento        = $request->local_nascimento;

            if (empty($funcionario->nome_conjuge) && $funcionario->estado_civil == "Casado") {
                Toastr::error('Por favor informa o nome do conjuge :)', 'Erro');
                return redirect()->route('novo/funcionario');
            } else {
                $funcionario->nome_conjuge            = $request->conjuge;
            }

            if ($request->tipo_documento != 'Outro') {
                $funcionario->tipo_documento      = $request->tipo_documento;
            } else {

                $capturaOutroDoc   = $request->nome_documento;;
                if (!empty($capturaOutroDoc)) {
                    $funcionario->tipo_documento      = $request->nome_documento;
                } else {
                    Toastr::error('Por favor informa o nome do documento :)', 'Erro');
                    return redirect()->route('novo/funcionario');
                }
            }

            $funcionario->nr_documento            = $request->numero_documento;
            if ($request->doencas == 'Não') {
                $funcionario->doencas_cronicas    = $request->doencas;
            } else {
                $capturaDoenca   = $request->nome_doenca;
                if (!empty($capturaDoenca)) {
                    $funcionario->doencas_cronicas    = $request->nome_doenca;
                } else {
                    Toastr::error('Por favor informa o nome da doença :)', 'Erro');
                    return redirect()->route('novo/funcionario');
                }
            }
            $funcionario->data_validade           = $request->data_validade;
            $funcionario->data_emissao            = $request->data_emissao;

            if ($request->deficiencias == 'Não') {
                $funcionario->deficiencias_alergias   = $request->deficiencias;
            } else {
                $capturaNome   = $request->nome_alergia;
                if (!empty($capturaNome)) {
                    $funcionario->deficiencias_alergias   = $request->nome_alergia;
                } else {
                    Toastr::error('Por favor informa o nome da alergia :)', 'Erro');
                    return redirect()->route('novo/funcionario');
                }
            }
            $funcionario->grau_deficiencia        = $request->grau;
            $funcionario->outros                  = $request->outros;
            $funcionario->contato_emerg           = $request->contato_emerg;
            $funcionario->nome_emerg              = $request->nome_emerg;
            $funcionario->nome_dependente         = $request->nome_dependente;
            $funcionario->datanasc_dependente     = $request->data_dependente;
            $funcionario->contato_prof            = $request->contato_prof;
            $funcionario->email_prof              = $request->email_prof;
            $funcionario->funcao                  = $request->funcao;
            $funcionario->prazo                   = $request->prazo;
            $funcionario->categoria               = $request->categoria;
            $funcionario->reporte                 = $request->reporte;
            $funcionario->turno                   = $request->turno;
            $funcionario->tipo_contrato           = $request->tipo_contrato;
            $funcionario->data_vigor              = $request->data_vigor;
            $funcionario->nib                     = $request->nib;
            $funcionario->nuit                    = $request->nuit;
            $funcionario->departamento            = $request->departamento;


            if ($request->sexo == "Feminino") {
                $funcionario->estado_civil =  Str::substrReplace($request->estado_civil, "a", -1);
            } else {
                $funcionario->estado_civil =  $request->estado_civil;
            }
            if ($request->hasfile('fotografia')) {
                $file = $request->file('fotografia');
                $filename = time() . '.' . $file->getClientOriginalExtension();
                $file->move('uploads/funcionario/', $filename);
                $funcionario->fotografia = $filename;
            }
            $funcionario->save();
            $lastInsertedId = DB::getPdo()->lastInsertId();
            foreach ($request->nivel as $key => $insert) {

                $grau_academico = [
                    'id_funcionario'             => $lastInsertedId,
                    'nivel_academico'            => $request->nivel[$key],
                    'instituicao'                => $request->instituicao[$key],
                    'especializacao'             => $request->especializacao[$key],
                    'inicio_termino'             => $request->periodo[$key],
                ];
                DB::table('grauacademico')->insert($grau_academico);
            }

            foreach ($request->especificacao as $key => $insert) {
                $especificacao = [
                    'id_funcionario'             => $lastInsertedId,
                    'nome_especificacao'         => $request->especificacao[$key],
                ];
                DB::table('especificacoes')->insert($especificacao);
            }

            DB::commit();
            Toastr::success('Funcionário criado :)', 'Sucesso');
            return redirect()->route('listar/funcionarios');
        } catch (\Exception $e) {
            DB::rollBack();
            Toastr::error('Erro ao criar funcionário :)', 'Erro');
            return redirect()->route('listar/funcionarios');
        }
    }
    //Edit de funcionário
    public function viewRecord($funcionario_id, $grau_academico_id, $especificacao_id, $funcionario_funcao)
    {
        $cargosList = DB::table('cargos')->get();
        $departamentosList = DB::table('departamentos')->get();
        $tipoContratosList = DB::table('tipo_contratos')->get();
        $turnosList = DB::table('turnos')->get();
        $dados = DB::table('funcionarios')
            ->join('grauacademico', 'funcionarios.id', '=', 'grauacademico.id_funcionario')
            ->join('especificacoes', 'funcionarios.id', '=', 'especificacoes.id_funcionario')
            ->select('funcionarios.*', 'especificacoes.id_especificacao', 'especificacoes.nome_especificacao', 'grauacademico.id_grau_academico', 'grauacademico.nivel_academico', 'grauacademico.instituicao', 'grauacademico.especializacao', 'grauacademico.inicio_termino')
            ->where('funcionarios.id', '=', $funcionario_id)
            ->where('grauacademico.id_grau_academico', '=', $grau_academico_id)
            ->where('especificacoes.id_especificacao', '=', $especificacao_id)
            ->get();

        $cargoDados = DB::table('cargos')
            ->join('funcionarios', 'funcionarios.funcao', '=', 'cargos.id')
            ->select('funcionarios.*', 'cargos.nome_cargo', 'cargos.grupo_funcional', 'cargos.id')
            ->where('funcionarios.funcao', '=', $funcionario_funcao)
            ->where('funcionarios.id', '=', $funcionario_id)
            ->get();
        //  dd($cargoDados);

        return view('funcionarios.edit', compact('cargosList', 'departamentosList', 'tipoContratosList', 'dados', 'turnosList', 'cargoDados'));

        // dd($funcionario_id, $grau_academico_id, $especificacao_id);
    }


    public function viewFuncionarioRecord($funcionario_id, $funcionario_funcao)
    {
        $cargosList = DB::table('cargos')->get();
        $departamentosList = DB::table('departamentos')->get();
        $tipoContratosList = DB::table('tipo_contratos')->get();
        $turnosList = DB::table('turnos')->get();

        $dados = DB::table('cargos')
            ->join('funcionarios', 'funcionarios.funcao', '=', 'cargos.id')
            ->select('funcionarios.*', 'cargos.nome_cargo', 'cargos.grupo_funcional')
            ->where('funcionarios.funcao', '=', $funcionario_funcao)
            ->where('funcionarios.id', '=', $funcionario_id)
            ->get();

        return view('funcionarios.simples_funcionario', compact('cargosList', 'departamentosList', 'tipoContratosList',  'turnosList', 'dados'));

        // dd($funcionario_id, $grau_academico_id, $especificacao_id);
    }

    public function viewRecordGrid($funcionario_id, $grau_academico_id, $especificacao_id, $funcionario_funcao)
    {
        $cargosList = DB::table('cargos')->get();
        $departamentosList = DB::table('departamentos')->get();
        $tipoContratosList = DB::table('tipo_contratos')->get();
        $turnosList = DB::table('turnos')->get();
        $dados = DB::table('funcionarios')
            ->join('grauacademico', 'funcionarios.id', '=', 'grauacademico.id_funcionario')
            ->join('especificacoes', 'funcionarios.id', '=', 'especificacoes.id_funcionario')
            ->select('funcionarios.*', 'especificacoes.id_especificacao', 'especificacoes.nome_especificacao', 'grauacademico.id_grau_academico', 'grauacademico.nivel_academico', 'grauacademico.instituicao', 'grauacademico.especializacao', 'grauacademico.inicio_termino')
            ->where('funcionarios.id', '=', $funcionario_id)
            ->where('grauacademico.id_grau_academico', '=', $grau_academico_id)
            ->where('especificacoes.id_especificacao', '=', $especificacao_id)
            ->get();

        $cargoDados = DB::table('cargos')
            ->join('funcionarios', 'funcionarios.funcao', '=', 'cargos.id')
            ->select('funcionarios.*', 'cargos.nome_cargo', 'cargos.grupo_funcional', 'cargos.id')
            ->where('funcionarios.funcao', '=', $funcionario_funcao)
            ->where('funcionarios.id', '=', $funcionario_id)
            ->get();

        return view('funcionarios.editgrid', compact('cargosList', 'departamentosList', 'tipoContratosList', 'dados', 'turnosList', 'cargoDados'));
    }

    public function updateRecord(Request $request)
    {
        DB::beginTransaction();
        try {

            if ($request->sexo == "Feminino") {
                $estado_civil =  Str::substrReplace($request->estado_civil, "a", -1);
            } else {
                $estado_civil =  $request->estado_civil;
            }

            if ($request->file('fotografia') != '') {
                if ($request->hasfile('fotografia')) {
                    $destination = 'uploads/funcionario' . $request->fotografia;
                    if (File::exists($destination)) {
                        File::delete($destination);
                    }
                    $file = $request->file('fotografia');
                    $filename = time() . '.' . $file->getClientOriginalExtension();
                    $file->move('uploads/funcionario/', $filename);
                    $dado = $filename;
                }
            } else {
                $dado = $request->fotografia_antiga;
            }

            if ($request->tipo_contrato == 'Contrato de trabalho a prazo') :
                if (!empty($request->prazo)) {
                    $prazo = $request->prazo;
                } else {
                    $prazo = $request->prazo_antigo;
                }
            else :
                $prazo = null;
            endif;


            if ($request->estado_civil == 'Casado') :
                if (!empty($request->conjuge)) {
                    $conjuge = $request->conjuge;
                } else {
                    $conjuge = $request->conjuge_antigo;
                }
            else :
                $conjuge = null;
            endif;

            if ($request->doencas == 'Sim') {
                if (!empty($request->nome_doenca)) {
                    $doenca = $request->nome_doenca;
                } else {
                    $doenca = $request->doenca_antiga;
                }
            } else {
                $doenca = $request->doencas;
            }


            if ($request->deficiencias == 'Sim') {
                if (!empty($request->nome_alergia)) {
                    $deficiencia = $request->nome_alergia;
                } else {
                    $deficiencia = $request->alergia_antiga;
                }
            } else {
                $deficiencia = $request->doencas;
            }

            if ($request->tipo_documento == 'Outro') {
                if (!empty($request->nome_documento)) {
                    $doc = $request->nome_documento;
                } else {
                    $doc = $request->documento_antigo;
                }
            } else {
                $doc = $request->tipo_documento;
            }


            $updateFuncionario = [
                'id'                           => $request->id,
                'nome_completo'                => $request->nome_completo,
                'email_prof'                   => $request->email_prof,
                'contato_prof'                 => $request->contato_prof,
                'sexo'                         => $request->sexo,
                'contato_pessoal'              => $request->contato,
                'tipo_documento'               => $doc,
                'nuit'                         => $request->nuit,
                'nr_documento'                 => $request->numero_documento,
                'nib'                          => $request->nib,
                'funcao'                       => $request->funcao,
                'data_emissao'                 => $request->data_emissao,
                'data_validade'                => $request->data_validade,
                'data_nascimento'              => $request->data_nascimento,
                'fotografia'                   => $dado,
                'tipo_contrato'                => $request->tipo_contrato,
                'estado_civil'                 => $estado_civil,
                'departamento'                 => $request->departamento,
                'endereco_fisico'              => $request->endereco,
                'provincia'                    => $request->provincia,
                'nome_conjuge'                 => $conjuge,
                'nacionalidade'                => $request->nacionalidade,
                'local_nascimento'             => $request->local_nascimento,
                'doencas_cronicas'             => $doenca,
                'deficiencias_alergias'        => $deficiencia,
                'grau_deficiencia'             => $request->grau,
                'outros'                       => $request->outros,
                'contato_emerg'                => $request->contato_emerg,
                'nome_emerg'                   => $request->nome_emerg,
                'nome_dependente'              => $request->nome_dependente,
                'datanasc_dependente'          => $request->data_dependente,
                'prazo'                        => $prazo,
                'categoria'                    => $request->categoria,
                'reporte'                      => $request->reporte,
                'turno'                        => $request->turno,
                'data_vigor'                   => $request->data_vigor,
            ];

            $updateGrauAcademico = [
                'id_grau_academico'          => $request->grau_academico_id,
                'id_funcionario'             => $request->id,
                'nivel_academico'            => $request->nivel,
                'instituicao'                => $request->instituicao,
                'especializacao'             => $request->especializacao,
                'inicio_termino'             => $request->periodo,
            ];

            $updateEspecificacao = [
                'id_especificacao'           => $request->especificacao_id,
                'id_funcionario'             => $request->id,
                'nome_especificacao'         => $request->especificacao,
            ];

            Funcionario::where('id', $request->id)->update($updateFuncionario);
            DB::table('grauacademico')->where('id_grau_academico', $request->grau_academico_id)->update($updateGrauAcademico);
            DB::table('especificacoes')->where('id_especificacao', $request->especificacao_id)->update($updateEspecificacao);
            DB::commit();
            Toastr::success('Funcionário atualizaado:)', 'Success');
            return redirect()->route('listar/funcionarios');
        } catch (\Exception $e) {
            DB::rollback();
            Toastr::error('Erro ao atualizar funcionário :)', 'Error');
            // echo "Erro ao inserir:" . $e;
            return redirect()->back();
        }
    }


    public function updateApenasFuncionario(Request $request)
    {
        DB::beginTransaction();
        try {

            if ($request->sexo == "Feminino") {
                $estado_civil =  Str::substrReplace($request->estado_civil, "a", -1);
            } else {
                $estado_civil =  $request->estado_civil;
            }

            if ($request->file('fotografia') != '') {
                if ($request->hasfile('fotografia')) {
                    $destination = 'uploads/funcionario' . $request->fotografia;
                    if (File::exists($destination)) {
                        File::delete($destination);
                    }
                    $file = $request->file('fotografia');
                    $filename = time() . '.' . $file->getClientOriginalExtension();
                    $file->move('uploads/funcionario/', $filename);
                    $dado = $filename;
                }
            } else {
                $dado = $request->fotografia_antiga;
            }

            if ($request->tipo_contrato == 'Contrato de trabalho a prazo') :
                if (!empty($request->prazo)) {
                    $prazo = $request->prazo;
                } else {
                    $prazo = $request->prazo_antigo;
                }
            else :
                $prazo = null;
            endif;


            if ($request->estado_civil == 'Casado') :
                if (!empty($request->conjuge)) {
                    $conjuge = $request->conjuge;
                } else {
                    $conjuge = $request->conjuge_antigo;
                }
            else :
                $conjuge = null;
            endif;

            if ($request->doencas == 'Sim') {
                if (!empty($request->nome_doenca)) {
                    $doenca = $request->nome_doenca;
                } else {
                    $doenca = $request->doenca_antiga;
                }
            } else {
                $doenca = $request->doencas;
            }


            if ($request->deficiencias == 'Sim') {
                if (!empty($request->nome_alergia)) {
                    $deficiencia = $request->nome_alergia;
                } else {
                    $deficiencia = $request->alergia_antiga;
                }
            } else {
                $deficiencia = $request->doencas;
            }

            if ($request->tipo_documento == 'Outro') {
                if (!empty($request->nome_documento)) {
                    $doc = $request->nome_documento;
                } else {
                    $doc = $request->documento_antigo;
                }
            } else {
                $doc = $request->tipo_documento;
            }


            $updateFuncionario = [
                'id'                           => $request->id,
                'nome_completo'                => $request->nome_completo,
                'email_prof'                   => $request->email_prof,
                'contato_prof'                 => $request->contato_prof,
                'sexo'                         => $request->sexo,
                'contato_pessoal'              => $request->contato,
                'tipo_documento'               => $doc,
                'nuit'                         => $request->nuit,
                'nr_documento'                 => $request->numero_documento,
                'nib'                          => $request->nib,
                'funcao'                       => $request->funcao,
                'data_emissao'                 => $request->data_emissao,
                'data_validade'                => $request->data_validade,
                'data_nascimento'              => $request->data_nascimento,
                'fotografia'                   => $dado,
                'tipo_contrato'                => $request->tipo_contrato,
                'estado_civil'                 => $estado_civil,
                'departamento'                 => $request->departamento,
                'endereco_fisico'              => $request->endereco,
                'provincia'                    => $request->provincia,
                'nome_conjuge'                 => $conjuge,
                'nacionalidade'                => $request->nacionalidade,
                'local_nascimento'             => $request->local_nascimento,
                'doencas_cronicas'             => $doenca,
                'deficiencias_alergias'        => $deficiencia,
                'grau_deficiencia'             => $request->grau,
                'outros'                       => $request->outros,
                'contato_emerg'                => $request->contato_emerg,
                'nome_emerg'                   => $request->nome_emerg,
                'nome_dependente'              => $request->nome_dependente,
                'datanasc_dependente'          => $request->data_dependente,
                'prazo'                        => $prazo,
                'categoria'                    => $request->categoria,
                'reporte'                      => $request->reporte,
                'turno'                        => $request->turno,
                'data_vigor'                   => $request->data_vigor,
            ];

            Funcionario::where('id', $request->id)->update($updateFuncionario);
            DB::commit();
            Toastr::success('Funcionário atualizaado:)', 'Success');
            return redirect()->route('apenas/funcionarios');
        } catch (\Exception $e) {
            DB::rollback();
            Toastr::error('Erro ao atualizar funcionário :)', 'Error');
            return redirect()->back();
        }
    }

    public function deleteRecord($funcionario_id, $grau_academico_id, $especificacao_id)
    {
        DB::beginTransaction();
        try {
            Funcionario::where('id', $funcionario_id)->delete();
            // DB::table('grauacademico')->where('id_grau_academico', $grau_academico_id)->delete();
            // DB::table('especificacoes')->where('id_especificacao', $especificacao_id)->delete();
            DB::table('grauacademico')->where('id_funcionario', $funcionario_id)->delete();
            DB::table('especificacoes')->where('id_funcionario', $funcionario_id)->delete();
            DB::commit();
            Toastr::success('Funcionário excluido :)', 'Sucesso');
            return redirect()->route('listar/funcionarios');
        } catch (\Exception $e) {
            DB::rollback();
            Toastr::error('Erro ao excluir funcionário :)', 'Erro');
            return redirect()->route('listar/funcionarios');
            // echo "Erro ao inserir:" . $e;
        }
    }

    public function deleteRecordGrid($funcionario_id, $grau_academico_id, $especificacao_id)
    {
        DB::beginTransaction();
        try {
            Funcionario::where('id', $funcionario_id)->delete();
            DB::table('grauacademico')->where('id_funcionario', $funcionario_id)->delete();
            DB::table('especificacoes')->where('id_funcionario', $funcionario_id)->delete();
            DB::commit();
            Toastr::success('Funcionário excluido :)', 'Sucesso');
            return redirect()->route('gridView/funcionarios');
        } catch (\Exception $e) {
            DB::rollback();
            Toastr::error('Erro ao excluir funcionário :)', 'Erro');
            return redirect()->route('gridView/funcionarios');
            // echo "Erro ao inserir:" . $e;
        }
    }


    public function deleteFuncionarioRecord($funcionario_id)
    {
        DB::beginTransaction();
        try {
            Funcionario::where('id', $funcionario_id)->delete();
            DB::table('grauacademico')->where('id_funcionario', $funcionario_id)->delete();
            DB::table('especificacoes')->where('id_funcionario', $funcionario_id)->delete();
            DB::commit();
            Toastr::success('Funcionário excluido :)', 'Sucesso');
            return redirect()->route('listar/funcionarios');
        } catch (\Exception $e) {
            DB::rollback();
            Toastr::error('Erro ao excluir funcionário :)', 'Erro');
            return redirect()->route('listar/funcionarios');
        }
    }

    public function funcionarioPerfil($funcionario_id)
    {
        $resultado = DB::table('funcionarios')->get();
        $dados = DB::table('cargos')
            ->join('funcionarios', 'funcionarios.funcao', '=', 'cargos.id')
            ->select('funcionarios.*', 'cargos.nome_cargo', 'cargos.grupo_funcional')
            ->where('funcionarios.id', '=', $funcionario_id)
            ->get();

        $cargoDados = DB::table('cargos')
            ->join('funcionarios', 'funcionarios.funcao', '=', 'cargos.id')
            ->select('funcionarios.*', 'cargos.nome_cargo', 'cargos.grupo_funcional')
            ->where('funcionarios.id', '=', $funcionario_id)
            ->get();
        return view('funcionarios.perfil', compact('dados', 'cargoDados'));
    }

    #verifica se existe aniversariante no dia atual atraves Raw SQL
    public function verificaAniversario()
    {
        $aniversario = DB::select("SELECT nome_completo, sexo, data_nascimento FROM funcionarios WHERE extract(month from data_nascimento) = extract(month from NOW()) and extract(day from data_nascimento) = extract(day from NOW())");
    }
    #verifica se existe aniversariante no dia atual atraves de Query Builder
    public function aniversario()
    {
        $data_atual = Carbon::now();
        // $aniversariantes = Funcionario::whereMonth('data_nascimento', $data_atual->month)
        //     ->whereDay('data_nascimento', $data_atual->day)
        //     ->orderByRaw('day(data_nascimento) asc')
        //     ->get();
        // dd($aniversariantes);

        //com funcao get() retornamos o array de aniversariantes diárioa
        // com count() no fim simplesmente contamos o numero de aniversariantes diarios
        $niver = DB::table('funcionarios')
            ->select('nome_completo', 'data_nascimento', 'sexo', 'email_prof')
            ->whereMonth('data_nascimento', $data_atual->month)
            ->whereDay('data_nascimento', $data_atual->day)
            ->orderByRaw('day(data_nascimento) asc')
            ->get();
        dd($niver);
    }
    #conta a qtd de funcionários de sexo feminino
    public function funcionariosSexoFeminino()
    {
        $sexo_feminino = DB::table('funcionarios')
            ->select(DB::raw('COUNT(*) as qtd_mulheres, funcionarios.sexo'))
            ->where('funcionarios.sexo', '=', 'Feminino')
            ->groupBy('funcionarios.sexo')
            ->get();
    }
    #conta a qtd de funcionários do sexo masculino
    public function funcionariosSexoMasculino()
    {
        $sexo_masculino = DB::table('funcionarios')
            ->select(DB::raw('COUNT(funcionarios.id) as qtd_homens, funcionarios.sexo'))
            ->where('funcionarios.sexo', '<>', 'Feminino')
            ->groupBy('funcionarios.sexo')
            ->get();
        dd($sexo_masculino);
    }
    #Conta todos documentos prestes a caducar dentro de 45 dias e retorna um array
    public function documentosPorCaducar()
    {
        $docs =   DB::table('funcionarios')
            ->select(DB::raw('COUNT(*) as docs_por_caducar, funcionarios.nome_completo', 'data_emissao', 'data_validade', 'fotografia'))
            ->whereRaw('DATEDIFF(funcionarios.data_validade, NOW()) <= 45')
            ->whereRaw('DATEDIFF(funcionarios.data_validade, NOW()) > 0')
            ->groupBy('funcionarios.nome_completo')
            ->get();
        dd($docs);
    }
    ##Conta todos documentos caducados e retorna um array
    public function documentosCaducados()
    {
        $docs =   DB::table('funcionarios')
            ->select(DB::raw('COUNT(*) as docs_por_caducar, funcionarios.nome_completo'))
            ->whereRaw('DATEDIFF(funcionarios.data_validade, NOW()) <= 0')
            ->groupBy('funcionarios.nome_completo')
            ->get();
        dd($docs);
    }

    public function primeiroIntervalo()
    {

        $funcionariosDados =   DB::table('funcionarios')
            ->select(DB::raw('COUNT(*) as docs_por_caducar, funcionarios.nome_completo'))
            ->whereRaw('YEAR(FROM_DAYS(TO_DAYS(NOW())-TO_DAYS(funcionarios.data_nascimento))) <= 30')
            ->whereRaw('YEAR(FROM_DAYS(TO_DAYS(NOW())-TO_DAYS(funcionarios.data_nascimento))) >= 18')
            ->groupBy('funcionarios.nome_completo')
            ->get();

        $funcionarios =   DB::table('funcionarios')
            ->whereRaw('YEAR(FROM_DAYS(TO_DAYS(NOW())-TO_DAYS(funcionarios.data_nascimento))) <= 30')
            ->whereRaw('YEAR(FROM_DAYS(TO_DAYS(NOW())-TO_DAYS(funcionarios.data_nascimento))) >= 18')
            ->count();
        dd($funcionarios);
    }


    public function getAge()
    {
        $usersWithAge = DB::table('funcionarios')
            ->select('nome_completo', 'data_nascimento', DB::raw('YEAR(CURDATE()) - YEAR(data_nascimento) - IF(STR_TO_DATE(CONCAT(YEAR(CURDATE()), "-", MONTH(data_nascimento), "-", DAY(data_nascimento)), "%Y-%m-%d") > CURDATE(), 1, 0) AS age'))
            ->get();
        dd($usersWithAge);
        // foreach ($usersWithAge as $user) {
        //     echo "Name: " . $user->name . ", Date of Birth: " . $user->date_of_birth . ", Age: " . $user->age . "<br>";
        // }

    }

    public function search(Request $request)
    {
        $query = $request->input('query');
        $users = Funcionario::where('nome_completo', 'like', "%$query%")
            ->orWhere('email_prof', 'like', "%$query%")
            ->orWhere('contato_prof', 'like', "%$query%")
            ->get();
        return response()->json($users);
    }
}
