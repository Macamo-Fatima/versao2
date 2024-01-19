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
                    <span class="font-weight-bold"><i class="mdi mdi-account-multiple"></i> Usuários</span>
                    <div aria-label="Basic example" class="btn-group float-right" role="group">
                        <a href="{{route('admin/novo/usuario')}}" class="btn btn-blue btn-sm"><i class="mdi mdi-account-plus mr-1"></i> Criar novo </a>
                        <a href="{{route('admin/grelha/usuario')}}" class="btn btn-red btn-sm"><i class="mdi mdi-apps mr-1"></i> Lista grelha </a>
                        <a href="{{route('admin/logs/usuario')}}" class="btn btn-dark btn-sm"><i class="fe fe-align-justify mr-1"></i> Logs de usuários </a>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table  text-nowrap  table-striped table-hover table-bordered" id="example2">
                            <thead>
                                <tr>
                                    <th class="wd-15p border-bottom-0">Nome</th>
                                    <th class="wd-15p border-bottom-0">Email</th>
                                    <th class="wd-20p border-bottom-0">Contato</th>
                                    <th class="wd-15p border-bottom-0">Nível de acesso</th>
                                    <th class="wd-10p border-bottom-0">Status</th>
                                    <th class="wd-25p border-bottom-0"></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($usuariosList as $items )

                                <tr style="transition: none !important; transform: none !important;">
                                    <td>{{ $items->name}}</td>
                                    <td>{{ $items->email}}</td>
                                    <td>{{ $items->contato}}</td>
                                    <td>
                                        @if( $items->role == 1)
                                        {{ 'Administrador'}}
                                        @elseif( $items->role == 2)
                                        {{ 'Recepcionista'}}
                                        @elseif( $items->role == 3)
                                        {{ 'Auxiliar'}}
                                        @else
                                        {{ 'Usuário'}}
                                        @endif
                                    </td>
                                    <td>{{ $items->status}}</td>
                                    <td>
                                        <div aria-label="Basic example" class="btn-group float-right" role="group">
                                            <a href="{{ url('admin/editar/usuario/'.$items->id)}}" class="btn btn-primary btn-sm"> <i class="mdi mdi-account-edit"></i>&nbsp;Editar</a>
                                            <a href="{{ url('admin/excluir/usuario/'.$items->id)}}" class="btn btn-danger btn-sm" onclick="return confirm('Tem certeza que deseja excluir este usuário?')"><i class="mdi mdi-account-remove"></i>&nbsp;Excluir</a>

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
