<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('welcome'); should be like return view(auth.login)
// });

Route::middleware(['middleware' => 'PreventBackHistory'])->group(function () {
    Auth::routes();
});

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//------------------------------------------Routes para painel do adminiistrador --------------------------//
Route::group(['prefix' => 'admin', 'middleware' => ['isAdmin', 'auth', 'PreventBackHistory']], function () {
    Route::get('painel', [App\Http\Controllers\AdminController::class, 'index'])->name('admin.painel');
    Route::get('perfil', [App\Http\Controllers\AdminController::class, 'perfil'])->name('admin.perfil');
    Route::get('configuracoes', [App\Http\Controllers\AdminController::class, 'configuracoes'])->name('admin.configuracoes');
    //Routes para usuário
    Route::get('listar/usuario', [App\Http\Controllers\UserManagementController::class, 'index'])->name('admin/listar/usuario');
    Route::get('novo/usuario', [App\Http\Controllers\UserManagementController::class, 'novoUsuario'])->name('admin/novo/usuario');
    Route::post('criar/usuario', [App\Http\Controllers\UserManagementController::class, 'register'])->name('admin/criar/usuario');
    Route::get('sobre/usuario', [App\Http\Controllers\UserManagementController::class, 'perfil'])->name('admin/sobre/usuario');
    Route::get('editar/usuario/{usuario_id}', [App\Http\Controllers\UserManagementController::class, 'editar']);
    Route::get('excluir/usuario/{usuario_id}', [App\Http\Controllers\UserManagementController::class, 'deleteRecord']);
    Route::post('update/usuario', [App\Http\Controllers\UserManagementController::class, 'updateRecord'])->name('admin/update/usuario');
    Route::get('admin/edicao/usuario', [App\Http\Controllers\UserManagementController::class, 'perfil'])->name('admin/editar/usuario'); //excluir depois esta rota
    Route::get('admin/grelha/usuario', [App\Http\Controllers\UserManagementController::class, 'gridView'])->name('admin/grelha/usuario');
    Route::get('logs/usuario', [App\Http\Controllers\UserManagementController::class, 'logs'])->name('admin/logs/usuario');
    Route::get('excluir/historico/{usuario_id}', [App\Http\Controllers\UserManagementController::class, 'deleteHistorico']);
    
    Route::get('listar/charts', [App\Http\Controllers\UserManagementController::class, 'userChart'])->name('listar/charts');
    //Users Live serach route 
    Route::get('/search', [App\Http\Controllers\UserManagementController::class, 'search'])->name('pesquisar/users');
});

// -----------------------------login----------------------------------------//
// Route::get('/login', [App\Http\Controllers\Auth\LoginController::class, 'login'])->name('login');
// Route::post('/login', [App\Http\Controllers\Auth\LoginController::class, 'authenticate']);
Route::get('/logout', [App\Http\Controllers\Auth\LoginController::class, 'logout'])->name('logout');

//------------------------------------------Routes para competencias --------------------------//
Route::get('listar/competencias', [App\Http\Controllers\CompetenciaController::class, 'index'])->middleware('auth')->name('listar/competencias');
Route::post('form/competencia/save', [App\Http\Controllers\CompetenciaController::class, 'saveRecord'])->middleware('auth')->name('form/competencia/save');
Route::post('form/competencia/update', [App\Http\Controllers\CompetenciaController::class, 'updateRecord'])->middleware('auth')->name('form/competencia/update');
Route::get('excluir/competencia/{competencia_id}', [App\Http\Controllers\CompetenciaController::class, 'deleteRecord']);
Route::post('competencia/edit/delete', [App\Http\Controllers\CompetenciaController::class, 'deleteRecord1'])->middleware('auth')->name('competencia/edit/delete');
Route::get('editar/competencia/{competencia_id}', [App\Http\Controllers\CompetenciaController::class, 'editar']);
// Route::post('update/usuario', [App\Http\Controllers\UserManagementController::class, 'updateRecord'])->name('admin/update/usuario');
//------------------------------------------Routes para departamentos --------------------------//
Route::get('listar/departamentos', [App\Http\Controllers\DepartamentoController::class, 'index'])->middleware('auth')->name('listar/departamentos');
Route::post('form/departamento/save', [App\Http\Controllers\DepartamentoController::class, 'saveRecord'])->middleware('auth')->name('form/departamento/save');
Route::post('form/departamento/update', [App\Http\Controllers\DepartamentoController::class, 'updateRecord'])->middleware('auth')->name('form/departamento/update');
Route::get('excluir/departamento/{departamento_id}', [App\Http\Controllers\DepartamentoController::class, 'deleteRecord']);
Route::post('departamento/edit/delete', [App\Http\Controllers\DepartamentoController::class, 'deleteRecord1'])->middleware('auth')->name('departamento/edit/delete');

