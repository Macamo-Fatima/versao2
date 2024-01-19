@extends('dashboards.admin.layouts.admin-dash')
@section('title', 'Avaliação')

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
                                        <a href="{{route('nova/avaliacao')}}" class="btn btn-blue btn-sm"><i class="zmdi zmdi-assignment mr-1"></i>Nova </a>
                                        <a href="{{route('listar/avaliacoes')}}" class="btn btn-dark btn-sm"><i class="fe fe-align-justify mr-1"></i> Lista Simples </a>
                                    </div>
                                </div>
                                <div class="col-6 col-auto">
                                    <div class="form-group">
                                        <div class="input-icon">
                                            <span class="input-icon-addon">
                                                <i class="fe fe-search"></i>
                                            </span>
                                            <input type="text" class="form-control" id="search" name="search" placeholder="Pesquisar o avaliado">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row" id="users">
                                @php
                                use Carbon\Carbon;
                                @endphp

                                @foreach ($dados as $items )
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
                                                    {{ $items->nome_cargo}}


                                                </small>
                                            </div>
                                            <div class="float-right ml-auto">
                                                <a href="#" class="option-dots" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fe fe-more-vertical fs-18"></i></a>
                                                <div class="dropdown-menu dropdown-menu-right">
                                                    <a class="dropdown-item" href="{{ url('form/avaliacao/delete',['id_avaliacao' => $items->id])}}"><i class="zmdi zmdi-delete mr-2"></i>Excluir</a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card-body border-top">
                                            <p class="text-muted">Tipo: <span class="small">{{ $items->tipo_avaliacao}}</span></p>
                                            <p class="text-muted">Realiazado aos: <span class="small">{{ Carbon::parse($items->data)->format('d-m-Y')}}</span></p>
                                            <ul class="mb-0 user-details">
                                                <li class="mb-3"><span class="user-icon"><i class="fe fe-mail "></i></span><span class="small">{{ $items->email_prof}}</span></li>
                                                <li><span class="user-icon"><i class="fe fe-phone-call"></i></span><span class="small">{{ $items->contato_prof}}</span></li>
                                            </ul>
                                        </div>
                                        <div class="card-footer">
                                            <a href="{{ url('form/relatorio/visualizar',['id_avaliacao' => $items->id])}}" class="btn btn-outline-secondary btn-sm" target="_blank"><i class="fe fe-file-text mr-2"></i>&nbsp;Visualizar</a>
                                            <a href="{{ url('form/relatorio/download',['id_avaliacao' => $items->id])}}" class="btn btn-primary float-right btn-sm"><i class="zmdi zmdi-download mr-2"></i>&nbsp;Download</a>
                                        </div>
                                    </div>
                                </div>
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
