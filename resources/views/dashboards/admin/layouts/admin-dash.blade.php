<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>

    {{-- Meta data  --}}
    <meta charset="UTF-8">
    <meta name='viewport' content='width=device-width, initial-scale=1.0, user-scalable=0'>
    <meta content="Admitro - Admin Panel HTML template" name="description">
    <meta content="Spruko Technologies Private Limited" name="author">
    <meta name="keywords" content="admin panel ui, user dashboard template, web application templates, premium admin templates, html css admin templates, premium admin templates, best admin template bootstrap 4, dark admin template, bootstrap 4 template admin, responsive admin template, bootstrap panel template, bootstrap simple dashboard, html web app template, bootstrap report template, modern admin template, nice admin template" />

    <meta name="csrf-token" content="{{ csrf_token() }}">

    {{-- Title  --}}
    <title>@yield('title')</title>

    {{-- Favicon  --}}
    <link rel="icon" href="{{URL::to('assets/images/brand/favicon.ico')}}" type="image/x-icon" />

    {{-- Bootstrap css  --}}
    <link href="{{URL::to('assets/plugins/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">

    {{-- Toastr --}}
    <link href="{{URL::to('assets/css/toastr.min.css')}}" rel="stylesheet">

    {{-- Style css  --}}
    <link href="{{URL::to('assets/css/style.css')}}" rel="stylesheet" />
    <link href="{{URL::to('assets/css/dark.css')}}" rel="stylesheet" />
    <link href="{{URL::to('assets/css/skin-modes.css')}}" rel="stylesheet" />

    {{-- Animate css  --}}
    <link href="{{URL::to('assets/css/animated.css')}}" rel="stylesheet" />

    {{-- Icons css  --}}
    <link href="{{URL::to('assets/css/icons.css')}}" rel="stylesheet" />

    {{-- Sidemenu css  --}}
    <link href="{{URL::to('assets/css/sidemenu.css')}}" rel="stylesheet">

    {{-- P-scroll bar css  --}}
    <link href="{{URL::to('assets/plugins/p-scrollbar/p-scrollbar.css')}}" rel="stylesheet" />

    {{-- parsley validator css  --}}
    <link href="{{URL::to('assets/css/parsley.css')}}" rel="stylesheet">

    {{-- Data table css --}}
    <link href="{{URL::to('assets/plugins/datatable/css/dataTables.bootstrap4.min.css')}}" rel="stylesheet" />
    <link href="{{URL::to('assets/plugins/datatable/css/buttons.bootstrap4.min.css')}}" rel="stylesheet">
    <link href="{{URL::to('assets/plugins/datatable/responsive.bootstrap4.min.css')}}" rel="stylesheet" />

    {{-- INTERNAL Morris Charts css --}}
    <link href="{{URL::to('assets/plugins/morris/morris.css')}}" rel="stylesheet" />
    {{-- INTERNAL Mutipleselect css--}}
    <link rel="stylesheet" href="{{URL::to('assets/plugins/multipleselect/multiple-select.css')}}">

    {{-- Simplebar css  --}}
    <link href="{{URL::to('assets/plugins/simplebar/css/simplebar.css')}}" rel="stylesheet">

    {{-- INTERNAL Select2 css  --}}
    <link href="{{URL::to('assets/plugins/select2/select2.min.css')}}" rel="stylesheet" />

    {{-- Flatpickr css  --}}
    <link href="{{URL::to('assets/css/flatpickr.min.css')}}" rel="stylesheet" />

    <!--- INTERNAL Sweetalert css-->
    <link href="{{URL::to('assets/plugins/sweet-alert/jquery.sweet-modal.min.css')}}" rel="stylesheet" />
    <link href="{{URL::to('assets/plugins/sweet-alert/sweetalert.css')}}" rel="stylesheet" />


    {{-- INTERNAL Sumoselect css --}}
    <link rel="stylesheet" href="{{URL::to('assets/plugins/sumoselect/sumoselect.css')}}">

    {{-- INTERNAL telephoneinput css --}}
    <link rel="stylesheet" href="{{URL::to('assets/plugins/telephoneinput/telephoneinput.css')}}">

    {{-- INTERNAL Jquerytransfer css --}}
    <link rel="stylesheet" href="{{URL::to('assets/plugins/jQuerytransfer/jquery.transfer.css')}}">
    <link rel="stylesheet" href="{{URL::to('assets/plugins/jQuerytransfer/icon_font/icon_font.css')}}">
    {{-- INTERNAL multi css --}}
    <link rel="stylesheet" href="{{URL::to('assets/plugins/multi/multi.min.css')}}">


    {{-- Color Skin css  --}}
    <link id="theme" href="{{URL::to('assets/colors/color1.css')}}" rel="stylesheet" type=" text/css" />
    <style>
        ::-webkit-input-placeholder {
            font-size: 10px;
        }

        ::-moz-placeholder {
            font-size: 10px;
        }

        :-ms-input-placeholder {
            font-size: 10px;
        }

        input:-moz-placeholder {
            font-size: 10px;
        }

        select option {
            -webkit-appearance: none;
            -moz-appearance: none;
            appearance: none;
            font-size: 10px;
        }

        .error {
            color: red;
            border-color: red;
        }

    </style>


