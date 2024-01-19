@extends('dashboards.admin.layouts.admin-dash')
@section('title', 'Realiazar avaliação')

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
                    <li class="breadcrumb-item"><a href="#"><i class="fe fe-users mr-2 fs-14"></i>Avaliação de desempenho</a></li>
                    <li class="breadcrumb-item active" aria-current="page"><a href="#">Cadastro</a></li>
                </ol>
            </div>
            <div class="page-rightheader">
                <div class="btn btn-list">
                    <a href="{{route('admin/novo/usuario')}}" class="btn btn-blue btn-sm"><i class="mdi mdi-account-plus mr-1"></i> Criar novo </a>
                    <a href="{{route('admin/grelha/usuario')}}" class="btn btn-red btn-sm"><i class="mdi mdi-apps mr-1"></i> Lista grelha </a>
                    <a href="{{route('admin/listar/usuario')}}" class="btn btn-warning btn-sm"><i class="fe fe-align-justify mr-1"></i> Lista Simples </a>
                    <a href="{{route('admin/logs/usuario')}}" class="btn btn-dark btn-sm"><i class="fe fe-align-justify mr-1"></i> Logs de usuários </a>
                </div>
            </div>
        </div>
        <!--End Page header-->

        <!-- Row -->
        <div class="row">
            <div class="col-lg-12 col-xl-12 col-md-12 col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title"><i class="fe fe-plus-circle"></i> Cadastro de avaliação</h4>
                    </div>
                    <div class="card-body">
                        <form action="{{route('form/avaliacao/save')}}" method="POST" id="form">
                            @csrf

                            <div class="form-group row">
                                <div class="col-md-3">
                                    <label class="form-label"><span class="small">Tipo de serviço</span></label>
                                    <select id="service_id" name="service_id" class="form-control select2">
                                        <option disabled selected>Select a service...</option>
                                        <option value="1" data-price="Semestral Semestral ">Semestral</option>
                                        <option value="2" data-price="Anual Semestral">Anual</option>
                                        <option value="3" data-price="Quinzenal Semestral">Quinzenal</option>
                                        <option value="4" data-price="Mensal Semestral">Mensal</option>
                                        <option value="5" data-price="Semanal Semestral">Semanal</option>
                                        <option value="6" data-price="Diário Semestral">Diário</option>
                                    </select>


                                </div>

                                <div class="col-md-3">
                                    <label class="form-label" for="example-email"><span class="small">Cargo</span></label>
                                    <input name="base_cost" id="base_cost" type="text" value="" class="form-control" readonly>
                                </div>
                            </div>
                            <div class="form-group mb-0 mt-4 row justify-content-end">
                                <div class="col-md-7">
                                </div>
                                <div class="col-md-4">
                                    <button type="submit" class="btn btn-info float-right btn-sm mr-3"><i class="fe fe-save"></i>&nbsp;Salvar</button>
                                    <a href="{{route('listar/avaliacoes')}}" class="btn btn-danger float-right btn-sm  mr-2"> <i class="fe fe-arrow-left-circle"></i> Voltar</a>
                                </div>
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
<script>
    $('#service_id').on('change', function() {
        var price = $(this).children('option:selected').data('price');
        $('#base_cost').val(price);
    });

</script>
@endsection


@endsection
