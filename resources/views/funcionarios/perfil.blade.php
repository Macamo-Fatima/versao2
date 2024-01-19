@extends('dashboards.admin.layouts.admin-dash')
@section('title', 'Perfil')

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
                    <li class="breadcrumb-item"><a href="#"><i class="fe fe-users mr-2 fs-14"></i>Colaborador</a></li>
                    <li class="breadcrumb-item active" aria-current="page"><a href="#">View</a></li>
                </ol>
            </div>
            <div class="page-rightheader">
                <div class="btn btn-list">
                    <a href="{{route('novo/funcionario')}}" class="btn btn-blue btn-sm"><i class="mdi mdi-account-plus mr-1"></i> Criar novo </a>
                    <a href="{{route('gridView/funcionarios')}}" class="btn btn-secondary btn-sm"><i class="mdi mdi-apps mr-1"></i> Lista grelha </a>
                    <a href="{{route('listar/funcionarios')}}" class="btn btn-dark btn-sm"><i class="fe fe-align-justify mr-1"></i> Lista Simples </a>
                </div>
            </div>
        </div>
        <!--End Page header-->

        <!-- Row -->
        <div class="row">
            <div class="col-lg-12 col-xl-12 col-md-12 col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Perfil do colaborador</h4>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label class="form-label"><span class="small">Nome completo</span></label>
                                    <div>
                                        <input type="text" class="form-control" value="{{$dados[0]->nome_completo}}" readonly>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label class="form-label" for="example-email"><span class="small">Sexo</span></label>
                                    <div>
                                        <input type="email" id="example-email" name="example-email" class="form-control" value="{{$dados[0]->sexo}}" readonly>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label class="form-label"><span class="small">Data de nascimento</span></label>
                                    <div>
                                        <input type="datetime-local" class="form-control" value="{{$dados[0]->data_nascimento}}" disabled>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label class="form-label"><span class="small">Contato pessoal</span></label>
                                    <div>
                                        <input type="text" class="form-control" value="{{$dados[0]->contato_pessoal}}" readonly>
                                    </div>
                                </div>
                            </div>
                        </div>


                        <div class="row">
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label class="form-label"><span class="small">Endereço físico</span></label>
                                    <input type="text" class="form-control" value="{{$dados[0]->endereco_fisico}}" readonly>
                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="form-group">
                                    <label class="form-label"><span class="small">Província</span></label>
                                    <input type="text" class="form-control" readonly="" value="{{$dados[0]->provincia}}">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label class="form-label"><span class="small">Estado civil</span></label>
                                    <input type="text" class="form-control" disabled="" value="{{$dados[0]->estado_civil}}">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label class="form-label"><span class="small">Nacionalidade</span></label>
                                    <input type="text" class="form-control" disabled="" value="{{$dados[0]->nacionalidade}}">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label class="form-label"><span class="small">Local de nascimento</span></label>
                                    <input type="text" class="form-control" value="{{$dados[0]->local_nascimento}}" readonly>
                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="form-group">
                                    <label class="form-label"><span class="small">Tipo de documento </label>
                                    <input type="text" class="form-control" readonly="" value="{{$dados[0]->tipo_documento}}">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label class="form-label"><span class="small">Nº do documento</span></label>
                                    <input type="text" class="form-control" disabled="" value="{{$dados[0]->nr_documento}}">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label class="form-label"><span class="small">Data de emissão</span></label>
                                    <input type="datetime-local" class="form-control" disabled="" value="{{$dados[0]->data_emissao}}">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label class="form-label"><span class="small">Válido até</span></label>
                                    <input type="datetime-local" class="form-control" disabled="" value="{{$dados[0]->data_validade}}">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label class="form-label"><span class="small">NUIT</span></label>
                                    <input type="text" class="form-control" value="{{$dados[0]->nuit}}" readonly>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label class="form-label"><span class="small">NIB</label>
                                    <input type="text" class="form-control" readonly="" value="{{$dados[0]->nib}}">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label class="form-label"><span class="small">Contato de emergência</span></label>
                                    <input type="text" class="form-control" disabled="" value="{{$dados[0]->contato_emerg}}">
                                </div>
                            </div>

                        </div>

                        <div class="row">
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label class="form-label"><span class="small">Nome de quem contatar</span></label>
                                    <input type="text" class="form-control" disabled="" value="{{$dados[0]->nome_emerg}}">

                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label class="form-label"><span class="small">Email profissional</span></label>
                                    <input type="text" class="form-control" value="{{$dados[0]->email_prof}}" readonly>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label class="form-label"><span class="small">Contato profissional</label>
                                    <input type="text" class="form-control" readonly="" value="{{$dados[0]->contato_prof}}">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label class="form-label"><span class="small">Função/cargo</span></label>
                                    <input type="text" class="form-control" disabled="" value="{{$cargoDados[0]->nome_cargo}}">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label class="form-label"><span class="small">Nome de quem contatar</span></label>
                                    <input type="text" class="form-control" disabled="" value="{{$dados[0]->nome_emerg}}">

                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label class="form-label"><span class="small">Email profissional</span></label>
                                    <input type="text" class="form-control" value="{{$dados[0]->email_prof}}" readonly>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label class="form-label"><span class="small">Contato profissional</label>
                                    <input type="text" class="form-control" readonly="" value="{{$dados[0]->contato_prof}}">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label class="form-label"><span class="small">Função/cargo</span></label>
                                    <input type="text" class="form-control" disabled="" value="{{$cargoDados[0]->nome_cargo}}">
                                </div>
                            </div>
                        </div>


                        <div class="row">
                            <div class="col-sm-3">
                                <div class="form-group">
                                    <label for="categoria"><span class="small">Categoria </span> <span class="text-danger">*</span> </label>
                                    <div>
                                        <input type="text" class="form-control" disabled="" value="{{$dados[0]->categoria}}">
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-3">
                                <div class="form-group">
                                    <label for="reporte"><span class="small">Reporte hierárquico</span></label>
                                    <div>
                                        <input type="text" class="form-control" disabled="" value="{{$dados[0]->reporte}}">
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-3">
                                <div class="form-group">
                                    <label for="turno"><span class="small">Horário/Turno</span> <span class="text-danger">*</span></label>
                                    <div>
                                        <input type="text" class="form-control" disabled="" value="{{$dados[0]->turno}}">

                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-3">
                                <div class="form-group">
                                    <label for="tipo_contrato"><span class="small">Tipo de contrato</span> <span class="text-danger">*</span> </label>
                                    <div>
                                        <input type="text" class="form-control" disabled="" value="{{$dados[0]->tipo_contrato}}">

                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-sm-3">
                                <div class="form-group">
                                    <label for="departamento"><span class="small">Departamento </span> <span class="text-danger">*</span> </label>
                                    <div>
                                        <input type="text" class="form-control" disabled="" value="{{$dados[0]->departamento}}">

                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-3">
                                <div class="form-group">
                                    <label for="data_vigor"><span class="small">Data de entrada em vigor</span> <span class="text-danger">*</span></label>
                                    <div>
                                        <input class="form-control" type="datetime-local" disabled value="{{$dados[0]->data_vigor}}" required />

                                    </div>
                                </div>
                            </div>
                        </div>


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
@endsection


@endsection