</head>

<body class="app sidebar-mini">

    {{-- Global-loader  --}}
    <div id="global-loader">
        <img src="{{URL::to('assets/images/svgs/loader.svg')}}" alt="loader">
    </div>
    {{-- End Global-loader  --}}

    {{-- Page  --}}
    <div class="page">
        <div class="page-main">

            {{-- aside open  --}}
            <aside class="app-sidebar">
                <div class="app-sidebar__logo">
                    @if(Auth::user()->role == 1)
                    <a class="header-brand brand-5" href="{{route('admin.painel')}}">
                        <img src="{{URL::to('assets/images/brand/logo.png') }}" class="header-brand-img desktop-lgo" alt="Admitro logo">
                        <img src="{{URL::to('assets/images/brand/logo1.png') }}" class="header-brand-img dark-logo" alt="Admitro logo">
                        <img src="{{URL::to('assets/images/brand/favicon.png') }}" class="header-brand-img mobile-logo" alt="Admitro logo">
                        <img src="{{URL::to('assets/images/brand/favicon1.png') }}" class="header-brand-img darkmobile-logo" alt="Admitro logo">
                    </a>
                    @else
                    <a class="header-brand brand-5" href="javascript:void(0)">
                        <img src="{{URL::to('assets/images/brand/logo.png') }}" class="header-brand-img desktop-lgo" alt="Admitro logo">
                        <img src="{{URL::to('assets/images/brand/logo1.png') }}" class="header-brand-img dark-logo" alt="Admitro logo">
                        <img src="{{URL::to('assets/images/brand/favicon.png') }}" class="header-brand-img mobile-logo" alt="Admitro logo">
                        <img src="{{URL::to('assets/images/brand/favicon1.png') }}" class="header-brand-img darkmobile-logo" alt="Admitro logo">
                    </a>
                    @endif

                </div>
                <div class="app-sidebar__user">
                    <div class="dropdown user-pro-body text-center">
                        <div class="user-pic">
                            @if( Auth::user()->fotografia == "")
                            <img src="{{URL::to('assets/images/users/2.jpg') }}" alt="user-img" class="avatar-xl rounded-circle mb-1">
                            @else
                            <img src="{{ URL::to('uploads/usuario/'. Auth::user()->fotografia) }}" alt="{{ Auth::user()->name }}" class="avatar-xl rounded-circle mb-1">
                            @endif

                        </div>
                        <div class="user-info">
                            <h5 class=" mb-1">{{ Auth::user()->name }} &nbsp;<i class="ion-checkmark-circled  text-success fs-12"></i></h5>
                            <span class="text-muted app-sidebar__user-name text-sm">
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
                        </div>
                    </div>
                    {{-- <div class="sidebar-navs">
                        <ul class="nav nav-pills-circle">
                            <li class="nav-item" data-placement="top" data-toggle="tooltip" title="Support">
                                <a class="icon" href="#">
                                    <i class="las la-life-ring header-icons"></i>
                                </a>
                            </li>
                            <li class="nav-item" data-placement="top" data-toggle="tooltip" title="Documentation">
                                <a class="icon" href="#">
                                    <i class="las  la-file-alt header-icons"></i>
                                </a>
                            </li>
                            <li class="nav-item" data-placement="top" data-toggle="tooltip" title="Projects">
                                <a href="#" class="icon">
                                    <i class="las la-project-diagram header-icons"></i>
                                </a>
                            </li>
                            <li class="nav-item" data-placement="top" data-toggle="tooltip" title="Settins">
                                <a class="icon" href="#">
                                    <i class="las la-cog header-icons"></i>
                                </a>
                            </li>
                        </ul>
                    </div> --}}
                </div>
                <ul class="side-menu app-sidebar3">
                    <li class="side-item side-item-category mt-4">Home</li>
                    <li class="slide">
                        <a class="side-menu__item" href="{{route('admin.painel')}}">
                            <svg class="side-menu__icon" xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 0 24 24" width="24">
                                <path d="M0 0h24v24H0V0z" fill="none" />
                                <path d="M19 5v2h-4V5h4M9 5v6H5V5h4m10 8v6h-4v-6h4M9 17v2H5v-2h4M21 3h-8v6h8V3zM11 3H3v10h8V3zm10 8h-8v10h8V11zm-10 4H3v6h8v-6z" /></svg>
                            <span class="side-menu__label">Painel principal</span><span class="badge badge-default side-badge"></span>
                        </a>
                    </li>

                    <li class="side-item side-item-category">Configuração inicial</li>

                    <li class="slide">
                        <a class="side-menu__item" data-toggle="slide" href="#">
                            <svg class="side-menu__icon" xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 0 24 24" width="24">
                                <path d="M0 0h24v24H0V0z" fill="none" />
                                <path d="M4 4C2.89 4 2 4.89 2 6V18C2 19.11 2.9 20 4 20H12.08A7 7 0 0 1 12 19A7 7 0 0 1 19 12A7 7 0 0 1 22 12.69V8C22 6.89 21.1 6 20 6H12L10 4H4M18 14C17.87 14 17.76 14.09 17.74 14.21L17.55 15.53C17.25 15.66 16.96 15.82 16.7 16L15.46 15.5C15.35 15.5 15.22 15.5 15.15 15.63L14.15 17.36C14.09 17.47 14.11 17.6 14.21 17.68L15.27 18.5C15.25 18.67 15.24 18.83 15.24 19C15.24 19.17 15.25 19.33 15.27 19.5L14.21 20.32C14.12 20.4 14.09 20.53 14.15 20.64L15.15 22.37C15.21 22.5 15.34 22.5 15.46 22.5L16.7 22C16.96 22.18 17.24 22.35 17.55 22.47L17.74 23.79C17.76 23.91 17.86 24 18 24H20C20.11 24 20.22 23.91 20.24 23.79L20.43 22.47C20.73 22.34 21 22.18 21.27 22L22.5 22.5C22.63 22.5 22.76 22.5 22.83 22.37L23.83 20.64C23.89 20.53 23.86 20.4 23.77 20.32L22.7 19.5C22.72 19.33 22.74 19.17 22.74 19C22.74 18.83 22.73 18.67 22.7 18.5L23.76 17.68C23.85 17.6 23.88 17.47 23.82 17.36L22.82 15.63C22.76 15.5 22.63 15.5 22.5 15.5L21.27 16C21 15.82 20.73 15.65 20.42 15.53L20.23 14.21C20.22 14.09 20.11 14 20 14H18M19 17.5C19.83 17.5 20.5 18.17 20.5 19C20.5 19.83 19.83 20.5 19 20.5C18.16 20.5 17.5 19.83 17.5 19C17.5 18.17 18.17 17.5 19 17.5Z" />
                            </svg>

                            <span class="side-menu__label"> <span class="small">Parametrização</span></span><i class="angle fa fa-angle-right"></i></a>
                        <ul class="slide-menu">
                            <li><a href="{{route('listar/competencias')}}" class="slide-item"> <span class="sma">Competências</span></a></li>
                            <li><a href="{{route('listar/departamentos')}}" class="slide-item"><span class="small">Departamentos</span></a></li>
                            <li><a href="{{route('listar/turnos')}}" class="slide-item">Turnos</a></li>
                            <li><a href="{{route('listar/locais')}}" class="slide-item">Locais de trabalho</a></li>
                            <li><a href="{{route('listar/tipo/contratos')}}" class="slide-item"> Tipo de contrato</a></li>
                            <li><a href="{{route('listar/tipo/clusters')}}" class="slide-item"> Tipo de clusters</a></li>
                            <li><a href="{{route('listar/tipo/cargos')}}" class="slide-item">Cargos</a></li>
                            <li><a href="{{route('listar/objetivos')}}" class="slide-item"> Objectivos</a></li>
                            <li><a href="{{route('listar/pesos')}}" class="slide-item">Atribuição de pesos</a></li>
                        </ul>
                    </li>
                    <li class="side-item side-item-category">Atribuição</li>
                    <li class="slide">
                        <a class="side-menu__item" data-toggle="slide" href="#">
                            <svg class="side-menu__icon" xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 0 24 24" width="24">
                                <path d="M0 0h24v24H0V0z" fill="none" />
                                <path d="M23.5 17L18.5 22L15 18.5L16.5 17L18.5 19L22 15.5L23.5 17M6 2C4.89 2 4 2.89 4 4V20C4 21.11 4.89 22 6 22H13.81C13.28 21.09 13 20.05 13 19C13 18.67 13.03 18.33 13.08 18H6V16H13.81C14.27 15.2 14.91 14.5 15.68 14H6V12H18V13.08C18.33 13.03 18.67 13 19 13C19.34 13 19.67 13.03 20 13.08V8L14 2M13 3.5L18.5 9H13Z" />
                            </svg>
                            <span class="side-menu__label"> <span class="small">Competências</span></span><i class="angle fa fa-angle-right"></i></a>
                        <ul class="slide-menu">
                            <li><a href="{{route('listar/desempenhos')}}" class="slide-item">Atribuição de competências</a></li>
                        </ul>
                    </li>
                    <li class="slide">
                        <a class="side-menu__item" data-toggle="slide" href="#">
                            <svg class="side-menu__icon" xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 0 24 24" width="24">
                                <path d="M0 0h24v24H0V0z" fill="none" />
                                <path d="M6 2H14L20 8V12.17C19.5 12.06 19 12 18.5 12H6V14H13.81C13.26 14.58 12.81 15.25 12.5 16H6V18H12V18.5C12 19.79 12.38 21 13 22H6C4.89 22 4 21.1 4 20V4C4 2.89 4.89 2 6 2M13 9H18.5L13 3.5V9M18 14.5C19.11 14.5 20.11 14.95 20.83 15.67L22 14.5V18.5H18L19.77 16.73C19.32 16.28 18.69 16 18 16C16.62 16 15.5 17.12 15.5 18.5C15.5 19.88 16.62 21 18 21C18.82 21 19.54 20.61 20 20H21.71C21.12 21.47 19.68 22.5 18 22.5C15.79 22.5 14 20.71 14 18.5C14 16.29 15.79 14.5 18 14.5Z" />
                            </svg>

                            <span class="side-menu__label"> <span class="small">Objectivos</span></span><i class="angle fa fa-angle-right"></i></a>
                        <ul class="slide-menu">
                            <li><a href="{{route('listar/atribuicoes')}}" class="slide-item">Atribuição de objectivos</a></li>
                        </ul>
                    </li>

                    <li class="side-item side-item-category">Autenticação</li>
                    <li class="slide">
                        <a class="side-menu__item" data-toggle="slide" href="#">
                            <svg class="side-menu__icon" xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 0 24 24" width="24">
                                <path d="M0 0h24v24H0V0z" fill="none" />
                                <path d="M16 17V19H2V17S2 13 9 13 16 17 16 17M12.5 7.5A3.5 3.5 0 1 0 9 11A3.5 3.5 0 0 0 12.5 7.5M15.94 13A5.32 5.32 0 0 1 18 17V19H22V17S22 13.37 15.94 13M15 4A3.39 3.39 0 0 0 13.07 4.59A5 5 0 0 1 13.07 10.41A3.39 3.39 0 0 0 15 11A3.5 3.5 0 0 0 15 4Z" />
                            </svg>
                            <span class="side-menu__label">Usuários</span><i class="angle fa fa-angle-right"></i></a>
                        <ul class="slide-menu">
                            <li><a href="{{route('admin/listar/usuario')}}" class="slide-item">Todos usuários</a></li>
                            <li><a href="{{route('admin/novo/usuario')}}" class="slide-item "">Criar usuário</a></li>
                            <li><a href=" {{route('admin/grelha/usuario')}}" class="slide-item">Lista grelha</a></li>
                            <li><a href="{{route('admin/logs/usuario')}}" class="slide-item"> Logs de usuários</a></li>
                        </ul>
                    </li>
                    <li class="side-item side-item-category">Efetivo na empresa</li>
                    <li class="slide">
                        <a class="side-menu__item" data-toggle="slide" href="#">
                            <svg class="side-menu__icon" xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 0 24 24" width="24">
                                <path d="M0 0h24v24H0V0z" fill="none" />
                                <path d="M12,5.5A3.5,3.5 0 0,1 15.5,9A3.5,3.5 0 0,1 12,12.5A3.5,3.5 0 0,1 8.5,9A3.5,3.5 0 0,1 12,5.5M5,8C5.56,8 6.08,8.15 6.53,8.42C6.38,9.85 6.8,11.27 7.66,12.38C7.16,13.34 6.16,14 5,14A3,3 0 0,1 2,11A3,3 0 0,1 5,8M19,8A3,3 0 0,1 22,11A3,3 0 0,1 19,14C17.84,14 16.84,13.34 16.34,12.38C17.2,11.27 17.62,9.85 17.47,8.42C17.92,8.15 18.44,8 19,8M5.5,18.25C5.5,16.18 8.41,14.5 12,14.5C15.59,14.5 18.5,16.18 18.5,18.25V20H5.5V18.25M0,20V18.5C0,17.11 1.89,15.94 4.45,15.6C3.86,16.28 3.5,17.22 3.5,18.25V20H0M24,20H20.5V18.25C20.5,17.22 20.14,16.28 19.55,15.6C22.11,15.94 24,17.11 24,18.5V20Z" />
                            </svg>
                            <span class="side-menu__label">Colaboradores</span><span class="badge badge-success side-badge">
                                @php
                                use Illuminate\Support\Facades\DB;
                                $todosFuncionarios = DB::table('funcionarios')->count();
                                $avaliacoesFeitas = DB::table('avaliacao_desempenhos')->count();
                                @endphp
                                <span class="small"> {!! $todosFuncionarios !!}</span>
                            </span></a>
                        <ul class="slide-menu">
                            <li><a href="{{route('listar/funcionarios')}}" class="slide-item"> Todos dados</a></li>
                            <li><a href="{{route('novo/funcionario')}}" class="slide-item">Criar colaborador</a></li>
                            <li><a href="{{route('apenas/funcionarios')}}" class="slide-item">Lista simples</a></li>
                            <li><a href="{{route('gridView/funcionarios')}}" class="slide-item">Lista grelha</a></li>
                        </ul>
                    </li>

                    <li class="side-item side-item-category">Avaliaçao de desempenho</li>
                    <li class="slide">
                        <a class="side-menu__item" data-toggle="slide" href="#">
                            <svg class="side-menu__icon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" height="24" viewBox="0 0 24 24" width="24">
                                <path d="M0 0h24v24H0V0z" fill="none" />
                                <path d="M6,2C4.89,2 4,2.89 4,4V20A2,2 0 0,0 6,22H10V20.09L12.09,18H6V16H14.09L16.09,14H6V12H18.09L20,10.09V8L14,2H6M13,3.5L18.5,9H13V3.5M20.15,13C20,13 19.86,13.05 19.75,13.16L18.73,14.18L20.82,16.26L21.84,15.25C22.05,15.03 22.05,14.67 21.84,14.46L20.54,13.16C20.43,13.05 20.29,13 20.15,13M18.14,14.77L12,20.92V23H14.08L20.23,16.85L18.14,14.77Z" />
                            </svg>

                            <span class="side-menu__label">Avaliação</span><i class="angle fa fa-angle-right"></i></a>
                        <ul class="slide-menu">
                            <li><a href="{{route('listar/avaliacoes')}}" class="slide-item">Avaliações concluidas</a></li>
                            <li><a href="{{route('nova/avaliacao')}}" class="slide-item">Realizar avaliação</a></li>
                        </ul>
                    </li>
                    <li class="side-item side-item-category">Impressão de relatórios</li>
                    <li class="slide">
                        <a class="side-menu__item" data-toggle="slide" href="#">
                            <svg class="side-menu__icon" xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 0 24 24" width="24">
                                <path d="M0 0h24v24H0V0z" fill="none" />
                                <path d="M18,3H6V7H18M19,12A1,1 0 0,1 18,11A1,1 0 0,1 19,10A1,1 0 0,1 20,11A1,1 0 0,1 19,12M16,19H8V14H16M19,8H5A3,3 0 0,0 2,11V17H6V21H18V17H22V11A3,3 0 0,0 19,8Z" />
                            </svg>
                            <span class="side-menu__label">Relatórios</span><span class="badge badge-info side-badge">
                                <span class="small"> {!! $avaliacoesFeitas !!}</span>
                            </span>
                        </a>

                        <ul class="slide-menu">
                            <li><a href="{{route('listar/relatorios')}}" class="slide-item">Emitir relatório</a></li>
                            <li><a href="{{route('gridView/avaliacao')}}" class="slide-item">Lista grelha</a></li>
                        </ul>
                    </li>




                </ul>
            </aside>
            {{-- aside closed  --}}

            {{-- App-Content  --}}
            @yield('content')

            {{-- End app-content  --}}
        </div>


        {{-- Delete Leave Modal  --}}

        <div class="p-4 bg-light border border-bottom-0">
            <div class="modal" id="sair">
                <div class="modal-dialog modal-sm modal-dialog-centered" role="document">
                    <div class="modal-content modal-content-demo">
                        <div class="modal-header">
                            <h6 class="modal-title"><i class="fe fe-alert-triangle"></i> Alerta</h6><button aria-label="Close" class="close" data-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></button>
                        </div>
                        <form action="{{route('logout')}}" method="POST">
                            @csrf

                            <div class="modal-body">
                                <p>Você realmente deseja sair?</p>
                            </div>
                            <div class="modal-footer justify-content-center">
                                <button class="btn btn-indigo btn-sm" type="submit"> <i class="fe fe-check-circle"></i> Sim</button> <button class="btn btn-secondary btn-sm" type="button" data-dismiss="modal"> <i class="fe fe-x-circle"></i> Não</button>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>


        {{-- Footer  --}}
        <footer class="footer">
            <div class="container">
                <div class="row align-items-center flex-row-reverse">
                    <div class="col-md-12 col-sm-12 text-center">
                        Copyright © 2023
                        <a href="javascript:void(0)">SDO</a> Todos direitos reservados.
                    </div>
                </div>
            </div>
        </footer>
        {{-- End Footer  --}}

    </div>
    {{-- End Page  --}}

    {{-- Back to top  --}}
    <a href="#top" id="back-to-top"><i class="fe fe-chevrons-up"></i></a>

    {{-- Jquery js  --}}
    <script src="{{URL::to('assets/js/jquery-3.5.1.min.js') }}"></script>

    {{-- Bootstrap4 js  --}}
    <script src="{{URL::to('assets/plugins/bootstrap/popper.min.js') }}"></script>
    <script src="{{URL::to('assets/plugins/bootstrap/js/bootstrap.min.js') }}"></script>

    {{-- Othercharts js  --}}
    <script src="{{URL::to('assets/plugins/othercharts/jquery.sparkline.min.js') }}"></script>

    {{-- Circle-progress js  --}}
    <script src="{{URL::to('assets/js/circle-progress.min.js') }}"></script>

    {{-- Jquery-rating js  --}}
    <script src="{{URL::to('assets/plugins/rating/jquery.rating-stars.js') }}"></script>

    {{-- Sidemenu js  --}}
    <script src="{{URL::to('assets/plugins/sidemenu/sidemenu.js') }}"></script>

    {{-- P-scroll js  --}}
    <script src="{{URL::to('assets/plugins/p-scrollbar/p-scrollbar.js') }}"></script>
    <script src="{{URL::to('assets/plugins/p-scrollbar/p-scroll1.js') }}"></script>
    <script src="{{URL::to('assets/plugins/p-scrollbar/p-scroll.js') }}"></script>

    {{-- INTERNAL Data tables --}}
    <script src="{{URL::to('assets/plugins/datatable/js/jquery.dataTables.js')}}"></script>
    <script src="{{URL::to('assets/plugins/datatable/js/dataTables.bootstrap4.js')}}"></script>
    <script src="{{URL::to('assets/plugins/datatable/js/dataTables.buttons.min.js')}}"></script>
    <script src="{{URL::to('assets/plugins/datatable/js/buttons.bootstrap4.min.js')}}"></script>
    <script src="{{URL::to('assets/plugins/datatable/js/jszip.min.js')}}"></script>
    <script src="{{URL::to('assets/plugins/datatable/js/pdfmake.min.js')}}"></script>
    <script src="{{URL::to('assets/plugins/datatable/js/vfs_fonts.js')}}"></script>
    <script src="{{URL::to('assets/plugins/datatable/js/buttons.html5.min.js')}}"></script>
    <script src="{{URL::to('assets/plugins/datatable/js/buttons.print.min.js')}}"></script>
    <script src="{{URL::to('assets/plugins/datatable/js/buttons.colVis.min.js')}}"></script>
    <script src="{{URL::to('assets/plugins/datatable/dataTables.responsive.min.js')}}"></script>
    <script src="{{URL::to('assets/plugins/datatable/responsive.bootstrap4.min.js')}}"></script>
    <script src="{{URL::to('assets/js/datatables.js')}}"></script>

    <!-- INTERNAL File uploads js -->
    <script src="{{URL::to('assets/plugins/fileupload/js/dropify.js')}}"></script>
    <script src="{{URL::to('assets/js/filupload.js')}}"></script>

    <!-- INTERNAL Multipleselect js -->
    <script src="{{URL::to('assets/plugins/multipleselect/multiple-select.js')}}"></script>
    <script src="{{URL::to('assets/plugins/multipleselect/multi-select.js')}}"></script>

    <!--INTERNAL Sumoselect js-->
    <script src="{{URL::to('assets/plugins/sumoselect/jquery.sumoselect.js')}}"></script>

    <!--INTERNAL telephoneinput js-->
    <script src="{{URL::to('assets/plugins/telephoneinput/telephoneinput.js')}}"></script>
    <script src="{{URL::to('assets/plugins/telephoneinput/inttelephoneinput.js')}}"></script>

    <!--INTERNAL jquery transfer js-->
    <script src="{{URL::to('assets/plugins/jQuerytransfer/jquery.transfer.js')}}"></script>

    <!--INTERNAL multi js-->
    <script src="{{URL::to('assets/plugins/multi/multi.min.js')}}"></script>

    <!--INTERNAL Form Advanced Element -->
    <script src="{{URL::to('assets/js/formelementadvnced.js')}}"></script>
    <script src="{{URL::to('assets/js/form-elements.js')}}"></script>
    <script src="{{URL::to('assets/js/file-upload.js')}}"></script>

    {{-- INTERNAL Peitychart js  --}}
    <script src="{{URL::to('assets/plugins/peitychart/jquery.peity.min.js') }}"></script>
    <script src="{{URL::to('assets/plugins/peitychart/peitychart.init.js') }}"></script>

    {{-- INTERNAL Apexchart js  --}}
    <script src="{{URL::to('assets/js/apexcharts.js') }}"></script>

    {{-- INTERNAL ECharts js  --}}
    <script src="{{URL::to('assets/plugins/echarts/echarts.js') }}"></script>

    {{-- INTERNAL Chart js  --}}
    <script src="{{URL::to('assets/plugins/chart/chart.bundle.js') }}"></script>
    <script src="{{URL::to('assets/plugins/chart/utils.js') }}"></script>

    {{-- INTERNAL Select2 js  --}}
    <script src="{{URL::to('assets/plugins/select2/select2.full.min.js') }}"></script>
    <script src="{{URL::to('assets/js/select2.js') }}"></script>

    {{-- INTERNAL Moment js  --}}
    <script src="{{URL::to('assets/plugins/moment/moment.js') }}"></script>

    {{-- INTERNAL Index js  --}}
    <script src="{{URL::to('assets/js/index1.js') }}"></script>

    {{-- Simplebar JS  --}}
    <script src="{{URL::to('assets/plugins/simplebar/js/simplebar.min.js') }}"></script>

    {{-- INTERNAL Sweet alert js --}}
    <script src="{{URL::to('assets/plugins/sweet-alert/jquery.sweet-modal.min.js')}}"></script>
    <script src="{{URL::to('assets/plugins/sweet-alert/sweetalert.min.js')}}"></script>
    <script src="{{URL::to('assets/js/sweet-alert.js')}}"></script>


    {{-- Flatpickr JS --}}
    <script src="{{URL::to('assets/js/flatpickr.min.js')}}"></script>

    {{-- validate JS --}}
    <script src="{{URL::to('assets/js/validate.js')}}"></script>
    <script src="{{URL::to('assets/js/additional-methods.js')}}"></script>

    {{-- parsley validaor JS --}}
    <script src="{{URL::to('assets/js/parsley.js')}}"></script>
    <!-- INTERNAl Chart js -->
    <script src="{{URL::to('assets/plugins/chart/chart.min.js')}}"></script>
    <script src="{{URL::to('assets/plugins/chart/chart.extension.js')}}"></script>
    <!-- INTERNAl Widgets js-->
    <script src="{{URL::to('assets/js/widgets1.js')}}"></script>

    <!--INTERNAL Morris Charts js -->
    <script src="{{URL::to('assets/plugins/morris/raphael-min.js')}}"></script>
    <script src="{{URL::to('assets/plugins/morris/morris.js')}}"></script>
    <script src="{{URL::to('assets/js/morris.js')}}"></script>

    {{-- chart JS --}}
    <script src="{{URL::to('assets/js/chart.umd.min.js')}}"></script>

    {{-- Toastr JS --}}
    <script src="{{URL::to('assets/js/toastr.min.js')}}"></script>
    {!! Toastr::message() !!}

    {{-- Custom js  --}}
    <script src="{{URL::to('assets/js/custom.js') }}"></script>

    @yield('scripts')

    <script>
        $(document).on('click', '.tecnicoDelete', function() {
            var _this = $(this).parents('tr');
            $('.e_id').val(_this.find('.id').text());
        });

    </script>






</body>
</html>