//------------------------------------------Routes para turnos --------------------------//
Route::get('listar/turnos', [App\Http\Controllers\TurnoController::class, 'index'])->middleware('auth')->name('listar/turnos');
Route::post('form/turno/save', [App\Http\Controllers\TurnoController::class, 'saveRecord'])->middleware('auth')->name('form/turno/save');
Route::post('form/turno/update', [App\Http\Controllers\TurnoController::class, 'updateRecord'])->middleware('auth')->name('form/turno/update');
Route::get('excluir/turno/{turno_id}', [App\Http\Controllers\TurnoController::class, 'deleteRecord']);
Route::post('turno/edit/delete', [App\Http\Controllers\TurnoController::class, 'deleteRecord1'])->middleware('auth')->name('turno/edit/delete');

//------------------------------------------Routes para locais de trabalho --------------------------//
Route::get('listar/locais', [App\Http\Controllers\LocalDeTrabalhoController::class, 'index'])->middleware('auth')->name('listar/locais');
Route::post('form/local/save', [App\Http\Controllers\LocalDeTrabalhoController::class, 'saveRecord'])->middleware('auth')->name('form/local/save');
Route::post('form/local/update', [App\Http\Controllers\LocalDeTrabalhoController::class, 'updateRecord'])->middleware('auth')->name('form/local/update');
Route::get('excluir/local/{local_id}', [App\Http\Controllers\LocalDeTrabalhoController::class, 'deleteRecord']);
Route::post('local/edit/delete', [App\Http\Controllers\LocalDeTrabalhoController::class, 'deleteRecord1'])->middleware('auth')->name('local/edit/delete');

//------------------------------------------Routes para tipo de contratos --------------------------//
Route::get('listar/tipo/contratos', [App\Http\Controllers\TipoContratoController::class, 'index'])->middleware('auth')->name('listar/tipo/contratos');
Route::post('form/tipo/contrato/save', [App\Http\Controllers\TipoContratoController::class, 'saveRecord'])->middleware('auth')->name('form/tipo/contrato/save');
Route::post('form/tipo/contrato/update', [App\Http\Controllers\TipoContratoController::class, 'updateRecord'])->middleware('auth')->name('form/tipo/contrato/update');
Route::get('excluir/tipo/contrato/{contrato_id}', [App\Http\Controllers\TipoContratoController::class, 'deleteRecord']);
Route::post('tipo_contrato/edit/delete', [App\Http\Controllers\TipoContratoController::class, 'deleteRecord1'])->middleware('auth')->name('tipo_contrato/edit/delete');

//------------------------------------------Routes para tipo de clusters --------------------------//
Route::get('listar/tipo/clusters', [App\Http\Controllers\ClusterController::class, 'index'])->middleware('auth')->name('listar/tipo/clusters');
Route::post('form/tipo/cluster/save', [App\Http\Controllers\ClusterController::class, 'saveRecord'])->middleware('auth')->name('form/tipo/cluster/save');
Route::post('form/tipo/cluster/update', [App\Http\Controllers\ClusterController::class, 'updateRecord'])->middleware('auth')->name('form/tipo/cluster/update');
Route::get('excluir/tipo/cluster/{cluster_id}', [App\Http\Controllers\ClusterController::class, 'deleteRecord']);
Route::post('cluster/edit/delete', [App\Http\Controllers\ClusterController::class, 'deleteRecord1'])->middleware('auth')->name('cluster/edit/delete');

