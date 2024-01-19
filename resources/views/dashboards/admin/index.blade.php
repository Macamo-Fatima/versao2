@extends('dashboards.admin.layouts.admin-dash')
@section('title', 'Painel principal')

@section('content')
<div class="app-content main-content">
    <div class="side-app">

        <!--app header-->
        <div class="app-header header top-header">
            <div class="container-fluid">
                <div class="d-flex">
                    <a class="header-brand brand-5" href="index.html">
                        <img src="{{URL::to('assets/images/brand/logo.png') }}" class="header-brand-img desktop-lgo" alt="Admitro logo">
                        <img src="{{URL::to('assets/images/brand/logo1.png') }}" class="header-brand-img dark-logo" alt="Admitro logo">
                        <img src="{{URL::to('assets/images/brand/favicon.png') }}" class="header-brand-img mobile-logo" alt="Admitro logo">
                        <img src="{{URL::to('assets/images/brand/favicon1.png') }}" class="header-brand-img darkmobile-logo" alt="Admitro logo">
                    </a>
                    <div class="app-sidebar__toggle" data-toggle="sidebar">
                        <a class="open-toggle" href="#">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-align-left header-icon mt-1">
                                <line x1="17" y1="10" x2="3" y2="10"></line>
                                <line x1="21" y1="6" x2="3" y2="6"></line>
                                <line x1="21" y1="14" x2="3" y2="14"></line>
                                <line x1="17" y1="18" x2="3" y2="18"></line>
                            </svg>
                        </a>
                    </div>
                    <div class="mt-1">
                        <form class="form-inline">
                            <div class="search-element">
                                <input type="search" class="form-control header-search" placeholder="Search…" aria-label="Search" tabindex="1">
                                <button class="btn btn-primary-color" type="submit">
                                    <svg class="header-icon search-icon" x="1008" y="1248" viewBox="0 0 24 24" height="100%" width="100%" preserveAspectRatio="xMidYMid meet" focusable="false">
                                        <path d="M0 0h24v24H0V0z" fill="none" />
                                        <path d="M15.5 14h-.79l-.28-.27C15.41 12.59 16 11.11 16 9.5 16 5.91 13.09 3 9.5 3S3 5.91 3 9.5 5.91 16 9.5 16c1.61 0 3.09-.59 4.23-1.57l.27.28v.79l5 4.99L20.49 19l-4.99-5zm-6 0C7.01 14 5 11.99 5 9.5S7.01 5 9.5 5 14 7.01 14 9.5 11.99 14 9.5 14z" />
                                    </svg>
                                </button>
                            </div>
                        </form>
                    </div><!-- SEARCH -->
                    <div class="d-flex order-lg-2 ml-auto">
                        <a href="#" data-toggle="search" class="nav-link nav-link-lg d-md-none navsearch">
                            <svg class="header-icon search-icon" x="1008" y="1248" viewBox="0 0 24 24" height="100%" width="100%" preserveAspectRatio="xMidYMid meet" focusable="false">
                                <path d="M0 0h24v24H0V0z" fill="none" />
                                <path d="M15.5 14h-.79l-.28-.27C15.41 12.59 16 11.11 16 9.5 16 5.91 13.09 3 9.5 3S3 5.91 3 9.5 5.91 16 9.5 16c1.61 0 3.09-.59 4.23-1.57l.27.28v.79l5 4.99L20.49 19l-4.99-5zm-6 0C7.01 14 5 11.99 5 9.5S7.01 5 9.5 5 14 7.01 14 9.5 11.99 14 9.5 14z" />
                            </svg>
                        </a>

                        @if($quantidadeDocs > 0)
                        <div class="dropdown header-notify">
                            <a class="nav-link icon" data-toggle="dropdown">
                                <svg xmlns="http://www.w3.org/2000/svg" class="header-icon" width="24" height="24" viewBox="0 0 24 24">
                                    <path d="M19 13.586V10c0-3.217-2.185-5.927-5.145-6.742C13.562 2.52 12.846 2 12 2s-1.562.52-1.855 1.258C7.185 4.074 5 6.783 5 10v3.586l-1.707 1.707C3.105 15.48 3 15.734 3 16v2c0 .553.447 1 1 1h16c.553 0 1-.447 1-1v-2c0-.266-.105-.52-.293-.707L19 13.586zM19 17H5v-.586l1.707-1.707C6.895 14.52 7 14.266 7 14v-4c0-2.757 2.243-5 5-5s5 2.243 5 5v4c0 .266.105.52.293.707L19 16.414V17zM12 22c1.311 0 2.407-.834 2.818-2H9.182C9.593 21.166 10.689 22 12 22z" /></svg>
                                <span class="pulse "></span>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow  animated">
                                <div class="dropdown-header">
                                    <h6 class="mb-0"><span class="smal">Docs por caducar</span></h6>
                                    <span class="badge badge-pill badge-secondary ml-auto">Ver todos</span>
                                </div>
                                @foreach ($dadosDocs as $items )
                                <div class="notify-menu">
                                    <a href="#" class="dropdown-item border-bottom d-flex pl-4">
                                        <div class="notifyimg bg-success-transparent text-success">
                                            {{-- <span class="avatar avatar-md brround align-self-center cover-image" data-image-src="{{URL::to('assets/images/users/7.jpg') }}"></span> --}}
                                            <span class="avatar avatar-md brround align-self-center cover-image">
                                                @if( $items->fotografia == "")
                                                <img src="{{URL::to('assets/images/users/2.jpg') }}" alt="img" class="avatar avatar-md brround">
                                                @else
                                                <img src="{{ URL::to('uploads/funcionario/'. $items->fotografia) }}" alt="{{ $items->nome_completo }}" class="avatar avatar-md brround">
                                                @endif
                                            </span>
                                        </div>
                                        <div>
                                            <div class="font-weight-normal1">{{$items->nome_completo }}</div>
                                            <div class="small text-muted">Tipo:&nbsp;{{$items->tipo_documento}}</div>
                                            <div class="small text-muted">Emitido aos:&nbsp;{{$items->data_emissao}}</div>
                                            <div class="small text-muted">Válido até:&nbsp;{{$items->data_validade }}</div>
                                        </div>
                                    </a>
                                </div>
                                @endforeach
                                @if($quantidadeDocs > 4)
                                <div class=" text-center p-2 border-top">
                                    <a href="#" class="">Ver todos</a>
                                </div>
                                @endif
                            </div>
                        </div>
                        @endif

                        @if($quantidadeAniversariantes > 0)
                        <div class="dropdown header-notify">
                            <a class="nav-link icon" data-toggle="dropdown">
                                <svg xmlns="http://www.w3.org/2000/svg" class="header-icon" width="24" height="24" viewBox="0 0 24 24">
                                    <path d="M19 13.586V10c0-3.217-2.185-5.927-5.145-6.742C13.562 2.52 12.846 2 12 2s-1.562.52-1.855 1.258C7.185 4.074 5 6.783 5 10v3.586l-1.707 1.707C3.105 15.48 3 15.734 3 16v2c0 .553.447 1 1 1h16c.553 0 1-.447 1-1v-2c0-.266-.105-.52-.293-.707L19 13.586zM19 17H5v-.586l1.707-1.707C6.895 14.52 7 14.266 7 14v-4c0-2.757 2.243-5 5-5s5 2.243 5 5v4c0 .266.105.52.293.707L19 16.414V17zM12 22c1.311 0 2.407-.834 2.818-2H9.182C9.593 21.166 10.689 22 12 22z" /></svg>
                                <span class="pulse "></span>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow  animated">
                                <div class="dropdown-header">
                                    <h6 class="mb-0"><span class="small">Aniversariantes</span></h6>
                                    <span class="badge badge-pill badge-info ml-auto">Ver todos</span>
                                </div>
                                @foreach ($dadosAniversariantes as $items )
                                <div class="notify-menu">
                                    <a href="#" class="dropdown-item border-bottom d-flex pl-4">
                                        <div class="notifyimg bg-success-transparent text-success">
                                            {{-- <span class="avatar avatar-md brround align-self-center cover-image" data-image-src="{{URL::to('assets/images/users/7.jpg') }}"></span> --}}
                                            <span class="avatar avatar-md brround align-self-center cover-image">
                                                @if( $items->fotografia == "")
                                                <img src="{{URL::to('assets/images/users/2.jpg') }}" alt="img" class="avatar avatar-md brround">
                                                @else
                                                <img src="{{ URL::to('uploads/funcionario/'. $items->fotografia) }}" alt="{{ $items->nome_completo }}" class="avatar avatar-md brround">
                                                @endif
                                            </span>
                                        </div>
                                        <div>
                                            <div class="font-weight-normal1">{{$items->nome_completo }}</div>
                                            <div class="small text-muted">{{$items->data_nascimento }}</div>
                                        </div>
                                    </a>
                                </div>
                                @endforeach
                                @if($quantidadeAniversariantes > 4)
                                <div class=" text-center p-2 border-top">
                                    <a href="#" class="">Ver todos aniversariantes</a>
                                </div>
                                @endif
                            </div>
                        </div>
                        @endif
                        <div class="dropdown profile-dropdown">
                            <a href="#" class="nav-link pr-0 leading-none" data-toggle="dropdown">
                                <span>
                                    @if( Auth::user()->fotografia == "")
                                    <img src="{{URL::to('assets/images/users/2.jpg') }}" alt="img" class="avatar avatar-md brround">
                                    @else
                                    <img src="{{ URL::to('uploads/usuario/'. Auth::user()->fotografia) }}" alt="{{ Auth::user()->name }}" class="avatar avatar-md brround">
                                    @endif
                                </span>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow animated">
                                <div class="text-center">
                                    <a href="#" class="dropdown-item text-center user pb-0 font-weight-bold">{{ Auth::user()->name }}</a>
                                    <span class="text-center user-semi-title">
                                        @if( Auth::user()->role == 1)
                                        {{ 'Administrador'}}
                                        @elseif( Auth::user()->role == 2)
                                        {{ 'Recepcionista'}}
                                        @elseif(Auth::user()->role == 3)
                                        {{ 'Auxiliar'}}
                                        @else
                                        {{ 'Usuário'}}
                                        @endif
                                    </span>
                                    <div class="dropdown-divider"></div>
                                </div>
                                <a class="dropdown-item d-flex" href="#">
                                    <svg class="header-icon mr-3" xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 0 24 24" width="24">
                                        <path d="M0 0h24v24H0V0z" fill="none" />
                                        <path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zM7.07 18.28c.43-.9 3.05-1.78 4.93-1.78s4.51.88 4.93 1.78C15.57 19.36 13.86 20 12 20s-3.57-.64-4.93-1.72zm11.29-1.45c-1.43-1.74-4.9-2.33-6.36-2.33s-4.93.59-6.36 2.33C4.62 15.49 4 13.82 4 12c0-4.41 3.59-8 8-8s8 3.59 8 8c0 1.82-.62 3.49-1.64 4.83zM12 6c-1.94 0-3.5 1.56-3.5 3.5S10.06 13 12 13s3.5-1.56 3.5-3.5S13.94 6 12 6zm0 5c-.83 0-1.5-.67-1.5-1.5S11.17 8 12 8s1.5.67 1.5 1.5S12.83 11 12 11z" /></svg>
                                    <div class="small">Perfil</div>
                                </a>
                                <a class="dropdown-item d-flex" href="#">
                                    <svg class="header-icon mr-3" xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 0 24 24" width="24">
                                        <path d="M0 0h24v24H0V0z" fill="none" />
                                        <path d="M19.43 12.98c.04-.32.07-.64.07-.98 0-.34-.03-.66-.07-.98l2.11-1.65c.19-.15.24-.42.12-.64l-2-3.46c-.09-.16-.26-.25-.44-.25-.06 0-.12.01-.17.03l-2.49 1c-.52-.4-1.08-.73-1.69-.98l-.38-2.65C14.46 2.18 14.25 2 14 2h-4c-.25 0-.46.18-.49.42l-.38 2.65c-.61.25-1.17.59-1.69.98l-2.49-1c-.06-.02-.12-.03-.18-.03-.17 0-.34.09-.43.25l-2 3.46c-.13.22-.07.49.12.64l2.11 1.65c-.04.32-.07.65-.07.98 0 .33.03.66.07.98l-2.11 1.65c-.19.15-.24.42-.12.64l2 3.46c.09.16.26.25.44.25.06 0 .12-.01.17-.03l2.49-1c.52.4 1.08.73 1.69.98l.38 2.65c.03.24.24.42.49.42h4c.25 0 .46-.18.49-.42l.38-2.65c.61-.25 1.17-.59 1.69-.98l2.49 1c.06.02.12.03.18.03.17 0 .34-.09.43-.25l2-3.46c.12-.22.07-.49-.12-.64l-2.11-1.65zm-1.98-1.71c.04.31.05.52.05.73 0 .21-.02.43-.05.73l-.14 1.13.89.7 1.08.84-.7 1.21-1.27-.51-1.04-.42-.9.68c-.43.32-.84.56-1.25.73l-1.06.43-.16 1.13-.2 1.35h-1.4l-.19-1.35-.16-1.13-1.06-.43c-.43-.18-.83-.41-1.23-.71l-.91-.7-1.06.43-1.27.51-.7-1.21 1.08-.84.89-.7-.14-1.13c-.03-.31-.05-.54-.05-.74s.02-.43.05-.73l.14-1.13-.89-.7-1.08-.84.7-1.21 1.27.51 1.04.42.9-.68c.43-.32.84-.56 1.25-.73l1.06-.43.16-1.13.2-1.35h1.39l.19 1.35.16 1.13 1.06.43c.43.18.83.41 1.23.71l.91.7 1.06-.43 1.27-.51.7 1.21-1.07.85-.89.7.14 1.13zM12 8c-2.21 0-4 1.79-4 4s1.79 4 4 4 4-1.79 4-4-1.79-4-4-4zm0 6c-1.1 0-2-.9-2-2s.9-2 2-2 2 .9 2 2-.9 2-2 2z" /></svg>
                                    <div class="small">Configurações</div>
                                </a>
                                <a class="dropdown-item d-flex" href="{{route('backup.create') }}">
                                    <svg class="header-icon mr-3" xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 0 24 24" width="24">
                                        <path d="M0 0h24v24H0V0z" fill="none" />
                                        <path d="M12,3C7.58,3 4,4.79 4,7C4,9.21 7.58,11 12,11C12.5,11 13,10.97 13.5,10.92V9.5H16.39L15.39,8.5L18.9,5C17.5,3.8 14.94,3 12,3M18.92,7.08L17.5,8.5L20,11H15V13H20L17.5,15.5L18.92,16.92L23.84,12M4,9V12C4,14.21 7.58,16 12,16C13.17,16 14.26,15.85 15.25,15.63L16.38,14.5H13.5V12.92C13,12.97 12.5,13 12,13C7.58,13 4,11.21 4,9M4,14V17C4,19.21 7.58,21 12,21C14.94,21 17.5,20.2 18.9,19L17,17.1C15.61,17.66 13.9,18 12,18C7.58,18 4,16.21 4,14Z" />
                                    </svg>
                                    <div class="small">Backup banco</div>
                                </a>
                                <a class="dropdown-item d-flex" href="#" data-effect="effect-scale" data-toggle="modal" data-target="#sair">
                                    <svg class="header-icon mr-3" xmlns="http://www.w3.org/2000/svg" enable-background="new 0 0 24 24" height="24" viewBox="0 0 24 24" width="24">
                                        <g>
                                            <rect fill="none" height="24" width="24" />
                                        </g>
                                        <g>
                                            <path d="M11,7L9.6,8.4l2.6,2.6H2v2h10.2l-2.6,2.6L11,17l5-5L11,7z M20,19h-8v2h8c1.1,0,2-0.9,2-2V5c0-1.1-0.9-2-2-2h-8v2h8V19z" />
                                        </g>
                                    </svg>
                                    <div class="small">Sair</div>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--/app header-->

        <!--Page header-->
        <div class="page-header">
            <div class="page-leftheader">
                <h6 class="page-title mb-0">Olá&nbsp;{{Auth::user()->name}} </h6>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#"><i class="fe fe-home mr-2 fs-14"></i>Painel</a></li>
                    <li class="breadcrumb-item active" aria-current="page"><a href="#">Administrativo</a></li>
                </ol>
            </div>
            <div class="page-rightheader">
                <div class="btn btn-list">
                    {{-- <a href="#" class="btn btn-info btn-sm"><i class="fe fe-settings mr-1"></i> Configurações</a>
                    <a href="#" class="btn btn-danger btn-sm"><i class="fe fe-printer mr-1"></i> Imprimir </a>
                    <a href="#" class="btn btn-warning btn-sm "><i class="fe fe-shopping-cart mr-1"></i>Layout</a> --}}
                </div>
            </div>
        </div>
        <!--End Page header-->


        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="card-title"><span class="small">Distribuição dos colaboradores por faixas etárias</span></div>
                    </div>
                    <div class="card-body">
                        <div class="morris-wrapper-demo" id="chart"></div>
                    </div>
                     <div class="card-footer">
                        {{-- This is Basic card footer --}}
                    </div>
                </div>
            </div>
        </div>


        <div class="row">

            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="card-title"><span class="small">Qtd de colaboradores homens vs mulheres</span></div>
                    </div>
                    <div class="card-body">
                        <div class="morris-wrapper-demo" id="pizza"></div>
                    </div>
                    <div class="card-footer">
                        {{-- This is Basic card footer --}}
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="card-title"><span class="small">Distribuição dos colaboradores por cargos</span></div>
                    </div>
                    <div class="card-body">
                        <div class="morris-wrapper-demo" id="qtd_cargos"></div>
                    </div>
                     <div class="card-footer">
                        {{-- This is Basic card footer --}}
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="card-title"><span class="small">Distribuição dos colaboradores por gênero vs cargos</span></div>
                    </div>
                    <div class="card-body">
                        <div class="morris-wrapper-demo" id="cargos_genero"></div>
                    </div>
                     <div class="card-footer">
                        {{-- This is Basic card footer --}}
                    </div>
                </div>

            </div>

        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="card-title"><span class="small">Distribuição dos colaboradores por niveis acadêmicos</span></div>
                    </div>
                    <div class="card-body">
                        <div class="morris-wrapper-demo" id="qtd_niveis"></div>
                    </div>
                     <div class="card-footer">
                        {{-- This is Basic card footer --}}
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="card-title"><span class="small">Distribuição dos colaboradores por gênero vs níveis acadêmicos</span></div>
                    </div>
                    <div class="card-body">
                        <div class="morris-wrapper-demo" id="nivel_academico"></div>
                    </div>
                     <div class="card-footer">
                        {{-- This is Basic card footer --}}
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        <div class="card-title"><span class="small">Resumo de avaliações realizadas vs genêro de colaboradores</span></div>
                    </div>
                    <div class="card-body">
                        <div class="morris-wrapper-demo" id="resumo_avaliacoes"></div>
                    </div>
                     <div class="card-footer">
                        {{-- This is Basic card footer --}}
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        <div class="card-title"><span class="small">Resumo de avaliações realizadas e total</span></div>
                    </div>
                    <div class="card-body">
                        <div class="morris-wrapper-demo" id="resumo_total"></div>
                    </div>
                     <div class="card-footer">
                        {{-- This is Basic card footer --}}
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="card-title"><span class="small">Distribuição dos colaboradores por gênero vs departamentos</span></div>
                    </div>
                    <div class="card-body">
                        <div class="morris-wrapper-demo" id="dep"></div>
                    </div>
                     <div class="card-footer">
                        {{-- This is Basic card footer --}}
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="card-title"><span class="small">Distribuição dos colaboradores por gênero vs turnos</span></div>
                    </div>
                    <div class="card-body">
                        <div class="morris-wrapper-demo" id="turno"></div>
                    </div>
                     <div class="card-footer">
                        {{-- This is Basic card footer --}}
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
@section('scripts')
<script>
    var data = @json($chartData); // Os dados passados do controlador
    var cores = ["#705ec8", "#fb1c52"];
    var legendas = ['Homens', 'Mulheres'];

    new Morris.Bar({
        element: 'chart'
        , data: data
        , xkey: 'age_group'
        , ykeys: ['male', 'female']
        , gridTextSize: 11
        , hideHover: "auto"
        , resize: true
        , labels: legendas
        , barColors: cores
        , stacked: false
    });

    // Adiciona as legendas ao lado do gráfico
    var legendasHtml = '<div style="text-align:center; margin-top:10px;">';
    for (var i = 0; i < legendas.length; i++) {
        legendasHtml += '<span style="display:inline-block;margin-right:10px;color:' + cores[i] + ';"><b>&#9632;</b> ' + legendas[i] + '</span>';
    }
    legendasHtml += '</div>';
    $("#chart").after(legendasHtml);

