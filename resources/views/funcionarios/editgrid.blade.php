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
                    <li class="breadcrumb-item"><a href="#"></i>Edição</a></li>
                    <li class="breadcrumb-item active" aria-current="page"><a href="#">View</a></li>
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
                    <span class="font-weight-bold"><i class="mdi mdi-account-edit mr-1"></i> Colaboradores</span>
                    <div aria-label="Basic example" class="btn-group" role="group">
                        <a href="{{route('listar/funcionarios')}}" class="btn btn-blue btn-sm"><i class="fe fe-arrow-left-circle mr-1"></i> Voltar </a>
                        <a href="{{route('gridView/funcionarios')}}" class="btn btn-secondary btn-sm"><i class="mdi mdi-apps mr-1"></i> Lista grelha </a>
                        <a href="{{route('listar/funcionarios')}}" class="btn btn-dark btn-sm"><i class="fe fe-align-justify mr-1"></i> Lista Simples </a>
                    </div>
                </div>
                <div class="card-body">
                    <form action="{{route('form/funcionario/update')}}" method="POST" enctype="multipart/form-data" id="validate">
                        @csrf
                        <input type="hidden" class="form-control" id="id" name="id" value="{{$dados[0]->id}}">
                        <input type="hidden" class="form-control" id="id" name="grau_academico_id" value="{{$dados[0]->id_grau_academico}}">
                        <input type="hidden" class="form-control" id="id" name="especificacao_id" value="{{$dados[0]->id_especificacao}}">

                        <div class="panel panel-primary tabs-style-3">
                            <div class="tab-menu-heading">
                                <div class="tabs-menu ">
                                    <!-- Tabs -->
                                    <ul class="nav panel-tabs">
                                        <li class=""><a href="#tab11" class="active" data-toggle="tab"><i class="fe fe-airplay mr-1"></i><span class="small">Dados biográficos e acadêmicos</span></a></li>
                                        <li><a href="#tab12" data-toggle="tab"><i class="fe fe-package mr-1"></i> <span class="small">Dados pessoais e contato emergência</span></a></li>
                                        <li><a href="#tab13" data-toggle="tab"><i class="fe fe-settings mr-1"></i> <span class="small">Dados profissionais e contatos</span></a></li>
                                        <li><a href="#tab14" data-toggle="tab"><i class="fe fe-database mr-1"></i> <span class="small">Outros dados do colaborador</span></a></li>

                                    </ul>
                                </div>
                            </div>
                            <div class="panel-body tabs-menu-body">
                                <div class="tab-content">
                                    <div class="tab-pane active" id="tab11">
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label for="nome_completo"><span class="small">Nome completo</span> <span class="text-danger">*</span> </label>
                                                    <div>
                                                        <input type="text" class="form-control" name="nome_completo" id="nome_completo" value="{{$dados[0]->nome_completo}}" required />
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-3">
                                                <div class="form-group">
                                                    <label class="form-label" for="sexo"><span class="small">Sexo</span> <span class="text-danger">*</span></label>
                                                    <select class="form-control custom-select select2" name="sexo" id="sexo" required>
                                                        <option value="{{$dados[0]->sexo}}">{{$dados[0]->sexo}}</option>
                                                        <option value="Masculino">Masculino</option>
                                                        <option value="Feminino">Feminino</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-sm-3">
                                                <div class="form-group">
                                                    <label for="fotografia"><span class="small">Fotografia</span></label>
                                                    <div>
                                                        <input type="file" class="form-control" name="fotografia" id="fotografia" />
                                                        <input type="hidden" class="form-control form-control-sm" value="{{$dados[0]->fotografia}}" name="fotografia_antiga" id="fotografia_antiga">
                                                    </div>

                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-sm-3">
                                                <div class="form-group">
                                                    <label for="nive"><span class="small">Nível acadêmico </span><span class="text-danger">*</span> </label>
                                                    <div>
                                                        <select class="form-control custom-select select2" name="nivel" id="nive" required>
                                                            <option value="{{$dados[0]->nivel_academico}}" class="minimize"><span class="small">{{$dados[0]->nivel_academico}}</span></option>
                                                            <option value="Técnico médio">Técnico médio</option>
                                                            <option value="Técnico superior">Técnico superior</option>
                                                            <option value="Licenciatura">Licenciatura</option>
                                                            <option value="Mestrado">Mestrado</option>
                                                            <option value="MBA">MBA</option>
                                                            <option value="Pós-graduação">Pós-graduação</option>
                                                            <option value="Doutoramento">Doutoramento</option>
                                                            <option value="Outro">Outro</option>
                                                        </select>
                                                    </div>
                                                </div>

                                            </div>
                                            <div class="col-sm-3">
                                                <div class="form-group">
                                                    <label for="especializacao"><span class="small">Área de especialização</span><span class="text-danger">*</span> </label>
                                                    <div>
                                                        <input type="text" class="form-control" name="especializacao" id="especializacao" value="{{$dados[0]->especializacao}}" required />
                                                    </div>
                                                </div>

                                            </div>

                                            <div class="col-sm-3">
                                                <div class="form-group">
                                                    <label class="form-label"><span class="small">Instituição de formação</span> <span class="text-danger">*</span></label>
                                                    <select class="form-control custom-select select2" name="instituicao" id="instituica" required>
                                                        <option value="{{$dados[0]->instituicao}}"><span class="small">{{$dados[0]->instituicao}}</span></option>
                                                        <optgroup label="Ensino Superior">
                                                            <option value="UEM" class="minimize"><span class="small">UEM-(Universidade Eduardo Mondlane)</span></option>
                                                            <option value="UniZambeze"><span class="small">UZ-(Universidade Zambeze)</span></option>
                                                            <option value="UniLúrio"><span class="small">UL-(Universidade Lúrio)</span></option>
                                                            <option value="UCM"><span class="small">UCM-(Universidade Católica de Moçambique)</span></option>
                                                            <option value="USTM">USTM-(Universidade São Tomás de Moçambique)</option>
                                                        </optgroup>
                                                        <optgroup label="Ensino Técnico Médio">
                                                            <option value="Instituto Industrial de Maputo">Instituto Industrial de Maputo</option>
                                                            <option value="Instituto Comercial de Maputo">Instituto Comercial de Maputo</option>
                                                            <option value="Instituto Industrial e Comercial da Beira">Instituto Industrial e Comercial da Beira</option>
                                                        </optgroup>
                                                        <optgroup label="Outro Ensino">
                                                            <option value="Outro">Outra</option>
                                                        </optgroup>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-sm-3">
                                                <div class="form-group">
                                                    <label for="periodo"><span class="small">Ano de início e conclusão</span> <span class="text-danger">*</span> </label>
                                                    <div>
                                                        <input type="text" class="form-control" name="periodo" id="periodo" value="{{$dados[0]->inicio_termino}}" required />
                                                    </div>
                                                </div>
                                            </div>
                                        </div>


                                        <div class="row">
                                            <div class="col-sm-12">
                                                <div class="form-group">
                                                    <label for="especificacao"><span class="small">Especificação</span></label>
                                                    <input type="text" class="form-control" name="especificacao" id="especificacao" value="{{$dados[0]->nome_especificacao}}" />
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row mb-0">
                                            <div class="col-sm-4">
                                                <div class="form-group">
                                                    <img id="preview-image" style="padding: 10px; max-width: 180px;  max-height: 350px">
                                                </div>
                                            </div>
                                            <div class="col-sm-4"></div>
                                            <div class="col-sm-4">
                                                @if($dados[0]->fotografia != "" )
                                                <div class="form-group">
                                                    <img class="float-right" src="{{asset('uploads/funcionario/'.$dados[0]->fotografia)}}" style="padding: 10px; max-width: 180px;  max-height: 350px">
                                                </div>
                                                @endif

                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane" id="tab12">
                                        <div class="row">
                                            <div class="col-sm-3">
                                                <div class="form-group">
                                                    <label for="data_nascimento"><span class="small">Data de nascimento</span> <span class="text-danger">*</span> </label>
                                                    <div>
                                                        <input type="datetime-local" class="form-control" name="data_nascimento" id="data_nascimento" value="{{$dados[0]->data_nascimento}}" required />
                                                    </div>
                                                </div>

                                            </div>
                                            <div class="col-sm-3">
                                                <div class="form-group">
                                                    <label for="contato"><span class="small">Contato pessoal</span> <span class="text-danger">*</span> </label>
                                                    <div>
                                                        <input type="text" class="form-control" name="contato" id="contato" value="{{$dados[0]->contato_pessoal}}" required />

                                                    </div>
                                                </div>

                                            </div>
                                            <div class="col-sm-3">
                                                <div class="form-group">
                                                    <label for="endereco"><span class="small">Endereço físico</span> <span class="text-danger">*</span> </label>
                                                    <div>
                                                        <input type="text" class="form-control" name="endereco" id="endereco" value="{{$dados[0]->endereco_fisico}}" required />
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-3">
                                                <div class="form-group">
                                                    <label class="form-label"><span class="small">Província</span> <span class="text-danger">*</span></label>
                                                    <select class="form-control custom-select select2" name="provincia" id="provincia" required>
                                                        <option value="{{$dados[0]->provincia}}">{{$dados[0]->provincia}}</option>
                                                        <option value="Maputo Cidade">Maputo cidade</option>
                                                        <option value="Maputo">Maputo</option>
                                                        <option value="Gaza">Gaza</option>
                                                        <option value="Inhambane">Inhambane</option>
                                                        <option value="Sofala">Sofala</option>
                                                        <option value="Manica">Manica</option>
                                                        <option value="Tete">Tete</option>
                                                        <option value="Zambézia">Zambézia</option>
                                                        <option value="Nampula">Nampula</option>
                                                        <option value="Cabo Delgado">Cabo Delgado</option>
                                                        <option value="Niassa">Niassa</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>


                                        <div class="row">
                                            <div class="col-sm-3">
                                                <div class="form-group">
                                                    <label for="tipo_documento"><span class="small">Tipo de documento</span> <span class="text-danger">*</span> </label>
                                                    <div>
                                                        <select class="form-control custom-select select2" name="tipo_documento" id="tipo_documento" required>
                                                            <option value="{{$dados[0]->tipo_documento}}">{{$dados[0]->tipo_documento}}</option>
                                                            <option value="BI">BI</option>
                                                            <option value="Passaporte">Passaporte</option>
                                                            <option value="Carta de condução">Carta de condução</option>
                                                            <option value="Outro">Outro</option>
                                                        </select>
                                                    </div>
                                                </div>

                                            </div>
                                            <div class="col-sm-3">
                                                <div class="form-group">
                                                    <label for="numero_documento"><span class="small">Nº do documento</span> <span class="text-danger">*</span> </label>
                                                    <div>
                                                        <input type="text" class="form-control" name="numero_documento" id="numero_documento" value="{{$dados[0]->nr_documento}}" required />

                                                    </div>
                                                </div>

                                            </div>

                                            <div class="col-sm-3">
                                                <div class="form-group">
                                                    <label for="data_emissao"><span class="small">Data de emissão</span> <span class="text-danger">*</span> </label>
                                                    <div>
                                                        <input type="datetime-local" class="form-control" name="data_emissao" id="data_emissao" value="{{$dados[0]->data_emissao}}" required />


                                                    </div>
                                                </div>

                                            </div>
                                            <div class="col-sm-3">
                                                <div class="form-group">
                                                    <label for="data_validade"><span class="small">Data de validade</span> <span class="text-danger">*</span> </label>
                                                    <div>
                                                        <input type="datetime-local" class="form-control" name="data_validade" id="data_validade" value="{{$dados[0]->data_validade}}" required />

                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-sm-3">
                                                <div class="form-group">
                                                    <label for="nuit"><span class="small">NUIT</span> <span class="text-danger">*</span> </label>
                                                    <div>
                                                        <input type="text" class="form-control" name="nuit" id="nuit" value="{{$dados[0]->nuit}}" required>

                                                    </div>
                                                </div>

                                            </div>
                                            <div class="col-sm-3">
                                                <div class="form-group">
                                                    <label for="nib"><span class="small">NIB</span> <span class="text-danger">*</span> </label>
                                                    <div>
                                                        <input type="text" class="form-control" name="nib" id="nib" value="{{$dados[0]->nib}}" required />
                                                    </div>
                                                </div>

                                            </div>
                                            <div class="col-sm-3">
                                                <div class="form-group">
                                                    <label for="contato_emerg"><span class="small">Contato de emergência</span> <span class="text-danger">*</span></label>
                                                    <div>
                                                        <input type="text" class="form-control" name="contato_emerg" id="contato_emerg" value="{{$dados[0]->contato_emerg}}" required />
                                                    </div>
                                                </div>

                                            </div>
                                            <div class="col-sm-3">
                                                <div class="form-group">
                                                    <label for="nome_emerg"><span class="small">Nome para emergência</span> <span class="text-danger">*</span> </label>
                                                    <div>
                                                        <input type="text" class="form-control" name="nome_emerg" id="nome_emerg" value="{{$dados[0]->nome_emerg}}" required />

                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                        <div class="row">
                                            <div class="col-sm-3">
                                                <div class="form-group">
                                                    <label for="estado_civil"><span class="small">Estado civil</span> <span class="text-danger">*</span> </label>
                                                    <div>
                                                        <select class="form-control custom-select select2" name="estado_civil" id="estado_civil" required>
                                                            <option value="{{$dados[0]->estado_civil}}"> {{$dados[0]->estado_civil}}</option>
                                                            <option value="Solteiro">Solteiro(a)</option>
                                                            <option value="Casado">Casado(a)</option>
                                                            <option value="Divorciado">Divorciado(a)</option>
                                                            <option value="Viuvo">Viuvo(a)</option>
                                                        </select>
                                                    </div>
                                                </div>

                                            </div>


                                            <div class="col-sm-3">
                                                <div class="form-group">
                                                    <label for="nacionalidade"><span class="small">Nacionalidade</span> <span class="text-danger">*</span> </label>
                                                    <div>
                                                        <input type="text" class="form-control" name="nacionalidade" id="nacionalidade" value="{{$dados[0]->nacionalidade}}" required />
                                                    </div>
                                                </div>

                                            </div>
                                            <div class="col-sm-3">
                                                <div class="form-group">
                                                    <label for="local_nascimento"><span class="small">Local de nascimento</span><span class="text-danger">*</span> </label>
                                                    <div>
                                                        <input type="text" class="form-control" name="local_nascimento" id="local_nascimento" value="{{$dados[0]->local_nascimento}}" />

                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-3">
                                                <input type="hidden" class="form-control" name="conjuge_antigo" value="{{$dados[0]->nome_conjuge}}">
                                                <div class="form-group" id="conjuge">
                                                    <label for="conjuge"><span class="small">Nome do conjuge</span></label>
                                                    <div>
                                                        <input type="text" class="form-control" name="conjuge" placeholder="Digite nome do conjuge" onfocus="this.placeholder = ''" onblur="this.placeholder='Digite nome do conjuge'" />

                                                    </div>
                                                </div>

                                            </div>

                                        </div>



                                    </div>
                                    <div class="tab-pane" id="tab13">
                                        <div class="row">
                                            <div class="col-sm-3">
                                                <div class="form-group">
                                                    <label for="contato_prof"><span class="small">Contato profissional</span> <span class="text-danger">*</span></label>
                                                    <div>
                                                        <input type="text" class="form-control" name="contato_prof" id="contato_prof" value="{{$dados[0]->contato_prof}}" required />
                                                    </div>
                                                </div>

                                            </div>
                                            <div class="col-sm-3">
                                                <div class="form-group">
                                                    <label for="email_prof><span class=" small">Email profissional </span> <span class="text-danger">*</span> </label>
                                                    <div>
                                                        <input type="email" class="form-control" name="email_prof" id="email_prof" value="{{$dados[0]->email_prof}}" required />
                                                    </div>
                                                </div>

                                            </div>
                                            <div class="col-sm-3">
                                                <div class="form-group">
                                                    <label for="funcao"><span class="small">Função/Cargo</span> <span class="text-danger">*</span></label>
                                                    <div>
                                                        <select class="form-control custom-select select2" name="funcao" id="funcao" required>
                                                            <option value="{{$cargoDados[0]->funcao}}"> {{$cargoDados[0]->nome_cargo}}</option>
                                                            @foreach ($cargosList as $service)
                                                            <option value="{{$service->id}}" data-price="{{$service->grupo_funcional}}">{{$service->nome_cargo}}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>


                                                </div>
                                            </div>
                                            <div class="col-sm-3">
                                                <div class="form-group">
                                                    <label for="grupo_funcional"><span class="small">Grupo funcional</span> <span class="text-danger">*</span></label>
                                                    <div>
                                                        <input class="form-control" type="text" id="grupo" name="grupo" value="" placeholder="Auto grupo funcional" readonly>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-sm-3">
                                                <div class="form-group">
                                                    <label for="categoria"><span class="small">Categoria </span> <span class="text-danger">*</span> </label>
                                                    <div>
                                                        <select class="form-control custom-select select2" name="categoria" id="categoria" required>
                                                            <option value="{{$dados[0]->categoria}}"> {{$dados[0]->categoria}}</option>
                                                            <option value="Quadros de Gestão">Quadros de Gestão</option>
                                                            <option value="Quadros Qualificados">Quadros Qualificados</option>
                                                            <option value="Quadros Altamente Qualificados">Quadros Altamente Qualificados</option>
                                                            <option value="Quadros de Apoio">Quadros de Apoio</option>
                                                            <option value="Quadros Auxiliares">Quadros Auxiliares</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-3">
                                                <div class="form-group">
                                                    <label for="reporte"><span class="small">Reporte hierárquico</span></label>
                                                    <div>
                                                        <select class="form-control custom-select select2" name="reporte" id="reporte">
                                                            <option value="{{$dados[0]->reporte}}">{{$dados[0]->reporte}}</option>
                                                            <option value="Reporte 1">Reporte 1</option>
                                                            <option value="Reporte 2">Reporte 2</option>
                                                            <option value="Reporte 3">reporte 3</option>
                                                            <option value="Reporte 4">Reporte 4</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-3">
                                                <div class="form-group">
                                                    <label for="turno"><span class="small">Horário/Turno</span> <span class="text-danger">*</span></label>
                                                    <div>
                                                        <select class="form-control custom-select select2" name="turno" id="turno" required>
                                                            <option value="{{$dados[0]->turno}}">{{$dados[0]->turno}}</option>
                                                            @foreach ($turnosList as $items )
                                                            <option value="{{$items->nome_turno}}">{{$items->nome_turno}}</option>
                                                            @endforeach

                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-3">
                                                <div class="form-group">
                                                    <label for="tipo_contrato"><span class="small">Tipo de contrato</span> <span class="text-danger">*</span> </label>
                                                    <div>
                                                        <select class="form-control custom-select select2" name="tipo_contrato" id="tipo_contrato" required>
                                                            <option value="{{$dados[0]->tipo_contrato}}"> {{$dados[0]->tipo_contrato}} </option>
                                                            @foreach ($tipoContratosList as $items )
                                                            <option value="{{$items->tipo_contrato}}">{{$items->tipo_contrato}}</option>
                                                            @endforeach

                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-sm-3">
                                                <div class="form-group">
                                                    <label for="departamento"><span class="small">Departamento </span> <span class="text-danger">*</span> </label>
                                                    <div>
                                                        <select class="form-control custom-select select2" name="departamento" id="departamento" required>
                                                            <option value="{{$dados[0]->departamento}}"> {{$dados[0]->departamento}} </option>
                                                            @foreach ($departamentosList as $items )
                                                            <option value="{{$items->nome_departamento}}">{{$items->nome_departamento}}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-3">
                                                <div class="form-group">
                                                    <label for="data_vigor"><span class="small">Data de entrada em vigor</span> <span class="text-danger">*</span></label>
                                                    <div>
                                                        <input class="form-control" type="datetime-local" name="data_vigor" id="data_vigor" value="{{$dados[0]->data_vigor}}" required />

                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-sm-3">
                                                <input type="hidden" class="form-control" name="prazo_antigo" value="{{$dados[0]->prazo}}">

                                                <div class="form-group" id="prazo">
                                                    <label for="prazo"><span class="small">Prazo</span></label>
                                                    <div>
                                                        <input type="text" class="form-control" name="prazo" placeholder="Digite o prazo  do contrato" onfocus="this.placeholder = ''" onblur="this.placeholder='Digite o prazo se o contrato for a prazo'">
                                                    </div>
                                                </div>
                                            </div>

                                        </div>


                                    </div>
                                    <div class="tab-pane" id="tab14">


                                        <div class="row">
                                            <div class="col-sm-3">
                                                <div class="form-group">
                                                    <label for="doencas"><span class="small">Possui doenças crónicas e de risco</span></label>
                                                    <div>
                                                        <select class="form-control custom-select select2" name="doencas" id="doencas">
                                                            <option value="{{$dados[0]->doencas_cronicas}}">
                                                                @if(empty($dados[0]->doencas_cronicas))
                                                                Não
                                                                @else
                                                                {{$dados[0]->doencas_cronicas}}

                                                                @endif
                                                            </option>
                                                            <option value="Sim">Sim</option>
                                                            <option value="Não">Não</option>
                                                        </select>
                                                    </div>

                                                </div>

                                            </div>
                                            <div class="col-sm-3">
                                                <div class="form-group">
                                                    <label for="deficiencias"><span class="small">Possui deficiências e alergias</span> </label>
                                                    <div>
                                                        <select class="form-control custom-select select2" name="deficiencias" id="deficiencias">

                                                            <option value="{{$dados[0]->deficiencias_alergias}}">
                                                                @if(empty($dados[0]->deficiencias_alergias))
                                                                Não
                                                                @else
                                                                {{$dados[0]->deficiencias_alergias}}
                                                                @endif
                                                            </option>

                                                            </option>
                                                            <option value="Sim">Sim</option>
                                                            <option value="Não">Não</option>
                                                        </select>

                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-3">
                                                <div class="form-group">
                                                    <label for="grau"><span class="small">Grau de deficiência</span> </label>
                                                    <div>
                                                        <select class="form-control custom-select select2" name="grau" id="grau">
                                                            <option value="{{$dados[0]->grau_deficiencia}}">
                                                                @if(empty($dados[0]->grau_deficiencia))
                                                                Nenhum
                                                                @else
                                                                {{$dados[0]->deficiencias_alergias}}
                                                                @endif
                                                            </option>

                                                            <option value="Baixo">Baixo</option>
                                                            <option value="Médio">Médio</option>
                                                            <option value="Alto">Alto</option>
                                                            <option value="Nenhum">Nenhum</option>
                                                        </select>

                                                    </div>
                                                </div>

                                            </div>
                                            <div class="col-sm-3">
                                                <div class="form-group">
                                                    <label for="outros"><span class="small">Outros</span> </label>
                                                    <div>
                                                        <select class="form-control custom-select select2" name="outros" id="outros">

                                                            <option value="{{$dados[0]->outros}}">
                                                                @if(empty($dados[0]->outros))
                                                                Nenhum
                                                                @else
                                                                {{$dados[0]->deficiencias_alergias}}
                                                                @endif
                                                            </option>

                                                            <option value="Baixo">Baixo</option>
                                                            <option value="Médio">Médio</option>
                                                            <option value="Alto">Alto</option>
                                                            <option value="Nenhum">Nenhum</option>
                                                        </select>

                                                    </div>
                                                </div>

                                            </div>


                                        </div>


                                        <div class="row">
                                            <div class="col-sm-3">
                                                <div class="form-group">
                                                    <label for="nome_dependente"><span class="small">Nome do dependente</span></label>
                                                    <div>
                                                        <input type="text" class="form-control" name="nome_dependente" id="nome_dependente" value="{{$dados[0]->nome_dependente}}" />
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-3">
                                                <div class="form-group">
                                                    <label for="data_dependente"><span class="small">Data de nascimento do dependente</span> </label>
                                                    <div>
                                                        <input class="form-contro" type="datetime-local" name="data_dependente" id="data_dependente" value="{{$dados[0]->datanasc_dependente}}" />
                                                    </div>
                                                </div>
                                            </div>


                                        </div>

                                    </div>


                                </div>

                            </div>
                        </div>

                        <div class="modal-footer">
                            <a href="{{route('listar/funcionarios')}}" class="btn btn-secondary btn-sm">
                                <i class="fe fe-arrow-left-circle"></i> Voltar
                            </a>
                            <button class="btn btn-indigo btn-sm" type="submit"> <i class="fe fe-save"></i> Salvar</button>

                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- /Row -->