//------------------------------------------Routes para painel do usuario simples --------------------------//
Route::group(['prefix' => 'user', 'middleware' => ['isUser', 'auth', 'PreventBackHistory']], function () {
    Route::get('user/painel', [App\Http\Controllers\UserController::class, 'index'])->name('user.painel');
    Route::get('user/perfil', [App\Http\Controllers\UserController::class, 'perfil'])->name('user.perfil');
    Route::get('user/configuracoes', [App\Http\Controllers\UserController::class, 'configuracoes'])->name('user.configuracoes');
});

//------------------------------------------Routes para painel do auxiliar --------------------------//
Route::group(['prefix' => 'aux', 'middleware' => ['isAux', 'auth', 'PreventBackHistory']], function () {
    Route::get('aux/painel', [App\Http\Controllers\AuxiliarController::class, 'index'])->name('aux.painel');
    Route::get('aux/perfil', [App\Http\Controllers\AuxiliarController::class, 'perfil'])->name('aux.perfil');
    Route::get('aux/configuracoes', [App\Http\Controllers\AuxiliarController::class, 'configuracoes'])->name('aux.configuracoes');
});

//------------------------------------------Routes para painel do recepcionista --------------------------//
Route::group(['prefix' => 'recept', 'middleware' => ['isRecept', 'auth', 'PreventBackHistory']], function () {
    Route::get('recept/painel', [App\Http\Controllers\ReceptionistController::class, 'index'])->name('recept.painel');
    Route::get('recept/perfil', [App\Http\Controllers\ReceptionistController::class, 'perfil'])->name('recept.perfil');
    Route::get('recept/configuracoes', [App\Http\Controllers\ReceptionistController::class, 'configuracoes'])->name('recept.configuracoes');
});

//------------------------------------------Routes para cargos --------------------------//
Route::get('listar/tipo/cargos', [App\Http\Controllers\CargoController::class, 'index'])->middleware('auth')->name('listar/tipo/cargos');
Route::post('form/tipo/cargo/save', [App\Http\Controllers\CargoController::class, 'saveRecord'])->middleware('auth')->name('form/tipo/cargo/save');
Route::post('form/tipo/cargo/update', [App\Http\Controllers\CargoController::class, 'updateRecord'])->middleware('auth')->name('form/tipo/cargo/update');
Route::get('excluir/tipo/cargo/{cargo_id}', [App\Http\Controllers\CargoController::class, 'deleteRecord']);
Route::post('cargo/edit/delete', [App\Http\Controllers\CargoController::class, 'deleteRecord1'])->middleware('auth')->name('cargo/edit/delete');

