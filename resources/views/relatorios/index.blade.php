@extends('dashboards.admin.layouts.admin-dash')
@section('title', 'Relatórios')

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
                    <li class="breadcrumb-item"><a href="#"><i class="fe fe-users mr-2 fs-14"></i>Relatórios</a></li>
                    <li class="breadcrumb-item active" aria-current="page"><a href="#">View</a></li>
                </ol>
            </div>
            <div class="page-rightheader">
                {{-- <div class="btn btn-list">
                    <a href="{{route('nova/avaliacao')}}" class="btn btn-blue btn-sm"><i class="zmdi zmdi-assignment mr-1"></i>Nova</a>
                <a href="{{route('listar/avaliacoes')}}" class="btn btn-red btn-sm"><i class="fe fe-align-justify mr-1"></i> Lista Simples </a>

            </div> --}}
        </div>
    </div>
    <!--End Page header-->



    <!-- Row -->
    <div class="row">
        <div class="col-12">

            <div class="card">
                <div class="card-header">

                    <div class="col-sm-12">
                        <span class="font-weight-bold"><i class="zmdi zmdi-print"></i> Avaliações concluidas</span>
                        &nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        &nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        &nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        &nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        &nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        &nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        &nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        &nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

                        &nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        &nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        &nbsp;&nbsp;&nbsp;&nbsp;
                        <div aria-label="Basic example" class="btn-group float-right" role="group">
                            <a href="{{route('nova/avaliacao')}}" class="btn btn-blue btn-sm"><i class="zmdi zmdi-assignment mr-1"></i>Nova</a>
                            <a href="{{route('listar/avaliacoes')}}" class="btn btn-red btn-sm"><i class="fe fe-align-justify mr-1"></i> Lista Simples </a>
                        </div>
                    </div>

                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table  text-nowrap  table-striped table-hover table-bordered" id="example2">
                            <thead>
                                <tr>
                                    <th class="wd-15p border-bottom-0">Nome completo</th>
                                    <th class="wd-15p border-bottom-0">Departamento</th>
                                    <th class="wd-15p border-bottom-0">Função</th>
                                    <th class="wd-15p border-bottom-0">Tipo de avaliação</th>
                                    <th class="wd-15p border-bottom-0">Data da realização</th>
                                    <th class="wd-15p border-bottom-0">Grupo funcional</th>
                                    <th class="wd-15p border-bottom-0">Avaliador</th>
                                    <th class="wd-15p border-bottom-0"></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                      
                                       use Carbon\Carbon;
                                   ?>
                                @foreach ($dados as $items )
                                <tr style="transition: none !important; transform: none !important;">
                                    <td class="nome_completo">{{ $items->nome_completo}}</td>
                                    <td class="departamento">{{ $items->departamento}}</td>
                                    <td class="funcao">{{ $items->nome_cargo}}</td>
                                    <td class="tipo_avaliacao">{{ $items->tipo_avaliacao}}</td>
                                    <td class="data">{{ Carbon::parse($items->data)->format('d-m-Y')}}</td>
                                    <td class="funcao">{{ $items->grupo_funcional}}</td>
                                    <td class="tipo_avaliacao">{{ $items->usuario}}</td>
                                    <td>
                                        <div aria-label="Basic example" class="btn-group float-right" role="group">
                                            <a href="{{ url('form/relatorio/visualizar',['id_avaliacao' => $items->id])}}" class="btn btn-primary btn-sm" target="_blank"> <i class="zmdi zmdi-eye"></i>&nbsp;Visualizar</a>
                                            <a href="{{ url('form/relatorio/download',['id_avaliacao' => $items->id])}}" class="btn btn-secondary btn-sm"><i class="zmdi zmdi-download"></i>&nbsp;Download</a>
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


@section('scripts')
<script>
    $(function() {
        'use strict'

        // Message
        $("#but1").on("click", function(e) {
            $('body').removeClass('timer-alert');
            var message = $("#message").val();
            if (message == "") {
                message = "New Notification from Admitro";
            }
            swal(message);
        });

        // With message and title
        $("#but2").on("click", function(e) {
            $('body').removeClass('timer-alert');
            var message = $("#message").val();
            var title = $("#title").val();
            if (message == "") {
                message = "New Notification from Admitro";
            }
            if (title == "") {
                title = "Notifiaction Styles";
            }
            swal(title, message);
        });

        // Show image
        $("#but3").on("click", function(e) {
            $('body').removeClass('timer-alert');
            var message = $("#message").val();
            var title = $("#title").val();
            if (message == "") {
                message = "New Notification from Admitro";
            }
            if (title == "") {
                title = "Notifiaction Styles";
            }
            swal({
                title: title
                , text: message
                , imageUrl: '../../assets/images/brand/favicon.png'
            });
        });
    })

</script>
@endsection

@endsection