</script>




<script>
    var data = @json($quantidadeCargos);
    // Array de cores
    var cores = ['#705ec8', '#fb1c52', '#999999', '#0b62a4', '#d9534f', '#5cb85c', '#f0ad4e', '#fb1c52', '#705ec8', '#2dce89'];

    new Morris.Bar({
        element: 'qtd_cargos'
        , data: data
        , xkey: 'cargo'
        , gridTextSize: 11
        , hideHover: "auto"
        , resize: true
        , ykeys: ['quantidade']
        , labels: ['Quantidade']
        , barColors: function(row, series, type) {
            return cores[row.x];
        }

    });

</script>

<script>
    var data = @json($dataCargosPorGenero); // Os dados passados do controlador
    var cores = ["#705ec8", "#fb1c52"];
    var legendas = ['Homens', 'Mulheres'];

    new Morris.Bar({
        element: 'cargos_genero'
        , data: data
        , xkey: 'cargo'
        , ykeys: ['masculino', 'feminino']
        , gridTextSize: 11
        , hideHover: "auto"
        , resize: true
        , labels: legendas
        , barColors: cores
        , stacked: false
    });

    // Adiciona as legendas ao lado do gráfico
    var legendasHtml = '<div style="text-align:center; margin-top:10px;">';
    for (var i = 0; i < legendas.length; i++) {
        legendasHtml += '<span style="display:inline-block;margin-right:10px;color:' + cores[i] + ';"><b>&#9632;</b> ' + legendas[i] + '</span>';
    }
    legendasHtml += '</div>';
    $("#cargos_genero").after(legendasHtml);

