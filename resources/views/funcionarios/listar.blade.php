@extends('dashboards.admin.layouts.admin-dash')
@section('title', 'Funcionários')

@section('content')
<div class="app-content main-content">
    <div class="side-app">

        <!--app header-->
        @include('dashboards.admin.layouts.navbar')

        <!--/app header-->

        <!--Page header-->
        <div class="page-header">
            <div class="page-leftheader">
                <h4 class="page-title mb-0">Painel</h4>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#"><i class="fe fe-users mr-2 fs-14"></i>Colaboradores</a></li>
                    <li class="breadcrumb-item active" aria-current="page"><a href="javascript:void(0)">View</a></li>
                </ol>
            </div>
            <div class="page-rightheader">
                {{-- <div class="btn btn-list">
                    <a href="{{route('novo/funcionario')}}" class="btn btn-blue btn-sm"><i class="mdi mdi-account-plus mr-1"></i> Criar novo </a>
                <a href="{{route('gridView/funcionarios')}}" class="btn btn-secondary btn-sm"><i class="mdi mdi-apps mr-1"></i> Lista grelha </a>
                <a href="{{route('listar/funcionarios')}}" class="btn btn-dark btn-sm"><i class="fe fe-align-justify mr-1"></i> Lista Simples </a>
            </div> --}}
        </div>
    </div>
    <!--End Page header-->

    <!-- Row -->
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <span class="font-weight-bold"><i class="fe fe-database"></i> Colaboradores</span>
                    <div aria-label="Basic example" class="btn-group" role="group">
                        <a href="{{route('novo/funcionario')}}" class="btn btn-blue btn-sm"><i class="mdi mdi-account-plus mr-1"></i> Criar novo </a>
                        <a href="{{route('gridView/funcionarios')}}" class="btn btn-secondary btn-sm"><i class="mdi mdi-apps mr-1"></i> Lista grelha </a>
                        <a href="{{route('listar/funcionarios')}}" class="btn btn-dark btn-sm"><i class="fe fe-align-justify mr-1"></i> Lista Simples </a>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table  text-nowrap  table-striped table-hover table-bordered" id="example2">
                            <thead>
                                <tr>
                                    <th class="wd-15p border-bottom-0">Nome completo</th>
                                    <th class="wd-15p border-bottom-0">Sexo</th>
                                    <th class="wd-15p border-bottom-0">Data de nascimento</th>
                                    <th class="wd-15p border-bottom-0">Idade</th>
                                    <th class="wd-15p border-bottom-0">Contato pessoal</th>
                                    <th class="wd-15p border-bottom-0">Endereço</th>
                                    <th class="wd-15p border-bottom-0">Província</th>
                                    <th class="wd-15p border-bottom-0">Estado civil</th>
                                    <th class="wd-15p border-bottom-0">Conjuge</th>
                                    <th class="wd-15p border-bottom-0">Nacionalidade</th>
                                    <th class="wd-15p border-bottom-0">Local de nascimento</th>
                                    <th class="wd-15p border-bottom-0">Documento</th>
                                    <th class="wd-15p border-bottom-0">Nº documento</th>
                                    <th class="wd-15p border-bottom-0">Data de emissão</th>
                                    <th class="wd-15p border-bottom-0">Data de validade</th>
                                    <th class="wd-15p border-bottom-0">Doenças crónicas</th>
                                    <th class="wd-15p border-bottom-0">Deficiências e alergias</th>
                                    <th class="wd-15p border-bottom-0">Grau de deficiência</th>
                                    <th class="wd-15p border-bottom-0">Outros</th>
                                    <th class="wd-15p border-bottom-0">Contato de emergência</th>
                                    <th class="wd-15p border-bottom-0">Dependente</th>
                                    <th class="wd-15p border-bottom-0">Contato profissional</th>
                                    <th class="wd-15p border-bottom-0">Email Profissional</th>
                                    <th class="wd-15p border-bottom-0">Função</th>
                                    <th class="wd-15p border-bottom-0">grupo funcional</th>
                                    <th class="wd-15p border-bottom-0">Categoria</th>
                                    <th class="wd-15p border-bottom-0">Reporte hierárquico</th>
                                    <th class="wd-15p border-bottom-0">Turno</th>
                                    <th class="wd-15p border-bottom-0">Tipo de contrato</th>
                                    <th class="wd-15p border-bottom-0">Prazo</th>
                                    <th class="wd-15p border-bottom-0">Data em vigor</th>
                                    <th class="wd-15p border-bottom-0">NIB</th>
                                    <th class="wd-15p border-bottom-0">Nuit</th>
                                    <th class="wd-15p border-bottom-0">Departamento</th>
                                    <th class="wd-15p border-bottom-0"></th>

                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($dados as $items )
                                <tr style="transition: none !important; transform: none !important;">
                                    <td class="nome_completo">{{ $items->nome_completo}}</td>
                                    <td class="sexo">{{ $items->sexo}}</td>
                                    <td class="data_nascimento">{{ Carbon\Carbon::parse($items->data_nascimento)->format('d-m-Y')}}</td>
                                    <td class="contato_pessoal">{{ $items->idade }}</td>
                                    <td class="contato_pessoal">{{ $items->contato_pessoal }}</td>
                                    <td class="endereco_fisico">{{ $items->endereco_fisico}}</td>
                                    <td class="provincia">{{ $items->provincia}}</td>
                                    <td class="estado_civil">{{ $items->estado_civil}}</td>
                                    <td class="nome_conjuge">{{ $items->nome_conjuge}}</td>
                                    <td class="nacionalidade">{{ $items->nacionalidade}}</td>
                                    <td class="local_nascimento">{{ $items->local_nascimento}}</td>
                                    <td class="tipo_documento">{{ $items->tipo_documento }}</td>
                                    <td class="numero_documento">{{ $items->nr_documento}}</td>
                                    <td class="data_emissao">{{ Carbon\Carbon::parse($items->data_emissao)->format('d-m-Y')}}</td>
                                    <td class="data_validade">{{ Carbon\Carbon::parse($items->data_validade)->format('d-m-Y')}}</td>
                                    <td class="doencas_cronicas">{{ $items->doencas_cronicas }}</td>
                                    <td class="deficiencias_alergias">{{ $items->deficiencias_alergias}}</td>
                                    <td class="grau_deficiencia">{{ $items->grau_deficiencia }}</td>
                                    <td class="outros">{{ $items->outros }}</td>
                                    <td class="contato_emerg">{{ $items->contato_emerg}}</td>
                                    <td class="prazo">
                                        @if(!empty($items->nome_dependente))
                                        {{ $items->nome_dependente}}
                                        @else
                                        Sem dependente
                                        @endif
                                    </td>
                                    <td class="contato_profissional">{{ $items->contato_prof}}</td>
                                    <td class="email_profissional">{{ $items->email_prof}}</td>
                                    <td class="funcao">{{ $items->nome_cargo}}</td>
                                    <td class="grupo_funcional">{{ $items->grupo_funcional}}</td>
                                    <td class="categoria">{{ $items->categoria}}</td>
                                    <td class="reporte">{{ $items->reporte }}</td>
                                    <td class="turno">{{ $items->turno}}</td>
                                    <td class="tipo_contrato">{{ $items->tipo_contrato}}</td>
                                    <td class="prazo">
                                        @if(!empty($items->prazo))
                                        {{ $items->prazo}}
                                        @else
                                        Sem prazo
                                        @endif
                                    </td>
                                    <td class="data_vigor">{{ Carbon\Carbon::parse($items->data_vigor)->format('d-m-Y')}}</td>
                                    <td class="nuit">{{ $items->nuit}}</td>
                                    <td class="nib">{{ $items->nib}}</td>
                                    <td class="departamento">{{ $items->departamento }}</td>
                                    <td>
                                        <div aria-label="Basic example" class="btn-group float-right" role="group">
                                            <a href="{{ url('funcionario/edit',['id_funcionario' => $items->id, 'funcionario_funcao' => $items->funcao])}}" class="btn btn-primary btn-sm"> <i class="mdi mdi-account-edit"></i>&nbsp;Editar</a>
                                            <a href="{{ url('funcionario/delete',['id_funcionario' => $items->id])}}" class="btn btn-danger btn-sm" onclick="return confirm('Tem certeza que deseja excluir este funcionario?')"><i class="mdi mdi-account-remove"></i>&nbsp;Excluir</a>
                                        </div>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

        </div>
    </div>
    <!-- /Row -->

