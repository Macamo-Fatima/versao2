@extends('dashboards.admin.layouts.admin-dash')
@section('title', 'Cadastro de usuários')

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
                    <li class="breadcrumb-item active" aria-current="page"><a href="#">Cadastro</a></li>
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
        <div class="col-lg-12 col-xl-12 col-md-12 col-sm-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <span class="font-weight-bold"><i class="mdi mdi-account-plus mr-1"></i> Cadastro de usuários</span>
                    <div aria-label="Basic example" class="btn-group" role="group">
                        <a href="{{route('admin/grelha/usuario')}}" class="btn btn-red btn-sm"><i class="mdi mdi-apps mr-1"></i> Lista grelha </a>
                        <a href="{{route('admin/listar/usuario')}}" class="btn btn-warning btn-sm"><i class="fe fe-align-justify mr-1"></i> Lista Simples </a>
                        <a href="{{route('admin/logs/usuario')}}" class="btn btn-dark btn-sm"><i class="fe fe-align-justify mr-1"></i> Logs de usuários </a>
                    </div>
                </div>

                <div class="card-body">
                    <form action="{{route('admin/criar/usuario')}}" method="POST" class="form-horizontal" enctype="multipart/form-data" id="form">
                        @csrf
                        <div class="row">
                            <div class="col-lg-6 col-md-12">
                                <div class="form-group">
                                    <div class="col-md-12">
                                        <label class="form-label"><span class="small">Nome</span></label>
                                        <input type="text" class="form-control" name="name" id="name" placeholder="Digite o nome" onfocus="this.placeholder=''" onblur="this.placeholder='Digite o nome'" required data-parsley-pattern="^[a-zA-Z]{3,12}\s([a-zA-Z]{3,12})+$">
                                    </div>
                                </div>

                                {{-- ^[a-zA-Z]{3,40}\s([a-zA-Z]{3,40})+$  equivalente a ^[a-zA-Z]{3,40}(?: +[a-zA-Z]{3,40})+$ --}}


                                <div class="form-group">
                                    <div class="col-md-12">
                                        <label class="form-label" for="example-email"><span class="small">Email</span></label>
                                        <input type="email" id="example-email" name="email" class="form-control" placeholder="Digite o email" onfocus="this.placeholder=''" onblur="this.placeholder='Digite o email'" required data-parsley-type="email">

                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-md-12">
                                        <label class="form-label"><span class="small ">Password</span></label>
                                        <input type="password" class="form-control" name="password" id="password" placeholder="**********" onfocus="this.placeholder=''" onblur="this.placeholder='**********'" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-md-12">
                                        <label class="form-label"><span class="small">Fotografia</span></label>
                                        <input type="file" class="form-control" name="fotografia" id="fotografia">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <img id="preview-image" style="padding: 10px; max-width: 180px;  max-height: 350px">
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-12">
                                <div class="form-group">
                                    <div class="col-md-12">
                                        <label class="form-label"><span class="small">Confirma password</span></label>
                                        <input type="password" class="form-control" name="password_confirmation" name="password_confirm" placeholder="**********" onfocus="this.placeholder=''" onblur="this.placeholder='**********'" required data-parsley-equalto="#password">


                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-md-12">
                                        <label class="form-label"><span class="small">Contato</span></label>
                                        <input class="form-control" type="tel" name="contato" id="contato" placeholder="Digite o contato" onfocus="this.placeholder=''" onblur="this.placeholder='Digite o contato'" required data-parsley-pattern="^(82|83|84|85|86|87)[0-9]{7}$">



                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-md-12">
                                        <label class="form-label"><span class="small">Status</span></label>
                                        <select class="form-control select2" name="status" id="status" required>
                                            <option value="">-- Seleciona o status --</option>
                                            <option value="Activo">Activo</option>
                                            <option value="Desactivo">Desactivo</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group mb-0">
                                    <div class="col-md-12">
                                        <label class="form-label"><span class="small">Nível de acesso</span></label>
                                        <select class="form-control select2" name="role" id="role" required>
                                            <option value="">-- Seleciona o nível de acesso --</option>
                                            <option value="1">Administrador</option>
                                            <option value="2">Recepcionista</option>
                                            <option value="3">Auxiliar</option>
                                            <option value="4">Simples usuário</option>
                                        </select>
                                    </div>
                                </div>


                            </div>
                        </div>
                        <div class="form-group mb-0 mt-4 row justify-content-end">
                            <div class="col-md-7">
                            </div>
                            <div class="col-md-4">
                                <button type="submit" class="btn btn-info float-right btn-sm mr-3"><i class="fe fe-save"></i>&nbsp;Salvar</button>
                                <a href="{{route('admin/listar/usuario')}}" class="btn btn-danger float-right btn-sm  mr-2"> <i class="fe fe-arrow-left-circle"></i> Voltar</a>
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
<script type="text/javascript">
    $('#fotografia').change(function() {

        let reader = new FileReader();

        reader.onload = (e) => {

            $('#preview-image').attr('src', e.target.result);
        }

        reader.readAsDataURL(this.files[0]);

    });

</script>

<script type="text/javascript">
    config = {
        altInput: true
        , altFormat: "F j, Y"
        , dateFormat: "Y-m-d"
    , }

    flatpickr("input[type=datetime-local]", config);

</script>

<script>
    $('#form').parsley();

</script>



@endsection


@endsection
