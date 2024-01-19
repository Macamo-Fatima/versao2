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
                    <span class="font-weight-bold"><i class="fe fe-database"></i> Colaboradores</span>
                    <div aria-label="Basic example" class="btn-group" role="group">
                        <a href="{{route('listar/funcionarios')}}" class="btn btn-blue btn-sm"><i class="fe fe-arrow-left-circle mr-1"></i> Voltar </a>
                        <a href="{{route('gridView/funcionarios')}}" class="btn btn-secondary btn-sm"><i class="mdi mdi-apps mr-1"></i> Lista grelha </a>
                        <a href="{{route('listar/funcionarios')}}" class="btn btn-dark btn-sm"><i class="fe fe-align-justify mr-1"></i> Lista Simples </a>
                    </div>

                </div>

                <div class="card-body">
                    <form action="{{route('form/funcionario/save')}}" method="POST" enctype="multipart/form-data">
                        @csrf
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
                                                        <input type="text" class="form-control" name="nome_completo" id="nome_completo" placeholder="Nome completo" onfocus="
                                                 this.placeholder=''" onblur="this.placeholder='Nome completo'" required />
                                                    </div>
                                                </div>

                                            </div>
                                            <div class="col-sm-3">
                                                <div class="form-group">
                                                    <label class="form-label" for="sexo"><span class="small">Sexo</span> <span class="text-danger">*</span></label>
                                                    <select class="form-control custom-select select2" name="sexo" id="sexo" required>
                                                        <option value="">Seleciona o sexo</option>
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
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                        <div id="dynamic_field">
                                            <div class="row">
                                                <div class="col-sm-3">
                                                    <div class="form-group">
                                                        <label for="nive"><span class="small">Nível acadêmico </span><span class="text-danger">*</span> </label>
                                                        <div>
                                                            <select class="form-control custom-select select2" name="nivel[]" id="nive" required>
                                                                <option value="" class="minimize"><span class="small">Seleciona o nível</span></option>
                                                                <option value="Técnico médio">Técnico médio</option>
                                                                <option value="Técnico superior">Técnico superior</option>
                                                                <option value="Licenciatura">Licenciatura</option>
                                                                <option value="Mestrado">Mestrado</option>
                                                                <option value="MBA">MBA</option>
                                                                <option value="Pós-graduação">Pós-graduação</option>
                                                                <option value="Doutoramento">Doutoramento</option>
                                                                {{-- <option value="Outro">Outro</option> --}}
                                                            </select>
                                                        </div>
                                                    </div>

                                                </div>
                                                <div class="col-sm-3">
                                                    <div class="form-group">
                                                        <label for="especializacao"><span class="small">Área de especialização</span><span class="text-danger">*</span> </label>
                                                        <div>
                                                            <input type="text" class="form-control" name="especializacao[]" id="especializacao" placeholder="Especialização" onfocus="
                                                                  this.placeholder=''" onblur="this.placeholder='Especialização'" required />
                                                        </div>
                                                    </div>

                                                </div>

                                                <div class="col-sm-3">
                                                    <div class="form-group">
                                                        <label class="form-label"><span class="small">Instituição de formação</span> <span class="text-danger">*</span></label>
                                                        <select class="form-control custom-select select2" name="instituicao[]" id="instituica" required>
                                                            <option value=""><span class="small"> Seleciona a instituição</span></option>
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
                                                            {{-- <optgroup label="Outro Ensino">
                                                                <option value="Outro">Outra</option>
                                                            </optgroup> --}}
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-sm-2">
                                                    <div class="form-group">
                                                        <label for="periodo"><span class="small">Ano de início e conclusão</span> <span class="text-danger">*</span> </label>
                                                        <div>
                                                            <input type="text" class="form-control" name="periodo[]" id="periodo" placeholder="Início e conclusão" onfocus="
                                                                  this.placeholder=''" onblur="this.placeholder='Início e conclusão'" required />
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-sm-1">
                                                    <div class="form-group  float-end">
                                                        <label for="grauacademico"></label><br>
                                                        <td><button type="button" name="add" id="add" class="btn btn-primary  mt-2"><i class="fa fa-plus-circle"></i></button></td>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div id="dynamic_field3">
                                            <div class="row">
                                                <div class="col-sm-11">
                                                    <div class="form-group">
                                                        <label for="especificacao"><span class="small">Especificação</span></label>
                                                        <input type="text" class="form-control" name="especificacao[]" id="especificacao" placeholder="Formação profissional" onfocus="
                                                 this.placeholder=''" onblur="this.placeholder='Formação profissional'" />
                                                    </div>
                                                </div>
                                                <div class="col-sm-1">
                                                    <div class="form-group  float-end">
                                                        <label for="especificacao"></label><br>
                                                        <td><button type="button" name="add" id="add3" class="btn btn-primary mt-2"><i class="fa fa-plus-circle"></i></button></td>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>

                                        <div class="row mb-0">
                                            <div class="col-sm-4">
                                                <div class="form-group">
                                                    <img id="preview-image" style="padding: 10px; max-width: 180px;  max-height: 350px">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane" id="tab12">
                                        <div class="row">
                                            <div class="col-sm-3">
                                                <div class="form-group">
                                                    <label for="data_nascimento"><span class="small">Data de nascimento</span> <span class="text-danger">*</span> </label>
                                                    <div>
                                                        <input type="datetime-local" class="form-control" name="data_nascimento" id="data_nascimento" placeholder="Seleciona a data" onfocus="
                                                 this.placeholder=''" onblur="this.placeholder='Seleciona a data'" required />
                                                    </div>
                                                </div>

                                            </div>
                                            <div class="col-sm-3">
                                                <div class="form-group">
                                                    <label for="contato"><span class="small">Contato pessoal</span> <span class="text-danger">*</span> </label>
                                                    <div>
                                                        <input type="text" class="form-control form-control-text-sm" name="contato" id="contato" placeholder="Contato pessoal" onfocus="
                                                 this.placeholder=''" onblur="this.placeholder='Contato pessoal'" required />
                                                    </div>
                                                </div>

                                            </div>
                                            <div class="col-sm-3">
                                                <div class="form-group">
                                                    <label for="endereco"><span class="small">Endereço físico</span> <span class="text-danger">*</span> </label>
                                                    <div>
                                                        <input type="text" class="form-control form-control-text-sm" name="endereco" id="endereco" placeholder="Endereço físico" onfocus="
                                                 this.placeholder=''" onblur="this.placeholder='Endereço físico'" required />
                                                    </div>
                                                </div>

                                            </div>


                                            <div class="col-sm-3">
                                                <div class="form-group">
                                                    <label class="form-label"><span class="small">Província</span> <span class="text-danger">*</span></label>
                                                    <select class="form-control custom-select select2" name="provincia" id="provincia" required>
                                                        <option value="">Seleciona a província</option>
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
                                                            <option value="">Tipo de documento</option>
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
                                                        <input type="text" class="form-control form-control-text-sm" name="numero_documento" id="numero_documento" placeholder="Nº do documento" onfocus="

                                                 this.placeholder=''" onblur="this.placeholder='Nº do documento'" required />

                                                    </div>
                                                </div>

                                            </div>

                                            <div class="col-sm-3">
                                                <div class="form-group">
                                                    <label for="data_emissao"><span class="small">Data de emissão</span> <span class="text-danger">*</span> </label>
                                                    <div>
                                                        <input type="datetime-local" class="form-control" name="data_emissao" id="data_emissao" placeholder="Seleciona a data" onfocus="
                                                 this.placeholder=''" onblur="this.placeholder='Seleciona a data'" required />
                                                    </div>
                                                </div>

                                            </div>
                                            <div class="col-sm-3">
                                                <div class="form-group">
                                                    <label for="data_validade"><span class="small">Data de validade</span> <span class="text-danger">*</span> </label>
                                                    <div>
                                                        <input type="datetime-local" class="form-control" name="data_validade" id="data_validade" placeholder="Seleciona a data" onfocus="
                                                 this.placeholder=''" onblur="this.placeholder='Seleciona a data'" required />
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-3">
                                                <div class="form-group" id="nome_documento">
                                                    <label for="nome_documento"><span class="small">Descreve aqui a documento</span> <span class="text-danger">*</span> </label>
                                                    <div>
                                                        <input type="text" class="form-control" name="nome_documento" id="nome_documento" />
                                                    </div>
                                                </div>
                                            </div>
                                        </div>


                                        <div class="row">
                                            <div class="col-sm-3">
                                                <div class="form-group">
                                                    <label for="nuit"><span class="small">NUIT</span> <span class="text-danger">*</span> </label>
                                                    <div>
                                                        <input type="text" class="form-control" name="nuit" id="nuit" placeholder="NUIT" onfocus="
                                                 this.placeholder=''" onblur="this.placeholder='NUIT'" required>

                                                    </div>
                                                </div>

                                            </div>
                                            <div class="col-sm-3">
                                                <div class="form-group">
                                                    <label for="nib"><span class="small">NIB</span> <span class="text-danger">*</span> </label>
                                                    <div>
                                                        <input type="text" class="form-control" name="nib" id="nib" placeholder="NIB" onfocus="

                                                 this.placeholder=''" onblur="this.placeholder='NIB'" required />

                                                    </div>
                                                </div>

                                            </div>
                                            <div class="col-sm-3">
                                                <div class="form-group">
                                                    <label for="contato_emerg"><span class="small">Contato de emergência</span> <span class="text-danger">*</span></label>
                                                    <div>
                                                        <input type="text" class="form-control" name="contato_emerg" id="contato_emerg" placeholder="Contato de emergência" onfocus="
                                                 this.placeholder=''" onblur="this.placeholder='Contato de emergência'" required />
                                                    </div>
                                                </div>

                                            </div>
                                            <div class="col-sm-3">
                                                <div class="form-group">
                                                    <label for="nome_emerg"><span class="small">Nome para emergência</span> <span class="text-danger">*</span> </label>
                                                    <div>
                                                        <input type="text" class="form-control" name="nome_emerg" id="nome_emerg" placeholder="Nome para emergência" onfocus="
                                                 this.placeholder=''" onblur="this.placeholder='Nome para emergência'" required />

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
                                                            <option value=""> Seleciona o estado civil</option>
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
                                                        <input type="text" class="form-control" name="nacionalidade" id="nacionalidade" placeholder="Nacionalidade" onfocus="
                                                 this.placeholder=''" onblur="this.placeholder='Nacionalidade'" required />
                                                    </div>
                                                </div>

                                            </div>
                                            <div class="col-sm-3">
                                                <div class="form-group">
                                                    <label for="local_nascimento"><span class="small">Local de nascimento</span><span class="text-danger">*</span> </label>
                                                    <div>
                                                        <input type="text" class="form-control" name="local_nascimento" id="local_nascimento" placeholder="Local de nascimento" onfocus="
                                                 this.placeholder=''" onblur="this.placeholder='Local de nascimento'" />
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-sm-3">
                                                <div class="form-group" id="conjuge">
                                                    <label for="conjuge"><span class="small">Nome do conjuge</span></label>
                                                    <div>
                                                        <input type="text" class="form-control form-control-text-sm" name="conjuge" placeholder="Conjuge" onfocus="
                                                 this.placeholder=''" onblur="this.placeholder='Conjuge'" />
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
                                                        <input type="text" class="form-control" name="contato_prof" id="contato_prof" placeholder="Contato profissional" onfocus="
                                                 this.placeholder=''" onblur="this.placeholder='Contato profissional'" required />
                                                    </div>
                                                </div>

                                            </div>
                                            <div class="col-sm-3">
                                                <div class="form-group">
                                                    <label for="email_prof><span class=" small">Email profissional </span> <span class="text-danger">*</span> </label>
                                                    <div>
                                                        <input type="email" class="form-control" name="email_prof" id="email_prof" placeholder="Email profissional" onfocus="
                                                 this.placeholder=''" onblur="this.placeholder='Email profissional'" required />
                                                    </div>
                                                </div>

                                            </div>
                                            <div class="col-sm-3">
                                                <div class="form-group">
                                                    <label for="funcao"><span class="small">Função/Cargo</span> <span class="text-danger">*</span></label>
                                                    <div>
                                                        <select class="form-control custom-select select2" name="funcao" id="funcao" required>
                                                            <option value=""> Seleciona a função</option>
                                                            @foreach ($cargosList as $service)
                                                            <option value="{{$service->id}}" data-price="{{$service->grupo_funcional}}">{{$service->nome_cargo}}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>


                                                </div>
                                            </div>
                                            <div class="col-sm-3">
                                                <div class="form-group">
                                                    <label for="grupo"><span class="small">Grupo funcional</span> <span class="text-danger">*</span></label>
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
                                                            <option value=""> Seleciona a categoria</option>
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
                                                            <option value=""> Seleciona o reporte hierárquico</option>
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
                                                            <option value=""> Seleciona o turno</option>
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
                                                            <option value=""> Seleciona o tipo de contrato</option>
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
                                                            <option value=""> Seleciona o departamento</option>
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
                                                        <input class="form-control" name="data_vigor" id="data_vigor" placeholder="Seleciona a data" type="datetime-local" onfocus="
                                                 this.placeholder=''" onblur="this.placeholder='Seleciona a data'" required />

                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-sm-3">
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
                                                            <option value=""> Seleciona</option>
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
                                                            <option value=""> Seleciona</option>
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
                                                            <option value=""> Seleciona</option>
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
                                                            <option value=""> Seleciona</option>
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
                                                <div class="form-group" id="nome_doenca">
                                                    <label for="nome_doenca"><span class="small">Descreve aqui a doença</span> <span class="text-danger">*</span> </label>
                                                    <div>
                                                        <input type="text" class="form-control" name="nome_doenca" id="nome_doenca" />
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-sm-3">
                                                <div class="form-group" id="nome_alergia">
                                                    <label for="nome_alergia"><span class="small">Descreve aqui as alergias</span> <span class="text-danger">*</span> </label>
                                                    <div>
                                                        <input type="text" class="form-control" name="nome_alergia" id="nome_alergia" />
                                                    </div>
                                                </div>
                                            </div>


                                        </div>


                                        <div class="row">
                                            <div class="col-sm-3">
                                                <div class="form-group">
                                                    <label for="nome_dependente"><span class="small">Nome do dependente</span></label>
                                                    <div>
                                                        <input type="text" class="form-control" name="nome_dependente" id="nome_dependente" placeholder="Digite o nome do dependente" onfocus="
                                                 this.placeholder=''" onblur="this.placeholder='Digite o nome do dependente'" />
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-3">
                                                <div class="form-group">
                                                    <label for="data_dependente"><span class="small">Data de nascimento do dependente</span> </label>
                                                    <div>
                                                        <input class="form-control datetimepicker" name="data_dependente" id="data_dependente" placeholder="Seleciona a data" type="datetime-local" onfocus="
                                                 this.placeholder=''" onblur="this.placeholder='Seleciona a data'" />
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