</script>


<script>
    var data = @json($dataDepartamentos); // Os dados passados do controlador
    var cores = ["#705ec8", "#fb1c52"];
    var legendas = ['Homens', 'Mulheres'];
    new Morris.Bar({
        element: 'dep'
        , data: data
        , xkey: 'dept'
        , ykeys: ['masculino', 'feminino']
        , gridTextSize: 11
        , hideHover: "auto"
        , resize: true
        , labels: legendas
        , barColors: cores
        , stacked: false
    });

    // Adiciona as legendas ao lado do gráfico
    var legendasHtml = '<div style="text-align:center; margin-top:10px;">';
    for (var i = 0; i < legendas.length; i++) {
        legendasHtml += '<span style="display:inline-block;margin-right:10px;color:' + cores[i] + ';"><b>&#9632;</b> ' + legendas[i] + '</span>';
    }
    legendasHtml += '</div>';
    $("#dep").after(legendasHtml);

</script>

<script>
    var data = @json($dataTurnos); // Os dados passados do controlador
    var cores = ["#705ec8", "#fb1c52"];
    var legendas = ['Homens', 'Mulheres'];
    new Morris.Bar({
        element: 'turno'
        , data: data
        , xkey: 'turno'
        , ykeys: ['masculino', 'feminino']
        , gridTextSize: 11
        , hideHover: "auto"
        , resize: true
        , labels: legendas
        , barColors: cores
        , stacked: false
    });

    // Adiciona as legendas ao lado do gráfico
    var legendasHtml = '<div style="text-align:center; margin-top:10px;">';
    for (var i = 0; i < legendas.length; i++) {
        legendasHtml += '<span style="display:inline-block;margin-right:10px;color:' + cores[i] + ';"><b>&#9632;</b> ' + legendas[i] + '</span>';
    }
    legendasHtml += '</div>';
    $("#turno").after(legendasHtml);