</div>
</div>



@section('scripts')
<script type="text/javascript">
    config = {
        altInput: true
        , altFormat: "F j, Y"
        , dateFormat: "Y-m-d"
    , }

    flatpickr("input[type=datetime-local]", config);

</script>

{{-- script para habilitar o campo de prazo se o tipo de contrato for a prazo --}}
<script>
    $(function() {
        $('#tipo_contrato').val($('#tipo_contrato option:selected').val());
        $('#prazo').hide();
        $('#tipo_contrato').bind('change', function() {
            $('#prazo').val($('#tipo_contrato option:selected').text());
            if ($('#tipo_contrato option:selected').text() == "Contrato de trabalho a prazo")
                $('#prazo').show();
            else $('#prazo').hide();
        });
    });

</script>

{{-- script para habilitar o campo de nome de conjuge se o estado civil for casado(a) --}}
<script>
    $(function() {
        $('#estado_civil').val($('#estado_civil option:selected').val());
        $('#conjuge').hide();
        $('#estado_civil').bind('change', function() {
            $('#conjuge').val($('#estado_civil option:selected').text());
            if ($('#estado_civil option:selected').text() == "Casado(a)")
                $('#conjuge').show();
            else $('#conjuge').hide();
        });
    });

</script>



<script type="text/javascript">
    $('#fotografia').change(function() {

        let reader = new FileReader();

        reader.onload = (e) => {

            $('#preview-image').attr('src', e.target.result);
        }

        reader.readAsDataURL(this.files[0]);

    });