{{-- script para habilitar o campo descricao de doencas qdo sim for selecionado--}}
<script>
    $(function() {
        $('#doencas').val($('#doencas option:selected').val());
        $('#nome_doenca').hide();
        $('#doencas').bind('change', function() {
            $('#nome_doenca').val($('#doencas option:selected').text());
            if ($('#doencas option:selected').text() == "Sim")
                $('#nome_doenca').show();
            else $('#nome_doenca').hide();
        });
    });

</script>

{{-- script para habilitar o campo descricao de alergias qdo sim for selecionado--}}
<script>
    $(function() {
        $('#deficiencias').val($('#deficiencias option:selected').val());
        $('#nome_alergia').hide();
        $('#deficiencias').bind('change', function() {
            $('#nome_alergia').val($('#deficiencias option:selected').text());
            if ($('#deficiencias option:selected').text() == "Sim")
                $('#nome_alergia').show();
            else $('#nome_alergia').hide();
        });
    });

</script>


{{-- script para habilitar o campo outro tipo de doc --}}
<script>
    $(function() {
        $('#tipo_documento').val($('#tipo_documento option:selected').val());
        $('#nome_documento').hide();
        $('#tipo_documento').bind('change', function() {
            $('#nome_documento').val($('#deficiencias option:selected').text());
            if ($('#tipo_documento option:selected').text() == "Outro")
                $('#nome_documento').show();
            else $('#nome_documento').hide();
        });
    });