//------------------------------------------Routes para funcionarios --------------------------//
Route::get('listar/funcionarios', [App\Http\Controllers\FuncionarioController::class, 'index'])->middleware('auth')->name('listar/funcionarios');
Route::get('apenas/funcionarios', [App\Http\Controllers\FuncionarioController::class, 'funcionariosView'])->middleware('auth')->name('apenas/funcionarios');
Route::get('gridView/funcionarios', [App\Http\Controllers\FuncionarioController::class, 'funcionariosGridView'])->middleware('auth')->name('gridView/funcionarios');
Route::get('novo/funcionario', [App\Http\Controllers\FuncionarioController::class, 'novoFuncionario'])->middleware('auth')->name('novo/funcionario');
Route::post('form/funcionario/save', [App\Http\Controllers\FuncionarioController::class, 'saveRecord'])->middleware('auth')->name('form/funcionario/save');
Route::get('form/funcionario/edit/{funcionario_id}/{grau_academico_id}/{especificacao_id}/{funcionario_funcao}', [App\Http\Controllers\FuncionarioController::class, 'viewRecord'])->middleware('auth')->name('form/funcionario/edit');
Route::post('form/funcionario/update', [App\Http\Controllers\FuncionarioController::class, 'updateRecord'])->middleware('auth')->name('form/funcionario/update');
Route::get('form/funcionario/delete/{funcionario_id}/{grau_academico_id}/{especificacao_id}', [App\Http\Controllers\FuncionarioController::class, 'deleteRecord'])->middleware('auth');
Route::get('perfil/funcionario/{funcionario_id}', [App\Http\Controllers\FuncionarioController::class, 'funcionarioPerfil'])->middleware('auth');
Route::get('listar/aniversariantes', [App\Http\Controllers\FuncionarioController::class, 'verificaAniversario'])->middleware('auth')->name('listar/aniversariantes');
Route::get('listar/sexo/feminino', [App\Http\Controllers\FuncionarioController::class, 'funcionariosSexoFeminino'])->middleware('auth')->name('listar/sexo/feminino');
Route::get('listar/documentos/por/caducar', [App\Http\Controllers\FuncionarioController::class, 'documentosPorCaducar'])->middleware('auth')->name('listar/documentos/por/caducar');
Route::get('listar/sexo/masculino', [App\Http\Controllers\FuncionarioController::class, 'funcionariosSexoMasculino'])->middleware('auth')->name('listar/sexo/masculino');
Route::get('listar/documentos/caducados', [App\Http\Controllers\FuncionarioController::class, 'documentosCaducados'])->middleware('auth')->name('listar/documentos/caducados');
Route::get('listar/primeiro/intervalo', [App\Http\Controllers\FuncionarioController::class, 'primeiroIntervalo'])->middleware('auth')->name('listar/primeiro/intervalo');
Route::get('listar/aniversario', [App\Http\Controllers\FuncionarioController::class, 'aniversario'])->middleware('auth')->name('listar/aniversario');
Route::get('listar/idades', [App\Http\Controllers\FuncionarioController::class, 'getAge'])->middleware('auth')->name('listar/idades');
Route::get('form/funcionario/edit/grid/{funcionario_id}/{grau_academico_id}/{especificacao_id}/{funcionario_funcao}', [App\Http\Controllers\FuncionarioController::class, 'viewRecordGrid'])->middleware('auth')->name('form/funcionario/edit/grid');
Route::get('form/funcionario/delete/grid/{funcionario_id}/{grau_academico_id}/{especificacao_id}', [App\Http\Controllers\FuncionarioController::class, 'deleteRecordGrid'])->middleware('auth');
//workers live serach
Route::get('/search_funcionario', [App\Http\Controllers\FuncionarioController::class, 'search'])->name('pesquisar/funcionario');

Route::get('funcionario/edit/{funcionario_id}/{funcionario_funcao}', [App\Http\Controllers\FuncionarioController::class, 'viewFuncionarioRecord'])->middleware('auth')->name('funcionario/edit');
Route::post('update/funcionario', [App\Http\Controllers\FuncionarioController::class, 'updateApenasFuncionario'])->middleware('auth')->name('update/funcionario');
Route::get('funcionario/delete/{funcionario_id}', [App\Http\Controllers\FuncionarioController::class, 'deleteFuncionarioRecord'])->middleware('auth');
//------------------------------------------Routes para objetivos --------------------------//
Route::get('listar/objetivos', [App\Http\Controllers\ObjetivoController::class, 'index'])->middleware('auth')->name('listar/objetivos');
Route::post('form/objetivo/save', [App\Http\Controllers\ObjetivoController::class, 'saveRecord'])->middleware('auth')->name('form/objetivo/save');
Route::post('form/objetivo/update', [App\Http\Controllers\ObjetivoController::class, 'updateRecord'])->middleware('auth')->name('form/objetivo/update');
Route::get('excluir/objetivo/{objetivo_id}', [App\Http\Controllers\ObjetivoController::class, 'deleteRecord']);
Route::post('objetivo/edit/delete', [App\Http\Controllers\ObjetivoController::class, 'deleteRecord1'])->middleware('auth')->name('objetivo/edit/delete');
Route::get('editar/objetivo/{objetivo_id}', [App\Http\Controllers\ObjetivoController::class, 'editar']);
//----------------------------------------- Routes para relatórios -------------------------//
Route::get('listar/relatorios', [App\Http\Controllers\RelatorioController::class, 'index'])->middleware('auth')->name('listar/relatorios');
Route::get('generate/pdf', [App\Http\Controllers\RelatorioController::class, 'generate_pdf'])->middleware('auth')->name('generate/pdf');
Route::get('download/pdf', [App\Http\Controllers\RelatorioController::class, 'download_pdf'])->middleware('auth')->name('download/pdf');