</script>

<script>
    $('#funcao').on('change', function() {
        var price = $(this).children('option:selected').data('price');
        $('#grupo').val(price);
    });

</script>

<!-- alert blink text -->
<script>
    function blink_text() {
        $('#message_error').fadeOut(700);
        $('#message_error').fadeIn(700);
    }
    setInterval(blink_text, 1000);

</script>
<!-- script validate form -->
<script>
    $('#validate').validate({
        reles: {
            'nome_completo': {
                required: true
            , }
            , 'sexo': {
                required: true
            , }
            , 'data_nascimento': {
                required: true
            , }
            , 'contato': {
                required: true
            , }
            , 'endereco': {
                required: true
            , }

            , 'estado_civil': {
                required: true
            , }
            , 'nacioalidade': {
                required: true
            , }

            , 'numero_documento': {
                required: true
            , }
            , 'data_emissao': {
                required: true
            , }
            , 'data_validade': {
                required: true
            , }
            , 'data_vigor': {
                required: true
            , }

            , 'nuit': {
                required: true
            , }
            , 'nib': {
                required: true
            , }
            , 'contato_emerg': {
                required: true
            , }
            , 'nome_emerg': {
                required: true
            , }

            , 'contato_prof': {
                required: true
            , }
            , 'email_prof': {
                required: true
            , }
            , 'nivel[]': {
                required: true
            , }
            , 'especializacao[]': {
                required: true
            , }
            , 'instituicao[]': {
                required: true
            , }
            , 'periodo[]': {
                required: true
            , }

        , }
        , messages: {
            'nivel[]': "Campo requerido*"
            , 'especializacao[]': "Campo requerido*"
            , 'instituicao[]': "Campo requerido*"
            , 'periodo[]': "Campo requerido*"
            , 'nome_completo': "Campo requerido*"
            , 'sexo': "Campo requerido*"
            , 'data_nascimento': "Campo requerido*"
            , 'contato': "Campo requerido*"
            , 'endereco': "Campo requerido*"
            , 'provincia': "Campo requerido*"
            , 'nacionalidade': "Campo requerido*"
            , 'numero_documento': "Campo requerido*"
            , 'data_emissao': "Campo requerido*"
            , 'data_validade': "Campo requerido*"
            , 'nuit': "Campo requerido*"
            , 'nib': "Campo requerido*"
            , 'contato_emeg': "Campo requerido*"
            , 'nome_emerg': "Campo requerido*"
            , 'contato_prof': "Campo requerido*"
            , 'email_prof': "Campo requerido*"
            , 
        , }
    , });

</script>



@endsection

@endsection