</script>





{{-- script de inicialização  do calendario --}}
<script type="text/javascript">
    config = {
        altInput: true
        , altFormat: "F j, Y"
        , dateFormat: "Y-m-d"
    , }

    flatpickr("input[type=datetime-local]", config);

</script>

{{-- script para preview de fotografia selecionada --}}
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
    $(document).ready(function() {
        var i = 1;
        $('#add').click(function() {
            i++;
            $('#dynamic_field').append('<div class="row" id="row' + i + '"> <div class="col-sm-3"><div class="form-group"> <label>Nível acadêmico <span class="text-danger">*</span></label><select class="form-control select2" name="nivel[]" id="nivel"> <option value="">Seleciona o nível</option><option value="Técnico médio">Técnico médio</option><option value="Técnico superior">Técnico Superior</option><option value="Licenciatura">Licenciatura</option><option value="Mestrado">Mestrado</option> <option value="MBA">MBA</option> <option value="Pós-graduação">Pós-graduação</option> <option value="Doutoramento">Doutoramento</option> <option value="Outro">Outro</option></select></div></div>  <div class="col-sm-3"> <div class="form-group"> <label><span class="small"> Área de especialização </span> <span class="text-danger">*</span></label><input type="text" class="form-control" name="especializacao[]" placeholder="Digite a especialização"></div></div>    <div class="col-sm-3"><div class="form-group"> <label> <span class="small">Instituição de formação</span> <span class="text-danger">*</span></label><select class="form-control" name="instituicao[]" id="instituicao_f"><option value="">Instituição de formação</option><optgroup label="Ensino Superior"><option value="UEM">UEM-(Universidade Eduardo Mondlane)</option><option value="UniZambze">UZ-(Unizambeze)</option><option value="UniLúrio">UL-(UniLúrio)</option><option value="UCM">UCM-(Universidade Católica de Moçambique)</option><option value="USTM">USTM-(Universidade São Tomás de Moçambique)</option></opgroup><optgroup label="Ensino Técnico Médio"> <option value="Instituto Industrial de Maputo">Instituto Industrial de Maputo</option><option value="Instituto Comercial de Maputo">Instituto Comercial de Maputo</option><option value="Instituto Industrial e Comercial da Beira">Instituto Industrial e Comercial da Beira</option></optgroup><optgroup label="Outro Ensino"> <option value="Outra">Outra</option></optgroup></select></div></div>    <div class="col-sm-2"> <div class="form-group"> <label> <span class="small">Ano de início e conclusão</span> <span class="text-danger">*</span></label> <input type="text" class="form-control" name="periodo[]" placeholder="Início e conclusão" /> </div></div>     <div class="col-sm-1"> <div class="form-group float-end"><label></label><br> <td><button type="button" name="add" class="btn btn-danger btn_remove" id="' + i + '"><i class="fa fa fa-minus-circle"></i></button></td></div>  </div> </div>');
        });
        $(document).on('click', '.btn_remove', function() {
            var button_id = $(this).attr("id");

            $('#row' + button_id + '').remove();
        });

        $('#add3').click(function() {
            i++;
            $('#dynamic_field3').append('<div class="row" id="row3' + i + '"> <div class="col-sm-11"> <div class="form-group">  <label>Especificação</label><input type="text" class="form-control" name="especificacao[]" placeholder="Formação profissional" ></div></div>  <div class="col-sm-1"> <div class="form-group  float-end">  <label></label><br><td><button type="button" name="add"   class="btn btn-danger mt-2 btn_remove3" id="' + i + '"><i class="fas fa fa-minus-circle"></i></button></td> </div> </div> </div>');
        });
        $(document).on('click', '.btn_remove3', function() {
            var button_id = $(this).attr("id");

            $('#row3' + button_id + '').remove();
        });

    });

</script>

{{-- script para auto select de grupo funcional --}}
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
<!-- script validate form// ainda por se implementar -->
<script>
    $('#id_do_formulario').validate({
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
