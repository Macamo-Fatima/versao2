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
                    <a href="{{route('gridView/funcionarios')}}" class="btn btn-secondary btn-sm"><i class="mdi mdi-apps mr-1"></i> Lista grelha </a>
                <a href="{{route('listar/funcionarios')}}" class="btn btn-dark btn-sm"><i class="fe fe-align-justify mr-1"></i> Lista Simples </a>
            </div> --}}
        </div>
    </div>
    <!--End Page header-->

    <!-- Row -->
    <div class="row flex-lg-nowrap">
        <div class="col-12">
            <div class="row flex-lg-nowrap">
                <div class="col-12 mb-3">
                    <div class="e-panel card">
                        <div class="card-body pb-2">
                            <div class="row">
                                <div class="col-6 mb-4">
                                    <div aria-label="Basic example" class="btn-group" role="group">
                                        <a href="{{route('novo/funcionario')}}" class="btn btn-blue btn-sm"><i class="mdi mdi-account-plus mr-1"></i> Criar novo </a>
                                        <a href="{{route('listar/funcionarios')}}" class="btn btn-dark btn-sm"><i class="fe fe-align-justify mr-1"></i> Lista Simples </a>
                                    </div>
                                </div>
                                <div class="col-6 col-auto">
                                    <div class="form-group">
                                        <div class="input-icon">
                                            <span class="input-icon-addon">
                                                <i class="fe fe-search"></i>
                                            </span>
                                            <input type="text" class="form-control" name="search" id="search" placeholder="Pesquisar colaborador">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row" id="users">

                                @foreach ($dados as $items )
                                @php
                                $count = 0;

                                $cargo = DB::table('cargos')
                                ->select('cargos.nome_cargo')
                                ->where('cargos.id', '=', $items->funcao)
                                ->get();
                                @endphp
                                <div class="col-xl-4 col-lg-6 myCard" id="user-{{ $items->id }}">
                                    <div class="card border p-0 shadow-none">
                                        <div class="d-flex align-items-center p-4">
                                            @if($items->fotografia == "")
                                            <div class="avatar avatar-lg brround d-block cover-image" data-image-src="{{URL::to('assets/images/users/7.jpg')}}">
                                            </div>

                                            @else
                                            <div class="avatar avatar-lg brround d-block cover-image" data-image-src=" {{asset('uploads/funcionario/'.$items->fotografia)}}">
                                            </div>
                                            @endif

                                            <div class="wrapper ml-3">
                                                <p class="mb-0 mt-1 text-dark font-weight-semibold">{{ $items->nome_completo}}</p>
                                                <small class="text-muted">
                                                    {{ $cargo[$count]->nome_cargo}}
                                                </small>
                                            </div>
                                            <div class="float-right ml-auto">
                                                <a href="#" class="option-dots" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fe fe-more-vertical fs-18"></i></a>
                                                <div class="dropdown-menu dropdown-menu-right">
                                                    <a class="dropdown-item" href="{{ url('form/funcionario/edit/grid',['id_funcionario' => $items->id, 'id_grau_academico' => $items->id_grau_academico, 'id_especificacao' => $items->id_especificacao, 'funcionario_funcao' => $items->funcao])}}"><i class="mdi mdi-account-convert mr-2"></i> Editar</a>
                                                    <a class="dropdown-item" href="{{ url('form/funcionario/delete/grid',['id_funcionario' => $items->id, 'id_grau_academico' => $items->id_grau_academico, 'id_especificacao' => $items->id_especificacao])}}" onclick="return confirm('Deseja excluir este funcionário?')"><i class="mdi mdi-account-remove mr-2"></i>Excluir</a>

                                                </div>
                                            </div>
                                        </div>
                                        <div class="card-body border-top">
                                            <p class="text-muted">Dep: <span class="small">{{ $items->departamento}}</span></p>
                                            <p class="text-muted">Idade: <span class="small">{{ $items->idade}} anos</span> </p>
                                            <ul class="mb-0 user-details">
                                                <li class="mb-3"><span class="user-icon"><i class="fe fe-mail "></i></span><span class="small">{{ $items->email_prof}}</span></li>
                                                <li><span class="user-icon"><i class="fe fe-phone-call"></i></span><span class="small">{{ $items->contato_prof}}</span></li>
                                            </ul>
                                        </div>
                                        <div class="card-footer">
                                            <a href="{{ url('form/funcionario/edit/grid',['id_funcionario' => $items->id, 'id_grau_academico' => $items->id_grau_academico, 'id_especificacao' => $items->id_especificacao, 'funcionario_funcao' => $items->funcao])}}" class="btn btn-outline-secondary btn-sm"><i class="mdi mdi-account-convert"></i>&nbsp;Editar</a>
                                            <a href="{{url('perfil/funcionario/'.$items->id)}}" class="btn btn-primary float-right btn-sm"><i class="fe fe-user"></i>&nbsp;Ver perfil</a>

                                        </div>
                                    </div>
                                </div>
                                @php $count++; @endphp
                                @endforeach

                            </div>
                            <div class="my-2">
                                {{$dados->links()}}
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

<script>
    $('#form').parsley();

</script>

<script type="text/javascript">
    $(document).ready(function() {
        $('#search').on('input', function() {
            const searchQuery = $(this).val().toLowerCase();

            $('.myCard').each(function() {
                const userName = $(this).find('h3').text().toLowerCase();
                const userNomeUsuario = $(this).find('p:nth-of-type(1)').text().toLowerCase();
                const userNickname = $(this).find('p:nth-of-type(2)').text().toLowerCase();

                if (userName.includes(searchQuery) || userNomeUsuario.includes(searchQuery) || userNickname.includes(searchQuery)) {
                    $(this).show();
                } else {
                    $(this).hide();
                }
            });
        });
    });

</script>


@endsection

@endsection