Route::get('form/relatorio/visualizar/{id_avaliacao}', [App\Http\Controllers\RelatorioController::class, 'visualizar'])->middleware('auth')->name('form/relatorio/visualizar');
Route::get('form/relatorio/download/{id_avaliacao}', [App\Http\Controllers\RelatorioController::class, 'download'])->middleware('auth');
//----------------------------------------- Routes para avaliação de desempenho -------------------------//
Route::get('listar/avaliacoes', [App\Http\Controllers\AvaliacaoDesempenhoController::class, 'index'])->middleware('auth')->name('listar/avaliacoes');
Route::get('nova/avaliacao', [App\Http\Controllers\AvaliacaoDesempenhoController::class, 'novaAvaliacao'])->middleware('auth')->name('nova/avaliacao');
Route::post('form/avaliacao/save', [App\Http\Controllers\AvaliacaoDesempenhoController::class, 'saveRecord'])->middleware('auth')->name('form/avaliacao/save');
Route::get('gridView/avaliacao', [App\Http\Controllers\AvaliacaoDesempenhoController::class, 'avaliacaoGridView'])->middleware('auth')->name('gridView/avaliacao');
Route::get('form/avaliacao/edit/{id_avaliacao}/{id_competencia}/{id_objetivo}', [App\Http\Controllers\AvaliacaoDesempenhoController::class, 'viewRecord'])->middleware('auth')->name('form/avaliacao/edit');
Route::post('form/avaliacao/update', [App\Http\Controllers\AvaliacaoDesempenhoController::class, 'updateRecord'])->middleware('auth')->name('form/avaliacao/update');
Route::get('form/avaliacao/delete/{id_avaliacao}', [App\Http\Controllers\AvaliacaoDesempenhoController::class, 'deleteRecord'])->middleware('auth');
Route::get('listar/teste', [App\Http\Controllers\AvaliacaoDesempenhoController::class, 'teste'])->middleware('auth')->name('listar/teste');

//------------------------------------------Routes para avaliacao de desempenho interno --------------------------//
Route::get('listar/desempenhos', [App\Http\Controllers\DesempenhoController::class, 'index'])->middleware('auth')->name('listar/desempenhos');
Route::post('form/desempenho/save', [App\Http\Controllers\DesempenhoController::class, 'saveRecord'])->middleware('auth')->name('form/desempenho/save');
Route::post('form/desempenho/update', [App\Http\Controllers\DesempenhoController::class, 'updateRecord'])->middleware('auth')->name('form/desempenho/update');
Route::get('form/desempenho/excluir/{id_desempenho}/{novoId}', [App\Http\Controllers\DesempenhoController::class, 'deleteRecord']);
Route::get('form/desempenho/edit/{id_desempenho}', [App\Http\Controllers\DesempenhoController::class, 'viewRecord'])->middleware('auth');
Route::get('form/desempenho/ver/{id_desempenho}', [App\Http\Controllers\DesempenhoController::class, 'verDetalhesCompetencias'])->middleware('auth');