</script>

<script>
    var data = @json($dataNiveisAcademicos); // Os dados passados do controlador
    var cores = ["#705ec8", "#fb1c52"];
    var legendas = ['Homens', 'Mulheres'];
    new Morris.Bar({
        element: 'nivel_academico'
        , data: data
        , xkey: 'nivel'
        , ykeys: ['masculino', 'feminino']
        , gridTextSize: 11
        , hideHover: "auto"
        , resize: true
        , labels: legendas
        , barColors: cores
        , stacked: false
    });

    // Adiciona as legendas ao lado do gráfico
    var legendasHtml = '<div style="text-align:center; margin-top:10px;">';
    for (var i = 0; i < legendas.length; i++) {
        legendasHtml += '<span style="display:inline-block;margin-right:10px;color:' + cores[i] + ';"><b>&#9632;</b> ' + legendas[i] + '</span>';
    }
    legendasHtml += '</div>';
    $("#nivel_academico").after(legendasHtml);

</script>

<script>
    var data = @json($resumoAvaliacoes); // Os dados passados do controlador
    var cores = ["#705ec8", "#fb1c52"];
    var legendas = ['Homens', 'Mulheres'];
    new Morris.Bar({
        element: 'resumo_avaliacoes'
        , data: data
        , xkey: 'tipo'
        , ykeys: ['masculino', 'feminino']
        , gridTextSize: 11
        , hideHover: "auto"
        , resize: true
        , labels: legendas
        , barColors: cores
        , stacked: false
    });

    // Adiciona as legendas ao lado do gráfico
    var legendasHtml = '<div style="text-align:center; margin-top:10px;">';
    for (var i = 0; i < legendas.length; i++) {
        legendasHtml += '<span style="display:inline-block;margin-right:10px;color:' + cores[i] + ';"><b>&#9632;</b> ' + legendas[i] + '</span>';
    }
    legendasHtml += '</div>';
    $("#resumo_avaliacoes").after(legendasHtml);

