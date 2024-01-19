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
                    <li class="breadcrumb-item active" aria-current="page"><a href="#">Edição</a></li>
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
                    <span class="font-weight-bold"><i class="mdi mdi-account-edit"></i> Edição de usuário</span>

                    <div aria-label="Basic example" class="btn-group" role="group">
                        <a href="{{route('admin/grelha/usuario')}}" class="btn btn-red btn-sm"><i class="mdi mdi-apps mr-1"></i> Lista grelha </a>
                        <a href="{{route('admin/listar/usuario')}}" class="btn btn-warning btn-sm"><i class="fe fe-align-justify mr-1"></i> Lista Simples </a>
                        <a href="{{route('admin/logs/usuario')}}" class="btn btn-dark btn-sm"><i class="fe fe-align-justify mr-1"></i> Logs de usuários </a>
                    </div>

                </div>

                <div class="card-body">
                    <form action="{{route('admin/update/usuario')}}" method="POST" class="form-horizontal" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" class="form-control" id="id" name="id" value="{{$usuario[0]->id}}">
                        <div class="row">
                            <div class="col-lg-6 col-md-12">
                                <div class="form-group">
                                    <div class="col-md-12">
                                        <label class="form-label"><span class="small">Nome</span></label>
                                        <input type="text" class="form-control" name="name" id="name" value="{{$usuario[0]->name}}">

                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-md-12">
                                        <label class="form-label" for="example-email"><span class="small">Email</span></label>
                                        <input type="email" id="example-email" name="email" class="form-control" value="{{$usuario[0]->email}}">

                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-md-12">
                                        <label class="form-label"><span class="small">Fotografia</span></label>
                                        <input type="file" class="form-control" name="fotografia" id="fotografia">
                                        <input type="hidden" class="form-control form-control-sm" value="{{$usuario[0]->fotografia}}" name="fotografia_antiga" id="fotografia_antiga">
                                    </div>
                                </div>
                                @if($usuario[0]->fotografia != "" )
                                <div class="form-group mt-5">
                                    <img src="{{asset('uploads/usuario/'.$usuario[0]->fotografia)}}" style="padding: 10px; max-width: 180px;  max-height: 350px">
                                </div>
                                @endif
                            </div>
                            <div class="col-lg-6 col-md-12">

                                <div class="form-group">
                                    <div class="col-md-12">
                                        <label class="form-label"><span class="smal">Contato</span></label>
                                        <input class="form-control" type="tel" name="contato" id="contato" value="{{$usuario[0]->contato}}">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-md-12">
                                        <label class="form-label"><span class="small">Status</span></label>
                                        <select class="form-control select2" name="status" id="status">
                                            <option value="{{$usuario[0]->status}}">{{$usuario[0]->status}}</option>
                                            <option value="Activo">Activo</option>
                                            <option value="Desactivo">Desactivo</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-md-12">
                                        <label class="form-label"><span class="small">Nível de acesso</span></label>
                                        <select class="form-control select2" name="role" id="role">
                                            <option value="{{$usuario[0]->role}}">
                                                @if( $usuario[0]->role == 1)
                                                {{ 'Administrador'}}
                                                @elseif( $usuario[0]->role == 2)
                                                {{ 'Recepcionista'}}
                                                @elseif( $usuario[0]->role == 3)
                                                {{ 'Auxiliar'}}
                                                @else
                                                {{ 'Simples Usuário'}}
                                                @endif
                                            </option>
                                            <option value="1">Administrador</option>
                                            <option value="2">Recepcionista</option>
                                            <option value="3">Auxiliar</option>
                                            <option value="4">Simples usuário</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group mt-5 row justify-content-end">
                                    <div class="col-md-4">
                                    </div>
                                    <div class="col-md-5">
                                        <img id="preview-image" class="float-right" style="padding: 10px; max-width: 180px;  max-height: 350px">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group mb-0 mt-4 row justify-content-end">
                            <div class="col-md-7">
                            </div>
                            <div class="col-md-4">
                                <button type="submit" class="btn btn-info float-right btn-sm mr-3"><i class="fe fe-refresh-cw"></i>&nbsp;Salvar</button>
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

@endsection


@endsection