//-----------------------------------------Routes para novas avaliações de desempenho --------------------------//
Route::get('workers/avaliacao', [App\Http\Controllers\AvaliacaoDesempenhoController::class, 'funcionariosGridViewAvaliacao'])->middleware('auth')->name('workers/avaliacao');
Route::get('worker/avaliacao/realizacao/{id_funcionario}', [App\Http\Controllers\AvaliacaoDesempenhoController::class, 'avaliarFuncionario'])->middleware('auth');
Route::get('nova/avaliacao/teste', [App\Http\Controllers\AvaliacaoDesempenhoController::class, 'novaAvaliacaoTeste'])->middleware('auth')->name('nova/avaliacao/teste');
Route::post('buscar/competenciasPorCargo', [App\Http\Controllers\AvaliacaoDesempenhoController::class, 'competenciasPorCargo'])->name('buscar/competenciasPorCargo');

Route::get('worker/competencias/{funcao}', [App\Http\Controllers\AvaliacaoDesempenhoController::class, 'workerCompetencias'])->middleware('auth');

Route::get('teste', [App\Http\Controllers\TesteController::class, 'index'])->middleware('auth')->name('teste');
// Route::get('/competencias/{funcao}', [App\Http\Controllers\TesteController::class, 'workerCompetencias'])->middleware('auth');
Route::get('/competencias/{funcao}', [App\Http\Controllers\AvaliacaoDesempenhoController::class, 'workerCompetencias'])->middleware('auth');
Route::get('/objetivos/{funcao}', [App\Http\Controllers\AvaliacaoDesempenhoController::class, 'workerObjetivos'])->middleware('auth');
Route::post('/salvar-avaliacao', [App\Http\Controllers\AvaliacaoDesempenhoController::class, 'TesteSalvarCompetencias'])->middleware('auth');

//------------------------------------------Routes para atribuição de objetivos --------------------------//
Route::get('listar/atribuicoes', [App\Http\Controllers\AtribuiObjetivoController::class, 'index'])->middleware('auth')->name('listar/atribuicoes');
Route::post('form/atribuicao/save', [App\Http\Controllers\AtribuiObjetivoController::class, 'saveRecord'])->middleware('auth')->name('form/atribuicao/save');
Route::post('form/atribuicao/update', [App\Http\Controllers\AtribuiObjetivoController::class, 'updateRecord'])->middleware('auth')->name('form/atribuicao/update');
Route::get('form/atribuicao/excluir/{id_atribuicao}', [App\Http\Controllers\AtribuiObjetivoController::class, 'deleteRecord']);
Route::get('form/atribuicao/edit/{id_atribuicao}', [App\Http\Controllers\AtribuiObjetivoController::class, 'viewRecord'])->middleware('auth');
Route::get('form/atribuicao/ver/{nome}/{id_cargo}', [App\Http\Controllers\AtribuiObjetivoController::class, 'verDetalhesObjetivos'])->middleware('auth');

Route::get('nova/avaliacao1', [App\Http\Controllers\AvaliacaoDesempenhoController::class, 'novaAvaliacao1'])->middleware('auth')->name('nova/avaliacao1');

//Rota para backup do BD
Route::get('/backup', [App\Http\Controllers\BackupController::class, 'create'])->name('backup.create');

//Rota para exclusão múltipla de logs de users
Route::delete('/excluir-registros/{ids}', [App\Http\Controllers\UserManagementController::class, 'excluirRegistros'])->name('excluirRegistros');

//------------------------------------------Routes para pesos --------------------------//
Route::get('listar/pesos', [App\Http\Controllers\PesoController::class, 'index'])->middleware('auth')->name('listar/pesos');
Route::post('form/peso/save', [App\Http\Controllers\PesoController::class, 'saveRecord'])->middleware('auth')->name('form/peso/save');
Route::post('form/peso/update', [App\Http\Controllers\PesoController::class, 'updateRecord'])->middleware('auth')->name('form/peso/update');
Route::post('peso/edit/delete', [App\Http\Controllers\PesoController::class, 'deleteRecord'])->middleware('auth')->name('peso/edit/delete');

Route::get('peso/teste', [App\Http\Controllers\PesoController::class, 'teste'])->middleware('auth')->name('peso/teste');