</div>
</div>
{{-- Modal para cadastro --}}
<div class="modal" id="modaldemo8">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content modal-content-demo">
            <div class="modal-header">
                <h6 class="modal-title"> <i class="fe fe-plus-circle"></i> Cadastro de competência</h6>
                <button aria-label="Close" class="close" data-dismiss="modal" type="button">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="" method="POST">
                @csrf
                <div class="modal-body">
                    <div class="">
                        <div class="form-group">
                            <label for="nome" class="form-label">Competência</label>
                            <input type="text" class="form-control" name="nome" id="nome" placeholder="Digite a competência">
                        </div>
                        <div class="form-group">
                            <label for="descricao" class="form-label">Descrição</label>
                            <textarea class="form-control mb-4" placeholder="Descrição da competência" rows="3" name="descricao" id="descricao"></textarea>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-indigo btn-sm" type="submit"> <i class="fe fe-save"></i> Salvar</button>
                    <button class="btn btn-secondary btn-sm" data-dismiss="modal" type="button">
                        <i class="fe fe-x"></i> Fechar
                    </button>
                </div>
            </form>

        </div>
    </div>
</div>
{{-- Modal para edicao --}}
<div class="modal" id="edit_competencia">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content modal-content-demo">
            <div class="modal-header">
                <h6 class="modal-title"> <i class="fe fe-plus-circle"></i> Edição de competência</h6>
                <button aria-label="Close" class="close" data-dismiss="modal" type="button">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="" method="POST">
                @csrf
                <div class="modal-body">
                    <input type="hidden" name="id" id="e_id" value="">
                    <div class="">
                        <div class="form-group">
                            <label for="nome" class="form-label">Competência</label>
                            <input type="text" class="form-control" name="nome" id="nome_edit">
                        </div>
                        <div class="form-group">
                            <label for="descricao" class="form-label">Descrição</label>
                            <textarea class="form-control mb-4" rows="3" name="descricao" id="descricao_edit"></textarea>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-indigo btn-sm" type="submit"> <i class="fe fe-save"></i> Salvar</button>
                    <button class="btn btn-secondary btn-sm" data-dismiss="modal" type="button">
                        <i class="fe fe-x"></i> Fechar
                    </button>
                </div>
            </form>

        </div>
    </div>
</div>



@section('scripts')
<!-- {{-- update js --}} -->
<script>
    $(document).on('click', '.competenciaUpdate', function() {
        var _this = $(this).parents('tr');
        $('#e_id').val(_this.find('.id').text());
        $('#nome_edit').val(_this.find('.nome').text());
        $('#descricao_edit').val(_this.find('.descricao').text());
    });

</script>

@endsection

@endsection
