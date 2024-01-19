@extends('dashboards.admin.layouts.admin-dash')
@section('title', 'Painel de usuários')

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
                    <li class="breadcrumb-item"><a href="#"><i class="fe fe-users mr-2 fs-14"></i>Usuários</a></li>
                    <li class="breadcrumb-item"><a href="#"></i>Histórico</a></li>
                    <li class="breadcrumb-item active" aria-current="page"><a href="#">View</a></li>
                </ol>
            </div>
            <div class="page-rightheader">
                {{-- <div class="btn btn-list">
                   <a href="{{route('admin/novo/usuario')}}" class="btn btn-blue btn-sm"><i class="mdi mdi-account-plus mr-1"></i> Criar novo </a>
                <a href="{{route('admin/grelha/usuario')}}" class="btn btn-red btn-sm"><i class="mdi mdi-apps mr-1"></i> Lista grelha </a>
                <a href="{{route('admin/listar/usuario')}}" class="btn btn-warning btn-sm"><i class="fe fe-align-justify mr-1"></i> Lista Simples </a>
                <a href="{{route('admin/logs/usuario')}}" class="btn btn-dark btn-sm"><i class="fe fe-align-justify mr-1"></i> Logs de usuários </a>
            </div> --}}
        </div>
    </div>
    <!--End Page header-->



    <!-- Row -->
    <div class="row">
        <div class="col-12">

            <div class="card">

                <div class="card-header d-flex justify-content-between align-items-center">
                    <span class="font-weight-bold"><i class="mdi mdi-account-multiple mr-1"></i>Histórico de usuários</span>
                    <div aria-label="Basic example" class="btn-group float-right" role="group">
                        <a href="{{route('admin/grelha/usuario')}}" class="btn btn-red btn-sm"><i class="mdi mdi-apps mr-1"></i> Lista grelha </a>
                        <a href="{{route('admin/listar/usuario')}}" class="btn btn-warning btn-sm"><i class="fe fe-align-justify mr-1"></i> Lista Simples </a>
                        <a href="{{route('admin/listar/usuario')}}" class="btn btn-dark btn-sm"><i class="fe fe-arrow-left-circle mr-1"></i> Voltar </a>
                    </div>

                </div>

                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table  text-nowrap  table-striped table-hover table-sm table-bordered" id="example2">
                            <thead>
                                <tr>

                                    <th class="wd-15p border-bottom-0">Nome</th>
                                    <th class="wd-15p border-bottom-0">Email</th>
                                    <th class="wd-20p border-bottom-0">Descrição</th>
                                    <th class="wd-15p border-bottom-0">Dia e hora</th>
                                    <th class="wd-25p border-bottom-0"></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($logsList as $items )
                                <tr>

                                    <td>{{ $items->name}}</td>
                                    <td>{{ $items->email}}</td>
                                    <td>{{ $items->description}}</td>
                                    <td>{{ $items->date_time}}</td>
                                    <td>
                                        <div aria-label="Basic example" class="btn-group float-right" role="group">
                                            <a href="{{ url('admin/excluir/historico/'.$items->id)}}" class="btn btn-danger btn-sm" onclick="return confirm('Tem certeza que deseja excluir este histórico?')"><i class="zmdi zmdi-delete"></i>&nbsp;Excluir</a>
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
    $(document).ready(function() {
        // Quando o botão de exclusão for clicado
        $('#excluirRegistrosBtn').on('click', function() {
            var registrosSelecionados = [];

            // Itera sobre os checkboxes selecionados
            $('.registro-checkbox:checked').each(function() {
                registrosSelecionados.push($(this).val());
            });

            // Verifica se há registros selecionados
            if (registrosSelecionados.length > 0) {
                // Obtém o token CSRF
                var token = $('meta[name="csrf-token"]').attr('content');

                // Envia os IDs dos registros para a rota de exclusão em lote usando AJAX
                $.ajax({
                    url: '/excluir-registros/' + registrosSelecionados.join(',')
                    , type: 'DELETE'
                    , _token: $('meta[name="csrf-token"]').attr('content')

                    , success: function(response) {
                        // Atualiza a página ou executa outras ações após a exclusão
                        location.reload();
                    }
                    , error: function(xhr, status, error) {
                        console.error('Erro ao excluir registros:', error);
                        alert('Erro ao excluir registros. Verifique o console para mais detalhes.');
                    }
                    , complete: function() {
                        console.log('Solicitação AJAX concluída.');
                    }
                });
            } else {
                alert('Selecione pelo menos um registro para excluir.');
            }
        });
    });

</script>








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