</script>

<script>
    var data = @json($niveisAcademicos);
    // Array de cores
    var cores = ['#705ec8', '#fb1c52', '#999999', '#0b62a4', '#d9534f', '#5cb85c', '#f0ad4e', '#fb1c52', '#705ec8', '#2dce89'];

    new Morris.Bar({
        element: 'qtd_niveis'
        , data: data
        , xkey: 'nivel'
        , gridTextSize: 11
        , hideHover: "auto"
        , resize: true
        , ykeys: ['quantidade']
        , labels: ['Quantidade']
        , barColors: function(row, series, type) {
            return cores[row.x];
        }

    });

</script>

<script>
    var dados = @json($dados);
    var cores = ["#fb1c52", "#705ec8", "#2dce89"];
    new Morris.Bar({
        element: 'grafico'
        , data: dados
        , gridTextSize: 11
        , hideHover: "auto"
        , resize: true
        , xkey: 'Label'
        , ykeys: ['Funcionarios']
        , labels: ['Funcionarios']
        , barColors: function(row, series, type) {
                return cores[row.x];
            }

    , });

</script>

<script>
    var dados = @json($avaliacoes);
    var cores = ['#999999', '#fb1c52', '#705ec8'];
    new Morris.Bar({
        element: 'resumo_total'
        , data: dados
        , gridTextSize: 11
        , hideHover: "auto"
        , resize: true
        , xkey: 'Label'
        , ykeys: ['Avaliacões']
        , labels: ['Avaliacões']
        , barColors: function(row, series, type) {
                return cores[row.x];
            }

    , });

</script>

<script>
    var dados = @json($dadosPizza);
    console.log(dados);
    new Morris.Donut({
        element: "pizza"
        , data: dados
        , colors: ["#fb1c52", "#705ec8", "#2dce89"]
        , storke: ["#fb1c52", "#705ec8", "#2dce89"]
        , resize: true
        , backgroundColor: "rgba(119, 119, 142, 0.2)"
        , labelColor: "#8e9cad"
    , });

</script>


@endsection


@endsection
